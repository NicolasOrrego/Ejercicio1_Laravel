<?php

namespace App\Http\Controllers;

use App\Models\Datos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DatosController extends Controller
{
    public function ObtenerInformacion()
    {
        $data = Datos::select('id', 'nombreIndicador', 'codigoIndicador', 'unidadMedidaIndicador', 'valorIndicador', 'fechaIndicador', 'tiempoIndicador', 'origenIndicador')->get();

        return datatables()->of($data)->toJson();
    }

    public function crearRegistro(Request $request)
    {
        $this->validate($request, [
            'nombreIndicador' => 'required|in:UNIDAD DE FOMENTO (UF),LIBRA DE COBRE,TASA DE DESEMPLEO,EURO,IMACEC,DÓLAR OBSERVADO,TASA POLÍTICA MONETARIA (TPM),INDICE DE VALOR PROMEDIO (IVP),INDICE DE PRECIOS AL CONSUMIDOR (IPC),UNIDAD TRIBUTARIA MENSUAL (UTM),BITCOIN',
            'codigoIndicador' => 'required|in:UF,LIBRA_COBRE,TASA_DESEMPLEO,EURO,IMACEC,DOLAR,TPM,IVP,IPC,UTM,BITCOIN',
            'unidadMedidaIndicador' => 'required|in:Porcentaje,Pesos,Dólar',
            'valorIndicador' => 'required|numeric',
            'fechaIndicador' => 'required|date',
            'origenIndicador' => 'required|in:mindicador.cl',
        ], [
            'nombreIndicador.in' => 'Por favor seleccione un nombre indicador.',
            'codigoIndicador.in' => 'Por favor seleccione un código indicador.',
            'unidadMedidaIndicador.in' => 'Por favor seleccione una unidad medida de indicador',
            'valorIndicador.required' => 'Por favor ingrese un valor de indicador',
            'valorIndicador.numeric' => 'Este campo solo acepta datos numericos.',
            'fechaIndicador.required' => 'Por favor seleccione una fecha de indicador',
            'origenIndicador.in' => 'Por favor seleccione un origen de indicador',
        ]);

        $datos = Datos::create([
            'nombreIndicador' => $request->nombreIndicador,
            'codigoIndicador' => $request->codigoIndicador,
            'unidadMedidaIndicador' => $request->unidadMedidaIndicador,
            'valorIndicador' => $request->valorIndicador,
            'fechaIndicador' => $request->fechaIndicador,
            'origenIndicador' => $request->origenIndicador,
        ]);

        $request->session()->flash('mensaje', 'Dato registrado correctamente.');
        return redirect()->route('index');
    }

    public function modificarRegistro($id)
    {
        $data = Datos::findOrFail($id);
        return view('CRUD.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombreIndicador' => 'required|in:UNIDAD DE FOMENTO (UF),LIBRA DE COBRE,TASA DE DESEMPLEO,EURO,IMACEC,DÓLAR OBSERVADO,TASA POLÍTICA MONETARIA (TPM),INDICE DE VALOR PROMEDIO (IVP),INDICE DE PRECIOS AL CONSUMIDOR (IPC),UNIDAD TRIBUTARIA MENSUAL (UTM),BITCOIN',
            'codigoIndicador' => 'required|in:UF,LIBRA_COBRE,TASA_DESEMPLEO,EURO,IMACEC,DOLAR,TPM,IVP,IPC,UTM,BITCOIN',
            'unidadMedidaIndicador' => 'required|in:Porcentaje,Pesos,Dólar',
            'valorIndicador' => 'required|numeric',
            'fechaIndicador' => 'required|date',
            'origenIndicador' => 'required|in:mindicador.cl',
        ], [
            'nombreIndicador.in' => 'Por favor seleccione un nombre indicador.',
            'codigoIndicador.in' => 'Por favor seleccione un código indicador.',
            'unidadMedidaIndicador.in' => 'Por favor seleccione una unidad medida de indicador',
            'valorIndicador.required' => 'Por favor ingrese un valor de indicador',
            'valorIndicador.numeric' => 'Este campo solo acepta datos numericos.',
            'fechaIndicador.required' => 'Por favor seleccione una fecha de indicador',
            'origenIndicador.in' => 'Por favor seleccione un origen de indicador',
        ]);

        $dato = Datos::findOrFail($id);
        $dato->update([
            'nombreIndicador' => $request->nombreIndicador,
            'codigoIndicador' => $request->codigoIndicador,
            'unidadMedidaIndicador' => $request->unidadMedidaIndicador,
            'valorIndicador' => $request->valorIndicador,
            'fechaIndicador' => $request->fechaIndicador,
            'origenIndicador' => $request->origenIndicador,
        ]);
        $request->session()->flash('mensaje', 'Dato actualizado correctamente.');
        return redirect()->route('index');
    }

    public function eliminarRegistro(Request $request, $id)
    {
        $data = Datos::find($id);
        $data->delete();
        $request->session()->flash('mensaje', 'Dato eliminado correctamente.');
        return redirect()->route('index');
    }

    public function obtenerDatos(Request $request)
    {
        $desde = $request->input('desde');
        $hasta = $request->input('hasta');

        $datos = Datos::whereBetween('fechaIndicador', [$desde, $hasta])->get();

        return response()->json($datos);
    }

    public function index()
    {
        return view('Grafico.grafico');
    }
}

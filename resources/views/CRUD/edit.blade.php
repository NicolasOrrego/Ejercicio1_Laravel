<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TAREA</title>

     <!-- Bootstrap -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>

<body class="bg-light">
    <div class="container">
        <div class="row flex-lg-nowrap">
            <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
                <!-- Menú de navegación -->
                <div class="card p-3">
                    <div class="e-navlist e-navlist--active-bg">
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link px-2" href="/"><span>Tabla de UF</span></a>
                            </li>
                            <li class="nav-item"><a class="nav-link px-2"href="/grafico"><span>Gráfico de UF</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="e-panel card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            ACTUALIZAR REGISTRO
                        </div>
                    </div>
                </div>
                <div class="row flex-lg-nowrap">
                    <div class="col mb-3">
                        <div class="e-panel card">
                            <div class="card-body">
                                <!-- Formulario -->
                                <form action="{{ route('update.registro', $data) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label for="nombreIndicador">Nombre Indicador</label>
                                        <select class="form-control" id="nombreIndicador" name="nombreIndicador"
                                            value="{{ $data->nombreIndicador }}"
                                            @error('nombreIndicador') is-invalid @enderror">
                                            <option>.:: Seleccione ::.</option>
                                            <option value="{{ $data->nombreIndicador }}"
                                                @if ($data->nombreIndicador == $data->nombreIndicador) selected @endif>
                                                {{ $data->nombreIndicador }}
                                            </option>
                                            <option value="UNIDAD DE FOMENTO (UF)">UNIDAD DE FOMENTO (UF)</option>
                                            <option value="LIBRA DE COBRE">LIBRA DE COBRE</option>
                                            <option value="TASA DE DESEMPLEO">TASA DE DESEMPLEO</option>
                                            <option value="EURO">EURO</option>
                                            <option value="IMACEC">IMACEC</option>
                                            <option value="DÓLAR OBSERVADO">DÓLAR OBSERVADO</option>
                                            <option value="TASA POLÍTICA MONETARIA (TPM)">TASA POLÍTICA MONETARIA (TPM)
                                            </option>
                                            <option value="INDICE DE VALOR PROMEDIO (IVP)">INDICE DE VALOR PROMEDIO
                                                (IVP)</option>
                                            <option value="INDICE DE PRECIOS AL CONSUMIDOR (IPC)">INDICE DE PRECIOS AL
                                                CONSUMIDOR(IPC)</option>
                                            <option value="UNIDAD TRIBUTARIA MENSUAL (UTM)">UNIDAD TRIBUTARIA MENSUAL
                                                (UTM)</option>
                                            <option value="BITCOIN">BITCOIN</option>
                                        </select>
                                        @error('nombreIndicador')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="codigoIndicador">Código Indicador</label>
                                        <select class="form-control" id="codigoIndicador" name="codigoIndicador"
                                            value="{{ $data->codigoIndicador }}">
                                            <option>.:: Seleccione ::.</option>
                                            <option value="{{ $data->codigoIndicador }}"
                                                @if ($data->codigoIndicador == $data->codigoIndicador) selected @endif>
                                                {{ $data->codigoIndicador }}
                                            </option>
                                            <option value="UF">UF</option>
                                            <option value="LIBRA_COBRE">LIBRA COBRE</option>
                                            <option value="TASA_DESEMPLEO">TASA DESEMPLEO</option>
                                            <option value="EURO">EURO</option>
                                            <option value="IMACEC">IMACEC</option>
                                            <option value="DOLAR">DÓLAR</option>
                                            <option value="TPM">TPM</option>
                                            <option value="IVP">IVP</option>
                                            <option value="IPC">IPC</option>
                                            <option value="UTM">UTM</option>
                                            <option value="BITCOIN">BITCOIN</option>
                                        </select>
                                        @error('codigoIndicador')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="unidadMedidaIndicador">Unidad Medida Indicador</label>
                                        <select class="form-control" id="unidadMedidaIndicador"
                                            name="unidadMedidaIndicador" value="{{ $data->unidadMedidaIndicador }}">
                                            <option>.:: Seleccione ::.</option>
                                            <option value="{{ $data->unidadMedidaIndicador }}"
                                                @if ($data->unidadMedidaIndicador == $data->unidadMedidaIndicador) selected @endif>
                                                {{ $data->unidadMedidaIndicador }}
                                            </option>
                                            <option value="Porcentaje">Porcentaje</option>
                                            <option value="Pesos">Pesos</option>
                                            <option value="Dólar">Dólar</option>
                                        </select>
                                        @error('unidadMedidaIndicador')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="valorIndicador">Valor Indicador</label>
                                        <input type="text" class="form-control" id="valorIndicador"
                                            name="valorIndicador" value="{{ $data->valorIndicador }}">
                                        @error('valorIndicador')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="fechaIndicador">Fecha Indicador</label>
                                        <input type="date" class="form-control" id="fechaIndicador"
                                            name="fechaIndicador" value="{{ $data->fechaIndicador }}">
                                        @error('fechaIndicador')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="origenIndicador">Origen Indicador</label>
                                        <select class="form-control" id="origenIndicador" name="origenIndicador"
                                            value="{{ $data->origenIndicador }}">
                                            <option>.:: Seleccione ::.</option>
                                            <option value="{{ $data->origenIndicador }}"
                                                @if ($data->origenIndicador == $data->origenIndicador) selected @endif>
                                                {{ $data->origenIndicador }}
                                            </option>
                                            <option value="mindicador.cl">mindicador.cl</option>
                                        </select>
                                        @error('origenIndicador')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-success">Modificar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

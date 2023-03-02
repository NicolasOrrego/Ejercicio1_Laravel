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
            <!-- Menú de navegación -->
            <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
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
                            REGISTRO NUEVO
                        </div>
                    </div>
                </div>
                <div class="row flex-lg-nowrap">
                    <div class="col mb-3">
                        <div class="e-panel card">
                            <div class="card-body">
                                <!-- Formulario -->
                                <form action="{{ route('add.registro') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nombreIndicador">Nombre Indicador</label>
                                        <select class="form-control @error('nombreIndicador') is-invalid @enderror"
                                            id="nombreIndicador" name="nombreIndicador"
                                            value="{{ old('nombreIndicador') }}">
                                            <option>.:: Seleccione ::.</option>

                                            <option value="UNIDAD DE FOMENTO (UF)"
                                                {{ old('nombreIndicador') == 'UNIDAD DE FOMENTO (UF)' ? 'selected' : '' }}>
                                                UNIDAD DE FOMENTO (UF)</option>

                                            <option value="LIBRA DE COBRE"
                                                {{ old('nombreIndicador') == 'LIBRA DE COBRE' ? 'selected' : '' }}>LIBRA
                                                DE COBRE</option>

                                            <option
                                                value="TASA DE DESEMPLEO"{{ old('nombreIndicador') == 'TASA DE DESEMPLEO' ? 'selected' : '' }}>
                                                TASA DE DESEMPLEO</option>

                                            <option
                                                value="EURO"{{ old('nombreIndicador') == 'EURO' ? 'selected' : '' }}>
                                                EURO</option>

                                            <option
                                                value="IMACEC"{{ old('nombreIndicador') == 'IMACEC' ? 'selected' : '' }}>
                                                IMACEC</option>

                                            <option
                                                value="DÓLAR OBSERVADO"{{ old('nombreIndicador') == 'DÓLAR OBSERVADO' ? 'selected' : '' }}>
                                                DÓLAR OBSERVADO</option>

                                            <option
                                                value="TASA POLÍTICA MONETARIA (TPM)"{{ old('nombreIndicador') == 'TASA POLÍTICA MONETARIA (TPM)' ? 'selected' : '' }}>
                                                TASA POLÍTICA MONETARIA (TPM)</option>

                                            <option
                                                value="INDICE DE VALOR PROMEDIO (IVP)"{{ old('nombreIndicador') == 'INDICE DE VALOR PROMEDIO (IVP)' ? 'selected' : '' }}>
                                                INDICE DE VALOR PROMEDIO (IVP)</option>

                                            <option
                                                value="INDICE DE PRECIOS AL CONSUMIDOR (IPC)"{{ old('nombreIndicador') == 'INDICE DE PRECIOS AL CONSUMIDOR (IPC)' ? 'selected' : '' }}>
                                                INDICE DE PRECIOS AL CONSUMIDOR(IPC)</option>

                                            <option
                                                value="UNIDAD TRIBUTARIA MENSUAL (UTM)"{{ old('nombreIndicador') == 'UNIDAD TRIBUTARIA MENSUAL (UTM)' ? 'selected' : '' }}>
                                                UNIDAD TRIBUTARIA MENSUAL (UTM)</option>

                                            <option
                                                value="BITCOIN"{{ old('nombreIndicador') == 'BITCOIN' ? 'selected' : '' }}>
                                                BITCOIN</option>
                                        </select>

                                        @error('nombreIndicador')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="codigoIndicador">Código Indicador</label>
                                        <select class="form-control @error('codigoIndicador') is-invalid @enderror"
                                            id="codigoIndicador" name="codigoIndicador"
                                            value="{{ old('codigoIndicador') }}">
                                            <option>.:: Seleccione ::.</option>
                                            <option
                                                value="UF"{{ old('codigoIndicador') == 'UF' ? 'selected' : '' }}>
                                                UF</option>

                                            <option
                                                value="LIBRA_COBRE"{{ old('codigoIndicador') == 'LIBRA_COBRE' ? 'selected' : '' }}>
                                                LIBRA COBRE</option>

                                            <option
                                                value="TASA_DESEMPLEO"{{ old('codigoIndicador') == 'TASA_DESEMPLEO' ? 'selected' : '' }}>
                                                TASA DESEMPLEO</option>

                                            <option
                                                value="EURO"{{ old('codigoIndicador') == 'EURO' ? 'selected' : '' }}>
                                                EURO</option>

                                            <option
                                                value="IMACEC"{{ old('codigoIndicador') == 'IMACEC' ? 'selected' : '' }}>
                                                IMACEC</option>

                                            <option
                                                value="DOLAR"{{ old('codigoIndicador') == 'DOLAR' ? 'selected' : '' }}>
                                                DÓLAR</option>

                                            <option
                                                value="TPM"{{ old('codigoIndicador') == 'TPM' ? 'selected' : '' }}>
                                                TPM</option>

                                            <option
                                                value="IVP"{{ old('codigoIndicador') == 'IVP' ? 'selected' : '' }}>
                                                IVP</option>

                                            <option
                                                value="IPC"{{ old('codigoIndicador') == 'IPC' ? 'selected' : '' }}>
                                                IPC</option>

                                            <option
                                                value="UTM"{{ old('codigoIndicador') == 'UTM' ? 'selected' : '' }}>
                                                UTM</option>

                                            <option
                                                value="BITCOIN"{{ old('codigoIndicador') == 'BITCOIN' ? 'selected' : '' }}>
                                                BITCOIN</option>
                                        </select>
                                        @error('codigoIndicador')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="unidadMedidaIndicador">Unidad Medida Indicador</label>
                                        <select
                                            class="form-control @error('unidadMedidaIndicador') is-invalid @enderror"
                                            id="unidadMedidaIndicador" name="unidadMedidaIndicador"
                                            value="{{ old('unidadMedidaIndicador') }}">
                                            <option>.:: Seleccione ::.</option>
                                            <option
                                                value="Porcentaje"{{ old('unidadMedidaIndicador') == 'Porcentaje' ? 'selected' : '' }}>
                                                Porcentaje</option>
                                            <option
                                                value="Pesos"{{ old('unidadMedidaIndicador') == 'Pesos' ? 'selected' : '' }}>
                                                Pesos</option>
                                            <option
                                                value="Dólar"{{ old('unidadMedidaIndicador') == 'Dólar' ? 'selected' : '' }}>
                                                Dólar</option>
                                        </select>
                                        @error('unidadMedidaIndicador')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="valorIndicador">Valor Indicador</label>
                                        <input type="text"
                                            class="form-control @error('valorIndicador') is-invalid @enderror"
                                            id="valorIndicador" name="valorIndicador"
                                            value="{{ old('valorIndicador') }}">
                                        @error('valorIndicador')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="fechaIndicador">Fecha Indicador</label>
                                        <input type="date"
                                            class="form-control @error('fechaIndicador') is-invalid @enderror"
                                            id="fechaIndicador" name="fechaIndicador"
                                            value="{{ old('fechaIndicador') }}">
                                        @error('fechaIndicador')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="origenIndicador">Origen Indicador</label>
                                        <select class="form-control @error('origenIndicador') is-invalid @enderror"
                                            id="origenIndicador" name="origenIndicador"
                                            value="{{ old('origenIndicador') }}">
                                            <option>.:: Seleccione ::.</option>
                                            <option
                                                value="mindicador.cl"{{ old('origenIndicador') == 'mindicador' ? 'selected' : '' }}>
                                                mindicador.cl</option>
                                        </select>
                                        @error('origenIndicador')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-success">Guardar</button>
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

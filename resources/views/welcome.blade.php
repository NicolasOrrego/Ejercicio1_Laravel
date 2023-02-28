<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Import Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="container">
        <div class="row flex-lg-nowrap">
            <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
                <div class="card p-3">
                    <div class="e-navlist e-navlist--active-bg">
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link px-2" href="#"><span>Tabla de UF</span></a>
                            </li>
                            <li class="nav-item"><a class="nav-link px-2"href="#"><span>Gráfico de UF</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="e-tabs mb-3 px-3">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" href="#">Registro</a></li>
                    </ul>
                </div>

                <div class="row flex-lg-nowrap">
                    <div class="col mb-3">
                        <div class="e-panel card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h6 class="mr-2"><span>Información histórica de la UF</span>
                                    </h6>
                                </div>
                                <div class="e-table">
                                    <div class="table-responsive table-lg mt-3">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nombre Indicador</th>
                                                    <th>Codigo Indicador</th>
                                                    <th>Unidad Medida Indicador</th>
                                                    <th>Valor Indicador</th>
                                                    <th>Fecha Indicador</th>
                                                    <th>Tiempo Indicador</th>
                                                    <th>Origen Indicador</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-nowrap align-middle">Adam Cotter</td>
                                                    <td class="text-nowrap align-middle"><span>09 Dec 2017</span></td>
                                                    <td class="text-center align-middle"><i
                                                            class="fa fa-fw text-secondary cursor-pointer fa-toggle-on"></i>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="btn-group align-top">
                                                            <button class="btn btn-sm btn-outline-secondary badge"
                                                                type="button" data-toggle="modal"
                                                                data-target="#user-form-modal">Modificar</button>
                                                            <button class="btn btn-sm btn-outline-secondary badge"
                                                                type="button" data-toggle="modal"
                                                                data-target="#user-form-modal">Eliminar</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center px-xl-3">
                                    <button class="btn btn-success btn-block" type="button" data-toggle="modal"
                                        data-target="#user-form-modal">Nuevo Registro</button>
                                </div>
                                <hr class="my-3">
                                <div>
                                    <div class="form-group">
                                        <label>Buscar:</label>
                                        <div>
                                            <input class="form-control w-100" type="text" placeholder="Buscar"
                                                value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

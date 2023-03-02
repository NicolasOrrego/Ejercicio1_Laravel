<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS de Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">

    <!-- JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>TAREA</title>
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
                            Gráfico de linea
                        </div>
                    </div>
                </div>
                <div class="row flex-lg-nowrap">
                    <div class="col mb-3">
                        <div class="e-panel card">
                            <div class="card-body">
                                <!-- Formulario -->
                                <form class="form-inline" id="filtro-form">
                                    <div class="form-group mr-3">
                                        <label for="desde" class="mr-2">Fecha Desde:</label>
                                        <input type="date" class="form-control" name="desde" id="desde">
                                    </div>
                                    <div class="form-group mr-3">
                                        <label for="hasta" class="mr-2">Fecha Hasta:</label>
                                        <input type="date" class="form-control" name="hasta" id="hasta">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Filtrar</button>
                                </form>
                            </div>
                            <div class="card-body">
                                <div style="width: 800px; height: 400px;">
                                    <canvas id="grafico"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Script para obtener datos y crear gráfico dinámico -->
    <script>
        function obtenerDatos(desde, hasta) {
            $.ajax({
                url: '/datos',
                type: 'GET',
                data: {
                    desde: desde,
                    hasta: hasta
                },
                success: function(datos) {
                    crearGrafico(datos);
                }
            });
        }

        function crearGrafico(datos) {
            var etiquetas = [];
            var valores = [];

            datos.forEach(function(dato) {
                etiquetas.push(dato.nombreIndicador);
                valores.push(dato.valorIndicador);
            });

            var ctx = $('#grafico');
            var chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: etiquetas,
                    datasets: [{
                        label: 'Valor Indicador',
                        data: valores,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)',
                            'rgba(255, 0, 255, 0.6)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 0, 255, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        xAxes: [{
                            barPercentage: 0.8,
                            categoryPercentage: 0.6
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    legend: {
                        display: false
                    }
                }
            });
        }


        $('#desde, #hasta').change(function() {
            var desde = $('#desde').val();
            var hasta = $('#hasta').val();

            if (desde && hasta) {
                obtenerDatos(desde, hasta);
            }
        });
    </script>
</body>

</html>

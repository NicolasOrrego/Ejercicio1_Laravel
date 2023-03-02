<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tarea</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

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
                <!-- Tabla de información -->
                <div class="e-panel card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            Unidad de fomento
                            <a href="/add"><button type="button" class="btn btn-success">Nuevo Registro</button></a>
                        </div>
                    </div>
                </div>
                <div class="row flex-lg-nowrap">
                    <div class="col mb-3">
                        <div class="e-panel card">
                            <div class="card-body">
                                <table id="datos" class="table table-striped table-bordered" style="width:100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre Indicador</th>
                                            <th>Código Indicador</th>
                                            <th>Unidad Medida Indicador</th>
                                            <th>Valor Indicador</th>
                                            <th>Fecha Indicador</th>
                                            <th>Tiempo Indicador</th>
                                            <th>Origen Indicador</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <!-- Tabla cargado con AJAX -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mensaje de éxito o error después de una operación -->
    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <!-- JavaScript -->
    <script>
        // Rutas para editar y eliminar registros
        var editUrl = "{{ route('edit.registro', ':id') }}";
        var deleteUrl = "{{ route('delete.registro', ':id') }}";
    </script>

    <script>
        // DataTable cargado con AJAX
        $('#datos').DataTable({
            "ajax": "{{ route('datatable.lista') }}",
            "columns": [{
                    data: 'id'
                },
                {
                    data: 'nombreIndicador'
                },
                {
                    data: 'codigoIndicador'
                },
                {
                    data: 'unidadMedidaIndicador'
                },
                {
                    data: 'valorIndicador'
                },
                {
                    data: 'fechaIndicador'
                },
                {
                    data: 'tiempoIndicador'
                },
                {
                    data: 'origenIndicador'
                },
                {
                    // Funciones EDITAR Y ELIMINAR.
                    data: null,
                    render: function(data, type, row) {
                        return '<a href="' + editUrl.replace(':id', row.id) +
                            '" class="btn btn-primary editar" data-id="' +
                            row.id + '">Editar</a>&nbsp;' +
                            '<form action="' + deleteUrl.replace(':id', row.id) +
                            '" method="POST" class="d-inline-block">' +
                            '@csrf' +
                            '@method('DELETE')' +
                            '<button type="submit" class="btn btn-danger eliminar" data-id="' + row.id +
                            '">Eliminar</button>' +
                            '</form>';
                    }
                }

            ],
            "dataSrc": "data",
            "responsive": true,

            // Lenguaje cambiado de datatable.
            "language": {
                "lengthMenu": "Mostrar <select>" +
                    "<option value='10'>10</option>" +
                    "<option value='25'>25</option>" +
                    "<option value='50'>50</option>" +
                    "<option value='100'>100</option>" +
                    "</select> registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoFiltered": "(filtrado de _MAX_ registrados totales)",
                "search": "Buscar",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    </script>
</body>

</html>

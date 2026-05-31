<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'RRHH') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.bootstrap5.min.css" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            * { font-family: 'Inter', sans-serif; }
            body { background: #f0f4ff; }

            /* NAVBAR */
            nav.bg-white {
                background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 100%) !important;
                border-bottom: 1px solid rgba(0,212,255,0.2) !important;
                box-shadow: 0 2px 20px rgba(0,212,255,0.1);
            }
            nav .text-gray-800 { color: #00d4ff !important; }
            nav a.text-gray-500 { color: rgba(255,255,255,0.85) !important; }
            nav button.text-gray-500 { color: rgba(255,255,255,0.85) !important; }
            nav .text-gray-500:hover { color: #00d4ff !important; }
            nav .text-gray-900 { color: #fff !important; }
            nav .border-indigo-400 { border-color: #00d4ff !important; }
            nav .dropdown-menu, .rounded-md.shadow-lg {
                background: #0f172a !important;
                border: 1px solid rgba(0,212,255,0.2) !important;
            }

            /* CARDS */
            .card {
                border: 1px solid rgba(0,212,255,0.15);
                border-radius: 16px;
                box-shadow: 0 4px 24px rgba(0,0,0,0.15);
                background: #fff;
                overflow: hidden;
            }
            .card-header {
                background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 100%);
                color: white;
                padding: 1rem 1.5rem;
                font-weight: 600;
                font-size: 1rem;
                border-bottom: 1px solid rgba(0,212,255,0.2);
            }

            /* TABLES */
            table.table thead tr th, table.table thead th, .dataTables_wrapper .table thead th {
                background-color: #000000 !important;
                color: #ffffff !important;
                border-color: #000000 !important;
            }
            .table tbody tr:hover { background: #e8f4ff; }
            .table tbody td { padding: 0.6rem 0.5rem; vertical-align: middle; color: #1e293b; font-size: 0.82rem; }

            /* BUTTONS - COLORES PERSONALIZADOS */
            .btn-mi-verde { background: #28a745 !important; color: #fff !important; border: none !important; }
            .btn-mi-rojo { background: #dc3545 !important; color: #fff !important; border: none !important; }
            .btn-mi-celeste { background: #0dcaf0 !important; color: #000 !important; border: none !important; }
            .btn-sm { padding: 0.3rem 0.9rem; font-size: 0.78rem; border-radius: 20px; }

            /* DATATABLES LAYOUT */
            div.dt-layout-start { display: flex; align-items: center; gap: 20px; }
            
            main { padding: 2rem 1rem; }
            .min-h-screen { background: #f0f4ff; }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main class="py-4">
                @yield('content')
                {{ $slot ?? '' }}
            </main>
        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.bootstrap5.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>

        <script>
        if (document.getElementById('example')) {
            new DataTable('#example', {
                scrollX: false,
                autoWidth: false,
                layout: {
                    topStart: ['pageLength', {
                        buttons: [
                            {
                                extend: 'excelHtml5',
                                text: '<i class="fas fa-file-excel me-1"></i> Excel',
                                className: 'btn btn-mi-verde btn-sm',
                                exportOptions: { columns: ':not(:last-child)' }
                            },
                            {
                                extend: 'pdfHtml5',
                                text: '<i class="fas fa-file-pdf me-1"></i> PDF',
                                className: 'btn btn-mi-rojo btn-sm',
                                exportOptions: { columns: ':not(:last-child)' },
                                orientation: 'landscape',
                                pageSize: 'A4'
                            },
                            {
                                extend: 'print',
                                text: '<i class="fas fa-print me-1"></i> Imprimir',
                                className: 'btn btn-mi-celeste btn-sm',
                                exportOptions: { columns: ':not(:last-child)' }
                            }
                        ]
                    }],
                    topEnd: { search: { placeholder: 'Buscar...' } },
                    bottomStart: 'info',
                    bottomEnd: 'paging'
                },
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, 'Todos']],
                pageLength: 10,
                language: {
                    search: "Buscar:",
                    lengthMenu: "Mostrar _MENU_ registros",
                    info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    paginate: { first: "Primero", last: "Último", next: "Siguiente", previous: "Anterior" },
                    zeroRecords: "No se encontraron resultados",
                    infoEmpty: "Mostrando 0 registros",
                    infoFiltered: "(filtrado de _MAX_ registros totales)"
                }
            });
        }
        </script>
    </body>
</html>

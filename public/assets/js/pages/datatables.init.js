$(document).ready(function () {

    $(".data-table").DataTable({
        sorting: [],
        ordering: false,
        lengthMenu: [5, 7,8,10],
        pageLength: 5,
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "No se encontraron registros",
            "sInfo": "Mostrando  _START_ a _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Sin registros",
            "sInfoFiltered": "(Filtrado de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    })
    var title = $('input[name="title"]').val();
    var file = $('input[name="file"]').val();

    $("#datatable-buttons").DataTable({ 
        engthChange: !1,
        sorting: [],
        responsive: true,
        columnDefs: [
            { 
                orderable: false, 
                targets: 0 
            }
        ],
        lengthMenu: [10, 25, 50, 100],
        pageLength: 10,
        buttons: [
            {
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel"></i> &nbsp; Export Excel',
                filename: 'Listado_Empleados',
                title: 'Listado de Empleados',
                className: 'btn-outline-success btn-rounded waves-effect waves-light',
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf"></i> &nbsp; Export PDF',
                filename: 'Listado_Empleados',
                title: 'Listado de Empleados',
                className: 'btn-outline-danger btn-rounded waves-effect waves-light',
                orientation: 'landscape',
            },
        ],
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "No se encontrado registros",
            "sInfo": "Mostrando  _START_ a _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Sin registros",
            "sInfoFiltered": "(Filtrado de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    }).buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"),
    $(".dataTables_length select").addClass("form-select form-select-sm");

    const dataTableButton = $('.dt-buttons .btn-secondary');

    if (dataTableButton.length > 0) {
        dataTableButton.removeClass('btn-secondary');
    }
});

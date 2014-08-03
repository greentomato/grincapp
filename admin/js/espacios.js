var dataTable, currentRow = 0;

$(document).ready(function () {
    dtInit();
    boxes();
    borrarModalInit();
    $('#left-panel li[data-nav="espacios"]').addClass('active');
})

function dtInit () {
    dataTable = $('#espacios').DataTable({
        processing: false,
        serverSide: true,
        stateSave: false,
        ajax: BASE_URL+'php/providers/espacios.provider.php',
        language: dtLanguage,
        columns: [
            { 'data': 'titulo' },
            { 'data': 'descripcion' },
            { 'data': 'acciones' }
        ],
        fnDrawCallback: function( oSettings ) {
            borrar();
        },
        columnDefs: [
            { 
                sortable: false,
                targets: 2
            }
            
        ],
       order: [[ 1, "asc" ]]
    });
}

function borrar () {
    var id;
    $('.borrarEspacio').click(function (event) {
        id = $(this).attr('data-id');
        event.preventDefault();
        borrarModalInit();
        $('#myModal').modal('show');
        $('#myModal #modalAction').click(function () {
            $('#myModal .modal-footer button').unbind('click');
            loaderModalInit();
            $.ajax({
                type:'post',
                url: BASE_URL+'php/controllers/borrarEspacio.controller.php',
                data:{id:id},
                success: function () {
                    
                    $('#myModal').modal('hide');
                    $('#row'+id).fadeOut(
                        500,
                        function () {
                            $('#row'+id).remove();
                            if ($('#espacios tbody tr').length == 0) {
                                dataTable.ajax.reload();
                            }
                        }
                    )
                    
                }
            })
        })
    })
}

function borrarModalInit () {
    $('#myModal #myModalLabel .text').html('Borrar Espacio');
    $('#myModal #myModalLabel .jarviswidget-loader').hide();
    $('#myModal .modal-body').html('<p>¿Está seguro que desea borrar esta espacio?</p>');
    $('#myModal #modalAction').html('Borrar').addClass('btn-danger');
    $('#myModal .modal-footer button').attr('disabled', false);
}

function loaderModalInit () {
    $('#myModal #myModalLabel .jarviswidget-loader').show();
    $('#myModal .modal-body').html('<p>Por favor espere...</p>');
    $('#myModal .modal-footer button').attr('disabled', true);
}

function boxes () {
    if (document.location.hash == '#new') boxSuccess('La espacio se cargó con éxito');
    if (document.location.hash == '#edit') boxSuccess('La espacio se editó con éxito');
    if (document.location.hash == '#error1') boxError('El formato del banner no es válido. Sólo se aceptan los siguientes formatos: jpg, png, gif y swf');
    if (document.location.hash == '#error2') boxError('El archivo flash no coincide con el tamaño especificado');
}
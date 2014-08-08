$(document).ready(function () {
    $('#left-panel li[data-nav="espacios"]').addClass('active');
    ajaxFileUpload();
    borrarImagen();
    dtInit();
    $('.nativaDataItem .hidden').remove();
    $('.saveForm').click(save)
    $('.vista-previa').each(function (){
        if ($(this).find('img').attr('src') != 'img/uploader-background.jpg') {
            $(this).find('a').show();
            $(this).find('.info span').html('');
        }
    })
})

function forceImagenUpload () {
    $('#imagenSubmit').trigger('click');
}


//IMAGENES

//cargar
function ajaxFileUpload () {
    $('#imagenUploader').ajaxForm({
        beforeSubmit:function (arr, $form) {
            $('.imagenUploader').find('.info span').html('Por favor espere...');
            $('.imagenUploader').find('.info .fa-spin').show();
        },
        success: function (data) {
            $('.imagenUploader').find('.info span').html('');
            $('.imagenUploader').find('.info .fa-spin').hide();
            if (data) {
                $('.imagenUploader img')
                .fadeOut(400, function() {
                    $('.imagenUploader img').attr('src', data[0].src);
                })
                .fadeIn(400, function () {
                    $('.imagenUploader a').attr('data-src', data[0].src).show();
                });
            }
        }
    });
}

function borrarImagen () {
    $('.vista-previa a').click(function () {
        var $this = $(this);
        $.ajax({
            url:BASE_URL+'php/controllers/borrarSrc.controller.php',
            type:'post',
            data:{src:$this.attr('data-src'), tabla:'espacio', columna:'imagen'},
            success: function () {
                $this.parent().find('img')
                .fadeOut(400, function() {
                    $this.parent().find('img').attr('src', 'img/uploader-background.jpg');
                })
                .fadeIn(400, function () {
                    $this.hide();
                    $this.parent().find('.info span').html('Click para cargar la imagen');
                })
            }
        })
    })
}

//FUNCIONES DE ESPECIES
function save () {
    var response = {
        ids: new Array()
    };
    $('#especiesSelected tbody tr').each(function (i) {
        if ($(this).find('a.btn-danger').is(':visible')) {
            response.ids.push($(this).find('a.btn-danger').attr('data-especie'));
        }
    })
    $('#formEspacio').append('<input type="hidden" name="especies" value="'+JSON.stringify(response).replace(/"/g, "'")+'" />').submit();
}

function dtInit () {    
    $('#especiesSelected').on( 'preXhr.dt', function () {
        $('#dt-loader').show();
    }).on( 'xhr.dt', function () {
        $('#dt-loader').hide();
    }).DataTable({
        processing: false,
        serverSide: true,
        stateSave: false,
        ajax: BASE_URL+'php/providers/especiesByEspacio.provider.php',
        language: dtLanguage,
        columns: [
            { 'data': 'acciones' },
            { 'data': 'nombre' },
            { 'data': 'denominacion' }
        ],
        fnDrawCallback: function( oSettings ) {
            afterDraw();
        },
        columnDefs: [
            { 
                sortable: false,
                targets: 0
            }
            
        ],
       order: [[ 1, "asc" ]]
    });
}

function afterDraw () {
    $('#especiesSelected tr').each(function (i) {
        if (i && especiesSelected.indexOf($(this).attr('id').replace(/[^0-9]+/, '')*1) !== -1) {
            $(this).addClass('info').find('a.btn-success').hide();
            $(this).addClass('info').find('a.btn-danger').show();
        }
    })
}

function addEspecie(a) {
    var $row = $(a).parents('tr');
    especiesSelected.push($(a).attr('data-especie')*1);
    $row.addClass('info');
    $(a).hide().siblings('.btn-danger').show();
}

function removeEspecie (a) {
    especiesSelected.splice(especiesSelected.indexOf($(a).attr('data-especie')*1), 1);
    $(a).hide().siblings('.btn-success').show();
    $(a).parents('tr').removeClass('info');
}
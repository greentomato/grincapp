$(document).ready(function () {
    $('#left-panel li[data-nav="especies"]').addClass('active');
    sortable();
    ajaxFileUpload();
    borrarImagen();
    $('.nativaDataItem .hidden').remove();
    $('.saveForm').click(function (){ $('form:first').submit()})
    $('.rating label').click(function (event) {
        if ($(this).parents('#sortable1').length) {
            event.preventDefault();
        }
    })
    $('#sortable1 textarea').prop('disabled', true);
    $('.vista-previa').each(function (){
        if ($(this).find('img').attr('src') != 'img/uploader-background.jpg') {
            $(this).find('a').show();
            $(this).find('.info span').html('');
        }
    })
})

function sortable () {
    $( "#sortable1, #sortable2" ).sortable({
        connectWith: ".connectedSortable",
        placeholder: "ui-state-highlight",
        //forcePlaceholderSize: true,
        start: function( event, ui ) {
            ui.placeholder.height(ui.item.outerHeight());
            //ui.placeholder.width(ui.item.outerWidth());
            if (event.target.id == 'sortable1') {
                $('#sortable2').addClass('waiting')
            } else {
                $('#sortable1').addClass('waiting')
            }
        },
        stop: function ( event, ui ) {
            if (ui.item.parents('#sortable1').length) {
                ui.item.find('input[type="radio"]').prop('checked', false)
                ui.item.find('textarea').prop('disabled', true).val('')
            } else {
                if (!ui.item.find('input[type="radio"]:checked').length) {
                    ui.item.find('input[type="radio"]:last').prop('checked', true)
                }
                ui.item.find('textarea').prop('disabled', false)
            }
            $('#sortable1, #sortable2').removeClass('waiting')
        }
    }).disableSelection();
}

function forceImagenUpload () {
    $('#imagenSubmit').trigger('click');
}
function forceFlorUpload () {
    $('#florSubmit').trigger('click');
}
function forceEscalaUpload () {
    $('#escalaSubmit').trigger('click');
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
                    $('.imagenUploader a').attr('data-id', data[0].id).show();
                });
            }
        }
    });
    $('#florUploader').ajaxForm({
        beforeSubmit:function (arr, $form) {
            $('.florUploader').find('.info span').html('Por favor espere...');
            $('.florUploader').find('.info .fa-spin').show();
        },
        success: function (data) {
            $('.florUploader').find('.info span').html('');
            $('.florUploader').find('.info .fa-spin').hide();
            if (data) {
                $('.florUploader img')
                .fadeOut(400, function() {
                    $('.florUploader img').attr('src',data[0].src);
                })
                .fadeIn(400, function () {
                    $('.florUploader a').attr('data-id', data[0].id).show();
                });
            }
        }
    });
    $('#escalaUploader').ajaxForm({
        beforeSubmit:function (arr, $form) {
            $('.escalaUploader').find('.info span').html('Por favor espere...');
            $('.escalaUploader').find('.info .fa-spin').show();
        },
        success: function (data) {
            $('.escalaUploader').find('.info span').html('');
            $('.escalaUploader').find('.info .fa-spin').hide();
            if (data) {
                $('.escalaUploader img')
                .fadeOut(400, function() {
                    $('.escalaUploader img').attr('src',data[0].src);
                })
                .fadeIn(400, function () {
                    $('.escalaUploader a').attr('data-id', data[0].id).show();
                });
            }
        }
    });
}

function borrarImagen () {
    $('.vista-previa a').click(function () {
        var $this = $(this);
        $.ajax({
            url:BASE_URL+'php/controllers/borrarImagen.controller.php',
            type:'post',
            data:{id:$this.attr('data-id'), src:$this.attr('data-src')},
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
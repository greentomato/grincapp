$(document).ready(function () {
    $('#left-panel li[data-nav="espacios"]').addClass('active');
    ajaxFileUpload();
    borrarImagen();
    $('.nativaDataItem .hidden').remove();
    $('.saveForm').click(function (){ $('form:first').submit()})
    $('.vista-previa').each(function (){
        if ($(this).find('img').attr('src') != 'img/uploader-background.jpg') {
            $(this).find('a').show();
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
        success: function (data) {
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
                })
            }
        })
    })
}
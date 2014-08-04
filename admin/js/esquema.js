$(document).ready(function () {
    $('#left-panel li[data-nav="esquemas"]').addClass('active');
    ajaxFileUpload();
    $('.nativaDataItem .hidden').remove();
    $('.saveForm').click(function (){ $('form:first').submit()})
    $('.vista-previa').each(function (){
        if ($(this).find('img').attr('src') != 'img/uploader-background.jpg') {
            $(this).find('a').show();
        }
    })
    $('#formEsquema').click(function (event) {
        //abrir dialogo de carga de archivo
        if ($(event.target).hasClass('inputFileDispacher')) {
            window.inputFileDispacher = $(event.target);
            openFileDialog($(event.target).index())
        }
        //borrar imagenes
        if ($(event.target).hasClass('borrarImagen')) {
            var $this = (event.target.nodeName == 'I')?$(event.target).parent():$(event.target);
            $.ajax({
                url:BASE_URL+'php/controllers/borrarSrc.controller.php',
                type:'post',
                data:{src:$this.attr('data-src'), tabla:$this.attr('data-tabla'), columna:'imagen'},
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
        }
    })
    $('#bloques').click(function (event) {
        var $this = $(event.target);
        if ($this.hasClass('borrarBloque')) {
            $this.parents('.bloque').remove();
            if (id = $this.attr('data-id')) {
                $.ajax({
                    type:'post',
                    url:BASE_URL+'php/controllers/borrarBloque.controller.php',
                    data:{'id':id}
                })
            }
        }
    })
    $('#agregarBloque').click(agregarBloque)
})

function forceUpload (self) {
    $(self).parents('form').submit();
}

//BLOQUES
//agregar
function agregarBloque () {
    var i = $('div.bloque').length+1;
    var $bloque = $('<div class="bloque" />').append($('#infoPrincipal').html());
    $bloque.find('.infoAction').show();
    $bloque.find('a.borrarImagen').hide();
    $bloque.find('img').attr({src: 'img/uploader-background.jpg', 'data-i':i});
    $bloque.find('input').val('').attr('name', 'bloquesValue[]');
    $bloque.find('textarea').val('').attr('name', 'bloquesDescripcion[]');
    $bloque.find('label.label:first').html('Título');
    $bloque.find('label.label:last').html('Bajada');
    $bloque.append('<input type="hidden" name="bloquesId[]" value="0">')
    $('#bloques').append($bloque);
}
//FIN BLOQUES


//IMAGENES
//cargar
function openFileDialog (i) {
    $('.fileForm input[type="file"]').trigger('click');
}
function ajaxFileUpload () {
    $('.fileForm').ajaxForm({
        data: {'i':0},
        beforeSubmit:function (arr, $form, options) {
            options.extraData.i = window.inputFileDispacher.attr('data-i');
        },
        success: function (data) {
            if (data) {
                window.inputFileDispacher
                .fadeOut(400, function() {
                    window.inputFileDispacher.attr('src', data[0].src);
                })
                .fadeIn(400, function () {
                    window.inputFileDispacher.prev().attr('data-src', data[0].src).show();
                });
                if (window.inputFileDispacher.parents('.bloque').length) {
                    window.inputFileDispacher.parents('.bloque').find('input[name="bloquesId[]"]').val(data[0].id)
                }
            }
        }
    });
}
//FIN IMAGENES
$(document).ready(function () {
    $('#left-panel li[data-nav="esquemas"]').addClass('active');
    ajaxFileUpload();
    dtInit();
    $('.nativaDataItem .hidden').remove();
    $('.saveForm').click(save)
    $('.vista-previa').each(function (){
        if ($(this).find('img').attr('src') != 'img/uploader-background.jpg') {
            $(this).find('a').show();
            $(this).find('.info span').html('');
        }
    })
    $('#formEsquema').click(function (event) {
        //abrir dialogo de carga de archivo
        if ($(event.target).hasClass('inputFileDispacher')) {
            window.inputFileDispacher = $(event.target);
            openFileDialog($(event.target).index())
            event.stopPropagation();
            return true;
        }
        if ($(event.target).parents('.imagenUploader').length && event.target.nodeName != 'A' && event.target.nodeName != 'I') {
            window.inputFileDispacher = $(event.target).parents('.imagenUploader').find('.inputFileDispacher');
            openFileDialog($(event.target).index());
            event.stopPropagation();
            return true;
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
                        $this.parent().find('.info span').html('Click para cargar la imagen');
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
    $bloque.find('.info span').html('Click para cargar la imagen');
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
            window.inputFileDispacher.parents('.imagenUploader').find('.info span').html('Por favor espere...');
            window.inputFileDispacher.parents('.imagenUploader').find('.info .fa-spin').show();
        },
        success: function (data) {
            window.inputFileDispacher.parents('.imagenUploader').find('.info span').html('');
            window.inputFileDispacher.parents('.imagenUploader').find('.info .fa-spin').hide();
            if (data) {
                window.inputFileDispacher
                .fadeOut(400, function() {
                    window.inputFileDispacher.attr('src', data[0].src);
                })
                .fadeIn(400, function () {
                    window.inputFileDispacher.siblings('a').attr('data-src', data[0].src).show();
                });
                if (window.inputFileDispacher.parents('.bloque').length) {
                    window.inputFileDispacher.parents('.bloque').find('input[name="bloquesId[]"]').val(data[0].id)
                }
            }
        }
    });
}
//FIN IMAGENES

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
    $('#formEsquema').append('<input type="hidden" name="especies" value="'+JSON.stringify(response).replace(/"/g, "'")+'" />').submit();
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
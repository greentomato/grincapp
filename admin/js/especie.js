$(document).ready(function () {
    $('#left-panel li[data-nav="especies"]').addClass('active');
    sortable();
    ajaxFileUpload();
    borrarImagen();
    tags();
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
        success: function (data) {
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
        success: function (data) {
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
        success: function (data) {
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
                })
            }
        })
    })
}

function tags () {
    var cache = {}
    $('#tags').tagsInput({
        autocomplete_url: BASE_URL+'php/controllers/autocomplete.controller.php',
        autocomplete:{
            minLength: 2,
            source: function( request, response ) {
                var term = request.term;
                if ( term in cache ) {
                    response( cache[ term ] );
                    return;
                }
                $.getJSON( BASE_URL+'php/controllers/autocomplete.controller.php', request, function( data, status, xhr ) {
                    cache[ term ] = data;
                    response( data );
                })
            },
            appendTo: '#myAutocompleContainer'
        },
        height:'80px',
        width:'99%',
        defaultText: '',
        delimiter:'|',
        onAddTag: function () {
            $('#tags_tag').autocomplete( "close" )
        }
    })
}
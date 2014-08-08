var map;
$(document).ready(function () {
    $('#left-panel li[data-nav="regiones"]').addClass('active');
    initializeMap('map_region');
    borrarModalInit();
    dtInit();
    MapToolbar.initFeature();
    var polygon, latLng, e = {};
    if (polygon = $('textarea[name="polygon"]').val()) {
        polygon = polygon.split(',');
        for (var i=0, l=polygon.length; i<l; i++) {
            latLng = myTrim(polygon[i]).split(' ');
            e.latLng =new google.maps.LatLng(latLng[0], latLng[1]);
            MapToolbar.addPoint(e, MapToolbar.currentFeature);
        }
    }
    $('.saveForm').click(function () {
        var points = [], value;
        MapToolbar.currentFeature.markers.forEach(function(marker, index){
            points.push(marker.position.toString().replace(',', ''))
        });
        value = $('input[name="region"]').val();
        
        if (!value) {
            boxError('Asígnele un nombre a la región para poder identificarla posteriormente');
        } else if (points.length==0){
            boxError('No se puede cargar una región que no tenga un polígono demarcado');
        } else if (points.length < 3) {
            boxError('El polígono tiene que tener al menos tres vértices');
        } else {
            $('input[name="value"]').val(value);
            $('textarea[name="polygon"]').val(points.join(',').replace(/\(/g, '').replace(/\)/g, ''));
            save();
            $('#dataSender').submit();
        }
    })
    
})

function initializeMap (container) {
    map = new google.maps.Map(document.getElementById(container));
    map.setCenter(new google.maps.LatLng(-34.603526, -58.381586));
    map.setZoom(12);
    map.setMapTypeId( google.maps.MapTypeId.ROADMAP );

    // with is not so good as it add a new element in scope chain
    // but i like the syntax

    with(MapToolbar){
        with(buttons){
            $hand = document.getElementById("hand_b");
            $shape = document.getElementById("shape_b");
            $delete = document.getElementById('remove_b');
        }
        select("hand_b");
    }
	
    MapToolbar.polyClickEvent = google.maps.event.addListener(map, 'click',  function(event){
        if( !MapToolbar.isSelected(MapToolbar.buttons.$shape) ) return;
        if(MapToolbar.currentFeature){
            MapToolbar.addPoint(event, MapToolbar.currentFeature);
        }
    });
    
    MapToolbar.buttons.$shape.onclick = function () {
        MapToolbar.select("shape_b");
    }
    $('#remove_b').click(function () {
        $('#myModal').modal('show');
    })
    $('#myModal #modalAction').click(function () {
        MapToolbar.removeFeature('shape_1');
        $('#myModal').modal('hide');
    })
}

function myTrim(x) {
    return x.replace(/^\s+|\s+$/gm,'');
}

function borrarModalInit () {
    $('#myModal #myModalLabel .text').html('Borrar Polígono');
    $('#myModal #myModalLabel .jarviswidget-loader').hide();
    $('#myModal .modal-body').html('<p>¿Está seguro que desea borrar este Polígono?</p>');
    $('#myModal #modalAction').html('Borrar').addClass('btn-danger');
    $('#myModal .modal-footer button').attr('disabled', false);
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
    $('#dataSender').append('<input type="hidden" name="especies" value="'+JSON.stringify(response).replace(/"/g, "'")+'" />');
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
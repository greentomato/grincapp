var map;
$(document).ready(function () {
    $('#left-panel li[data-nav="regiones"]').addClass('active');
    initializeMap('map_region');
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
    $('#guardar').click(function () {
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
    
    document.getElementById('remove_b').onclick = function () {
        MapToolbar.removeFeature('shape_1')
    }
}

function myTrim(x) {
    return x.replace(/^\s+|\s+$/gm,'');
}
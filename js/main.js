var Geolocation = (function () {
    var autocomplete, input, currentPlace;
    function initialize(inputId, callback) {
        input = document.getElementById(inputId);
        autocomplete = new google.maps.places.Autocomplete(
            (document.getElementById(inputId)),
            {types: ['geocode']}
        );
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            callback(autocomplete);
        });
        if (window.addEventListener) {
            input.addEventListener('focus', geolocate, false);
        } else if (window.attachEvent) {
            input.attachEvent('onfocus', geolocate);
        } else {
            input['onfocus'] =  geolocate;
        }
    }
    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                autocomplete.setBounds(new google.maps.LatLngBounds(geolocation, geolocation));
            });
        }
    }
    return {
        initialize: function(inputId, callback){
            initialize(inputId, callback);
        }
    }
})();
// Start "addLocation"
// Map to allow users to add a location of food place
var $maperizer = $('#map-canvas').maperizer(Maperizer.MAP_OPTIONS);

var latField = $('input#lat'),
    lngField = $('input#lng');

$maperizer.maperizer('attachEventsToMap', [{
        name: 'click',
        callback: function(event){
            $maperizer.maperizer('removeAllMarkers');
            $maperizer.maperizer('addMarker', {
                lat: event.latLng.lat(),
                lng: event.latLng.lng(),
            });
            latField.val(event.latLng.lat());
            lngField.val(event.latLng.lng());
            console.log(event.latLng.lat(), event.latLng.lng());
        }
    }]
);
// end - "addLocation"

// Start "getUserLocation"
// Get users location, add to query string and reload page with distances
navigator.geolocation.getCurrentPosition(function (location) {

    // $.post( "places", { lat: location.coords.latitude, lng: location.coords.longitude } );

    var params = { 
        lat: location.coords.latitude, 
        lng: location.coords.longitude
    };
    var str = jQuery.param( params );

    var url = window.location.href;
    if (url.search("#location") >= 0) {
        
    } else {
        window.location.href=window.location.href + '#location?' + str;
    }

})
// end - "getUserLocation"

// $("#distance").submit();
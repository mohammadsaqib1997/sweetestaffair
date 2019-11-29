var jQuery = require('jquery');

(function ($) {
    $('#location').on('keypress', function (e) {
        if (e.which == 13) {
            e.preventDefault();
        }
    })

    var autocomplete;
    var map;
    var marker;
    var markerListener = false;
    function initMap() {
        var karachi = { lat: 24.8607, lng: 67.0011 };
        var latlng = document.getElementById('latlng').value;

        if (latlng) {
            latlng = latlng.split(',')
            latlng = { lat: parseFloat(latlng[0]), lng: parseFloat(latlng[1]) }
        }


        map = new google.maps.Map(
            document.getElementById('map'), { zoom: 12, center: latlng ? latlng : karachi, disableDefaultUI: true });

        if (latlng) {
            marker = new google.maps.Marker({ draggable: true, position: latlng, map: map });
            map.setZoom(15);
            markerListener = true;
            google.maps.event.addListener(marker, 'dragend', function () {
                markerDragged();
            });
        }

        var input = document.getElementById('location');
        autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.addListener('place_changed', onPlaceChanged);
        autocomplete.setComponentRestrictions({ 'country': 'pk' })
    }

    function onPlaceChanged() {
        var place = autocomplete.getPlace();
        if (marker) {
            marker.setMap(null);
        }

        if (place.geometry) {
            document.getElementById('latlng').value = place.geometry.location.lat() + ',' + place.geometry.location.lng();
            map.panTo(place.geometry.location);
            map.setZoom(15);
            marker = new google.maps.Marker({ draggable: true, position: place.geometry.location, map: map });
            if (markerListener == false) {
                markerListener = true;
                google.maps.event.addListener(marker, 'dragend', function () {
                    markerDragged();
                });
            }
        } else {
            document.getElementById('latlng').value = "";
        }
    }

    function markerDragged() {
        document.getElementById('latlng').value = marker.getPosition().lat() + ',' + marker.getPosition().lng();
    }

    initMap();

})(jQuery);

// Initialize and add the map




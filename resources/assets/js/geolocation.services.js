csrf_token = '{!!csrf_token() !!}';

/**
 * getLocation()
 */
function getLocation()
{

    if ("geolocation" in navigator) {

        navigator.geolocation.getCurrentPosition(function(position) {
            console.log(position);
            logLocation(position.coords.latitude, position.coords.longitude);
        });

        var bodyClass = "with-map";

    } else {

        console.log("Navigation is not available.  Please upgrade your web-browser.");
        var bodyClass = "no-map";

    }

}

/**
 * Log Location
 * @param lat
 * @param lng
 */
function logLocation(lat, lng)
{

    var newLoc = new google.maps.LatLng(lat, lng);

    $.ajax({
        method: 'POST',
        url: 'user/location',
        data: {
                'latlng': newLoc,
                '_token': csrf_token
              },
        type: 'json',
        success: function(jqXHR, xhr, responseText) {
                console.log("SUCCESS" + JSON.stringify(jqXHR));
            },
        error: function(jqXHR, xhr, responseText) {
            console.log("ERROR" + JSON.stringify(jqXHR));
        }
    });

}/**
 * Created by mbp3 on 4/3/16.
 */

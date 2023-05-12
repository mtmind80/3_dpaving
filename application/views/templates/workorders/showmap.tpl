<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Multiple Markers Google Maps</title>

    <style>
        html,
        body {
            height: 100%;
            width: 100%;
            margin: 0px;
            padding: 0px
        }
        #map_canvas {
            height: 600px;
            width: 600px;
            margin: 50px auto;
            padding: 0px
        }
    </style>
</head>
<body>
<div><button id="render_map" type=button>Render Map</button></div>
<div id="map_canvas" style="border: 2px solid #3872ac;"></div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.11&sensor=false" type="text/javascript"></script>

<script type="text/javascript">
    // check DOM Ready
    $(document).ready(function() {
        var locations;

        $('#render_map').click(function(){
            // to create map on button click
            locations  = [
                ['Old House', '433 S Royal Poinciana Blvd. Miami Springs, FL 33166', 'Old House URL'],
                ['New Home', '16578 SW 71TS TER, Miami, FL 33193', 'New Home URL'],
                ['Work Office', '121 Alhambra Plaza, Coral Gables, FL 33134', 'Work Office URL'],
                ['Dealer', '7000 Coral Way, Miami, FL', 'Work Office URL']
            ];

            locations  = [
                ['Old House', '4100 NW Federal Hwy Jensen Beach, Florida 34957', 'Old House URL'],
                ['New Home', '4700 Sheridan St, Suit J Hollywood, Florida 33021', 'New Home URL'],
                ['Work Office', '6110 20th Street Vero Beach, Florida 32966', 'Work Office URL'],
            ];
        });

        /* for on load:
         locations = [
         ['Old House', '433 S Royahl Poinciana Blvd. Miami Springs, FL 33166', 'Old House URL'],
         ['New Home', '16578 SW 71TS TER, Miami, FL 33193', 'New Home URL'],
         ['Work Office', '121 Alhambra Plaza, Coral Gables, FL 33134', 'Work Office URL']
         ];
         */

        var geocoder;
        var map;
        var bounds = new google.maps.LatLngBounds();

        function initialize() {
            map = new google.maps.Map(
                    document.getElementById("map_canvas"), {
                        //center: new google.maps.LatLng(37.4419, -122.1419),
                        zoom: 16,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    }
            );
            geocoder = new google.maps.Geocoder();

            for (i = 0; i < locations.length; i++) {
                geocodeAddress(locations, i);
            }
        }

        // show map on load:

        // google.maps.event.addDomListener(window, "load", initialize);

        // show map on button click:

        google.maps.event.addDomListener(document.getElementById("render_map"), "click", initialize);

        // to show map inside modal window: (remove line above)
        /*
         $('#gmapModal').on('shown.bs.modal', function () {
         initialize();
         });
         */

        function geocodeAddress(locations, i) {
            var title = locations[i][0];
            var address = locations[i][1];
            var url = locations[i][2];
            geocoder.geocode({
                        'address': locations[i][1]
                    },
                    function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            var marker = new google.maps.Marker({
                                //  icon: 'http://maps.google.com/mapfiles/ms/icons/blue.png',
                                map: map,
                                position: results[0].geometry.location,
                                title: title,
                                animation: google.maps.Animation.DROP,
                                address: address,
                                url: url
                            })
                            infoWindow(marker, map, title, address, url);
                            bounds.extend(marker.getPosition());
                            map.fitBounds(bounds);
                        } else {
                            alert("geocode of " + address + " failed:" + status);
                        }
                    });
        }

        function infoWindow(marker, map, title, address, url) {
            google.maps.event.addListener(marker, 'click', function() {
                var html = "<div><h3>" + title + "</h3><p>" + address + "<br></div><a href='" + url + "'>View location</a></p></div>";
                iw = new google.maps.InfoWindow({
                    content: html,
                    maxWidth: 350
                });
                iw.open(map, marker);
            });
        }

        function createMarker(results) {
            var marker = new google.maps.Marker({
                //icon: 'http://maps.google.com/mapfiles/ms/icons/blue.png',
                map: map,
                position: results[0].geometry.location,
                title: title,
                animation: google.maps.Animation.DROP,
                address: address,
                url: url,
                icon: image
            })
            bounds.extend(marker.getPosition());
            map.fitBounds(bounds);
            infoWindow(marker, map, title, address, url);
            return marker;
        }
    });
</script>
</body>
</html>
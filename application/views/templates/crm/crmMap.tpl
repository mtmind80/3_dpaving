



<div id="mapDiv"></div>

<script>
    {literal}

    $(document).ready(function(){
        var fulladdress = '304 indian trace Weston, Fl. 33326',
                encAddress = fullAddress.replace(/(\s+)/g, '+'),
                encAddress = fullAddress.replace(/,/g, ''),
                locName = 'Cisneros';

        $.post(
                'https://maps.googleapis.com/maps/api/geocode/json?address='+ encAddress +'&sensor=false',
                function(response){
                    if (response.status == 'OK' && typeof response.results[0].geometry.location.lat != 'undefined' && typeof response.results[0].geometry.location.lng != 'undefined') {
                        var mapLatitude = response.results[0].geometry.location.lat,
                                mapLongitude = response.results[0].geometry.location.lng,
                                infowindow = '<p><strong>' + locName + '</strong><br />' + fullAddress + '<p>';

                        $("#mapDiv").gmap3({
                            map:{
                                options: {
                                    center: [mapLatitude, mapLongitude],
                                    zoom: 13
                                },
                            },
                            marker:{
                                values: [{
                                    latLng: [mapLatitude, mapLongitude],
                                    data: infowindow
                                }],
                                options:{
                                    draggable: false
                                },
                                events:{
                                    mouseover: function(marker, event, context){
                                        var map = $(this).gmap3("get"), infowindow = $(this).gmap3({get: {name: "infowindow"}});
                                        if (infowindow){
                                            infowindow.open(map, marker);
                                            infowindow.setContent(context.data);
                                        } else {
                                            $(this).gmap3({
                                                infowindow:{
                                                    anchor:marker,
                                                    options:{content: context.data}
                                                }
                                            });
                                        }
                                    }
                                }
                            }
                        });
                    } else {
                        alert('Sorry. The address could not be resolved.');
                    }
                }
        );
    });

{/literal}
</script>


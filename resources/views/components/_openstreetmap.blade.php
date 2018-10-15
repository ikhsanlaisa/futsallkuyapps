<?php
/**
 * Created by PhpStorm.
 * User: filhandennis
 * Date: 16/10/18
 * Time: 03.01
 */
?>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>

<div id="mapid" style="width: 600px; height: 400px;"></div>
<div id="map-osm-location">
    <ul></ul>
</div>
<script>

    var mymap = L.map('mapid').setView([51.505, -0.09], 13);

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiZmlsaGFuZGVubmlzIiwiYSI6ImNqbmFxczZ4NDFoMDczdm1sYzQzbnkxOWEifQ.VpSur_87i8jaR_P47U20Pw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox.streets'
    }).addTo(mymap);

    L.marker([51.5, -0.09]).addTo(mymap)
        .bindPopup("<b>My Current Location!</b><br />Here I am. Address ...").openPopup();

    // L.circle([51.508, -0.11], 500, {
    //     color: 'red',
    //     fillColor: '#f03',
    //     fillOpacity: 0.5
    // }).addTo(mymap).bindPopup("I am a circle.");
    //
    // L.polygon([
    //     [51.509, -0.08],
    //     [51.503, -0.06],
    //     [51.51, -0.047]
    // ]).addTo(mymap).bindPopup("I am a polygon.");


    var popup = L.popup();

    function onMapClick(e) {
        //console.log(e);
        popup
            .setLatLng(e.latlng)
            .setContent("You clicked the map at " + e.latlng.toString())
            .openOn(mymap);

        findLocation(e.latlng.lat, e.latlng.lng);
    }

    mymap.on('click', onMapClick);

    // Navigator
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(updateLocation);
    }
    function updateLocation(e){
        //console.log(e);
        var lat=e.coords.latitude, lon=e.coords.longitude;
        mymap.setView([lat, lon], 13);
        L.marker([lat, lon]).addTo(mymap)
            .bindPopup("<b>My Current Location!</b><br />Here I am.").openPopup();

        findLocation(lat, lon);
    }
    function findLocation(lat,lon){
        var div = $('#map-osm-location ul');
        $.get('/geocode/find', {lat:lat, lon:lon}, function(res){
            //console.log(res);
            div.html("");
            var item = res;
            div.append('<li>'+item.display_name+'</li>');

            addNewMarker(lat,lon);
        });
    }

    function resetAllMarker(){
        //map.removeLayer(marker);
    }

    function addNewMarker(lat,lon){
        // L.marker([lat, lon]).addTo(mymap)
        //     .bindPopup("<b>My Current Location!</b><br />"+txt).openPopup();
    }

</script>

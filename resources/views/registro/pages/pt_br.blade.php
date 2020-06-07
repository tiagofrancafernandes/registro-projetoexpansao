<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Localize the geocoder to a given language</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
<script src="https://api.mapbox.com/mapbox-gl-js/v1.10.1/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v1.10.1/mapbox-gl.css" rel="stylesheet" />
<style>
	body { margin: 0; padding: 0; }
	#map { position: absolute; top: 0; bottom: 0; width: 100%; }
	/* #map { position: absolute; top: 0; bottom: 0;   width: inherit;  height: inherit; } */
    #map canvas { cursor: crosshair; }
    .coordinates { background: rgba(0, 0, 0, 0.5); color: #fff; position: absolute; bottom: 40px; left: 10px; padding: 5px 10px; margin: 0; font-size: 11px; line-height: 18px; border-radius: 3px; display: none; }
</style>
</head>
<body>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
<link
rel="stylesheet"
href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css"
type="text/css"
/>
<!-- Promise polyfill script required to use Mapbox GL Geocoder in IE 11 -->
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
{{--  <div style="width: 50%;height: 50vh;">  --}}
    <div id="map"></div>
    <pre id="coordinates" class="coordinates"></pre>
{{--  </div>  --}}
 
<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoiYXBleHNlYXJjaHVzZXIiLCJhIjoiY2pxc2V6bjVyMHVxcjQ4cXE4cmg1a242diJ9.TMZ9oWhH_fF4ccYkaMeyAw';
    var start_coordinates = [-49.2712, -25.4296];
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v9',
        center: window.start_coordinates, 
        zoom: 8
    });
    
    var geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        language: 'pt-BR',
        mapboxgl: mapboxgl
    });
    map.addControl(geocoder);

    map.on('click', function(e){
        console.log(e)
        var _lat = e.lngLat.lat;
        var _lng = e.lngLat.lng;
        window.marker.setLngLat([_lng, _lat]);
        window.onDragEnd();
    })

    //////////////

    var marker = new mapboxgl.Marker({
        draggable: true
    })    
    .setLngLat(window.start_coordinates)
    .addTo(map);
    
    function onDragEnd() {
        var lngLat = marker.getLngLat();
        coordinates.style.display = 'block';
        coordinates.innerHTML =
        'Longitude: ' + lngLat.lng + '<br />Latitude: ' + lngLat.lat;
    }
    
    marker.on('dragend', onDragEnd);

</script>
 
</body>
</html>
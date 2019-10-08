<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />
<title>L.mapbox.simplestyle with L.geoJson</title>
<meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
<script src='https://api.mapbox.com/mapbox.js/v3.2.0/mapbox.js'></script>
<link href='https://api.mapbox.com/mapbox.js/v3.2.0/mapbox.css' rel='stylesheet' />
<style>
  body { margin:0; padding:0; }
  #map { position:absolute; top:0; bottom:0; width:100%; }
</style>
</head>
<body>

<div id='map'></div>

<script>
L.mapbox.accessToken = 'pk.eyJ1Ijoia2JyZXRvbiIsImEiOiJjazBubDlxa2kwMHpmM2NteGU0bXJ4YmRlIn0._XBPid9mAlQsf_Kl1ZmYUw';
var geojson = [
  {
    "type": "Feature",
    "geometry": {
      "type": "LineString",
      "coordinates": [
        [-77.03238901390978,38.913188059745586],
        [-122.414, 37.776]
      ]
    },
    "properties": {
      "stroke": "#fc4353",
      "stroke-width": 5
    }
  }
];

var map = L.mapbox.map('map')
  .setView([37.8, -96], 4)
  .addLayer(L.mapbox.styleLayer('mapbox://styles/mapbox/streets-v11'));

L.geoJson(geojson, { style: L.mapbox.simplestyle.style }).addTo(map);
</script>

</body>
</html>


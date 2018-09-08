<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Fusion Tables Heatmaps</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 10, lng: -140},
          zoom: 3
        });

        var layer = new google.maps.FusionTablesLayer({
          query: {
            select: 'location',
            from: '1s9JfT_ysrtHEfdruF4RkReD8_JRDzBWidlAyeDEgi3A'
          },
          heatmap: {
            enabled: true
          }
        });

        layer.setMap(map);
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUSRpaf__9ZU3oRljaUlHRA7pXjQJoz9w&callback=initMap">
    </script>
  </body>
</html>
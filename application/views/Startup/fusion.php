    <div id="map"></div>
    <script>

        var map, heatmap;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -23, lng: 148},
                zoom: 6
            });

            $.ajax({
                type: 'GET',
                url: '/public/data.json',
                success:  function(data){
                    console.log('Data retrieved');
                    var heatMapData=[];
                    //prepare the data
                    $.each(data,function(i,r){
                        heatMapData.push({
                            location:new google.maps.LatLng(r['Latitude'],r['Longitude']),
                            weight:Number(r['Weight'])
                        });
                        console.log('imported '+r['Latitude']+','+r['Longitude']+' with a weight of '+r['Weight']);
                    });

                    //create the weighted heatmap
                    var heatmap = new google.maps.visualization.HeatmapLayer({
                        data: heatMapData,
                        map: map
                    });
                    
                    //better visualisation numbers
                    heatmap.setOptions({
                        dissipating: true,
                        maxIntensity: 1000,
                        radius: 50,
                        opacity: 0.6,
                        //dissipating: false
                    });                },
                error: function(data){
                    console.log(data);
                }
            });
        };
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUSRpaf__9ZU3oRljaUlHRA7pXjQJoz9w&libraries=visualization&callback=initMap">
    </script>

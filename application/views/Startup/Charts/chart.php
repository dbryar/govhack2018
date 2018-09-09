    <canvas id="myChart" width="300" height="300"></canvas>
    <script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var chartData = [];
    $.ajax({
        type: 'GET',
        url: '/data/<?= $cdata?>.json',
        success:  function(data){
            console.log('Data retrieved',data);
            chartData = JSON.parse(data);
            var labels = chartData.jsonarray.map(function(e) {
               return e[0];
            });
            var data = chartData.jsonarray.map(function(e) {
               return e[1];
            });;

            var ctx = canvas.getContext('2d');
            var config = {
               type: 'bar',
               data: {
                  labels: labels,
                  datasets: [{
                     label: '<?= $cdata?>',
                     data: data,
                     backgroundColor: 'rgba(0, 119, 204, 0.3)'
                  }]
               }
            };
            var chart = new Chart(ctx, config);
        },
        error: function(data){
            console.log(data);
        }
    });

    </script>
    <script>
            alert('<?= $atext;?>');
    </script>
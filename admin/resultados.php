<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title></title>
    <script src="js/jquery-1.2.6.min.js"></script>
    <!-- <script src="canvasjs.js"></script> -->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            $.getJSON("data.php", function (result) {

                var chart = new CanvasJS.Chart("chartContainer", {
                  animationEnabled: true,
                	title:{
                		text: "Candidatos y votos"
                	},
                    data: [
                        {
                            type: 'bar',
                            dataPoints: result
                        }
                    ]
                });

                chart.render();
            });
        });
    </script>
</head>
<body>

    <div id="chartContainer" style="width: 800px; height: 380px;"></div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Google Bar & Column Charts in Codeigniter</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body>

	<body>
		<div class="container">
			<div class="mb-5 mt-5">
				<div id="GoogleLineChart" style="height: 400px; width: 100%"></div>
			</div>

			<div class="mb-5">
				<div id="GoogleBarChart" style="height: 400px; width: 100%"></div>
			</div>
		</div>


		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script>
			google.charts.load('current', {'packages':['corechart', 'bar']});
			google.charts.setOnLoadCallback(drawLineChart);
			google.charts.setOnLoadCallback(drawBarChart);

            // Line Chart
			function drawLineChart() {
				var data = google.visualization.arrayToDataTable([
					['Year', 'US Population year wise'],
						<?php 
							foreach ($products as $row){
							   echo "['".$row['Year']."',".$row['sell']."],";
						} ?>
				]);

				var options = {
					title: 'Line chart US Population',
					curveType: 'function',
					legend: {
						position: 'top'
					}
				};
				var chart = new google.visualization.LineChart(document.getElementById('GoogleLineChart'));
				chart.draw(data, options);
			}
			
			
			// Bar Chart
			google.charts.setOnLoadCallback(showBarChart);
            
			function drawBarChart() {
				var data = google.visualization.arrayToDataTable([
					['Year', 'Products Count'], 
						<?php 
							foreach ($products as $row){
							   echo "['".$row['Year']."',".$row['sell']."],";
							}
						?>
				]);
				var options = {
					title: ' Bar chart US Population year wise',
					is3D: true,
				};
				var chart = new google.visualization.BarChart(document.getElementById('GoogleBarChart'));
				chart.draw(data, options);
			}
			
		</script>

	</body>

</html>
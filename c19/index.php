<!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Total Covid19 Cases in India.</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<!-- Navbar start -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="index.php">COVID-19</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="index.php">INDIA <span class="sr-only">(current)</span></a>
	      </li>
	      
	      <li class="nav-item">
	        <a class="nav-link" href="world.php">WORLD</a>
	      </li>

	    </ul>
	  </div>
	</nav>

	<!--  nav bar ends-->


<section class="container-fluid">
	
<?php

$data  = file_get_contents("https://api.covid19india.org/data.json");

$coronalive = json_decode($data,true);


$totalDay = count($coronalive['cases_time_series']);
$dailyData = ($coronalive['cases_time_series'][$totalDay - 1]);


echo '<section class="my-2">
	<div class="text-center text-info">
	 <h3 class="display-4">TOTAL COVID-19 CASES IN INDIA</h3>
	</div>

	<div class="container-fluid">

		<h5 class="text-center text-muted">Last Updated Time: '. $coronalive['statewise'][0]['lastupdatedtime'].'</h5>
		<h5 class="text-center text-muted">Total Confirmed: '. $coronalive['statewise'][0]['confirmed'].'</h5>
		
		<h5 class="text-center text-muted">Recovered: '. $coronalive['statewise'][0]['recovered'].'</h5>
		<h5 class="text-center text-muted">Active: '. $coronalive['statewise'][0]['active'].'</h5>
		<h5 class="text-center text-muted">Deaths: '. $coronalive['statewise'][0]['deaths'].'</h5>
	</div>

</section>';

echo ' 	<div class="table-responsive">
			<div class="m-5 text-center text-danger">
		        <h3>COVID-19 LIVE UPDATES OF INDIA STATE WISE</h3>
			</div>
		<table class="table table-bordered table-striped text-center">
			<tr class="bg-primary">
				<th>Last Updated Time</th>
				<th>State/Total</th>
				<th>Confirmed</th>
				<th>Active</th>
				<th>Recovered</th>
				<th>Deaths</th>
			</tr>
 ';

$statecount = count($coronalive['statewise']);

$i = 1;

while ($i < $statecount) {


	echo "<tr>";
			echo  "<td  class='bg-info'>".$coronalive['statewise'][$i]['lastupdatedtime']."</td>";
	echo "<td  class='bg-light'>".$coronalive['statewise'][$i]['state']."</td>";
	echo "<td  class='bg-dark text-primary'>".$coronalive['statewise'][$i]['confirmed']."</td>";
	echo "<td  class='bg-warning'>".$coronalive['statewise'][$i]['active']."</td>";
	echo "<td  class='bg-success'>".$coronalive['statewise'][$i]['recovered']."</td>";
	echo "<td class='bg-danger'>".$coronalive['statewise'][$i]['deaths']."</td>";

	echo "</tr>";

	$i++;
}
?>


		</table>
	</div>


</section>


</body>
</html>



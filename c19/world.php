<!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Total Covid19 Cases in World.</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body onload="fetch()">
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


<section class="container-fluid">
	<div class="mb-3 text-center text-danger">
		<h3>COVID-19 LIVE UPDATES OF WORLD</h3>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-striped text-center" id="tbval">
			<tr class="bg-primary">
				<th>Country</th>
				<th>TotalConfirmed</th>
				<th>TotalRecovered</th>
				<th>TotalDeaths</th>
				<th>NewConfirmed</th>
				<th>NewRecovered</th>
				<th>NewDeaths</th>
			</tr>

		</table>
	</div>


</section>

<script>
	function fetch() {
		$.get("https://api.covid19api.com/summary", function (data){

				console.log(data['Countries'].length);
				var tbval = document.getElementById('tbval');

				for (var i = 1; i < data['Countries'].length; i++) {


					var x = tbval.insertRow();
					var t = x.insertCell(0);

					t.innerHTML =data['Countries'][i-1]['Country'];
					t.style.background = '#fff';

					tbval.rows[i].cells[0].style.color = '#7a3a71';

					x.insertCell(1);

					tbval.rows[i].cells[1].innerHTML =data['Countries'][i-1]['TotalConfirmed'];
					tbval.rows[i].cells[1].style.background = '#4bb7d8';

						x.insertCell(2);
					tbval.rows[i].cells[2].innerHTML =data['Countries'][i-1]['TotalRecovered'];
					tbval.rows[i].cells[2].style.background = '#7a4a91';

						x.insertCell(3);
					tbval.rows[i].cells[3].innerHTML =data['Countries'][i-1]['TotalDeaths'];
					tbval.rows[i].cells[3].style.background = '#7a4a91';

						x.insertCell(4);
					tbval.rows[i].cells[4].innerHTML =data['Countries'][i-1]['NewConfirmed'];
					tbval.rows[i].cells[4].style.background = '#7a4a91';

						x.insertCell(5);
					tbval.rows[i].cells[5].innerHTML =data['Countries'][i-1]['NewRecovered'];
					tbval.rows[i].cells[5].style.background = '#9cc850';

					x.insertCell(6);
					tbval.rows[i].cells[6].innerHTML =data['Countries'][i-1]['NewDeaths'];
					tbval.rows[i].cells[6].style.background = '#f36e23';




				}



		})
	}
</script>



</body>
</html>



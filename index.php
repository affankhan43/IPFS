<!DOCTYPE html>
<html>
<head>
	<title>IPFS</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<style media="screen">
	body{
		padding: 100px;
	}
	.eth{
		text-align: center !important;
		color: white;
		background-color: #333;
		transition: all 0.7s ease-in;
	}
	.eth h3{
		text-transform: uppercase;
	}
	.eth:hover{
		color: white;
		background-color: #27ae60;
		text-decoration: none;
		transition: all 0.7s ease-in;
	}
	.sub{
		width: 500px;
		text-align: center;
		padding: 10px 50px;
		background: #333;
		color: white;
		margin-top: 50px;
	}
	.verf{
		border-top: 2px solid black;
		margin-top: 90px;
		text-align: center;

	}
	.icon-checkbox-group{
		display: none !important;
	}
	/*.btn .btn-success{
		display: none !important;
	}*/
	</style>
</head>
<body>
	<h2 class="text-center">Select Blockchain</h2>

	<div class="container">
		<div class="row">
			<div class="col-md-1"></div>
			<a class="col-md-4 eth" href="#">
					<br><br>
					<img src="bitcoin.png" width="50px" height="50px"><br><br>
					<h3>Bitcoin Blockchain</h3><br>
					<h5>Fees: 0.0002 BTC</h5>
					<br>
			</a>
			<div class="col-md-2"></div>
			<a class="col-md-4 eth" href="#">
					<br><br>
					<img src="eth.svg" width="50px" height="50px"><br><br>
					<h3>Ethereum Blockchain</h3><br>
					<h5>Coming Soon</h5>
					<br>
			</a>
			<div class="col-md-1"></div>

			<div class="col-md-4"></div>
			<div class="col-md-4">
				<br><br><br><br>
				<button class="btn btn-danger btn-lg btn-block">Go</button>
			</div>
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
			<div class="col-md-4  verf">
				<br>
				<h3>Verify Anything</h3>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>



<script
src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>

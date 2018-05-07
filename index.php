<!DOCTYPE html>
<html>
<head>
	<title>IPFS</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
	<style media="screen">
	body{
		padding: 80px;
    font-family: 'Gothic A1', sans-serif;
	}
	.eth{
		text-align: center !important;
		color: #3d3d3d;
		background-image: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);
		transition: all 0.7s ease-in;
		-webkit-box-shadow: 0px 0px 15px 0px #ccc;  /* Safari 3-4, iOS 4.0.2 - 4.2, Android 2.3+ */
		-moz-box-shadow:    0px 0px 15px 0px #ccc;  /* Firefox 3.5 - 3.6 */
		box-shadow:         0px 0px 15px 0px #ccc;  /* Opera 10.5, IE 9, Firefox 4+, Chrome 6+, iOS 5 */
	}
	.eth h3{
		/* font-weight: bold; */
		text-transform: uppercase;
	}
	.eth:hover{
		color: #3d3d3d;
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
	<div id="select-blockchain">
		<h2 class="text-center" style="font-weight:bold;">Select Blockchain</h2>
		<br/>
		<br/>
		<div class="container">
			<div class="row">
				<div class="col-md-1"></div>
				<a class="col-md-4 eth" href="#">
						<br><br>
						<img src="bitcoin.png" width="100px" height="100px"><br><br>
						<h3>Bitcoin Blockchain</h3><br>
						<button type="button" class="btn btn-lg btn-block btn-primary">Select</button>
						<br>
				</a>
				<div class="col-md-2"></div>
				<a class="col-md-4 eth" href="#">
						<br><br>
						<img src="eth.svg" width="100px" height="100px"><br><br>
						<h3>Ethereum Blockchain</h3><br>
						<button type="button" class="btn btn-lg btn-block btn-primary">Coming Soon</button>
						<br>
				</a>
				<div class="col-md-1"></div>
				</div>
				<br/>
				<br/>
				<br/>
				<div class="row">
					<div class="col-md-12">
						<h3 class="text-center">Verify Anything</h3>
					</div>
				</div>
			</div>
	</div>

	<div id="form-submission">

		<div id="form"></div>

	</div>


<script
src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="form-builder.min.js"></script>
<script type="text/javascript" src="form-render.min.js"></script>
<script type="text/javascript" src="demo.js"></script>
</body>
</html>

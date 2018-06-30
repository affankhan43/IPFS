<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
/*-- Affan --*/
include 'core/.env';
$db = mysqli_connect($HostName,$HostUser,$HostPass,$dbName) or die("Could not connect to the database");
if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    else{
       // echo "sdf";
    }
session_start();
  require __DIR__ . '/vendor/autoload.php';
  include 'core/funcs.php';
  include '.env';
  use \Curl\Curl;
  $details = false;
if(isset($_GET['email'])){
	if(!empty($_GET['email'])){
		$qry = mysqli_query($db,"SELECT * FROM `document_details` WHERE email='".$_GET['email']."' ");
		$result = mysqli_fetch_all($qry,MYSQLI_ASSOC);
		if(!$result){
			$data_available = 'not found';
		}
		else{
			$all_data = $result;
		}
	}
	else{
		$data_available = 'not found';
	}
}
else{
	$data_available = 'not found';
}
 ?>
}
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="images/favicon.ico">
	<title>SaveOnBlock</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <!-- Icons -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link href="css/font-awesome.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

</head>
<style type="text/css">
	.PayBear__Icons{display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap}
	.PayBear__Item{padding:11px;}
	.PayBear__Item{background:#fff;padding:23px 6px 14px;border-radius:4px;box-shadow:0 2px 2px rgba(0,0,0,.06),0 2px 24px rgba(0,0,0,.06);width:calc(30.0% - 6.0px);text-align:center;color:#686868;font-size:12px;line-height:1.35;margin-top:10px;margin-right:10px;cursor:pointer;outline:0;position:relative;transition:all .1s ease;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}@media (min-width:500px) and (min-height:700px){.PayBear__Item{font-size:14px}}
	.PayBear__Item__icon{width:50px;height:50px;margin:5px auto 0;display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center;-ms-flex-pack:center;justify-content:center}
	.PayBear__Item__icon{width:50px;height:50px;margin:5px auto 0}
	.PayBear__Item__icon img,.PayBear__Item__icon svg{max-width:100%;max-height:100%;width:100%;height:100%}
	.modal-body{text-align: center;}

</style>
<body>
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

	    <!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"></h4>
	    		</div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal End -->
	<div class="container-fluid" id="wrapper">
		<div class="row">
			<nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2">
				<h1 class="site-title"><a href="index.html"><em class="fas fa-th"></em> SaveOnBlock</a></h1>
				<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><em class="fa fa-bars"></em></a>
				<ul class="nav nav-pills flex-column sidebar-nav">
					<li class="nav-item"><a class="nav-link active " href="index.php"><em class="fas fa-hashtag"></em> Certify <span class="sr-only">(current)</span></a></li>
					<li class="nav-item"><a class="nav-link" href="verify.php"><em class="fab fa-searchengin"></em> Verify</a></li>
					<li class="nav-item"><a class="nav-link  " href="howitworks.php"><em class="fas fa-question-circle"></em> How it works?</a></li>
					<li class="nav-item"><a class="nav-link" href="about.php"><em class="fas fa-th"></em> About Us</a></li>
					<li class="nav-item"><a class="nav-link" href="contact.php"><em class="far fa-envelope"></em> Contact</a></li>
				</ul>
			</nav>
			<main class="col-xs-12 col-sm-8 col-lg-9 col-xl-10 pt-3 pl-4 ml-auto">
				<header class="page-header row justify-center">
					<div class="col-md-6 col-lg-8" >
						<!--<h1 class="float-left text-center text-md-left">Select the blockchain!</h1>-->
					</div>
					<div class="dropdown user-dropdown col-md-6 col-lg-4 text-center text-md-right">
						<div class="username mt-1">
							<h6 class="text-muted">PROOF OF EXISTENCE WITH IPFS</h6>
						</div>
					</div>
					<div class="clear"></div>
				</header>
				<style>
				.jumbotron{
					background: #fff !important;
					-webkit-box-shadow: 0px 6px 44px -12px rgba(0,0,0,0.38);
					-moz-box-shadow: 0px 6px 44px -12px rgba(0,0,0,0.38);
					box-shadow: 0px 6px 44px -12px rgba(0,0,0,0.38);
				}
				</style>
				<section class="section row">
					<?php if(isset($data_available) && $data_available == 'not found'){?>
					<div class="container  mb-3">
						<div class="alert bg-danger" role="alert"><em class="fa fa-check-circle mr-2"></em> Data Not Available <a href="#" class="float-right"><em class="fa fa-remove"></em></a>
						</div>
					</div>
					<?php }else{?>
					<div class="container  mb-3">
						<div class="alert bg-success" role="alert"><em class="fa fa-check-circle mr-2"></em> <?php print_r($all_data); ?> <a href="#" class="float-right"><em class="fa fa-remove"></em></a>
						</div>
					</div>
					<div class="col-lg-12 text-center"></div>
					<div class="col-lg-5">
						<div class="jumbotron text-center">
							<p class="lead">Send exactly <?php echo $all_data['bitcoin_fees']/100000000; ?></p>
							<img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=<?php echo $all_data['bitcoin_address']; ?>">
							<hr class="bg-primary">
							<div class="input-group">
								<input type="text" value="<?php echo $all_data['bitcoin_address']?>" class="form-control">
								<span class="input-group-append"></span>
							</div>
						</div>
					</div>
				<?php }?>
				</section>
				<hr>
				<section class="row">
					<div class="col-12 mt-1 text-center mb-4">
						<a href="how.php" class="btn btn-lg btn-outline-primary">How It Works?</a>
					</div>
				</section>
			</main>
		</div>
	</div>
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="dist/js/bootstrap.min.js"></script>

    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script type="text/javascript" src="old-website/form-builder.min.js"></script>
		<script type="text/javascript" src="old-website/form-render.min.js"></script>
	<script type="text/javascript">
		function done(){
			console.log('asd');
		}
	    var startCharts = function () {
	                var chart1 = document.getElementById("line-chart").getContext("2d");
	                window.myLine = new Chart(chart1).Line(lineChartData, {
	                responsive: true,
	                scaleLineColor: "rgba(0,0,0,.2)",
	                scaleGridLineColor: "rgba(0,0,0,.05)",
	                scaleFontColor: "#c5c7cc "
	                });
	            };
	        window.setTimeout(startCharts(), 1000);


					function openFile(url){
					  window.open(url, '_blank');
					}
		function createpay(coin,ipfshash,btcaddress){
			$(".modal-body").html('');
			if(coin == 'eth'){
				$(".modal-title").html(' Pay Ethereum');
				$.post('http://159.65.131.43/ipfs/api/paybear_api.php',{'msg':'payment_address','hash':ipfshash,'btc_address':btcaddress,'coin':'eth'}, function(msg){
					console.log(msg);
					var data = JSON.parse(msg);
					if(data['success'] == true){
						$(".modal-body").html('<p>Please Send Exactly  <strong>'+data['amount']+'</strong>  Ethereum to</p><img class="img-responsive" src="https://chart.googleapis.com/chart?chs=200x200&choe=UTF-8&chld=M|0&cht=qr&chl='+data['address']+'" /><br><br><p>'+data['address']+'</p>');
						$("#myModal").modal();
					}
				});
			}
			else if(coin == 'btc'){
				$(".modal-title").html(' Pay Bitcoin');
				$.post('http://159.65.131.43/ipfs/api/paybear_api.php',{'msg':'payment_address','hash':ipfshash,'btc_address':btcaddress,'coin':'btc'}, function(msg){
					console.log(msg);
					var data = JSON.parse(msg);
					if(data['success'] == true){
						$(".modal-body").html('<p>Please Send Exactly  <strong>'+data['amount']+'</strong>  Bitcoin to</p><img class="img-responsive" src="https://chart.googleapis.com/chart?chs=200x200&choe=UTF-8&chld=M|0&cht=qr&chl='+data['address']+'" /><br><br><p>'+data['address']+'</p>');
						$("#myModal").modal();
					}
				});
			}
			else if(coin == 'ltc'){
				$(".modal-title").html(' Pay Litecoin');
				$.post('http://159.65.131.43/ipfs/api/paybear_api.php',{'msg':'payment_address','hash':ipfshash,'btc_address':btcaddress,'coin':'ltc'}, function(msg){
					console.log(msg);
					var data = JSON.parse(msg);
					if(data['success'] == true){
						$(".modal-body").html('<p>Please Send Exactly  <strong>'+data['amount']+'</strong>  Litecoin to</p><img class="img-responsive" src="https://chart.googleapis.com/chart?chs=200x200&choe=UTF-8&chld=M|0&cht=qr&chl='+data['address']+'" /><br><br><p>'+data['address']+'</p>');
						$("#myModal").modal();
					}
				});
			}
			else if(coin == 'bch'){
				$(".modal-title").html(' Pay Bitcoin Cash');
				$.post('http://159.65.131.43/ipfs/api/paybear_api.php',{'msg':'payment_address','hash':ipfshash,'btc_address':btcaddress,'coin':'bch'}, function(msg){
					console.log(msg);
					var data = JSON.parse(msg);
					if(data['success'] == true){
						$(".modal-body").html('<p>Please Send Exactly  <strong>'+data['amount']+'</strong>  Bitcoin-Cash to</p><img class="img-responsive" src="https://chart.googleapis.com/chart?chs=200x200&choe=UTF-8&chld=M|0&cht=qr&chl='+data['address']+'" /><br><br><p>'+data['address']+'</p>');
						$("#myModal").modal();
					}
				});
			}
			else if(coin == 'btg'){
				$(".modal-title").html(' Pay Bitcoin Gold');
				$.post('http://159.65.131.43/ipfs/api/paybear_api.php',{'msg':'payment_address','hash':ipfshash,'btc_address':btcaddress,'coin':'btg'}, function(msg){
					console.log(msg);
					var data = JSON.parse(msg);
					if(data['success'] == true){
						$(".modal-body").html('<p>Please Send Exactly  <strong>'+data['amount']+'</strong>  Bitcoin-Gold to</p><img class="img-responsive" src="https://chart.googleapis.com/chart?chs=200x200&choe=UTF-8&chld=M|0&cht=qr&chl='+data['address']+'" /><br><br><p>'+data['address']+'</p>');
						$("#myModal").modal();
					}
				});
			}
			else if(coin == 'dash'){
				$(".modal-title").html(' Pay Dash');
				$.post('http://159.65.131.43/ipfs/api/paybear_api.php',{'msg':'payment_address','hash':ipfshash,'btc_address':btcaddress,'coin':'dash'}, function(msg){
					console.log(msg);
					var data = JSON.parse(msg);
					if(data['success'] == true){
						$(".modal-body").html('<p>Please Send Exactly  <strong>'+data['amount']+'</strong>  DASH to</p><img class="img-responsive" src="https://chart.googleapis.com/chart?chs=200x200&choe=UTF-8&chld=M|0&cht=qr&chl='+data['address']+'" /><br><br><p>'+data['address']+'</p>');
						$("#myModal").modal();
					}
				});
			}
		}
	</script>
	</body>
</html>

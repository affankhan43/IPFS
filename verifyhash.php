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
  if(isset($_GET['hash']) || isset($_GET['txid'])){
    if(!empty($_GET['hash'])){
      $qry = mysqli_query($db,"SELECT * FROM `document_details` WHERE ipfs_hash='".$_GET['hash']."' ");
      $result = mysqli_fetch_assoc($qry);
      if(!$result){

      }
      else{
        $details = true;
        $all_data = $result;
        if($all_data['verified'] == 0 && empty($all_data['bitcoin_txid'])){
          $check_url = $url2_env.$all_data['bitcoin_address'];
          $curl1 = new curl();
          $curl1->get($check_url);
          if ($curl1->error) {
            $error[1] = "Unknown Error #9";
          } else {
            $amount = json_decode($curl1->response,true);

            if($amount['amount']*100000000 >= ($all_data['bitcoin_fees'])){
              $updated_amount = $amount['amount']*100000000;
              $upd_qry = "UPDATE `document_details` SET `bitcoin_received`=".$updated_amount." WHERE `ipfs_hash`='".$all_data['ipfs_hash']."' ";
              if(mysqli_query($db, $upd_qry)){
                }
              else{
                $error[1] = "Please Refresh Again";
              }

              $op_ret = new curl();
              $op_ret->post($url3_evv, array(
                'address'=>'2MxSUk8B8HZpaa5G2r2Las44z5APEoUrPKB',
                'amount'=>$amount['amount'],
                'key'=>'Keylcc987',
                'message'=>$all_data['ipfs_hash'],
                'testnet'=>1
              ));
              if ($op_ret->error) {
                $error[1] = "Unknown Error #9";
              }
              else{
                $txid = json_decode($op_ret->response,true);
                if($txid['message'] == "error"){

                }
                elseif($txid['message'] == "success"){
                  $upd_qry2 = "UPDATE `document_details` SET `verified`=1,`bitcoin_txid`='".$txid['txid']."' WHERE `ipfs_hash`='".$all_data['ipfs_hash']."' ";
              if(mysqli_query($db, $upd_qry2)){

              }
              else{
                $error[1] = "Please Refresh Again";
              }
            }
          }
        }
        else{
        }
      }
    }
  }
  }
}
 ?>
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
	  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link href="css/font-awesome.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

</head>
<body>
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
				<Style>
				.jumbotron {
				background: #fff !important;
				-webkit-box-shadow: 0px 6px 44px -12px rgba(0,0,0,0.38);
-moz-box-shadow: 0px 6px 44px -12px rgba(0,0,0,0.38);
box-shadow: 0px 6px 44px -12px rgba(0,0,0,0.38);
				}



				</style>
					<section class="section row">
				<div class="container  mb-3">

				<div class="alert bg-success" role="alert"><em class="fa fa-check-circle mr-2"></em> Your data has been successfully hashed with IPFS <a href="#" class="float-right"><em class="fa fa-remove"></em></a></div>





				</div>




				<div class="col-lg-12 text-center">

				</div>
				<div class="col-lg-7">
				<div class="jumbotron text-center">

			<h3>IPFS Details</h3>
			<div class="input-group"><span class="input-group-prepend">
													<button class="btn btn-primary" type="button" title="">IPFS Hash</button>
													</span>
													<input type="text" value="<?php echo $all_data['ipfs_hash']?>"   class="form-control">
												</div>

												<hr>
			<button type="button" onclick="<?php echo "openFile('http://gateway.ipfs.io/ipfs/".$all_data['ipfs_hash']."')"; ?>" class="btn btn-sm btn-primary">VIEW</button>
			<br>
			<h6 class="mt-3">Your form data and upload file be hashed separately. Same file and data will generate same IPFS hash.</h6>



			</div>
			<hr>

				<div id="payme" class="alert bg-primary animated bounce" role="alert"><em class="fa fa-check-circle mr-2"></em> Make a payment to embed this data onto blockchain <a href="#" class="float-right"><em class="fa fa-remove"></em></a></div>

			<div class="jumbotron text-center">
				<h3>Make Document Private</h3>
				<div class="input-group">
					<span class="input-group-prepend">
					<button class="btn btn-primary" type="button" title="">IPFS Hash</button>
					</span>
				</div>
				<hr>
				<br>
			</div>
			<hr>

				</div>
				<div class="col-lg-5">
				<div class="jumbotron text-center">
	  <?php if($all_data['verified'] == 0 && empty($all_data['bitcoin_txid'])){ ?>
			<p class="lead">Send exactly <?php echo $all_data['bitcoin_fees']/100000000; ?></p>
			<img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=<?php echo $all_data['bitcoin_address']; ?>">
			<hr class="bg-primary">
			<div class="input-group">
			<input type="text" value="<?php echo $all_data['bitcoin_address']?>" class="form-control"><span class="input-group-append">
		</span>
		</div>
		<?php }elseif($all_data['verified'] == 1 && !empty($all_data['bitcoin_txid'])){ ?>
			<p class="lead">Data is Verified on Bitcoin Blockchain</p>
			<hr class="bg-primary">
			<div class="input-group">
			<input type="text" value="<?php echo $all_data['bitcoin_txid']?>" class="form-control"><span class="input-group-append">
			<button type="button" onclick="<?php echo "openFile('https://live.blockcypher.com/btc-testnet/tx/".$all_data['bitcoin_txid']."')"; ?>" class="btn btn-sm btn-primary">VIEW ON BLOCKCHAIN</button>
		</span>
		</div>
		  <?php } ?>
			</div>
				</div>
						</section>
						<section class="row">
							<div class="col-12 mt-1 text-center mb-4">	<a href="how.php" class="btn btn-lg btn-outline-primary">How It Works?</a></div>
						</section>
					</div>
				</section>
			</main>
		</div>
	</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="dist/js/bootstrap.min.js"></script>

    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script>
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
	</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

	</body>
</html>

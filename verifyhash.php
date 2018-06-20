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
					<p></p>
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
					<div class="container  mb-3">
						<div class="alert bg-success" role="alert"><em class="fa fa-check-circle mr-2"></em> Your data has been successfully hashed with IPFS <a href="#" class="float-right"><em class="fa fa-remove"></em></a>
						</div>
					</div>
				<?php if($all_data['is_private'] == 1){ ?>
					<div class="container  mb-3">
						<div class="alert bg-success" role="alert"><em class="fa fa-check-circle mr-2"></em> Your data was secured privately <a href="#" class="float-right"><em class="fa fa-remove"></em></a>
						</div>
					</div>
				<?php } ?>
					<div class="col-lg-12 text-center"></div>
					<div class="col-lg-7">
						<div class="jumbotron text-center">
							<h3>IPFS Details</h3>
							<div class="input-group">
								<span class="input-group-prepend">
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
						<div id="payme" class="alert bg-primary animated bounce" role="alert">
							<em class="fa fa-check-circle mr-2"></em> Make a payment to embed this data onto blockchain <a href="#" class="float-right"><em class="fa fa-remove"></em></a>
						</div>
						<?php if($all_data['is_private'] == 0){ ?>
						<div class="jumbotron text-center">
							<h3>Make Document Private</h3>
							<hr>
							<br>
							<div class="PayBear__Icons">
								<div role="button" tabindex="0" class="PayBear__Item" onclick="createpay('eth',<?php echo $all_data['ipfs_hash']; ?>,<?php echo $all_data['btc_address']; ?>)">
									<div class="PayBear__Item__icon">
										<img src="data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9IjU0IiB2aWV3Qm94PSIwIDAgNDIuMTE3ODQgNDIuMTI5NDQ2IiB3aWR0aD0iNTQiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxjbGlwUGF0aCBpZD0iYSI+PHBhdGggZD0ibTcyMC42IDMwNi40aDUwOC43djI2NmgtNTA4Ljd6IiBoZWlnaHQ9IjEwMCUiIHRyYW5zZm9ybT0iIiB3aWR0aD0iMTAwJSIvPjwvY2xpcFBhdGg+PGNsaXBQYXRoIGlkPSJiIj48cGF0aCBkPSJtNzIwLjYgMGgyNTQuNHY1NzIuNGgtMjU0LjR6IiBoZWlnaHQ9IjEwMCUiIHRyYW5zZm9ybT0iIiB3aWR0aD0iMTAwJSIvPjwvY2xpcFBhdGg+PGNsaXBQYXRoIGlkPSJjIj48cGF0aCBkPSJtOTc1IDBoMjU0LjR2NTcyLjRoLTI1NC40eiIgaGVpZ2h0PSIxMDAlIiB0cmFuc2Zvcm09IiIgd2lkdGg9IjEwMCUiLz48L2NsaXBQYXRoPjxjbGlwUGF0aCBpZD0iZCI+PHBhdGggZD0ibTcyMC42IDQ3MC4zaDI1NC40djM1OC40aC0yNTQuNHoiIGhlaWdodD0iMTAwJSIgdHJhbnNmb3JtPSIiIHdpZHRoPSIxMDAlIi8+PC9jbGlwUGF0aD48Y2xpcFBhdGggaWQ9ImUiPjxwYXRoIGQ9Im05NzUgNDcwLjNoMjU0LjV2MzU4LjRoLTI1NC41eiIgaGVpZ2h0PSIxMDAlIiB0cmFuc2Zvcm09IiIgd2lkdGg9IjEwMCUiLz48L2NsaXBQYXRoPjxnIGZpbGw9IiMwMTAxMDEiPjxwYXRoIGNsaXAtcGF0aD0idXJsKCNhKSIgZD0ibTk3NSAzMDYuNC0yNTQuNCAxMTUuNyAyNTQuNCAxNTAuMyAyNTQuMy0xNTAuM3oiIG9wYWNpdHk9Ii42IiB0cmFuc2Zvcm09Im1hdHJpeCguMDUwODM3OTkgMCAwIC4wNTA4Mzc5OSAtMjguNTEwNjYyIDApIi8+PHBhdGggY2xpcC1wYXRoPSJ1cmwoI2IpIiBkPSJtNzIwLjYgNDIyLjEgMjU0LjQgMTUwLjN2LTU3Mi40eiIgb3BhY2l0eT0iLjQ1IiB0cmFuc2Zvcm09Im1hdHJpeCguMDUwODM3OTkgMCAwIC4wNTA4Mzc5OSAtMjguNTEwNjYyIDApIi8+PHBhdGggY2xpcC1wYXRoPSJ1cmwoI2MpIiBkPSJtOTc1IDB2NTcyLjRsMjU0LjMtMTUwLjN6IiBvcGFjaXR5PSIuOCIgdHJhbnNmb3JtPSJtYXRyaXgoLjA1MDgzNzk5IDAgMCAuMDUwODM3OTkgLTI4LjUxMDY2MiAwKSIvPjxwYXRoIGNsaXAtcGF0aD0idXJsKCNkKSIgZD0ibTcyMC42IDQ3MC4zIDI1NC40IDM1OC40di0yMDguMXoiIG9wYWNpdHk9Ii40NSIgdHJhbnNmb3JtPSJtYXRyaXgoLjA1MDgzNzk5IDAgMCAuMDUwODM3OTkgLTI4LjUxMDY2MiAwKSIvPjxwYXRoIGNsaXAtcGF0aD0idXJsKCNlKSIgZD0ibTk3NSA2MjAuNnYyMDguMWwyNTQuNS0zNTguNHoiIG9wYWNpdHk9Ii44IiB0cmFuc2Zvcm09Im1hdHJpeCguMDUwODM3OTkgMCAwIC4wNTA4Mzc5OSAtMjguNTEwNjYyIDApIi8+PC9nPjwvc3ZnPg==" alt="Ethereum">
									</div>
									<div class="PayBear__Item__code">ETH</div>
									<div class="PayBear__Item__name">Ethereum</div>
								</div>
								<div role="button" tabindex="0" class="PayBear__Item" onclick="createpay('btc',<?php echo $all_data['ipfs_hash']; ?>,<?php echo $all_data['btc_address']; ?>)">
									<div class="PayBear__Item__icon">
										<img src="data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9IjU0IiB2aWV3Qm94PSIwIDAgNTQgNTQiIHdpZHRoPSI1NCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJtNDQuNTg1OTg1IDM3LjUxMjI0N2MxLjY2MTY4MS04LjU0ODYwOS0zLjk2OTE5NS0xMS40NjYwNzMtMy45NjkxOTUtMTEuNDY2MDczczQuNjA2MDExLS41NjMwMjkgNS42NTMwOTgtNS45NDk4MjQtMi42MjIzNi05LjAxNjc1Ni02LjYwMzkwNC05Ljc5MDY5Yy0uMTE3MTA0LS4wMjI3Ni0uMzUxMzEyLS4wNjgyOS0uNDY4NDE3LS4wOTEwNWwxLjM2NTc2Ni03LjAyNjI1NTctNC42ODQxNy0uOTEwNTEwNC0xLjM2NTc2NSA3LjAyNjI1NDNjLTEuNTIyMzU2LS4yOTU5MTU5LTMuMDQ0NzExLS41OTE4MzE3LTQuNjg0MTctLjkxMDUxMDRsMS4zNjU3NjUtNy4wMjYyNTQzLTQuNjg0MTctLjkxMDUxMDM0LTEuMzY1NzY1IDcuMDI2MjU0MjRjLTEuMjg4MTQ2LS4yNTAzOTAyLTEwLjUzOTM4MS0yLjA0ODY0ODMtMTAuNTM5MzgxLTIuMDQ4NjQ4M2wtMS4xMzgxMzggNS44NTUyMTE5IDQuNjg0MTY5LjkxMDUxMS00Ljc4MDE3OSAyNC41OTE4OS00LjY4NDE2OTYtLjkxMDUxMS0xLjEzODEzODEgNS44NTUyMTMgMTAuNTM5MzgxNyAyLjA0ODY0OC0xLjM2NTc2NiA3LjAyNjI1NCA0LjY4NDE3LjkxMDUxIDEuMzY1NzY1LTcuMDI2MjUzIDQuNjg0MTcuOTEwNTEtMS4zNjU3NjUgNy4wMjYyNTQgNC42ODQxNy45MTA1MSAxLjM4ODUyOC03LjE0MzM1OGMzLjQxODc4NS41NDMwMTYgMTAuODA1OTU0LS41NzMxNyAxMi40MjIxMS04Ljg4NzU3MnptLTIwLjY5NjE2OS0yNC4xOTY3MiAxMi4yOTU5NDUgMi4zOTAwODljLjgxOTczLjE1OTM0IDMuODE1NjI0LjM3NzA5NiAyLjkwNTExMyA1LjA2MTI2Ni0uODQyMjIyIDQuMzMyODU2LTQuNjE1NjEgMy4xMTMyNjgtNC42MTU2MSAzLjExMzI2OGwtMTIuMTc4ODQxLTIuMzY3MzI3em04LjQ0NjAxOSAyNS45NDc1MTQtMTIuOTk4NTcxLTIuNTI2NjY2IDEuNTkzMzkzLTguMTk3Mjk3IDEyLjk5ODU3MSAyLjUyNjY2NmMuOTM2ODM0LjE4MjEwMiA0LjA5NTM1OC4xODg0MTMgMy4xMzkzMjIgNS4xMDY3OTEtLjc5MzQwNiA0LjcwNjkzMi00LjczMjcxNSAzLjA5MDUwNi00LjczMjcxNSAzLjA5MDUwNnoiIGZpbGw9IiNmN2FjMzEiLz48L3N2Zz4=" alt="Bitcoin">
									</div>
									<div class="PayBear__Item__code">BTC</div>
									<div class="PayBear__Item__name">Bitcoin</div>
								</div>
								<div role="button" tabindex="0" class="PayBear__Item" onclick="createpay('ltc',<?php echo $all_data['ipfs_hash']; ?>,<?php echo $all_data['btc_address']; ?>)">
									<div class="PayBear__Item__icon">
										<img src="data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9IjU0IiB2aWV3Qm94PSIuODQ3IC44NzYgNy4xMTE4ODY0IDcuMTExOTI5NiIgd2lkdGg9IjU0IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Im03Ljk1OTkyOTIgNC40MzE5MzljMCAxLjk2MzkxNTEtMS41OTIwMzc2IDMuNTU1OTg2My0zLjU1NTk0MyAzLjU1NTk4NjMtMS45NjM5MjcgMC0zLjU1NTk4NjItMS41OTIwNzEyLTMuNTU1OTg2Mi0zLjU1NTk4NjMgMC0xLjk2Mzg5MzYgMS41OTIwNTkyLTMuNTU1OTQzMjEgMy41NTU5ODYyLTMuNTU1OTQzMjEgMS45NjM4ODM4IDAgMy41NTU5NDMgMS41OTIwNDk2MSAzLjU1NTk0MyAzLjU1NTk0MzIxIiBmaWxsPSIjYmViZWJlIi8+PHBhdGggZD0ibTcuMjA0OTYxNSA0LjQzMTk4MjJjMCAxLjU0Njg0MDctMS4yNTQwMzg4IDIuODAwOTc5OS0yLjgwMDk3NTMgMi44MDA5Nzk5LTEuNTQ2OTE0OSAwLTIuODAxMDQwMS0xLjI1NDEzOTItMi44MDEwNDAxLTIuODAwOTc5OSAwLTEuNTQ2OTcwNCAxLjI1NDEyNTItMi44MDEwMjMyIDIuODAxMDQwMS0yLjgwMTAyMzIgMS41NDY5NTgxIDAgMi44MDA5NzUzIDEuMjU0MDMxMiAyLjgwMDk3NTMgMi44MDEwMjMyIiBmaWxsPSIjYmViZWJlIi8+PHBhdGggZD0ibTQuMTk2MTQ5OCA1LjM4MTg4NTQuMjMwOTcwMS0uODY5NzAyNC41NDY4Mjg5LS4xOTk3Nzg0LjEzNjAxNjEtLjUxMTEyMDgtLjAwNDY0NDEtLjAxMjY3OTItLjUzODI3NTIuMTk2NjQ2NC4zODc4MzAzLTEuNDYwMzMyOGgtMS4wOTk5MDAybC0uNTA3MTkyNyAxLjkwNTc2OC0uNDIzNDcwNS4xNTQ2OTkyLS4xMzk5MjU2LjUyNjkzMi40MjMxNDY1LS4xNTQ1Njk2LS4yOTg5MjQyIDEuMTIzMTU2N2gyLjkyNzI3MTJsLjE4NzY2MTktLjY5OTAxOTF6IiBmaWxsPSIjZmZmIi8+PC9zdmc+" alt="Litecoin">
									</div>
									<div class="PayBear__Item__code">LTC</div>
									<div class="PayBear__Item__name">Litecoin</div>
								</div>
								<div role="button" tabindex="0" class="PayBear__Item" onclick="createpay('bch',<?php echo $all_data['ipfs_hash']; ?>,<?php echo $all_data['btc_address']; ?>)">
									<div class="PayBear__Item__icon">
										<img src="data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9IjIyNyIgdmlld0JveD0iMCAwIDIyNyAyMjciIHdpZHRoPSIyMjciIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0ibTExMy42NjYgNDMuNWMtNS43NjctLjAxLTExLjYyOS43LTE3LjQ3NSAyLjE5MXYtLjAwM2MtMzcuNDEgOS41NTEtNTkuOTkgNDcuNTg3LTUwLjQzMSA4NC45NTcgOS41NiAzNy4zNyA0Ny42MzcgNTkuOTI1IDg1LjA0OSA1MC4zNzUgMzcuNDEyLTkuNTQ4IDU5Ljk5LTQ3LjU4NCA1MC40MzItODQuOTU0LTguMDY3LTMxLjUzLTM2LjQzNC01Mi41MTQtNjcuNTc1LTUyLjU2NnptLTExMy42NjYuMzJ2MTM5LjY4aDY0LjUzMWMtMjItMTUuNDIxLTM2LjM4My00MC45NTMtMzYuMzgzLTY5Ljg0IDAtMjguODg2IDE0LjM4Mi01NC40MTggMzYuMzgzLTY5Ljg0em0xNjIuNDY5IDBjMjIgMTUuNDIyIDM2LjM4MyA0MC45NTQgMzYuMzgzIDY5Ljg0IDAgMjguODg3LTE0LjM4MiA1NC40MTktMzYuMzgzIDY5Ljg0aDY0LjUzMXYtMTM5LjY4em0tNTAuODMyIDIzLjAzNyAzLjQ2NSAxMy41NDVjNi4zMy0xLjIwNSAxMS4yNzMtMS4yMDIgMTYuMDg3Ljc1NCA2LjIyNCAyLjUyNiA3LjY2NiA5LjMwOCA3Ljk2IDEwLjkzOC4yOTEgMS42My4zNzcgNC44OTQtLjUyMSA3LjI0LS44OTYgMi4zNS0zLjgyNCA1LjIxOS0zLjgyNCA1LjIxOXM0LjI3OS0uMTc5IDcuNjgzIDEuMjRjMy4zOTcgMS40MiA2LjQ3OSA0LjY2NCA3Ljc3OCAxMC4yMzYgMS4zMDMgNS41NjkgMS41NzQgMTEuMzYxLTIuNTY0IDE2LjE1OS00LjAzOSA0LjY3OS05LjExMyA2LjY5OS0xMS40OTggNy42NDlsLS4xNzkuMDdjLTEuMTM2LjQ1NS0zLjEwOCAxLjEzMy01LjIzNyAxLjgxbDMuNDY5IDEzLjU2NS04LjM1OSAyLjEzNS0zLjQxNS0xMy4zNDYtNi4zNjcgMS42MjUgMy40MTQgMTMuMzQ2LTguMzU5IDIuMTM1LTMuNDE0LTEzLjM0OC0xNi40NDcgNC4xOTctLjg0Ni0xMC40NjkgNS0xLjI3NWMxLjY4LS40MzEgMi4zNDItLjc2NCAyLjg3NS0xLjYwNS41MzMtLjg0NC40My0xLjg5OS4yMi0yLjcyMWwtOC44MzctMzQuNTUzYy0uNTU0LTIuMTY1LS44OC0yLjcwNS0yLjE2LTMuNTYzLTEuMjgyLS44NTktMy42NjMtLjQwOS00Ljk4My0uMDY5bC00LjgzMiAxLjIzMS0yLjIxOS04LjY3MiAxNi40NDgtNC4xOTctMy40MjctMTMuMzgzIDguMzYtMi4xMzMgMy40MjMgMTMuMzg1IDYuMzY3LTEuNjI1LTMuNDI0LTEzLjM4NXptMy42NjYgMjQuMDQ3Yy0yLjk2NS0uMDEyLTUuMDMuNDQ3LTcuMzMuOTk4LTIuNjI3LjYzLTUuMjI1IDEuNTQzLTUuMjI1IDEuNTQzbDQuMTIxIDE2LjExNnMzLjkzOC0uODgxIDYuOTU1LTEuNzc2YzMuMDE4LS44OTYgNi4wODItMi40MjIgOC4wOTQtNC4zMDggMi4wMTUtMS44ODcgMi44MjQtNC4yNTYgMS45NjktNy4yOC0uODYtMy4wMjQtMy41NDctNS4wOC03LjI1NC01LjI1OGEzMS4xMTIgMzEuMTEyIDAgMCAwIC0xLjMzLS4wMzV6bTguOTI2IDI0LjAwMmEzMi45MyAzMi45MyAwIDAgMCAtNS43NzcuNTU1Yy00LjIxMy43ODQtOS40NTYgMi40MTItOS40NTYgMi40MTJsNC41ODIgMTcuOTFzNS41NzktMS4yOTYgOS4yMTktMi41MThjMy42NDEtMS4yMiA3LjIyOS0zLjEzMyA4Ljg3NS00LjY3NiAxLjY0My0xLjU0MiAzLjUyOS0zLjc3MSAyLjQ4MS03Ljg2Ny0xLjA0OC00LjA5OC00LjIyMS01LjExNi01Ljk4My01LjQ5OC0uODgxLS4xOTEtMi4yNTgtLjMyOC0zLjk0MS0uMzE4eiIgZmlsbD0iI2Y3OTQxZCIvPjwvc3ZnPg==" alt="Bitcoin Cash">
									</div>
									<div class="PayBear__Item__code">BCH</div>
									<div class="PayBear__Item__name">Bitcoin Cash</div>
								</div>
								<div role="button" tabindex="0" class="PayBear__Item" onclick="createpay('btg',<?php echo $all_data['ipfs_hash']; ?>,<?php echo $all_data['btc_address']; ?>)">
									<div class="PayBear__Item__icon">
										<img src="data:image/svg+xml;base64,PHN2ZyBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNjAwIiBoZWlnaHQ9IjU0IiB2aWV3Qm94PSIwIDAgNTQgNTQiIHdpZHRoPSI1NCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+PGxpbmVhckdyYWRpZW50IGlkPSJhIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjEyLjU1MTE4Nzg4NjY1IiB4Mj0iNDQuOTE0OTU1MTA1MzA0IiB5MT0iNS4xMzM2MjEwMzM4NyIgeTI9IjU0LjExMTk0ODk2NzQ3OSI+PHN0b3Agb2Zmc2V0PSIuMDA1MTI4MjA1IiBzdG9wLWNvbG9yPSIjZjFkMjAwIi8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjZDI3ZDAwIi8+PC9saW5lYXJHcmFkaWVudD48Y2lyY2xlIGN4PSIyNyIgY3k9IjI3IiBmaWxsPSIjZmZmIiByPSIyMy42NTQxMTgiLz48cGF0aCBkPSJtMjcgMGMtMTQuOTA4MjM1IDAtMjcgMTIuMDkxNzY1LTI3IDI3czEyLjA5MTc2NSAyNyAyNyAyNyAyNy0xMi4wOTE3NjUgMjctMjctMTIuMDkxNzY1LTI3LTI3LTI3em0wIDQ3Ljc4NDcwNmMtMTEuNDc3NjQ3IDAtMjAuNzg0NzA1OS05LjMwNzA1OS0yMC43ODQ3MDU5LTIwLjc4NDcwNnM5LjMwNzA1ODktMjAuNzg0NzA1OSAyMC43ODQ3MDU5LTIwLjc4NDcwNTkgMjAuNzg0NzA2IDkuMzA3MDU4OSAyMC43ODQ3MDYgMjAuNzg0NzA1OS05LjMwNzA1OSAyMC43ODQ3MDYtMjAuNzg0NzA2IDIwLjc4NDcwNnoiIGZpbGw9InVybCgjYSkiLz48ZyBmaWxsPSIjMTMyMzY1IiB0cmFuc2Zvcm09Im1hdHJpeCguMTA1ODgyMzUgMCAwIC4xMDU4ODIzNSAtNC43NjQ3MDYgLTQuNzY0NzA2KSI+PHBhdGggZD0ibTIxNSAzODcuMiA5LjgtMTkuNmgxMTcuN2MxNi4yIDAgMjkuNC0xMy4yIDI5LjQtMjkuNHMtMTMuMi0yOS40LTI5LjQtMjkuNGgtOTguMXYtMTkuNmg5OC4xYzI3LjEgMCA0OSAyMiA0OSA0OSAwIDI3LjEtMjIgNDktNDkgNDl6Ii8+PHBhdGggZD0ibTM0Mi41IDM5Mi42aC0xMzYuM2wxNS4zLTMwLjVoMTIxLjFjMTMuMiAwIDI0LTEwLjggMjQtMjRzLTEwLjgtMjQtMjQtMjRoLTEwMy42di0zMC41aDEwMy41YzMwIDAgNTQuNSAyNC40IDU0LjUgNTQuNXMtMjQuNSA1NC41LTU0LjUgNTQuNXptLTExOC43LTEwLjloMTE4LjdjMjQgMCA0My42LTE5LjYgNDMuNi00My42cy0xOS42LTQzLjYtNDMuNi00My42aC05Mi42djguN2g5Mi42YzE5LjIgMCAzNC45IDE1LjYgMzQuOSAzNC45IDAgMTkuMi0xNS42IDM0LjktMzQuOSAzNC45aC0xMTQuM3oiLz48cGF0aCBkPSJtMjE1IDIwOS42IDkuOCAxOS42aDEwNC42YzE2LjIgMCAyOS40IDEzLjIgMjkuNCAyOS40cy0xMy4yIDI5LjQtMjkuNCAyOS40aC03NS4ydjE5LjZoNzUuMmMyNy4xIDAgNDktMjIgNDktNDkgMC0yNy4xLTIyLTQ5LTQ5LTQ5eiIvPjxwYXRoIGQ9Im0zMjkuNCAzMTMuMWgtODAuNnYtMzAuNWg4MC42YzEzLjIgMCAyNC0xMC44IDI0LTI0cy0xMC44LTI0LTI0LTI0aC0xMDhsLTE1LjMtMzAuNWgxMjMuMmMzMCAwIDU0LjUgMjQuNCA1NC41IDU0LjUuMSAzMC0yNC4zIDU0LjUtNTQuNCA1NC41em0tNjkuNy0xMC45aDY5LjdjMjQgMCA0My42LTE5LjYgNDMuNi00My42cy0xOS41LTQzLjYtNDMuNi00My42aC0xMDUuNmw0LjQgOC43aDEwMS4yYzE5LjIgMCAzNC45IDE1LjYgMzQuOSAzNC45cy0xNS42IDM0LjktMzQuOSAzNC45aC02OS43eiIvPjxwYXRoIGQ9Im0yNDQuNCAyMTAuNmgxOS42djE3Ni41aC0xOS42eiIvPjxwYXRoIGQ9Im0yNjkuNSAzOTIuNmgtMzAuNXYtMTg3LjRoMzAuNXptLTE5LjYtMTAuOWg4Ljd2LTE2NS42aC04Ljd6Ii8+PHBhdGggZD0ibTI2OC40IDE4MC4xaDE5LjZ2MzkuMmgtMTkuNnoiLz48cGF0aCBkPSJtMjkwLjcgMjIyLjFoLTI1LjF2LTQ0LjdoMjUuMXptLTE5LjYtNS41aDE0LjJ2LTMzLjhoLTE0LjJ6Ii8+PHBhdGggZD0ibTMxMC45IDE4MC4xaDE5LjZ2MzkuMmgtMTkuNnoiLz48cGF0aCBkPSJtMzMzLjIgMjIyLjFoLTI1LjF2LTQ0LjdoMjUuMXptLTE5LjYtNS41aDE0LjJ2LTMzLjhoLTE0LjJ6Ii8+PHBhdGggZD0ibTI2OC40IDM3Ni4zaDE5LjZ2MzkuMmgtMTkuNnoiLz48cGF0aCBkPSJtMjkwLjcgNDE4LjJoLTI1LjF2LTQ0LjdoMjUuMXptLTE5LjYtNS40aDE0LjJ2LTMzLjhoLTE0LjJ6Ii8+PHBhdGggZD0ibTMxMC45IDM3Ni4zaDE5LjZ2MzkuMmgtMTkuNnoiLz48cGF0aCBkPSJtMzMzLjIgNDE4LjJoLTI1LjF2LTQ0LjdoMjUuMXptLTE5LjYtNS40aDE0LjJ2LTMzLjhoLTE0LjJ6Ii8+PHBhdGggZD0ibTMwMCA0NzMuOGMtOTUuOCAwLTE3My44LTc3LjktMTczLjgtMTczLjggMC05NS44IDc3LjktMTczLjggMTczLjgtMTczLjggOTUuOCAwIDE3My44IDc3LjkgMTczLjggMTczLjggMCA5NS44LTc4IDE3My44LTE3My44IDE3My44em0wLTMzMC4yYy04Ni4yIDAtMTU2LjQgNzAuMi0xNTYuNCAxNTYuNHM3MC4yIDE1Ni40IDE1Ni40IDE1Ni40IDE1Ni40LTcwLjIgMTU2LjQtMTU2LjQtNzAuMi0xNTYuNC0xNTYuNC0xNTYuNHoiLz48L2c+PC9zdmc+" alt="Bitcoin Gold">
									</div>
									<div class="PayBear__Item__code">BTG</div>
									<div class="PayBear__Item__name">Bitcoin Gold</div>
								</div>
								<div role="button" tabindex="0" class="PayBear__Item" onclick="createpay('dash',<?php echo $all_data['ipfs_hash']; ?>,<?php echo $all_data['btc_address']; ?>)">
									<div class="PayBear__Item__icon">
										<img src="data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9IjU0IiB2aWV3Qm94PSIwIDAgNTQgNTQiIHdpZHRoPSI1NCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJtNTMuOTI3MTM5IDI2LjkyNDEwNWMuMTc2NjE3IDEuMDg5MTQuMDI5NDQgMi4yMDc3MTYtLjQxMjEwNyAzLjIwODU0N2wtNC44NTY5NzUgMTUuMjc3MzkzYy0uNDQxNTQzIDEuMDU5NzA0LS45NzEzOTUgMi4wNjA1MzYtMS42MTg5OTEgMy4wMzE5MzEtLjc2NTM0Mi45NzEzOTUtMS42NDg0MjkgMS44NTQ0OC0yLjYxOTgyNCAyLjYxOTgyMi0xLjAwMDgzMS44MjQyMTQtMi4xNzgyNzkgMS40MTI5MzgtMy4yMDg1NDYgMi4wMDE2NjItMS4wMjg0My4zODA0MzEtMi4xMTIzODkuNTg5MjY4LTMuMjA4NTQ3LjYxODE2MWgtMzYuNzk1MjY0NGwyLjYxOTgyMjktNy44NTk0NjhoMzMuMTc0NjA5NWw1LjIzOTY0Ni0xNi4wNzIxNzJoLTMzLjE3NDYxMDJsMi42MTk4MjMyLTcuODU5NDY4aDM2LjYxODY0NmMuOTcxMzk1LS4wMjk0NCAxLjk0Mjc5LjE3NjYxNyAyLjgyNTg3Ny42MTgxNi44NTM2NS4zMjM3OTkgMS41ODk1NTUuOTcxMzk1IDIuMDAxNjYyIDEuNzk1NjA5LjQ3MDk3OS43OTQ3NzguNzM1OTA2IDEuNzA3My43OTQ3NzggMi42MTk4MjN6bS0zMS43OTExMDggNy4yMTE4NzItMi40MTM3NyA3LjI3MDc0NGgtMTkuNzIyMjYxbDIuNjE5ODIyOC03LjI3MDc0NHoiIGZpbGw9IiMxZTc1YmIiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDAgLTEwLjc4NDY4NykiLz48L3N2Zz4=" alt="DASH">
									</div>
									<div class="PayBear__Item__code">DASH</div>
									<div class="PayBear__Item__name">DASH</div>
								</div>
							</div>
						</div>
					<?php } ?>
					</div>
					<div class="col-lg-5">
						<div class="jumbotron text-center">
							<?php if($all_data['verified'] == 0 && empty($all_data['bitcoin_txid'])){ ?>
							<p class="lead">Send exactly <?php echo $all_data['bitcoin_fees']/100000000; ?></p>
							<img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=<?php echo $all_data['bitcoin_address']; ?>">
							<hr class="bg-primary">
							<div class="input-group">
								<input type="text" value="<?php echo $all_data['bitcoin_address']?>" class="form-control">
								<span class="input-group-append"></span>
							</div>
							<?php }elseif($all_data['verified'] == 1 && !empty($all_data['bitcoin_txid'])){ ?>
							<p class="lead">Data is Verified on Bitcoin Blockchain</p>
							<hr class="bg-primary">
							<div class="input-group">
								<input type="text" value="<?php echo $all_data['bitcoin_txid']?>" class="form-control">
								<span class="input-group-append">
									<button type="button" onclick="<?php echo "openFile('https://live.blockcypher.com/btc-testnet/tx/".$all_data['bitcoin_txid']."')"; ?>" class="btn btn-sm btn-primary">VIEW ON BLOCKCHAIN</button>
								</span>
							</div>
							<?php } ?>
						</div>
					</div>
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
					$(".modal-body").html(msg);
				});
				$("#myModal").modal();
			}
			else if(coin == 'btc'){
				$(".modal-title").html(' Pay Bitcoin');
				$.post('http://159.65.131.43/ipfs/api/paybear_api.php',{'msg':'payment_address','hash':ipfshash,'btc_address':btcaddress,'coin':'eth'}, function(msg){
					console.log(msg);
					$(".modal-body").html(msg);
				});
				$("#myModal").modal()
			}
			else if(coin == 'ltc'){
				$(".modal-title").html(' Pay Litecoin');
				$("#myModal").modal()
			}
			else if(coin == 'bch'){
				$(".modal-title").html(' Pay Bitcoin Cash');
				$("#myModal").modal()
			}
			else if(coin == 'btg'){
				$(".modal-title").html(' Pay Bitcoin Gold');
				$("#myModal").modal()
			}
			else if(coin == 'dash'){
				$(".modal-title").html(' Pay Dash');
				$("#myModal").modal()
			}
		}
	</script>
	</body>
</html>

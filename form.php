<?php 
include 'core/.env';
$db = mysqli_connect($HostName,$HostUser,$HostPass,$dbName) or die("Could not connect to the database");
if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    else{
       // echo "sdf";
    }
$qry = mysqli_query($db,"SELECT  `ipfs_hash`,`verified`,`bitcoin_txid` FROM `document_details` WHERE is_private=0 LIMIT 10 ");
    $result = mysqli_fetch_all($qry,MYSQLI_ASSOC);
    if(!$result){

    }
    else{
        $all_dataa = ($result);
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
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <!-- Icons -->
	  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link href="css/font-awesome.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
<style media="screen">
input{
	background-color: #ffffff;
	border: solid 1px #efefef;
box-shadow: none;
padding: 10px;
border-radius: 5px;
margin-left: 10px !important;
}
#loader{
	position: absolute;
	background: #fff;
	opacity: 0.6;
	width: 100%;
	height: 100%;
	z-index: 99999;
}
#loader img{
	display: table;
	margin: 0 auto;
  position: relative;
  top: 30%;
}
.table {
  table-layout:fixed;
}

.table td {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
</style>
</head>
<body>
	<div class="container-fluid" id="wrapper">
		<div class="row">
			<nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2">
				<h1 class="site-title"><a href=""><em class="	fas fa-th"></em> SaveOnBlock</a></h1>

				<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><em class="fa fa-bars"></em></a>
			<ul class="nav nav-pills flex-column sidebar-nav">
					<li class="nav-item"><a class="nav-link active" href="index.php"><em class="fas fa-hashtag"></em> Certify <span class="sr-only">(current)</span></a></li>
					<li class="nav-item"><a class="nav-link" href="verify.php"><em class="fab fa-searchengin"></em> Verify</a></li>
					<li class="nav-item"><a class="nav-link " href="howitworks.php"><em class="fas fa-question-circle"></em> How it works?</a></li>
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

					<section class="section row">
				<div class="container  mb-3">
				<h3>SaveOnBlock</h3>
				<p>Form data and uploaded file will be hashed separately and will be uploaded onto IPFS</p>

				</div>



			<form id="form">
				
			</form>



						</section>


						<section class="row">
							<div class="col-12 mt-1 text-center mb-4"><button onclick="submitForm();" type="button" name="button" class="btn btn-lg btn-primary">Submit</button></div>

						</section>
						<section class="row">
							<div class="col-12 mt-1 text-center mb-4">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>IPFS Hash</th>
											<th>Status</th>
											<th>Bitcoin TXID</th>
										</tr>
									</thead>
									<tbody>
										<?php for ($i=0; $i < sizeof($all_dataa) ; $i++) { ?>
										<tr>
											<td><a href=<?php echo "http://saveonblock.com/verifyhash.php?hash=".$all_dataa[$i]['ipfs_hash']; ?> target="_blank"><?php echo $all_dataa[$i]['ipfs_hash']; ?></a></td>
											<td><?php echo $all_dataa[$i]['verified']; ?></td>
											<td><?php echo $all_dataa[$i]['bitcoin_txid']; ?></td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script
		src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="old-website/form-builder.min.js"></script>
		<script type="text/javascript" src="old-website/form-render.min.js"></script>
    <script type="text/javascript">
			var container = document.getElementById('form');
			$.post('http://159.65.131.43/ipfs-admin/upload.php',{'action' : 'getFormData'} , function(msg) {
				var formData = msg;
				var formRenderOpts = { container, formData, dataType: 'json' }; $(container).formRender(formRenderOpts);
			});
			function submitForm(){
		    add_loader('body');
				var formData = $("form").serializeArray();
				var fileData = $("form input[type='file']")[0].files[0];
				var fileType = $("form input[type='file']")[0].files[0]['type'];
				var reader = new FileReader();
		    	reader.onload = function(e) {
		    		//console.log(e.target.result);
		    		$.post('http://159.65.131.43/ipfs/mpost.php',{'msg' : 'make_pdf','form_data': formData,'fileData':e.target.result, 'file_type' : fileType } , function(msg) {
		        console.log(msg);
		        remove_loader();
		      	var response = JSON.parse(msg);
						console.log(response);
						window.location = 'verifyhash.php?hash='+response['HASH'];
					});
		      		$('#blah').attr('src', e.target.result);
		    	}
		    	reader.readAsDataURL(fileData);
		    // 	$("#blah").fadeIn();
				// console.log(fileData);
				// console.log(formData);
				// console.log(fileType);
			}
			function add_loader(div) {
				 var loaderWrap = '<div id="loader"><img src="old-website/loading.gif" /></div>';
				 $(div).prepend(loaderWrap);
			}
			function remove_loader() {
			$("#loader").remove();
			}
    </script>
	</body>
</html>

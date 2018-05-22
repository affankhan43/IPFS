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
				<h1 class="site-title"><a href="index.html"><em class="	fas fa-th"></em> SaveOnBlock</a></h1>

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
		    		$.post('http://159.65.131.43/ipfs/old-website/mpost.php',{'msg' : 'make_pdf','form_data': formData,'fileData':e.target.result, 'file_type' : fileType } , function(msg) {
		        console.log(msg);
		        remove_loader();
		      	var response = JSON.parse(msg);
						$("#form-submission").fadeOut();
						$("#txdetails").fadeIn();
						$("#resp_ipfs").html(response.HASH);
						$("#resp_fee").html("Please send exactly " + parseInt(response.fees)/100000000 + " Bitcoin to");
						$("#resp_qr").attr("src","https://api.qrserver.com/v1/create-qr-code/?size=250x250&data="+response.address);
						$("#resp_address").html(response.address);
		        $("#resp_file").attr("onclick","openFile('http://gateway.ipfs.io/ipfs/"+response.HASH+"')");
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

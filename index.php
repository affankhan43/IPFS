<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>

<!DOCTYPE html>
<html>
<head>
	<title>IPFS</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<style media="screen">
	body{
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
	#form-submission{
		display: none;
	}
	#txdetails{
		display: none;
	}
	/* #select-blockchain{
		display: none;
	} */
	#blah{
		display: none;
	}
	/* The sidebar menu */
	.sidenav {
		 height: 100%; /* Full-height: remove this if you want "auto" height */
		 width: 220px; /* Set the width of the sidebar */
		 position: fixed; /* Fixed Sidebar (stay in place on scroll) */
		 letter-spacing: .2rem;
		 padding: .75rem 1rem;
		 z-index: 1; /* Stay on top */
		 top: 0; /* Stay at the top */
		 left: 0;
		 background-color: #7376df; /* Black */
		 overflow-x: hidden; /* Disable horizontal scroll */
		 padding-top: 20px;
	}

	/* The navigation menu links */
	.sidenav a {
		 padding: 6px 8px 6px 16px;
		 text-decoration: none;
		 font-size: 15px;
		 color: #fff !important;
		 display: block;
		 cursor: pointer;
	}

	/* When you mouse over the navigation links, change their color */
	.sidenav a:hover {
		 color: #f1f1f1;
}

/* Style page content */
.main {
	 margin-left: 160px; /* Same as the width of the sidebar */
	 padding: 0px 10px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
	 .sidenav {padding-top: 15px;}
	 .sidenav a {font-size: 18px;}
}
.sidenav_header{
	font-size: 20px !important;
	font-weight: bold;
	text-align: center;
	margin-bottom: 10px;
}
input{
	background-color: #ffffff;
	border: solid 1px #efefef;
box-shadow: none;
padding: 10px;
border-radius: 5px;
margin-left: 10px !important;
}
input.form-control{
	height: inherit !important;
}
	</style>
</head>
<body>

	<div id="nohash" class="container">
		<div class="row">
			<div class="col-sm-2">
				<div class="sidenav">
					<a class="sidenav_header" href="http://159.65.131.43/ipfs/index.php">IPFS</a>
				  <a href="index.php">Home</a>
          <a href="verify.php">Verify Hash</a>
				</div>
			</div>
			<div class="col-sm-10" style="padding: 10px 0px 0px 0px">

				<div id="select-blockchain">
					<h2 class="text-center" style="font-weight:bold;">Select Blockchain</h2>
					<br/>
					<div class="container">
						<div class="row">
							<div class="col-md-1"></div>
							<div class="col-md-4 eth">
									<br><br>
									<img src="bitcoin.png" width="100px" height="100px"><br><br>
									<h3>Bitcoin Blockchain</h3><br>
									<button onclick="selectBlock();" type="button" class="btn btn-lg btn-block btn-primary">Select</button>
									<br>
							</div>
							<div class="col-md-2"></div>
							<div class="col-md-4 eth">
									<br><br>
									<img src="eth.svg" width="100px" height="100px"><br><br>
									<h3>Ethereum Blockchain</h3><br>
									<button type="button" class="btn btn-lg btn-block btn-primary">Coming Soon</button>
									<br>
							</div>
							<div class="col-md-1"></div>
							</div>
							<br/><br/><br/><br/>
							<div class="row">
                <div class="col-lg-12 mb-12 bg-default text-center">
                  <h3>Verify Anything</h3>
                </div>
							</div>
						</div>
				</div>
				<form id="form-submission" enctype="multipart/form-data">
					<h3>Submit Form</h3>
					<div id="form"></div>
					<button onclick="submitForm();" type="button" name="ipfs_button" class="btn btn-lg btn-block btn-primary">Submit</button>
				</form>
        <div id="txdetails">
				<section  class="row">
					<div class="col-12">
						<h3 class="mb-12 text-center" id="resp_message">Data Successfully Added to IPFS</h3>
					</div>
	        <div class="col-lg-6 mb-6">
					       <div class="card text-white bg-info">
							<div class="card-header">IPFS DETAILS</div>
							<div class="card-block">
								<p class="text-center"><b>IPFS HASH:</b><span id="resp_ipfs"></span></p>
                <a id="resp_file" href="" target="_blank">View File</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 mb-6 bg-default">
						<div class="card">
							<div class="card-header">RECORD IT ON BITCOIN BLOCKCHAIN</div>

							<div class="card-block">
								<p class="text-center"><div class="text-center" id="resp_fee"></div> </p>
								<img style="display: table; margin: 0 auto;" id="resp_qr" src="" />
								<br/>
								<br/>
								<p class="text-center" id="resp_address"></p>
							</div>
						</div>
					</div>
				</section>
			</div>
				<!-- <img id="blah" src="#" alt="your image" /> -->
			</div>
		</div>
	</div>




<script
src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="form-builder.min.js"></script>
<script type="text/javascript" src="form-render.min.js"></script>
<script type="text/javascript">
	function selectBlock(){
		$("#select-blockchain").fadeOut();
		$("#form-submission").fadeIn();
		var container = document.getElementById('form');
		$.post('http://159.65.131.43/ipfs-admin/upload.php',{'action' : 'getFormData'} , function(msg) {
			var formData = msg;
			var formRenderOpts = { container, formData, dataType: 'json' }; $(container).formRender(formRenderOpts);
		});

	}

	function submitForm(){
		var formData = $("form").serializeArray();
		var fileData = $("form input[type='file']")[0].files[0];
		var fileType = $("form input[type='file']")[0].files[0]['type'];
		var reader = new FileReader();
    	reader.onload = function(e) {
    		//console.log(e.target.result);
    		$.post('http://159.65.131.43/ipfs/mpost.php',{'msg' : 'make_pdf','form_data': formData,'fileData':e.target.result, 'file_type' : fileType } , function(msg) {
        console.log(msg);
      	var response = JSON.parse(msg);
				$("#form-submission").fadeOut();
				$("#txdetails").fadeIn();
				$("#resp_ipfs").html(response.HASH);
				$("#resp_fee").html("Please send exactly " + parseInt(response.fees)/100000000 + " Bitcoin to");
				$("#resp_qr").attr("src","https://api.qrserver.com/v1/create-qr-code/?size=250x250&data="+response.address);
				$("#resp_address").html(response.address);
        $("#resp_file").attr("href","http://159.65.131.43/ipfs/"+response.file);
			});
      		$('#blah').attr('src', e.target.result);
    	}
    	reader.readAsDataURL(fileData);
    // 	$("#blah").fadeIn();
		// console.log(fileData);
		// console.log(formData);
		// console.log(fileType);
	}

	function verifPage(){
		if($("#form-submission").css('display') == 'block'){
			$("#select-blockchain").fadeIn();
			$("#form-submission").fadeOut();
		}
	}

  function verifyHash(){
    hash = $("#ipfs-hash").val();
    window.location = '?hash='+hash;
  }
</script>
</body>
</html>

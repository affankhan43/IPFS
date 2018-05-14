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

	<div class="container">
		<div class="row">
			<div class="col-sm-2">
				<div class="sidenav">
					<a class="sidenav_header">IPFS</a>
				  <a onclick="verifPage()">Verfiy</a>
				</div>
			</div>
			<div class="col-sm-10" style="padding: 50px 0px 0px 0px">
				<div id="select-blockchain">
					<h2 class="text-center" style="font-weight:bold;">Select Blockchain</h2>
					<br/>
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

				<form id="form-submission" enctype="multipart/form-data">
					<h3>Submit Form</h3>
					<div id="form"></div>
					<button onclick="submitForm();" type="button" name="ipfs_button" class="btn btn-lg btn-block btn-primary">Submit</button>
				</form>
				<img id="blah" src="#" alt="your image" />
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
		var reader = new FileReader();
    	reader.onload = function(e) {
      		$('#blah').attr('src', e.target.result);
    	}
    	reader.readAsDataURL(fileData);
    	$("#blah").fadeIn();
		console.log(fileData);
		console.log(formData);
	}

	function verifPage(){
		if($("#form-submission").css('display') == 'block'){
			$("#select-blockchain").fadeIn();
			$("#form-submission").fadeOut();
		}
	}

</script>
</body>
</html>

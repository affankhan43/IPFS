<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

	include '../core/.env';
	$db = mysqli_connect($HostName,$HostUser,$HostPass,$dbName) or die("Could not connect to the database");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else{
		//echo "sdf";
	}
	require __DIR__ . '/../vendor/autoload.php';

if(isset($_POST['msg'])){
	if($_POST['msg'] == 'payment_address' && isset($_POST['hash'])){
		$qry = "SELECT `ipfs_hash` FROM document_details WHERE ipfs_hash='".$_POST['hash']."' ";
		$result = mysqli_fetch_assoc($db,$qry);
		print_r($result);
	}
}
?>
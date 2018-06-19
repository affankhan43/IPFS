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
		$qry = mysqli_query($db,"SELECT * FROM `document_details` WHERE ipfs_hash='".$_POST['hash']."' ");
		$result = mysqli_fetch_assoc($qry);
		if(!$result){
			echo json_encode(array('success'=>false,'error'=>'hash not found'));
		}
		else{
			echo json_encode($result);
		}
	}
}
?>
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
	if($_POST['msg'] == 'payment_address' && isset($_POST['hash']) && isset($_POST['btc_address']) && isset($_POST['coin'])){
		$qry = mysqli_query($db,"SELECT `ipfs_hash` FROM `document_details` WHERE ipfs_hash='".$_POST['hash']."' AND bitcoin_address='".$_POST['btc_address']."' ");
		$result = mysqli_fetch_assoc($qry);
		if(!$result){
			echo json_encode(array('success'=>false,'error'=>'hash not found'));
		}
		else{
			$get_url = 'https://api.paybear.io/v2/'.$_POST['coin'].'/payment/?token='.$priv_env_key;
			$address_data = file_get_contents($get_url);
			echo json_encode($address_data);
		}
	}
}
?>
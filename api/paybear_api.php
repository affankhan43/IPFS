<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

	include '../core/.env';
	include '.env';
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
		$qry = mysqli_query($db,"SELECT `ipfs_hash`,`coin_data` FROM `document_details` WHERE ipfs_hash='".$_POST['hash']."' AND bitcoin_address='".$_POST['btc_address']."' ");
		$result = mysqli_fetch_assoc($qry);
		if(!$result){
			echo json_encode(array('success'=>false,'error'=>'hash not found'));
		}
		else{
			if(is_null($result['coin_data'])){
				$get_url = 'https://api.paybear.io/v2/'.$_POST['coin'].'/payment/?token='.$priv_env_key;
				$address_data = file_get_contents($get_url);
				$address_data = json_decode($address_data, true);
				if($address_data['success'] == true){
					$coin_data = array(array('coin'=>$_POST['coin'],'address'=>$address_data['data']['address'],'status'=>'pending'));
					$echo_data = json_encode(array('success'=>true,'coin'=>$_POST['coin'],'address'=>$address_data['data']['address'],'status'=>'pending'));
					$coin_data = json_encode($coin_data);
					$upd_qry2 = "UPDATE `document_details` SET `coin_data` = '".$coin_data."'  WHERE ipfs_hash='".$_POST['hash']."' AND bitcoin_address='".$_POST['btc_address']."' ";
					if(mysqli_query($db, $upd_qry2)){
						echo $echo_data;
					}
				}
				else{
					echo json_encode(array('success'=>false,'error'=>'Address Generation Failed'));
				}
			}
			else{
				$coin_check = json_decode($result['coin_data'],true);
				for($i=0; $i < sizeof($coin_check) ; $i++){ 
					if($coin_check[$i]['coin'] == $_POST['coin']){
						$coin_exist = $coin_check[$i];
					}
				}
				if(isset($coin_exist)){
					$coin_exist['success'] = true;
					echo json_encode($coin_exist);
				}
				else{
					$get_url = 'https://api.paybear.io/v2/'.$_POST['coin'].'/payment/?token='.$priv_env_key;
					$address_data = file_get_contents($get_url);
					$address_data = json_decode($address_data, true);
					if($address_data['success'] == true){
						$coin_data = array(array('coin'=>$_POST['coin'],'address'=>$address_data['data']['address'],'status'=>'pending'));
						$echo_data = json_encode(array('success'=>true,'coin'=>$_POST['coin'],'address'=>$address_data['data']['address'],'status'=>'pending'));
						$coin_data = json_encode($coin_data);
						$upd_qry2 = "UPDATE `document_details` SET `coin_data` = '".$coin_data."'  WHERE ipfs_hash='".$_POST['hash']."' AND bitcoin_address='".$_POST['btc_address']."' ";
						if(mysqli_query($db, $upd_qry2)){
							echo $echo_data;
						}
					}
					else{
						echo json_encode(array('success'=>false,'error'=>'Address Generation Failed'));
					}
				}
			}
		}
	}
}
?>
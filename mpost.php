<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

	include 'core/.env';
	$db = mysqli_connect($HostName,$HostUser,$HostPass,$dbName) or die("Could not connect to the database");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else{
		//echo "sdf";
	}
	require __DIR__ . '/vendor/autoload.php';
	require('core/fpdf/fpdf.php');
	include 'core/funcs.php';
	include '.env';
	use \Curl\Curl;

if(isset($_POST['msg']) && isset($_POST['form_data']) && isset($_POST['fileData']) && isset($_POST['file_type']) && $_POST['msg'] == "make_pdf"){
	$type = explode("/",$_POST['file_type']);
	if(!isset($type[1])){
		$file_type = $type[0];
	}
	else{
		$file_type = $type[1];
	}
	$post_string = "";
	$image_y = sizeof($_POST['form_data'])*2*5 + 20;
	for ($i=0; $i < sizeof($_POST['form_data']); $i++){
		$post_string .= " \n ".$_POST['form_data'][$i]['name']." : ".$_POST['form_data'][$i]['value']." \n ";
	}
	$imageData = base64_decode($_POST['file_type']);
	$photo = imagecreatefromstring($imageData);
	$new_dir = 'temp/user/';
	    mkdir($new_dir);
	imagejpeg($photo,$new_dir.uniqid().$file_type,100);
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	$pdf->MultiCell(0,5,$post_string,0);
	$info = getimagesize($_POST['fileData']);
	$pdf->Image($_POST['fileData'],10,$image_y,$info[0]/3,$info[1]/3,$file_type);
	$filename = uniqid().'.pdf';
	$pdf->Output($filename,'F');
	if(file_exists($filename)){
		$path_parts = pathinfo($filename);
		$extension = $path_parts['extension'];
		if($extension == "pdf"){
         	$fields = array();
         	$filenames = array($path_parts['basename']);
         	$files = array();
         	foreach ($filenames as $f){
           		$files[$path_parts['basename']] = file_get_contents($f);
         	}
		 	$url = "http://159.65.131.43:5001/api/v0/add";
		 	$curl = curl_init();
		 	$boundary = uniqid();
		 	$delimiter = '-------------' . $boundary;
		 	$post_data = build_data_files($boundary, $fields, $files);
		 	curl_setopt_array($curl, array(
		 		CURLOPT_URL => $url,
		 		CURLOPT_RETURNTRANSFER => 1,
		 		CURLOPT_MAXREDIRS => 10,
		 		CURLOPT_TIMEOUT => 30,
		 		CURLOPT_CUSTOMREQUEST => "POST",
		 		CURLOPT_POST => 1,
		 		CURLOPT_POSTFIELDS => $post_data,
		 		CURLOPT_HTTPHEADER => array(
		 			"Content-Type: multipart/form-data; boundary=" . $delimiter,
		 			"Content-Length: " . strlen($post_data)),
		 	));
		 	$response = curl_exec($curl);
		 	$err = curl_error($curl);
		 	curl_close($curl);
		 	if($err){
		 		unlink($filename);
		 		echo json_encode(array("success"=>false,"message"=>"cUrl Error#"));
		 	}
		 	else{
		 		// unlink($filename);
				$data_compose = json_decode($response,true);
				if(isset($data_compose['Hash'])){
					$curl = new curl();
					$curl->get($url_env);
					if ($curl->error) {
						echo json_encode(array("success"=>false,"message"=>"Unknown Error #09"));
					}
					else{
						$address = json_decode($curl->response,true);
						if($address['address'] == "false"){
							echo json_encode(array("success"=>false,"message"=>"Unknown Error #10"));
						}
						else{
							$get_qry = "SELECT fees FROM message_fees WHERE coin='bitcoin'";
							$result = mysqli_query($db, $get_qry);
							$value = ($result->fetch_assoc());
							if(isset($value['fees'])){
								$value_fees = intval($value['fees']);
							}
							else{
								$value_fees = 75000;
							}
							$qry = "INSERT INTO `document_details` (`ipfs_hash`, `ipfs_name`, `ipfs_size`, `verified`, `bitcoin_address`, `bitcoin_fees`,`email`) VALUES ('".$data_compose['Hash']."','".$data_compose['Name']."','".$data_compose['Size']."',0,'".$address['address']."','".$value_fees."', 'Null')";
						if(mysqli_query($db, $qry)){
							// $mssg = "Your Document is Added in IPFS \n\n Document IPFS HASH :".$data_compose['Hash'];
							// $headers = "From: bitcoinbays@gmail.com\r\n";
							// mail($_POST['email'],"Document Added ...",$mssg,$headers);
							// $URL = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'].'?hash='.$data_compose['Hash'];
							// header('Location: '.$URL);
               				echo json_encode(array("success"=>true,"message"=>"Successfully Data Added",'HASH'=>$data_compose['Hash'],'file'=>$filename, 'address'=>$address['address'], 'fees'=>$value_fees));
						}
						else{
							echo json_encode(array("success"=>false,"message"=>"Unknown Error #11"));
						}
					}
				}
			}
			else{
				echo json_encode(array("success"=>false,"message"=>"Hash Error"));
			}
		}
	}
}
}

/*-- End --*/
?>

<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
// $field_data[0] = array('field'=>'Name'  ,'value' => "Affan" );
// $field_data[1] = array('field'=>'Gender','value' => "Male" );
// $field_data[2] = array('field'=>'Area'  ,'value' => "Karachi" );
// $field_data[3] = array('field'=>'Area'  ,'value' => "Karachi" );
// $field_data[4] = array('field'=>'Area'  ,'value' => "Karachi" );
// $field_data[5] = array('field'=>'Area'  ,'value' => "Karachi" );
// $field_data[6] = array('field'=>'Area'  ,'value' => "Karachi" );
// $post_string = "";
// $image_y = sizeof($field_data)*2*5 + 20;
// for ($i=0; $i < sizeof($field_data); $i++){
// 		$post_string .= " \n ".$field_data[$i]['field']." : ".$field_data[$i]['value']." \n ";
// }
	require('core/fpdf/fpdf.php');
//  $pdf = new FPDF();
//  $pdf->AddPage();
//  $pdf->SetFont('Arial','B',16);
 
//  $info = getimagesize($bsx);
//  $pdf->MultiCell(0,5,$post_string,0);
//  $pdf->Image($bsx,10,$image_y,$info[0],$info[1],'png');
//  $pdf->Output('F');


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
				echo "cURL Error #:" . $err;
			}
			else{
	 			//$data_compose = json_decode($response,true);
				echo $response;
			}
		}
	}
}

?>
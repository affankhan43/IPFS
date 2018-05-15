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
		echo "Done Successfully";
	}
}

?>
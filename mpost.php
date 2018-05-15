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
//  $pdf->MultiCell(0,5,$post_string,0);
//  $pdf->Image('bitcoin.png',10,$image_y,30);
//  $pdf->Output('F');


if(isset($_POST['msg']) && isset($_POST['form_data']) && isset($_POST['fileData']) && $_POST['msg'] == "make_pdf"){
	$post_string = "";
	$image_y = sizeof($_POST['form_data'])*2*5 + 20;
	for ($i=0; $i < sizeof($_POST['form_data']); $i++){
		$post_string .= " \n ".$_POST['form_data'][$i]['name']." : ".$_POST['form_data'][$i]['value']." \n ";
	}
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	$pdf->MultiCell(0,5,$post_string,0);
	$pdf->Image($_POST['fileData'],10,$image_y,30);
	$filename = uniqid().'.pdf';
	$pdf->Output($filename,'F');
	echo "Done Successfully";
}

?>
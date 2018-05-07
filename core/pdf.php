<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');
$pdf->Cell(40,50,'Hello World!');
$pdf->Output();

// if(isset($_POST['action']) && $_POST['action'] == 'savepdf'){
//
//
//
// }


 ?>

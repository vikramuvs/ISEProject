<?php
require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');
$pdf->Output('I','doc.pdf');
//$pdf->Output('D','doc.pdf');

// echo time();

?>

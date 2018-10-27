<?php
require('ean13.php');

$pdf=new PDF_EAN13();
$pdf->AddPage();
$pdf->EAN13(20,20,'abcd',12,0.7);
$pdf->Output('I','doc.pdf');
?>
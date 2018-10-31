<?php
require('ean13.php');

$pdf=new PDF_EAN13();
$pdf->AddPage();

//$pdf->SetFont('Arial','B',16);

$pdf->EAN13(20,20,'abcd12123',12,0.7);
$pdf->Cell(5,85,'To,');
$pdf->Cell(5,100,'The HOD,');
$pdf->Ln(1);
$pdf->Cell(5,110,'    Dept. of Chemical Engineering,',0,0,'L');
$pdf->Ln(1);
$pdf->Cell(5,120,'    Ramaiah Institute of Technology,',0,0,'L');
$pdf->Ln(1);
$pdf->Cell(5,130,'    Bengaluru.',0,0,'L');
$pdf->Ln(1);
$pdf->Cell(5,150,'    Sir/Madam,',0,0,'L');
$pdf->Ln(1);
$pdf->Cell(5,160,'                      SUBJECT:',0,0,'L');
$pdf->Cell(5,160,'                                    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',0,1,'L');








$pdf->Output('I','doc.pdf');
?>
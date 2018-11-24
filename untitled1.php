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
// $pdf->Cell(5,160,'                      SUBJECT:',0,0,'L');
// $pdf->Cell(5,160,'                                    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',0,1,'L');
$pdf->Write(5, 'SUBJECT: xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
$pdf->Write(5, 'Flowing text example is theis. Lorem orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');


$pdf->Output('I','doc.pdf');
?>
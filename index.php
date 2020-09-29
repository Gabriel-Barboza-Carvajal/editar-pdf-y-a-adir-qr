<?php

use setasign\Fpdi\Fpdi;

require_once('fpdf181/fpdf.php');
require_once('fpdi2/src/autoload.php');
require_once 'phpqrcode/qrlib.php';
$pdf = new FPDI();
$pdf->AddPage();
$pdf->setSourceFile('sample.pdf');
$tplIdx = $pdf->importPage(1);
$pdf->useTemplate($tplIdx);
$pdf->SetFont('Arial', 'B', '24');
$pdf->SetXY(50, 100);
// $pdf->Write(10,'www.ApnaCode.com','https://www.apnacode.com');
QRcode::png("texto cualquiera2","qr.png");
$pdf->Image("qr.png", $pdf->GetPageWidth() - 40, $pdf->GetPageHeight() - 40, 30, 30);
$pdf->Output('sample.pdf', 'F');

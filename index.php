<?php

use setasign\Fpdi\Fpdi;

require_once('fpdf181/fpdf.php');
require_once('fpdi2/src/autoload.php');
require_once 'phpqrcode/qrlib.php';
$pdf = new FPDI();
$pdf->AddPage();
$pdf->setSourceFile('solicitud1.pdf');
$tplIdx = $pdf->importPage(1);
$pdf->useTemplate($tplIdx);
$pdf->SetFont('Arial', 'B', '24');
$pdf->SetXY(50, 100);
// $pdf->Write(10,'www.ApnaCode.com','https://www.apnacode.com');
date_default_timezone_set('America/Costa_Rica');
$dt2 = date("Y-m-d H:i:s");
$num=rand(1000,10000);
QRcode::png(("Aprobado por Lidieth RRHH ").$dt2." [cod] ".$num,"qr.png");
QRcode::png(("Aprobado por Lidieth RRHH ").$dt2." [cod] ".$num,"qr1.png");
QRcode::png(("Aprobado por Lidieth RRHH ").$dt2." [cod] ".$num,"qr2.png");
$pdf->Image("qr.png" ,  $pdf->GetPageWidth()  -  40 , $pdf->GetPageHeight() - 40, 30, 30);
$pdf->Image("qr1.png", $pdf->GetPageWidth()   - 120 , $pdf->GetPageHeight() - 40, 30, 30);
$pdf->Image("qr2.png", $pdf->GetPageWidth()   - 200 , $pdf->GetPageHeight() - 40, 30, 30);
$pdf->Output('solicitud1-modificado.pdf', 'F');

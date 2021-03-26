<?php

use setasign\Fpdi\Fpdi;

require_once 'fpdf181/fpdf.php';
require_once 'fpdi2/src/autoload.php';
require_once 'phpqrcode/qrlib.php';
$pdf = new FPDI();
$pdf->AddPage();
$pdf->setSourceFile('solicitud.pdf');
$tplIdx = $pdf->importPage(1);
$pdf->useTemplate($tplIdx);
$pdf->SetFont('Arial', 'B', '24');
$pdf->SetXY(50, 100);

// $pdf->Write(10,'www.ApnaCode.com','https://www.apnacode.com');

date_default_timezone_set('America/Costa_Rica');
$dt2 = date("Y-m-d H:i:s");
$num = rand(1000, 10000);

QRcode::png(("Aprobado por Juan Funcionario ") . $dt2 . " [cod] " . $num, "qr.png");
QRcode::png(("Aprobado por Roberto JEFE ") . $dt2 . " [cod] " . $num, "qr1.png");
QRcode::png(("Aprobado por Lidieth RRHH ") . $dt2 . " [cod] " . $num, "qr2.png");

$pdf->Image("qr.png", $pdf->GetPageWidth() - 180, $pdf->GetPageHeight() - 54, 15, 15);
$pdf->Image("qr1.png", $pdf->GetPageWidth() - 103, $pdf->GetPageHeight() - 54, 15, 15);
$pdf->Image("qr2.png", $pdf->GetPageWidth() - 55, $pdf->GetPageHeight() - 54, 15, 15);
$pdf->Output('solicitud1_ultima_version.pdf', 'F');

echo '<strong><p>firma realizada</p></strong>';

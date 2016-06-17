<?php 
include('db.php');
include('functions.php');
require('pdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetY(75);
$pdf->SetFont("Arial","",15);
	date_default_timezone_set("Asia/Calcutta");
				$time=date('y/m/d h:i:s');

// Title
				$pdf->SetFont("helvetica","",10,'');
    



	//$pdf->SetX(-52);
$pdf->Cell(85,10," Customer Name : chandan jha","0","1",C);
$pdf->Cell(85,10,"Email : chandanjha.7@gmail.com","0","1",C);

$pdf->Cell(85,10," Pickup Address : H 187 , Gurgaon phase-2","0","1",C);
$pdf->Cell(85,10,"Reporting Time :{$time}","0","1",C);

$pdf->Cell(85,10,"Service Person : Mr Amodh Kumar","0","1",C);








$pdf->output();
$invoicename=get_invoice_number();
$content = $pdf->Output($invoicename,'F');




?>
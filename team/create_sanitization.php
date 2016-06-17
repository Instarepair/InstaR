<?php 
include('../db.php');
include('functionstats.php');
require('morepdf/pdf/fpdf.php');



$cmd="select count(sl) as countall from sanitize_orders";
  $result=mysql_query($cmd);
             while($row=mysql_fetch_array($result))
                         {
                          $countall=$row['countall'];

                        }



$k=8;
for($k=0;$k<($countall);$k++){
$sl=$k;
echo 'came to the loop'.$sl;
// geneare all the values for this id over here 


    $arr1=array();
    $arr1=fetch_all_invoice_data($sl);

$name=$arr1[0]['customer'];
$model=$arr1[0]['model'];
$contact=$arr1[0]['contact'];
$email=$arr1[0]['email'];
$paytotal=$arr1[0]['netpay'];
$date=$arr1[0]['date'];
$bill=$arr1[0]['bill'];




// creating the invoice here 



$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetY(75);
$pdf->SetFont("Arial","",15);
$time2=get_present_time();

// Title
        $pdf->SetFont("helvetica","",10,'');
    





// the header par of pdf =======================================================================================================





    // To be implemented in your own inherited class
date_default_timezone_set("Asia/Calcutta");
                          $time2=date('y-m-d');
                   
  $pdf->Image('ss.png',10,6,30);
  $pdf->Ln(20);
$pdf->SetFont("Arial","",15);
$pdf->SetY(5);
$pdf->SetX(122);
  $pdf->Cell(0,2,"INSTAREPAIR SOLUTIONS PVT LTD.","0","1",C);
    $pdf->Ln(4);
    $pdf->SetX(122);
   
$pdf->Ln(2.8);
$pdf->Cell(0,2,"-------------------------------------------------------------------------------------------------------------------------------","0","1",C);
$pdf->SetY(85);
$pdf->SetX(122);
$pdf->SetFont("Arial","B",8);


// left side details ===============================
    $pdf->Ln(4);
        $pdf->Ln(4);$pdf->SetX(-322);
$pdf->SetFont("Arial","",17);


    $pdf->Ln(4);
      $pdf->Cell(0,2,"","",11);
$pdf->SetFont("Arial","B",11);
    $pdf->Cell(0,2,"BILLING DETAILS :","",11);  $pdf->Ln(4);  $pdf->Ln(4);
    $pdf->SetFont("Arial","",9);

      $pdf->Cell(0,2,"{$name}","0","1");
    $pdf->Ln(4);
  $pdf->Cell(0,2,"{$date}","0","1");
    $pdf->Ln(4);

  $pdf->Cell(0,2,"{$email}","0","1");
      $pdf->Ln(4);
  $pdf->Cell(0,2,"{$contact}","0","1");
       $pdf->Ln(4);

// left side detailsends here ================================

  // right side detailos starts here ========================================================

$pdf->SetY(35);
      $pdf->SetX(0);              $pdf->Ln(4);
              $pdf->Cell(0,2,"","0","1",C);
              $pdf->SetFont("Arial","B",14);
        $pdf->Cell(0,2,"Invoice number: IN{$trans_id}","0","1",C);
              $pdf->Ln(4);
  $pdf->Cell(0,2,"Date :{$time2}","0","1",C);
      $pdf->Ln(4);


  // right side details will ends here =========================================================================




 $pdf->SetFont("Arial","",10);

$pdf->SetY(135);



  //$pdf->SetX(-52);


$pdf->Cell(145,10,"Your Device for sanitization : {$model}","1","1");




$pdf->Cell(145,10," PAYABLE AMOUNT:   INR {$paytotal}","1","1");


$pdf->Cell(145,10," COUPON CODE:  FREECARE100","1","1");



$pdf->Cell(145,10," OVERALL CHARGES:   INR {$bill}","1","1");
// =========================== new pdf examples ================================================= 






//============================= new pdf examples ends hre

$trans_id=$arr1[0]['sl'];

//$pdf->output();
$invoicename='invoices/SANTIZ'.$trans_id.'.pdf';
$content = $pdf->Output($invoicename,'F');

// update this invoice in the databse 


$cmd="update sanitize_orders set invoice='$invoicename' where sl='$sl'";
$result=mysql_query($cmd);




}
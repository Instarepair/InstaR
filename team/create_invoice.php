<?php 
include('../db.php');
include('functionstats.php');
require('morepdf/pdf/fpdf.php');






if(isset($_POST['create_pdf']))
{



// geneare all the values for this id over here 

$name=$_POST['name'];
$model=$_POST['model'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$paytotal=$_POST['total'];
$date=$_POST['date'];
$bill=$_POST['bill'];

echo 'cammmem';


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


//$pdf->output();
$invoicename='manualpdf/RECIEPT'.'_'.$bill.'.pdf';
$content = $pdf->Output($invoicename,'F');

// update this invoice in the databse 



echo 'camme  e toi th last looop ';


if($result)
{
echo 'yess';
  $createdpdf=1;
  $invoicedone=1;

  $linkcreated=$invoicename;
}





}





if(isset($_POST['updatevendor']))
{
      $code=$_POST['code'];

     $vendor=$_POST['vendor'];
               $service=$_POST['service'];
          $address=$_POST['address'];
      $sl=$_POST['sl'];
               $contact=$_POST['contact'];

$service=$_POST['service'];

$cmd="update vendordetails set code='$code',service='$service',address='$address',vendor='$vendor',contact='$contact' where sl='$sl'";
$result=mysql_query($cmd);

echo 'command is '.$cmd;

if($result){
$show_notify=1;
$optitle='VENDOR ADDED';
$opbody='Congratulations admin ! You have successfully added the new vendor '.$vendor;



}


}

if(isset($_POST['submitnewvendor']))
{
      $code=$_POST['code'];

      $sl=$_POST['sl'];

     $vendor=$_POST['vendor'];

          $address=$_POST['address'];

               $contact=$_POST['contact'];

$service=$_POST['service'];
$cmd="insert into vendordetails(code,service,inhouse,vendor,address,contact) values ('$code','$service','$inhouse','$vendor','$address','$contact')";
$result=mysql_query($cmd);

if($result){
$show_notify=1;
$optitle='VENDOR ADDED';
$opbody='Congratulations admin ! You have successfully added the new vendor '.$vendor;



}

}



if($_SESSION['adminlogged']=='')
{


redirectadmin();
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin -Instarepair</title>

    <link rel="shortcut icon" type="image/ico" href="favicon.ico" />
  <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />




    <!-- ======  the css styling party start  here -= ============================ -->
<style type="text/css">

.navbar {
    border-radius: 0px;
    background: black;
}

div#performed_op
{


  position: fixed;
    z-index: 33;
    margin-left: 39%;
    margin-right: auto;
    margin-top: 196px;


}
.btn2{

  background: #F8B910;
    color: white;
    width: 143px;
    height: 40px;
    font-size: 20px;
    text-transform: uppercase;
    border: none;
}

</style>




    <!-- -=-============= the css part ends here ================================ -->
</head>
<body>

<div class='row' >
    <div class="col-md-4 col-sm-4" id='performed_op' style='  display: <?php if(isset($show_notify))
echo 'block';
else
echo 'none';    ?>' >
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                    <?php echo $optitle;?>
                        </div>
                        <div class="panel-body">
                            <p><?php echo $opbody;?></p>
                        <div class="panel-footer">
                         <a href='javascript:void(0)' onclick="document.getElementById('performed_op').style.display='none'"> close it</a>
                        </div>
                    </div>
                </div>
</div>

            <ul class="nav navbar-top-links navbar-right">
         
                <!-- /.dropdown -->
                <li class="dropdown">
                  
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                           <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('allwise').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>All Vendors detail</strong>
                                        <span class="pull-right text-muted"></span>
                                    </p>
                                
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
               <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('addnew').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>Add new vendor </strong>
                                        <span class="pull-right text-muted"></span>
                                    </p>
                                
                                </div>
                            </a>
                        </li>



                               <li>
               <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('updatelast').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>Update last vendor </strong>
                                        <span class="pull-right text-muted"></span>
                                    </p>
                                
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
       
               
                     
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
     
            
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
            <?php
          include('assets/left_sidenavbar.php');

       ?>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
       <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                      <small>INSTAREPAIR CREATE INVOICE </small>
                        </h1>
                    </div>
                </div> 






                <div class="row" id='uploadedinv' style='display:<?php
if(isset($invoicedone))
  echo 'block';
else
  echo 'none';

                ?>'>


<p>
Congratulations your invoice is created here ! You can view as well as download it from below
<a href="<?php  echo $linkcreated;?>" target='blank'>VIEW/DOWNLOAD</a>


</p>


                </div>
         
            <div class="row" id='allwise'  style='display:<?php
if(!isset($invoicedone))
  echo 'block';
else
  echo 'none';

                ?>'>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style='background:black;color:white'>
                           All vendor details
                        </div>
                        <div class="panel-body">





                          <!-- ===== invocing form starts here ======-->

<form action='#' method='post' >


<label>Enter name of the customer</label><br><br>
<input type="text" name="name"><br><br>
<label>Enter email of the customer</label><br><br>

<input type="text" name="email"><br><br>

<label>Enter model of the device </label> <br><br>
<input type="text" name="model"><br><br>



<label>Enter contact number of customer</label><br><br>
<input type="text" name="contact"><br><br>


<label>Enter date of operation peroformed for this invoice</label><br><br>
<input type="text" name="date"><br><br>


<label>Enter valid bill amount in Rs. </label><br><br>
<input type="text" name="bill"><br><br>



<input type="submit" name='create_pdf' style='background:green;color:white;'><br><br>

</form>


                          <!-- ==== invoicinf form ends here ========= -->
              
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>

                <!-- /. ROW  -->



<!-- ===== ************************** the customer transaction table in device wise sorting  ==================== -->




            <div class="row" id='addnew' style='display:none'>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style='background:black;color:white'>
                        ADD A NEW VENDOR HERE
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead> 
<tr> 

<th>code</th> 
<th>Venodor </th> 
<th>service</th>
<th>In House</th>


</tr> 
</thead> 
<tbody> 

<form action="#" method="post" >
<tr>
<td><input type="text" name="code" ></td>
<td><input type="text" name="vendor" ></td>
<td><select name="service" >

  <option>choose his service</option>
<option value='computer'>computer & desktops</option>

<option value='tablets'>Mobile & Tablets</option>
</select>
</td>


<td><select name="inhouse" >

  <option>whether inhouse ?</option>
<option value='1'>Yes</option>

<option value='0'>No</option>
</select>
</td>
</tr>

<tr>
<th>Address</th><th>Contact</th>
</tr>
<tr>
<td><textarea name="address" >

</textarea>
</td>
<td><input type="text" name="contact" ></td>



</tr>
<tr>

<td>
<input type="submit" class='btn2' name='submitnewvendor' >

</td>
</tr>

</form>





</table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->



<!-- ===== ************************** the customer transaction table in device wise sorting  ==================== -->


<!-- =========================== updater trhe lastr vensdors starts here ============================================ -->

          
<!-- ===== ************************** the customer transaction table in device wise sorting  ==================== -->




            <div class="row" id='updatelast' style='display:none'>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style='background:black;color:white'>
                        UPDATE THE EXISTING VENDORS           </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                                              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead> 
<tr> 
<th>#</th> 
<th>code</th> 
<th>Venodor </th> 
<th>service</th>
<th>address</th>
<th>contact</th>

</tr> 
</thead> 
<tbody> 

<?php 

        for($r=0;$r<sizeof($arr1);$r++)
        {



?>


<form action="#" method="post" >
          <tr><td><input type="text" value="<?php echo $r+1; ?>" name="sl"></td>
              <td><input type="text" value="<?php echo $arr1[$r]['code']; ?>" name="code"></td>
               <td><input type="text" value="<?php echo $arr1[$r]['vendor']; ?>" name="vendor"></td>
    <td><input type="text" value="<?php echo $arr1[$r]['service']; ?>" name="service"></td>
<th><input type="text" value="<?php  echo $arr1[$r]['address'];?>" name="address"></th>
       <th><input type="text" value="<?php  echo $arr1[$r]['contact'];?>" name="contact"></th>  
       <th><input type="submit" value="update" name="updatevendor"></th>  
</form>

<?php } ?>


</table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->



<!-- ===== ************************** the customer transaction table in device wise sorting  ==================== -->




<!-- =-================ udpate the lastr vendors ends hetre ========================================================== -->1







        </div>
               <footer><p>All right reserved.</p></footer>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   <script type="text/javascript">


                      function closeallpopup()
{

   document.getElementById('allwise').style.display='none';
    document.getElementById('addnew').style.display='none';


}

   </script>
</body>
</html>


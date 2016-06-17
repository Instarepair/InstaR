<?php 
include('../db.php');
include('functionstats.php');

if(isset($_GET['logoutpanel']))
                  {
                                    
                        logout_panel_users();

                  }




if(isset($_GET['forward_id']))
{
  $order=array();
  $sl=$_GET['forward_id'];
    $cmd="select * from transaction where trans_id='$sl'";
    $result=mysql_query($cmd);
                  while($row=mysql_fetch_array($result))
                  {
                     array_push($order,$row);
                  }
                     

}






if(isset($_POST['allot_vendor']))
{
      $orderid=$_POST['orderid'];
      $vendorcode=$_POST['vendorcode'];
  $arr4=get_order_details($orderid);

  //================================== get pcikup boy name  ==============
$vendorname=get_vendors_name($vendorcode);
$address=get_vendors_address($vendorcode);
$merchant=$arr4[0]['pickupperson'];
            $cmd="select * from pickupboy where personcode='$merchant'";
            $result=mysql_query($cmd);


                  while($row=mysql_fetch_array($result))
                  {
                     $pickupboyname=$row['person'];
                     $pickupphone=$row['phone'];
                  }
  $addresslower=strtolower($address);
  $msg="Dear ".$pickupboyname." your vendor for transaction id : ".$orderid." is ".$vendorname." location : ".$addresslower;
sendmessage($msg,$pickupphone);
echo $msg;

$cmd="Update transaction set vendor_alloted='$vendorcode' where trans_id='$orderid'";
$result=mysql_query($cmd);

echo $cmd;

// update this transaction in the vendor alloted table  for application side interface

add_app_side_vendor_allotment($vendorcode,$orderid);












}
// ========================= alloting the vendor to pickup boy =============================
 
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panga Cricket</title>
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
div#performed_op
{


  position: fixed;
    z-index: 33;
    margin-left: 39%;
    margin-right: auto;
    margin-top: 196px;


}
div#top_covers:hover{


  zoom:1.2;
}

.navbar {
    border-radius: 0px;
    background: black;
}


.edit_small{

    margin-top: 10px;
    margin-right: 94px;
float: right;
      color: white;
    background: #21A0C5;
    font-size: 13px;
    font-size: 11px;
    padding: 7px;
    border-radius: 5px;

}

</style>




    <!-- -=-============= the css part ends here ================================ -->
</head>
<body>



<?php
include_main_db();
$personcode=$order[0]['pickupperson'];
     $cmd="select * from pickupboy where personcode='$personcode'";
            $result=mysql_query($cmd);


                  while($row=mysql_fetch_array($result))
                  {
                     $pickupboyname=$row['person'];
                  
                           $pickupphone=$row['phone'];
                  }

                          
?>
<!-- -=============== update order ka notifications starts here ================================= -->

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

<!-- ================ updaTE ORDER KA NOTIFICARIONS ENDS HERE ==================================== -->





          <div id='show_notify' class="choose_captain" style=';    margin-top: 122px;
    display: block;
    background: #E5EBF2;
    max-width: 500px;
    z-index: 333;
    position: fixed;
    padding: 16px;
    border: 1px groove black;
    margin-left: 36%;display:none' >
                         
                          <span id="success_notify_text" style='color:red;display:none'>MESSAGE HAS BEEN POSTED SUCCESSFULLY </span>

                          <form action="#" method="post" >
                        <input type="text" name='useremail' style='border:none'  class="textbar_popup" id='notify_email' readonly><br><br>

                      <textarea name="usermessage" id='usermessage' class="textbar_popup" style="width:320px;height:120px;">

                          </textarea><br><br>

                          <a href="javascript:void(0)" style="background-color:green;color:white" class="btn join-btn" onclick="submit_personal_notification()">
                              POST TO USER DASHBOARD</a>
                              </form>



                         </div>
    <div id="wrapper" style='background:black'>
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html" style='    background: black;'>
<img src="../images/insta-repair-online-phone-tablets-repair-in-delhi-ncr.png" width='200px'>



                </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
         
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                   choose service here
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                           <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('allorders').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>All orders</strong>
                                        <span class="pull-right text-muted">total:1200</span>
                                    </p>
                                
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
               <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('devliveredorders').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong> ALL delivered orders</strong>
                                        <span class="pull-right text-muted">total:1200</span>
                                    </p>
                                
                                </div>
                            </a>
                        </li>

                                    <li>
               <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('inprogressorders').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong> In Progress Orders</strong>
                                        <span class="pull-right text-muted">total:1200</span>
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



              <!-- =================== ADDING THE GRAPHIOCAL STAT5S AT THE TOP =========================================================== -->


<?php

if(isset($_GET['trans_id']))

  $trans_id=$_GET['trans_id'];
        $arr1=get_order_details($_GET['trans_id']);




?>

 <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12" id='top_covers'>
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3><?php echo get_total_orders_on_website();?></h3>
                            </div>
                            <div class="panel-footer back-footer-green">
                               TOTAL ORDERS

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12" id='top_covers'>
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                                <h3>

<?php


echo website_total_sales(); 





?>

                                </h3>
                            </div>
                            <div class="panel-footer back-footer-blue">
                                Sales

                            </div>
                        </div>
                    </div>
                 
                    <div class="col-md-3 col-sm-12 col-xs-12" id='top_covers'>
                        <div class="panel panel-primary text-center no-boder bg-color-brown">
                            <div class="panel-body">
                                <i class="fa fa-users fa-5x"></i>
                                <h3><?php echo get_total_delivered_orders_on_website();?> </h3>
                            </div>
                            <div class="panel-footer back-footer-brown">
                               Delivered Orders

                            </div>
                        </div>
                    </div>
                </div>





<!-- ======  THE GARPHICAL SYTATS AT THE ROP TEND HERE ===================================================================== -->
       <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                      <small>View all Orders  </small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
   
<div class="container" style='padding-top:12vw;'>


<!-- ============== entire set opf last page ========================================================================== -->



<?php
include_main_db();
$personcode=$order[0]['pickupperson'];
     $cmd="select * from pickupboy where personcode='$personcode'";
            $result=mysql_query($cmd);


                  while($row=mysql_fetch_array($result))
                  {
                     $pickupboyname=$row['person'];
                  
                           $pickupphone=$row['phone'];
                  }

                          
?>





  <!-- ========================= send vendor details ================================================================ -->


<div class="container" style='padding-top:12vw'>

  <div class="panel-heading" style='    background: black;'>
        <h4 class="panel-title" style='color:white'>
VENDOR ALLOTMENT 
          </h4>
        </div>

  </p>                                                                                      
  <div class="table-responsive">          
  <table class="table" style='font-size: 14px;'>
    <thead>
      <tr>
        <th>#</th>
        <th>Vendor </th>
          <th>Service</th>
          <th>location address</th>
      

       
        <th>operations</th>
        
      </tr>
    </thead>
    <?php 

    $arr2=getallvendordetails('mobile');


    ?>
    <tbody>
      <?php 
          for($r=0;$r<sizeof($arr2);$r++)
                    {
      ?>
      <tr style="<?php 
          if($r%2==0)
            echo '    background-color: rgba(255, 191, 84, 0.7);';
          else
            echo 'background-color: rgba(186, 186, 186, 0.6);';
      ?>">
        <td><?php echo $r+1;?></td>
        <td><?php echo '( '.$arr2[$r]['Name'].' )';?></td>
                <td><?php echo $arr2[$r]['Type'];?></td>
        <td><?php echo $arr2[$r]['Address'];?></td>
 
     
                <td><?php echo $arr2[$r]['Mobile'];?></td>
                  
      
    <td><a href="javascript:void(0)" onclick="
document.getElementById('forwardvendor').style.display='block';
document.getElementById('allot_vendorservice_id').style.display='none';
document.getElementById('vendorservice_forward_form').style.display='block';
document.getElementById('vendor').value='<?php echo $arr2[$r]['VenderId'];?>';
document.getElementById('vendor_phone').value='<?php echo $arr2[$r]['Mobile'];?>';
      " class="btn btn-default" 
      style="background-color:green;color:white;opacity:0.78">FORWARD THIS VENDOR TO PICKUP BOY !</a></td>
      </tr>
      <?php } ?>

      
    </tbody>
  </table>
  </div>
</div>

</div>
  
<div class="container">


      <a href='javascript:void(0)'  class="btn btn-default" 
      style="background-color:green;color:white;opacity:0.78" onclick="document.getElementById('addnewpickupboy').style.display='block'">ADD NEW PERSON </a>


  </div>










  <!-- =================================== send vendor details ends here ============================================= -->


<!-- =========================== add a new person  ================================================================= -->






<!-- ================== add a new person ================================================================================ -->

      <div class="modal fade" id='order_details' style="text-align: center;
    opacity: 1;padding-top:120px;
    display: block;
    color: white;max-height:500px;
    padding-top: 25px;
    margin-top: 100px;
    background: #0C0A0A;
    width: 60%;min-width:320px;
    max-width:500px;
    margin-left: -30%;
    left: 50%;">

<center>


<br>
<div class="panel-heading" style='    background: white;'>
        <h4 class="panel-title" style='color:black'>

     
  <?php 

  if($order[0]['vendor_alloted']==NULL)
    echo 'ALLOT A VENDOR SOON ';
  else
    echo "<strong style='color:red'> WARNING :</strong>VENDOR ALREADY ALLOTED :".get_vendors_name($order[0]['vendor_alloted']);
          ?>
   </h4>
      </div>
        <table class='table-bordered' style='    color: white;
    margin-top: 5vw;
    font-size: 16px;'>
         <tr><td>Transaction Id ID: </td><td> <?php echo $order[0]['trans_id']; ?></td></tr>

          <tr rowspan='3' style='font-size:16px;'><td>  Current Status: </td><td><?php echo $order[0]['status']; ?></td></tr>
          <tr><td>  Pick Up time: </td><td><span style='color:red'><?php echo  $order[0]['pickuptime'].' at '.$order[0]['pickupdate']; ?></span></td></tr>
          <tr><td>  Customer Name:  </td><td><?php echo $order[0]['customer']; ?></td></tr>

         <tr><td> Pickup address: </td><td><?php echo $order[0]['pickupaddress']?></td></tr>
         <tr><td>   Service for : </td><td> <?php echo $order[0]['brand'].$order[0]['model'].'('.$order[0]['devicetype'].')'; ?></td></tr>
   
        </table>
                <br>
                <a id='allot_service_id' href="javascript:void(0)"
onclick="  
    document.getElementById('order_details').style.display='none';"
                 class="btn btn-default" 
      style="background-color:green;color:white;opacity:0.78">PROCEED</a>
<form action="#" method="post" style='display:none' id="service_forward_form">
  <input type="text" style="display:none" readonly  value='<?php echo $order[0]['trans_id']; ?>' name="orderid"><br>
  <label style='color: #94501B;'>Service being forwarded to :</label><br>

        <input type="text" style="border:none;background:none" readonly id="merchant" name="merchant"><br>
<label style='color: #94501B;'>Confirmation being sent at phone number :</label><br>
        <input ytpe="phone" style="border:none;background:none" readonly id="merchant_phone" name="merchant_phone"><br>




        <input type="submit" name="confirm_submit" value="YES PROCEED !" class="btn btn-default"  style="background-color:green;color:white;opacity:0.78" >

      </form>
</center>
        </div>



<!-- the header at top ============================ -->




                            
<!-- ================== popup for the venor alltment================================================================================ -->

      <div class="modal fade" id='forwardvendor' style="text-align:center;opacity:1;display:none;margin-top: 63px;
    width: 60%;
    max-height: 501px;
    box-shadow: rgb(34, 36, 38) 10px 10px 5px;
    margin-left: -30%;
    left: 50%;
    padding-top: 75px;
    background: white;">


<center>

<br>
<div class="panel-heading" style='    BACKGROUND: #FFD287;'>
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1" style='font-weight:bold'>SMS FORWARD TO ADMIN AND VENDOR</a>
        </h4>
      </div>

        <table class='table-bordered' style='width: 48%;
    color: black;
    font-size: 18px;
    margin-top: 2vw;
    font-size: 13px;'>
         <tr><td>Transaction Id ID: </td><td> <?php echo $order[0]['trans_id']; ?></td></tr>

          <tr><td>  Current Status: </td><td><?php echo $order[0]['status']; ?></td></tr>
          <tr><td>  Pick Up time: </td><td><span style='color:red'><?php echo  $order[0]['pickuptime'].' at '.$order[0]['pickupdate']; ?></span></td></tr>
          <tr><td>  Customer Name:  </td><td><?php echo $order[0]['customer']; ?></td></tr>

         <tr><td> Pickup address: </td><td><?php echo $order[0]['pickupaddress']?></td></tr>
         <tr><td>   Service for : </td><td> <?php echo $order[0]['brand'].'('.$order[0]['model'].')'; ?></td></tr>
   
     </table>


                <br>
                <a id='allot_vendorservice_id' href="javascript:void(0)"
onclick="  
    document.getElementById('order_details').style.display='none';"
                 class="btn btn-default" 
      style="background-color:green;color:white;opacity:0.78">ALLOT SERVICE</a>
<form action="#" method="post" style='display:none' id="vendorservice_forward_form">
  <input type="text" style="display:none" readonly  value='<?php echo $order[0]['trans_id']; ?>' name="orderid"><br>
  <label style='color: #94501B;'>service being forwarded to :</label><br>

        <input type="text" style="border:none;color:black" readonly id="vendor" name="vendorcode"><br>
<label style='color: #94501B;'>confirmation being sent at phone number  :<?php echo $pickupboyname; ?></label><br>
       <label style="color:grey">PICKUP PERSON :</label><?php echo $pickupphone; ?><br>
      <br>
        <input type="phone" style="border:none;color:black;display:none" readonly id="vendor_phone"
         name="merchant_phone"><br>



        <input type="submit" name="allot_vendor" value="YES PROCEED !" class="btn btn-default"  style="background-color:green;color:white;opacity:0.78" >

      </form>
</center>
        </div>

<!-- ============================== vendor allotmentg popup ends here =================================================== -->






















<!-- ====================================================================================================================== -->




 </div>
<!-- ===== ************************** the customer transaction table in device wise sorting  ==================== -->




       
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

   document.getElementById('allorders').style.display='none';
    document.getElementById('devliveredorders').style.display='none';
    document.getElementById('inprogressorders').style.display='none';

}

   </script>
</body>
</html>

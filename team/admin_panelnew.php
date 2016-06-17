<?php 
include('../db.php');
include('functionstats.php');

if(isset($_GET['logoutpanel']))
                  {
                                    
                        logout_panel_users();

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
            $result=mysql_query($cmd);echo $cmd;


                  while($row=mysql_fetch_array($result))
                  {
                     $pickupboyname=$row['Name'];
                     $pickupphone=$row['MobileNo'];
                  }
  
  $msg="Dear ".$pickupboyname." your vendor for transaction id : ".$orderid." is ".$vendorname." location : ".$address;
sendmessage($msg,$pickupphone);


$cmd="Update transaction set vendor_alloted='$vendorcode' where trans_id='$orderid'";
//$result=mysql_query($cmd);



}
// ========================= alloting the vendor to pickup boy =============================
 if(isset($_GET['logoutpanel']))
                  {
                                    


                                      unset( $_SESSION['alloteduser']);
                                      unset($_SESSION['allotedperson']);
                                        unset($_SESSION['redirectpage']);

                                                  ?>
<script>
window.location='panels.php';

</script>

<?php


                  }



                if(isset($_POST['newpickupsubmit']))
{

      $person=$_POST['person'];

  $address=$_POST['address'];

      $phone=$_POST['phone'];


      date_default_timezone_set("Asia/Calcutta");
        $time2=date('dmy');
        $fname=explode(' ',$person);
        $first=$fname[0];


        $service='PCK';
        $code=$service.'-'.$time2.$first;

  
          $cmd="insert into pickupboy(person,personcode,phone,address) values ('$person','$code','$phone','$address')";
          $result=mysql_query($cmd);








}
                if(isset($_POST['confirm_submit']))
{

      $merchant=$_POST['merchant'];
      $merchant_phone=$_POST['merchant_phone'];
      $orderid=$_POST['orderid'];

$time2=get_present_time();
      $cmd="update transaction set pickupperson='$merchant',lastupdate='$time2'
      where trans_id='$orderid'";
      $result=mysql_query($cmd);

//================================== get pcikup boy name  ==============


            $cmd="select * from techyuser where UserId='$merchant'";
            $result=mysql_query($cmd);

  while($row=mysql_fetch_array($result))
                  {
                     $pickupboyname=$row['Name'];
                     $pickupphone=$row['MobileNo'];
                  }   












//===================== get pcikup boy name 
$arr1=get_order_details($orderid);
$phone_customer=$arr1[0]['phone_customer'];
$customer=$arr1[0]['customer'];

$devicetype=$arr1[0]['devicetype'];
$pickuptime=$arr1[0]['pickuptime'].' on '.$arr1[0]['pickupdate'];
$address=$arr1[0]['pickupaddress'];
$phone_merchant=$merchant_phone;
$phone_admin=get_admins_phone();
$phone_customer=$arr1[0]['phonenumber'];
$link='www.instarepair.in/panels.php';
  $customermessage="Congratulations ".$customer." ! Your request for repair has been processed . Transaction ID : ".$orderid.", Order details : ".$devicetype.", . Pick Up address- ".$address.", Your device will be picked up between ".$pickuptime." by ".$pickupboyname.".";
sendmessage($customermessage,$phone_customer);
// echo $customermessage;

  $merchantmessage="Transaction ID : ".$orderid.", Customer Name : ".$customer." Phone : ".$phone_customer.", Order details : ".$devicetype.", . Pick Up address- ".$address.", Pick up Time : ".$pickuptime.".Press Link When Picked ".$link;
sendmessage($merchantmessage,$phone_merchant);
// echo $merchantmessage;
// ************* -======================= update application side pickup details techy table =============

//Updating abhinav_test.db
      $pickup = "pickup";     

        $srv_val = str_replace(' ', '', $orderid);         
       $values=getuserinformation($srv_val);
       $address=$values['pickupaddress'];
        $address1=$values['phonenumber'];
        $address2=$values['customer'];
        $brand=$values['brand'];
        $model=$values['model'];

        $brandname=$brand.$model;


       
       $cmdval="SELECT `GCMKey` FROM `techyuser` WHERE UserId='$merchant'";
        $resultval=mysql_query($cmdval);
        $arrval=mysql_fetch_array($resultval);
         $gcmkey=$arrval['GCMKey'];

        $msg="how are you?";
     

     
           
      // $con1=@mysql_connect("localhost","user3456","pass3456");
      // mysql_select_db("abhinav_test",$con1);     
      $cmd1="INSERT INTO `techypickupdelivery`(`UserId`, `Type`, `SRN`, `TerminalAddress`, `CustomerAddress`, `Name`, `Mobile`, `Modelname`) 
      VALUES ('$merchant','$pickup','$orderid','T3','$address','$address2','$address1','$brandname')";
      $result1=mysql_query($cmd1);
      if($result){

       $gcm_regid=$gcmkey;
       $registatoin_ids = array($gcm_regid);
       $message = array("price" => $msg);

      send_notification($registatoin_ids,$message);




//**********************************************************************************************************



    $cmd="update transaction set trackstatus='Assigned' where trans_id='$orderid'";

 $result=mysql_query($cmd);

}


$show_notify=1;
$optitle='FORWARD SUCCESSFULLY';
$opbody='Congratulations admin ! You have successfully forwarded   the order to '.$pickupboyname.' for the pickup of '.$orderid;

 }



        if(isset($_GET['logoutpanel']))
                  {
                                    


                                      unset( $_SESSION['alloteduser']);
                                      unset($_SESSION['allotedperson']);
                                        unset($_SESSION['redirectpage']);

                                                  ?>
<script>
window.location='panels.php';

</script>

<?php


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

?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
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
  <!-- -=============== update order ka notifications starts here ================================= -->

    <div class="col-md-4 col-sm-4" id='performed_op' style='  display: <?php if(isset($show_notify))
echo 'block';
else
echo 'none';    ?>;z-index: 33333;' >
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



<!-- =========================== add a new person  ================================================================= -->


<div class="modal fade" id="addnewpickupboy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style='opacity:1'>
        <div class="modal-dialog" role="document" style='    margin-top: 22vw;'>
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>            
            </div>
            <!-- modal body -->
            <div class="modal-body">
                <center>
                <form action="#" method='post'>

                        <input type="text" name='person' style="    margin-bottom: 16px;
    text-align: center;
    border-color: #86C4E2;"><BR>
                        <input type="text" name='address' style="    margin-bottom: 16px;
    text-align: center;
    border-color: #86C4E2;"><BR>
                        <input type="text" name='phone' style="    margin-bottom: 16px;
    text-align: center;
    border-color: #86C4E2;"><BR>
                    

                              <input type="submit" name="newpickupsubmit" value="ADD TO SERVICE" class="btn btn-default"  style="background-color:green;color:white;opacity:0.78" ><BR>

                        </form>



                              </center>


                </form>   
              



                      </div>
           <!-- modal body ends here -->
          
          </div>
        </div>
      </div>
      <!-- //mobile -->




<!-- ================== add a new person ================================================================================ -->

      <div class="modal fade" id='order_details' style="text-align: center;
    opacity: 1;padding-top:120px;
    display: block;
    color: white;max-height:500px;
    padding-top: 25px;
    margin-top: 100px;
    background: #0C0A0A;
    width: 60%;min-width:320px;
    max-width:500px;display: <?php if(isset($show_notify))
echo 'none';
else
echo 'block';    ?>' >
    margin-left: -30%;
    left: 50%;">

<center>
  <span>* Please view the order before forwarding :</span>
        <table class='table-bordered' style='    color: white;
    margin-top: 5vw;
    font-size: 16px;'>
         <tr><td>Transaction Id ID: </td><td> <?php echo $order[0]['trans_id']; ?></td></tr>

          <tr><td>  Current Status: </td><td><?php echo $order[0]['status']; ?></td></tr>
          <tr><td>  Pick Up time: </td><td><span style='color:red'><?php echo  $order[0]['pickuptime'].' at '.$order[0]['pickupdate']; ?></span></td></tr>
          <tr><td>  Customer Name:  </td><td><?php echo $order[0]['customer']; ?></td></tr>

         <tr><td> Pickup address: </td><td><?php echo $order[0]['pickupaddress']?></td></tr>
         <tr><td>   Service for : </td><td> <?php echo $order[0]['brand'].'('.$order[0]['devicetype'].')'; ?></td></tr>
   
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
    left: 50%;display: <?php if(isset($show_notify))
echo 'block';
else
echo 'none';    ?>' >
    padding-top: 75px;
    background: white;">

<center>


  <span>* Please view the order before forwarding : (This panel will send the selected vendor to the pickup person for futher repair of the device )</span>
        <table class='table-bordered' style='margin-top:5vw;font-size:13px'>
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
<label style='color: #94501B;'>confirmation being sent at phone number :</label><br>
        <input type="phone" style="border:none;color:black" readonly id="vendor_phone" name="merchant_phone"><br>



        <input type="submit" name="allot_vendor" value="YES PROCEED !" class="btn btn-default"  style="background-color:green;color:white;opacity:0.78" >

      </form>
</center>
        </div>

<!-- ============================== vendor allotmentg popup ends here =================================================== -->

<!-- the header at top============================ -->




<!-- =============== header ends here -=================== -->


<div class="container" style='margin-top:-12vw'>
  <h2>PICKUP ALLOTMENT  </h2>


  </p>                                                                                      
  <div class="table-responsive">          
  <table class="table" style='font-size: 11px;'>
    <thead>
      <tr>
        <th>S.No</th>
               <th>Userid</th>
        <th>Pickup/Technician </th>
             <th>Mobile</th>
        <th>Email</th>
     
      
          <th>Location</th>
     
       
        <th></th>
        
      </tr>
    </thead>
    <?php 

    $arr1=getallservicedetails_panel();


    ?>
    <tbody>
      <?php 
          for($r=0;$r<sizeof($arr1);$r++)
                    {
      ?>
      <tr style="<?php 
          if($r%2==0)
            echo '    background-color: rgba(255, 191, 84, 0.7);';
          else
            echo 'background-color: rgba(186, 186, 186, 0.6);';
      ?>">
        <td><?php echo $r+1;?></td>
        <td><?php echo $arr1[$r]['UserId'];?></td>
        <td><?php echo $arr1[$r]['Name'];?></td>
          <td><?php echo $arr1[$r]['MobileNo'];?></td>
     
                <td><?php echo $arr1[$r]['MailId'];?></td>
                        <td><?php echo $arr1[$r]['Location'];?></td>
      
    <td><a href="javascript:void(0)" onclick="
document.getElementById('order_details').style.display='block';
document.getElementById('allot_service_id').style.display='none';
document.getElementById('service_forward_form').style.display='block';
document.getElementById('merchant').value='<?php echo $arr1[$r]['UserId'];?>';
document.getElementById('merchant_phone').value='<?php echo $arr1[$r]['MobileNo'];?>';
      " class="btn btn-default" 
      style="background-color:green;color:white;opacity:0.78">ALLOT NOW !</a></td>
      </tr>
      <?php } ?>

      
    </tbody>
  </table>
  </div>
</div>


  
<div class="container">


      <a href='javascript:void(0)'  class="btn btn-default" 
      style="background-color:green;color:white;opacity:0.78;display:none" onclick="document.getElementById('addnewpickupboy').style.display='block'">ADD NEW PERSON </a>


  </div>





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

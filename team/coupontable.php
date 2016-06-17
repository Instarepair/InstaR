<?php 
include('../db.php');
include('functionstats.php');

 if(isset($_POST['notificationsubmit']))
{
      

    $text=mysql_real_escape_string($_POST['notificationtext']);

    $cmd="update customer set allnotifications='$text',notificationread='0'";
    $result=mysql_query($cmd);

  
      }


       if(isset($_POST['submitcoupon']))
{
      

    $title=mysql_real_escape_string($_POST['title']);
    $minmbill=mysql_real_escape_string($_POST['minmbill']);
        $disc_amount=mysql_real_escape_string($_POST['amount1']);
                $disc_type=mysql_real_escape_string($_POST['type1']);
$timenow=get_present_time();
                $description=mysql_real_escape_string($_POST['description']);
$cmd="insert into coupons_list set title='$title',description='$description',disc_type='$disc_type',disc_amount='$disc_amount',minm_discount='$minmbill',createdon='$timenow'";
$result=mysql_query($cmd);echo $cmd;
  
      }
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
</head>
<body>



          <div id='show_notify'  style=';    margin-top: 122px;
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

          <div id='addcoupons' class="choose_captain" style=';      margin-top: 122px;
    display: none;
    background: #D3D4D6;
    width: 36%;
    max-width: 500px;
    min-width: 320px;
    z-index: 333;
    position: fixed;
    text-align: center;
    padding: 16px;
    border: 1px groove black;
    margin-left: 36%;' >
                         


<strong>ADD NEW COUPON</strong>

                          <form action="#" method="post" >
                            <label>Enter some Coupon offer code</label><br>
                        <input type="text" name='title' style=''  class="textbar_popup" id='notify_email' ><br><br>


        <label>Enter some Description</label><br>
                        <input type="text" name='description' style=''  class="textbar_popup" id='notify_email'><br><br>
<br>
<label> choose discount type</label><br>
<select name='type1'>

<option value="percantage">percantage</option>
<option value="money">money</option>
</select>
<br><br>


                      <label>Enter Discount Amount</label><br>
                        <input type="text" name='amount1' style=''  class="textbar_popup" id='notify_email'><br><br>
     <br><br>


                      <label>Minimum applicable amount</label><br>
                        <input type="text" name='minmbill' style=''  class="textbar_popup" id='notify_email'><br><br>
     

      
        <input type="submit" name='submitcoupon' style="background-color: #CE6C10;
    ;color:white" class="btn join-btn">
                              </form>



                         </div>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">PangaLeague</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
         
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                           <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('activecoupons').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>ACTIVE COUPONS</strong>
                                        <span class="pull-right text-muted">total:1200</span>
                                    </p>
                                
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
               <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('addcoupons').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>ADD COUPONS</strong>
                    
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
                           <li><a href="adminlogout.php?signout=1"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                      <small>CASH COUPONS AND OFFERS </small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
               
            <div class="row" id='activecoupons'>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading" style='background:black;color:white'>
                       ACTIVE COUPONS(2)
                        </div>
              
<?php 
            $couponarr=get_discount_coupon_data();

?>
              <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead> 
<tr> 
<th>#</th> 
<th>TITLE</th>
<th>DESCRIPTION</th> 
<th>DISCOUNT TYPE</th>
<th>DISCOUNT AMOUNT</th>
<th>MINIMUM APPLICABLE </th>
<th>MAXIMUM DISCOUNT </th>
</tr> 
</thead> 
<tbody> 

<?php 

        for($r=0;$r<sizeof($couponarr);$r++)
        {
             
?>
          <tr><td><?php echo $r; ?></td>
               <td style='color:orange;font-weight:bold'><?php echo $couponarr[$r]['title']; ?></td>
    <td><?php echo $couponarr[$r]['description']; ?></td>
    <td><?php echo $couponarr[$r]['disc_type']; ?></td>
    <td><?php echo $couponarr[$r]['disc_amount']; ?></td>
    <td><?php echo $couponarr[$r]['minm_discount']; ?></td>
             <td><?php echo $couponarr[$r]['max_discount']; ?></td>




<?php } ?>


</table>
                            </div>


                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
         






                <!-- /. ROW  -->
            

<!-- =================== second row for update users ========================================= -->



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

   document.getElementById('activecoupons').style.display='none';
    document.getElementById('addcoupons').style.display='none';



}

   </script>
</body>
</html>

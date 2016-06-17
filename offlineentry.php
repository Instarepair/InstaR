<?php 
include('db.php');
include('functions.php');



				if(isset($_POST['submitorder']))
				{



	$brand='Off';
		$model='Off';
		$devicetype=$_GET['devicetype2'];
	$phone2=$_POST['phone2'];
		$pickupaddress=$_POST['pickupaddress2'];
			$freedate=$_POST['freedate2'];
				$freetime=$_POST['freetime2'];
					$name2=$_POST['name2'];
						$email2=$_POST['email2'];
				$trans_id=get_order_id();

$cmd="insert into transaction(sl,trans_id,customer,email,phonenumber,pickupaddress,pickuptime,pickupdate,brand,model,devicetype) values 
('','$trans_id','$name2','$email2','$phone2','$pickupaddress2','$freetime2','$freedate2','$brand','$model','$devicetype2')";

echo $cmd;
$result=mysql_query($cmd);

				}

?>

<html>
<head>
<title></title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  <link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body style="    background: url('img/back3.jpg');">









<div class="header" style='    background:black'> 
      <div class="logo">
         <h1><a href="index.html">
<img src="img/insta-repair-online-phone-tablets-repair-in-delhi-ncr.png" style="    max-width: 213px;
    pos: a;
    position: absolute;
    margin-top: -10px;"> 



         </a></h1>
      </div>
      <div class="top-nav" >
        <span class="menu"><img src="images/menu.png" style="    max-width: 31px;" alt=" " /></span>
        <ul class="nav1">
          <li><a href="#" data-toggle="modal" id="top_menu_self" data-target="#orderprocessed">
          <img src="img/phonegif.gif" style='max-width:32px' >  +91-8100 75 75 75 
          </a></li>
          <li><a href="#" data-toggle="modal" id="top_menu_self" data-target="#myModal2">Track Order</a></li>
        
            <li><a href="javascript:void(0)" data-toggle="modal" style="background: white;
    /* padding: 5px; */
    border-radius: 0px;
    color: black;display
    font-size: 15px;display:<?php 
if(isset($_SESSION['allotedperson']))
  echo 'none';
else
  echo 'block';




    ?>;
    font-weight: bold;
    /* font-family: arial; */
    vertical-align: middle;
    position: absolute;
    padding-top: 8px;
    padding-left: 12px;
    height: 14px;
    margin-top: -23px;
    padding-right: 12px;" >LOGIN</a></li>



                      <li><a href="?logoutpanel=1" data-toggle="modal" style="background: white;
    /* padding: 5px; */
    border-radius: 0px;
    color: black;
    font-size: 15px;display:<?php 
if(!isset($_SESSION['allotedperson']))
  echo 'none';
else
  echo 'block';




    ?>;
    font-weight: bold;
    /* font-family: arial; */
    vertical-align: middle;
    position: absolute;
    padding-top: 8px;
    padding-left: 12px;
    height: 14px;
    margin-top: -23px;
    padding-right: 12px;" >Hello , <?php echo $_SESSION['allotedperson']; ?> ( SIGNOUT )</a></li>


        </ul>
            <!-- script-for-menu -->
             <script>
               $( "span.menu" ).click(function() {
               $( "ul.nav1" ).slideToggle( 300, function() {
               // Animation complete.
                });
               });
            </script>
            <!-- /script-for-menu -->
      </div>
    
          <script src="js/classie.js"></script>
          <script src="js/uisearch.js"></script>
            <script>
              new UISearch( document.getElementById( 'sb-search' ) ); 
            </script>
        <!-- //search-scripts -->
        
      
      <div class="clearfix"> </div>
  </div>


<!-- =============== header ends here -=================== -->
      <center>
<div class="container" style='padding-top:12vw;background:white;color:black;    padding-top: 12vw;
    padding-bottom: 12vw;line-height:43px'>
 


<form action='#' method="post">


	<label style='color:black'>Please enter your name</label><br>


   <input type='text' id='name2' name='name2' placeholder='Enter Brand e.g Nokia' class='text_fld1' ><br>


   <label style='color:black'>What device you want to repair at instarepair</label><br>

   <input type='text' id='devicetype' name='devicetype2' placeholder='Enter device e.g Nokia' class='text_fld1' ><br>







   <label style='color:black'>What time date you  are free for  ?</label><br>

<!-- ================= get the fucking serial dates from here ================================== -->
<?php

$dates_inorder=get_serial_dates();

?>

						<select name='freedate2'   id='freedate' style='     max-width: 200px;
    height: 31px;
    font-size: 14px;
    color: black;
    border: 1px groove black;
    padding-top: 4px;'>

						<?php
						for($d2=0;$d2<sizeof($dates_inorder);$d2++)
						{ ?> 
									<option value="<?php echo $dates_inorder[$d2];?>"><?php echo $dates_inorder[$d2];?></option>
													<?php } ?>
						</select><br>
<br>




						<label style='color:black'>Enter Visiting Time  </label><br>
<select name="freetime2" id='freetime' style='    max-width: 200px;
    height: 31px;
    font-size: 14px;
    color: black;
    border: 1px groove black;
    padding-top: 4px;'>
<option value="8 AM-10 AM">8 AM-10 AM</option>
<option value="10 AM-12 AM">10 AM-12 AM</option>
<option value="12 AM-2 PM">12 AM-2 PM</option>
<option value="2 PM-4 PM">2 PM-4 PM</option>
<option value="2 PM-4 PM">2 PM-4 PM</option>
</select>		<br>




<label style='color:black'>Your Pickup adress ,please </label><br>


<textarea name='pickupaddress2'></textarea><br>



							

<label style='color:black'>Your Email</label><br>

						<input type="text" name="email2" id="email2" style='width:247px'>
<span id="invalid_email" style='color:red;display:none;font-size:11px;'>*Please enter a valid email</span>

						<br>





<label style='color:black'>Your Mobile No.</label><br>

					<input type="text" placeholder='10-digit mobile number' id="phone3" name="phone2" style='width:247px'><br>		



							<input type='submit' name="submitorder"  value='SUBMIT THE ORDER' style='    background: black;
    border-radius: 2px;
    /* max-width: 66px; */
    width: 200px;
    margin-left: 5px;
    margin-top: 15px;'>





</form>
  </div>
</center>
</body>	


</html>
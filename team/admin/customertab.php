<?php 
include('../db.php');
include('functionstats.php');
if(isset($_POST['submitnewdetails']))
{

        $name=$_POST['name'];
              $email=$_POST['email'];
                $username=$_POST['username'];
                  $phone=$_POST['phone'];
                  $userrake=$_POST['rake_affiliate'];
                    $gameplays=$_POST['gameplays'];
$cmd="update customer set name='$name',username='$username',phone='$phone',rake_affiliate='$userarake' where email='$email'";
$result=mysql_query($cmd);


}
  if(isset($_POST['depositmoney']))
{
      

    $amount=$_POST['money'];
    $email=$_SESSION['email'];
deposit_money_towallet($amount,$email);
  
      }


  if(isset($_GET['submitusernotify']))
{
      

    $usermessage=$_GET['usermessage'];
    $useremail=$_GET['useremail'];
     $cmd="update customer set personal_notifications='$usermessage',read_personal_notifications='0' where email='$useremail'";
              $result=mysql_query($cmd);
      }






                        if(isset($_GET['blockcustomer']))
{
      

    $email=$_GET['blockcustomer'];
            $cmd="update customer set blocked='1' where email='$email'";
            $result=mysql_query($cmd);

            $personal_notifications='Dear User You are blocked from PangaLeague for the next( Gameplys ! please contact the support team)';
$cmd="update customer set   personal_notifications='$personal_notifications',read_personal_notifications=0 where username='$username'";
        $result=mysql_query($cmd);
  
      }




                        if(isset($_GET['unblockcustomer']))
{
      

    $email=$_GET['unblockcustomer'];
            $cmd="update customer set blocked='0' where email='$email'";
            $result=mysql_query($cmd);
  
      }


  if(isset($_POST['edit_submit']))
{
            $name=$_POST['name'];
            $email=$_POST['email'];
            $address=$_POST['address'];
            $phone=$_POST['phone'];



$cmd="update customer set address='$address',name='$name',phone='$phone' where email='$email'";
$result=mysql_query($cmd);
        if($result)
        {

          $_SESSION['name']=$name;
          $_SESSION['email']=$email;
          $_SESSION['address']=$address;
          $_SESSION['phone']=$phone;
        }



}

if(isset($_POST['submit_register']))
{
      $name=$_POST['name1'];
      $email1=$_POST['email1'];
      $pass1=$_POST['pass1'];
      $pass2=$_POST['pass2'];
      
      if($pass1==$pass2)
         register_user($name,$email1,$pass1);
      

}
if(isset($_POST['submit_login']))
{

      $username=$_POST['username1'];
      $password=$_POST['pass1'];
      
      if($pass1==$pass2)
          loginfirst($username,$password);
      

}

if(isset($_GET['logout']))
{

signoutuser();



}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Demo</title>

<!-- Bootstrap 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="flags/Style.css" type="text/css">
<!-- Custom Style -->

<link rel="stylesheet" href="../css/responsive.css" type="text/css">
<!-- Font Awesome -->
<link rel="stylesheet" href="../css/font-awesome.css" type="text/css">
<link rel="stylesheet" href="../common.css">



<link rel="stylesheet" href="../common.css">
<!-- Google Font -->
<link href='http://fonts.googleapis.com/css?family=Lato:100,100italic,300,300italic,400italic,400,700,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <![endif]-->
    <style>
    #header {
        text-align: center;
    padding: 5px;
    height: 250px;
    background-color: #160A6E;
        background-image: url(cric1.png);
   
    background-size: 100% 100%;
}

    #nav{
    line-height:30px;
    background-color:white;
    height:600px;
    width:30%;
    float:left;
    padding:5px;
    float: left;	      
}
#section {
    width:70%;
    float:right;
    padding:10px;	
      background-color:white; 
    height:600px;	 
}

tr{
    line-height: 44px;
    font-size: 18px;
}
td{    border-top: 2px solid #f04b4b;
    border-bottom: 2px solid #f04b4b;}
.user{margin-top: 10px;
    margin-left: 21px;
    line-height: 28px;
    font-size: 18px;}
 .input{margin-left: 67px;
    line-height: 15px}  
  #btncolor{
background-color:#f2dede;
    border: 1px solid white;
    color: white;
  }
    </style>
</head>
<body>
<div id='invisible_div' style='width:100%;height:100%;background:black;position:fixed;z-index:4444;opacity:0.55;display:none' 
onclick="closeallpopup()">




</div>
<!-- =============== popup for user update =============== -->

<div id='updateuser_popup' class="choose_captain" style=';margin-top:122px' >





</div>
<!-- =============== poup for update user ka update ends here ==== -->



                                 <!-- =============== popup for user update =============== -->

                         <div id='show_notify' class="choose_captain" style=';margin-top:122px' >
                         
                          <span id="success_notify_text" style='color:red;display:none'>MESSAGE HAS BEEN POSTED SUCCESSFULLY </span>

                          <form action="#" method="post" >
                        <input type="text" name='useremail' style='border:none'  class="textbar_popup" id='notify_email' readonly><br><br>

                      <textarea name="usermessage" id='usermessage' class="textbar_popup" style="width:320px;height:120px;">

                          </textarea><br><br>

                          <a href="javascript:void(0)"style="color:black" onclick="submit_personal_notification()">
                              POST TO USER DASHBOARD</a>
                              </form>



                         </div>
                         <!-- =============== poup for update user ka update ends here ==== -->

<section>
<div class="container-fluid">
<div class="navbar-header navbtn">
<button aria-expanded="false" aria-controls="bs-navbar" data-target="#bs-navbar" data-toggle="collapse" type="button" class="navbar-toggle collapsed">
<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
<a class="navbar-brand" href="adminstats.php">ADMIN HOME</a> </div> 
<nav class="collapse navbar-collapse custom-collapse" id="bs-navbar"> 
<ul class="nav navbar-nav navbar-right">
<li> <a href="#">ADMIN PANEL </a> </li>


</ul>
</nav> 
</div>
</section>
<div id="header" style="    background: url(../images/cover1.png);
    background-size: 100% 100%;"></div>

<section>
<div class="container-fluid">
<nav class="secontnav nav">
<ul class="nav navbar-nav navbar-left">
<li> <a href="customertab.php">ALL USERS</a> </li>
<li> <a href="affiliatetab.php">AFFILIATE</a> </li>
<li> <a href="earnings.php">EARNINGS </a> </li>
<li> <a href="matchstats.php">LIVE MATCHES</a> </li>
<li> <a href="pushnotifications.php">PUSH NOTIFICATION</a> </li>
<li> <a href="javascript:void(0)">SETTINGS</a> </li>
</ul>
</nav>
</section>

</div>
<div id="nav">
    <p style="    text-align: center;
    font-size: 24px;
       color:#f04b4b;">RELATED LINKS</p>
    <hr style="height: 5px;
    border: none;
    
    background-color:#f04b4b;;margin-top:9px;" />

   <table style="width:100%;margin-left: 23px" >
  <tr>
    <td><a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('allcustomers').style.display='block';
      ">VIEW ALL CUSTOMERS</a></td>
    
  </tr>
  <tr>
    <td><a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('editupdatecustomer').style.display='block';
      ">VIEW/UPDATE CUSTOMER INFO</a></td>
    
  </tr>
  <tr>8
    <td><a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('blockcustomer').style.display='block';
      ">BLOCK USER</a></td>
    
  </tr>
  <tr>
    <td><a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('notifycustomer').style.display='block';
      ">NOTIFY USER</a></td>
    
  </tr>


</table>

</div>

<div id="section">

<?php
         $allusers=get_all_user_data();


?>
<!-- ====== customer table details starts here ======================= -->

                 <div class="custom-table" data-example-id="striped-table" id='allcustomers' > 

                       <div class="panel-heading" style="background-color: rgb(74,128,177);
    color: white;
    font-size:17px;
    font-family: sans-serif;;">VIEW ALL USERS</div>
<table class="table table-striped" > 
<thead> 
<tr> 
<th>#</th> 
<th>User</th> 
<th>Email</th>
<th>Total Cash deposit</th>
<th>Total Cash Redeem</th>
<th>Gameplays</th>
</tr> 
</thead> 
<tbody> 

<?php 

        for($r=0;$r<sizeof($allusers);$r++)
        {

?>
          <tr><td><?php echo $allusers[$r]['sl']; ?></td>

              <td><?php echo $allusers[$r]['name']; ?></td>
              <td><?php echo $allusers[$r]['email']; ?></td>
              <td><?php $deposit=get_user_deposits($allusers[$r]['email']);echo $deposit; ?></td>
  <td><?php $redeem=get_user_deposits($allusers[$r]['email']);echo '0'; ?></td>

              <td><?php echo $allusers[$r]['gameplays']; ?></td>
          </tr>




<?php } ?>



</table>

<!-- ============ customer table ends here ======================= -->









    </div>


<!-- edit update user table ==============================  -->
        <div class="custom-table" data-example-id="striped-table" id='editupdatecustomer' style='display:none' > 

                <div class="panel-heading" style="background-color: rgb(74,128,177);
    color: white;
    font-size:17px;
    font-family: sans-serif;;">EDIT / UPDATE CUSTOMER</div>
<table class="table table-striped" > 
<thead> 
<tr> 
<th>#</th> 
<th>User</th> 
<th>Email</th>
<th>Actions</th>
</tr> 
</thead> 
<tbody> 

<?php 

        for($r=0;$r<sizeof($allusers);$r++)
        {

?>
          <tr><td><?php echo $allusers[$r]['sl']; ?></td>

              <td><?php echo $allusers[$r]['name']; ?></td>
              <td><?php echo $allusers[$r]['email']; ?></td>
            <td><a href="javascript:void(0)" class="btn join-btn" onclick="showinvisible();load_edit_user('<?php echo $allusers[$r]['email']; ?>')" style="background-color:orange;color:white">UPDATE</a></td>
          </tr>




<?php } ?>



</table>











    </div>
<!-- ============edit update  customer table ends here ======================= -->







<!-- edit update user table ==============================  -->
        <div class="custom-table" data-example-id="striped-table" id='blockcustomer' style='display:none' > 

                <div class="panel-heading" style="background-color: rgb(74,128,177);
    color: white;
    font-size:17px;
    font-family: sans-serif;;">BLOCK THE USER</div>
<table class="table table-striped" > 
<thead> 
<tr> 
<th>#</th> 
<th>User</th> 
<th>Email</th>
<th>Actions</th>
<th>&nbsp;</th>
</tr> 
</thead> 
<tbody> 

<?php 

        for($r=0;$r<sizeof($allusers);$r++)
        {

?>
          <tr><td><?php echo $allusers[$r]['sl']; ?></td>

              <td><?php echo $allusers[$r]['name']; ?></td>
              <td><?php echo $allusers[$r]['email']; ?></td>
  <td><a href="?blockcustomer=<?php echo $allusers[$r]['email']; ?>" style="background-color:green;color:white" class="btn join-btn" onclick="">CHAT BLOCK</a></td>
              <?php 
              if(!$allusers[$r]['blocked'])
                { ?>
            <td><a href="?blockcustomer=<?php echo $allusers[$r]['email']; ?>" style="background-color:green;color:white" class="btn join-btn" onclick="">BLOCK</a></td>
                  <td>&nbsp;</td>
            <?php }else{ ?>

   <td><a href="javascript:void(0)" style="background-color:red;color:white" class="btn join-btn" >BLOCKED</a></td>
   <td><a href="?unblockcustomer=<?php echo $allusers[$r]['email']; ?>" style="background-color:orange;color:white" class="btn join-btn" >UNBLOCK</a></td>
            <?php }  ?>
          </tr>




<?php } ?>



</table>











    </div>
<!-- ============edit update  customer table ends here ======================= -->





<!-- sen personal notifications to  user table ==============================  -->
        <div class="custom-table" data-example-id="striped-table" id='notifycustomer' style='display:none' > 

                <div class="panel-heading" style="background-color: rgb(74,128,177);
    color: white;
    font-size:17px;
    font-family: sans-serif;;">NOTIFY THE USER</div>
<table class="table table-striped" > 
<thead> 
<tr> 
<th>#</th> 
<th>User</th> 
<th>Username</th> 
<th>Email</th>
<th>Actions</th>
</tr> 
</thead> 
<tbody> 

<?php 

        for($r=0;$r<sizeof($allusers);$r++)
        {

?>
          <tr><td><?php echo $r; ?></td>

              <td><?php echo $allusers[$r]['name']; ?></td>
                      <td><?php echo $allusers[$r]['username']; ?></td>
              <td><?php echo $allusers[$r]['email']; ?></td>


            <td><a href="javascript:void(0)" style="background-color:green;color:white" class="btn join-btn" onclick="document.getElementById('show_notify').style.display='block';
              document.getElementById('invisible_div').style.display='block';
document.getElementById('notify_email').value='<?php echo $allusers[$r]['email']; ?>';

              ">NOTIFY USER</a></td>




          
          </tr>




<?php } ?>



</table>











    </div>
<!-- ============sen personal notifications to  customer  ======================= -->


</div>
<!-- ====== customer table details starts here ======================= -->

<div id="section">


</div>












<script type="text/javascript">
  function showinvisible()
              {


                    document.getElementById('invisible_div').style.display='block';

              }
  function show_pop(a)
              {


                    document.getElementById(a).style.display='block';

              }



              function closeallpopup()
{
   document.getElementById('invisible_div').style.display='none';
    document.getElementById('editupdatecustomer').style.display='none';
   document.getElementById('show_notify').style.display='none';
    document.getElementById('blockcustomer').style.display='none';
    document.getElementById('allcustomers').style.display='none';
        document.getElementById('notifycustomer').style.display='none';


}





//============== AJAX FOR getting the room name for private tables

function load_edit_user(a)
{

var xmlhttp;   



if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
 
    document.getElementById("updateuser_popup").style.display='block';
    document.getElementById("updateuser_popup").innerHTML=xmlhttp.responseText;
      

    }

  }
xmlhttp.open("GET","showuserdetails.php?showusernow="+a,true);
xmlhttp.send();


}

//============== AJAX FOR getting the room name for private tables







function submit_personal_notification()
{ 
var usermessage=$("#usermessage").val();
var notify_email=$("#notify_email").val();
// AJAX Code To Submit Form.
var dataString='usermessage='+usermessage+'&useremail='+notify_email+'&submitusernotify='+1;

// AJAX Code To Submit Form.
$.ajax({
type: "GET",
url: "customertab.php",
data: dataString,
cache: false,
success: function(result){

$('#success_notify_text').show();




}
});

return false;
}


</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>




</body>
</html>

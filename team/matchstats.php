<?php 
include('../db.php');
include('functionstats.php');

  if(isset($_POST['depositmoney']))
{
      

    $amount=$_POST['money'];
    $email=$_SESSION['email'];
deposit_money_towallet($amount,$email);
  
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
<!-- Custom Style -->
<link rel="stylesheet" href="../css/Style.css" type="text/css">
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


<section>




<div class="container-fluid">
<div class="navbar-header navbtn">
<button aria-expanded="false" aria-controls="bs-navbar" data-target="#bs-navbar" data-toggle="collapse" type="button" class="navbar-toggle collapsed">
<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
<a class="navbar-brand" href="adminstats.php">ADMIN HOME</a> </div> 
<nav class="collapse navbar-collapse custom-collapse" id="bs-navbar"> 
<ul class="nav navbar-nav navbar-right">
<li> <a href="#">How To Play</a> </li>
<li> <a href="#">Promotions</a> </li>
<li> <a href="#">Refer And Win</a> </li>
<li> <a href="#">Live Registration</a> </li>
<li class='userlogin' style="display: <?php
if(!isset($_SESSION['email']))
echo 'block';
else
echo 'none';


?>"> <a href="#" onclick="showpopup('login_pop')">Login/SignUP</a> </li>
<li class='userlogin' style="display: <?php
if(isset($_SESSION['email']))
echo 'block';
else
echo 'none';


?>"> <a href='index.php?logout=1'><?php 
echo 'Hi, '.$_SESSION['name'].' '." (signout) "; ?></a>

</a> </li>
</ul>
</nav> 
</div>
</section>
<div id="header"></div>

<section>
<div class="container-fluid">
<nav class="secontnav nav">
<ul class="nav navbar-nav navbar-left">
<li> <a href="#">PROFITABILITY REPORT</a> </li>
<li> <a href="#">ACCOUNT TRANSACTION</a> </li>
<li> <a href="customertab.php">CUSTOMER </a> </li>
<li> <a href="#">MY LAST PLAYER</a> </li>
<li> <a href="#">CASH REEDEM</a> </li>
<li> <a href="#">EDIT PROFILE</a> </li>
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
    <td><a href="#">PROFITABILITY REPORT</a></td>
    
  </tr>
  <tr>
    <td><a href="#">PROFITABILITY REPORT TIMEWISE</a></td>
    
  </tr>
  <tr>
    <td><a href="#">RAKE REPORT</a></td>
    
  </tr>
  <tr>
    <td><a href="#">RAKE REPORT TIMEWISE</a></td>
    
  </tr>
  <tr>
    <td><a href="#">SUMMERY REPORTt</a></td>
    
  </tr>
  <tr>
    <td><a href="#">PLAYER CREDIT UPDATE REPORT</a></td>
    
  </tr>
</table>

</div>

<div id="section">

<?php
         $allusers=get_all_user_data();


?>
<!-- ====== customer table details starts here ======================= -->

                 <div class="custom-table" data-example-id="striped-table" id='userearnings' > 
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
              <td><?php $deposit=get_user_cash_deposit($allusers[$r]['e mail']);echo $deposit; ?></td>
  <td><?php $redeem=get_user_cash_reedem($allusers[$r]['email']);echo $redeem; ?></td>

              <td><?php echo $allusers[$r]['gameplays']; ?></td>
          </tr>




<?php } ?>





<!-- ============ customer table ends here ======================= -->









    </div>

</div>
</body>
</html>

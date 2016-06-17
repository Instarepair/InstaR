<?php 
include('../db.php');
include('functionstats.php');


if(isset($_GET['create_headsup_group']))
{

$finalarray=array();
$list1=get_playersheadsup_list('ASIACUPT20','100');
$team_plus_username=explode('///',$list1[0]['beforematchstart100']);



$count=sizeof($team_plus_username)/2;
for($k=1;$k<=$count;$k++)
{
$randomkeys=array_rand($team_plus_username,2);


$groupvar=$team_plus_username[$randomkeys[0]].'***'.$team_plus_username[$randomkeys[1]];
array_push($finalarray,$groupvar);
unset($team_plus_username[$randomkeys[0]]);
unset($team_plus_username[$randomkeys[1]]);


}

$newstring="";
for($t2=0;$t2<=sizeof($finalarray);$t2++)
{

       // $newstring.=$finalarray[$t2].'grouped';
            $thetableform=$finalarray[$t2];
        $neweststring.='group>>>'.($t2).'>>>'.$finalarray[$t2];


        $headsupencoding="hhh".($t2+1)."hhh".$finalarray[$t2];

             list($username1,$username2)=return_usernames_encodings_from_headsupgroup($finalarray[$t2]);



// adding to headsup table details and updating table id to users 
             date_default_timezone_set("Asia/Calcutta");
        $timenow=date('y/m/d h:i:s');


$tableid=get_unique_heasdup_tableid();

                        $cmd="insert into headsup_tables(link,matchid,tableid,player1,player2,createdon,amount) values ('$headsupencoding','ASIACUPT20','$tableid','$username1','$username2','$timenow','100')";

                            $result=mysql_query($cmd);


$msg='hello user your headsup has been registerd with some opponents ! click on the table in heads up tables to visit your table : TABLE id:'.$tableid;
    $cmd="update customer SET joined_headsups='$tableid',personal_notifications='$msg',read_personal_notifications='0' where username='$username1'";
                    $result=mysql_query($cmd);echo '<br>'.$cmd;

   $cmd="update customer SET joined_headsups='$tableid',personal_notifications='$msg',read_personal_notifications='0' where username='$username2'";
                    $result=mysql_query($cmd);echo '<br>'.$cmd;
  

}
      
$cmd="update headsup_plays set aftermatchstart100='$neweststring' where match_id='ASIACUPT20'";
$result=mysql_query($cmd);





}

  if(isset($_POST['submitnewrake']))
{
            $email=$_POST['useremailrakechange'];
            $newrake=$_POST['rakepercentage'];
            $cmd="update customer set rake_affiliate='$newrake' where email='$email'";
            $result=mysql_query($cmd);

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
<!-- <link rel="stylesheet" href="../css/Style.css" type="text/css"> -->
<link rel="stylesheet" href="flags/Style.css" type="text/css">
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

    .admin{

          border: none;
    background: maroon;
    color: white;
    font-size: 13px;
    }
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
<!-- =================== rake change popup ======================================= -->

   <div class='choose_captain' id='changerake' style='margin-top:12vw;width:45%;'> 
<a href='javascript:void(0)' style='color:red' onclick="closepopup('changerake')">x</a>
<form action='#' method='post'>
             <h4 class="pop_title">Change rake for this user  : </h4>
      

       <input type='text' id='useremailrakechange'  name='useremailrakechange' class="textbar_popup"><br>

       <label>Decide new rake  :</label><br>

       <input type='text' id='rakepercentage' name='rakepercentage' placeholder='An integer value' class="textbar_popup"><br>



<input type='submit' name='submitnewrake'  class="submit_button" >

        </form>

       </div> 







<!-- ================= rake change popup ends here ================================= -->



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
    <td><a href="#" onclick="show_pop('viewtables');">VIEW TABLES</a></td>
    
  </tr>


   <tr>
    <td><a href="#" onclick="show_pop('startheadsup');">START HEADSUP MATCHES</a></td>
    
  </tr>

     <tr>
    <td><a href="#" onclick="closepopup('startheadsup');show_pop('createdtables');">CREATED TABLES</a></td>
    
  </tr>
  <tr>
    <td><a href="#">START/STOP EVENTS</a></td>
    
  </tr>

</table>

</div>

<div id="section">











            <!-- ====== view all match tables ======================= -->

  


<?php 

$arr1=get_all_headsup_matches();


?>
<!-- ============ customer table ends here ======================= -->

          <?php $list1=get_playersheadsup_list('ASIACUPT20','100');

$team_plus_username=explode('$$$',$list1[0]['beforematchstart100']);

                   ?>




            <!-- ====== div for headsup tables =============================================================================== -->

                 <div class="custom-table" data-example-id="striped-table" id='startheadsup' style='display:nondse' > 

                  <!--=============== Rs 100 team list ============================================================ -->

<span STYLE="font-weight:800;color:black;font-size:14x">HEADSUP TABLE : IPL001 (RS 100 TABLE )</span><br><br>

        
<table class="table table-striped" > 
<thead> 
<tr> 
<th>#</th> 



<th>username</th>
<th>Team Name </th>
<th>OPERATION</th>
</tr> 
</thead>

<tbody>
<?php 

for($t=0;$t<sizeof($team_plus_username);$t++)
  { 


    $player=explode('^^^',$team_plus_username[$t]);
        $username=$player[0];
        $teamname=$player[1];
    ?>
                        

<tr> 
  <td><?php echo $t;?></td> 
<td><?php echo $username;?></td> 
<td><?php echo $teamname;?></td> 

<td><?php echo $ee;?></td>
</tr>




<?php } ?>



</tbody>
</table>

<!-- ============================== RS 100 TEAM LIST =============================================================== -->


 <!--=============== Rs 500 team list ============================================================ -->



        <span STYLE="font-weight:800;color:black;font-size:14x">HEADSUP TABLE : ASIACUPT20 (RS 500 TABLE )</span><br><br>
<table class="table table-striped" > 
<thead> 
<tr> 
<th>#</th> 
      <?php $list1=get_playersheadsup_list('ASIACUPT20','500');

$team_plus_username=explode('$$$',$list1[0]['beforematchstart500']);

                   ?>



<th>username</th>
<th>Team Name </th>
<th>OPERATION</th>
</tr> 
</thead>

<tbody>
<?php 

for($t=0;$t<sizeof($team_plus_username);$t++)
  { 


    $player=explode('^^^',$team_plus_username[$t]);
        $username=$player[0];
        $teamname=$player[1];
    ?>
                        

<tr> 
  <td><?php echo $t;?></td> 
<td><?php echo $username;?></td> 
<td><?php echo $teamname;?></td> 

<td><?php echo $ee;?></td>
</tr>




<?php } ?>



</tbody>
</table>

<!-- ============================== RS 500 TEAM LIST =============================================================== -->

 <!--=============== Rs 500 team list ============================================================ -->


<span STYLE="font-weight:800;color:black;font-size:14x">HEADSUP TABLE : ASIACUPT20(RS 1000 TABLE )</span><br><br>
        
<table class="table table-striped" > 
<thead> 
<tr> 
<th>#</th> 
      <?php $list1=get_playersheadsup_list('ASIACUPT20','1000');

$team_plus_username=explode('$$$',$list1[0]['beforematchstart1000']);

                   ?>



<th>username</th>
<th>Team Name </th>
<th>OPERATION</th>
</tr> 
</thead>

<tbody>
<?php 

for($t=0;$t<sizeof($team_plus_username);$t++)
  { 


    $player=explode('^^^',$team_plus_username[$t]);
        $username=$player[0];
        $teamname=$player[1];
    ?>
                        

<tr> 
  <td><?php echo $t;?></td> 
<td><?php echo $username;?></td> 
<td><?php echo $teamname;?></td> 

<td><?php echo $ee;?></td>
</tr>




<?php } ?>



</tbody>
</table>

<!-- ============================== RS 500 TEAM LIST =============================================================== -->

<a href="?create_headsup_group=100" class="createTeam btn btn-primary btn-lg" style='         border: none;
    background: maroon;
    color: white;
    font-size: 13px;'>CREATE HEDSUP TEAMS</a>








</div>



<!-- ============ div for headsupa tables ================================================================================= -->



                 <div class="custom-table" data-example-id="striped-table" id='createdtables' style='display:none' > 












<table class="table table-striped" > 
<thead> 
<tr> 
<th>#</th> 
      <?php $list1=get_playersheadsup_list('ASIACUPT20','1000');

$team_plus_username=explode('$$$',$list1[0]['beforematchstart1000']);

                   ?>


<th>GROUP NAME</th>
<th>GROUP USERS</th>
<th>Teams </th>
<th>OPERATION</th>
</tr> 
</thead>

<tbody>
<?php 
$groupsstring=get_groups_headsup('ASIACUPT20','100');
$groups=explode('group',$groupsstring);
for($t=0;$t<sizeof($groups)-1;$t++)
  { 
$teamsarr=explode('>>>',$groups[$t]);



      $tablenumber=$teamsarr[1];
      $encryptedusers=$teamsarr[2];


                $playersarr=explode('***',$encryptedusers);

                    $totaluserteam1=explode('$$$',$playersarr[0]);
                    $teamname1=$totaluserteam1[0];
                    $username1=$totaluserteam1[1];

              


              $totaluserteam2=explode('$$$',$playersarr[1]);
                    $teamname2=$totaluserteam2[0];
                    $username2=$totaluserteam2[1];

        
    $tablenum='TABLE '.$tablenumber;
    ?>
                        

<tr style='    font-size: 11px;'> 

<td><?php echo $tablenum;?></td> 
<td><?php echo $username1.'  VS '.$username2;?></td> 
<td><?php echo $teamname1.'  VS '.$teamname2;?></td> 

<?php 

if($username2==NULL)
{ ?>
<td>
<a href="?create_headsup_group" class="createTeam btn btn-primary btn-lg" style='         border: none;
    background: maroon;
    color: white;
    font-size: 13px;'>ALLOT A PLAYER</a></td>

<?php } ?>

</tr>




<?php } ?>



</tbody>
</table>



















                  </div>

  </section>
<script type="text/javascript">

  function show_pop(a)
              {


                    document.getElementById(a).style.display='block';

              }



              function closepopup(a)
{
    document.getElementById(a).style.display='none';



}



</script>


</div>
</body>
</html>

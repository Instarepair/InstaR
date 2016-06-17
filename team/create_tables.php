<?php 
include('../db.php');
include('functionstats.php');

include('api/function_api.php');


require_once 'api/lzconfig.php';
require_once 'api/lz.php';


if($_SESSION['adminlogged']=='')
{


redirectadmin();
}

// add headusp amounts table here =============================
if(isset($_POST['submit_headsup'])){
$matchid=$_POST['matchid'];
$amounts=$_POST['headsupamounts'];

$versus=get_api_versus($matchid);
$cmd="insert into headsup_contest (matchid,amounts,versus) values ('$matchid','$amounts','$versus')";
$result=mysql_query($cmd);
$cmd="insert into headsup_plays(match_id) values ('$matchid')";
$result=mysql_query($cmd);
}





if(isset($_GET['addmatch']))
{
$matchkey=$_GET['addmatch'];
// checking this match d shud always be unique in the data base
$varcheck=check_already_inserted_or_not($matchkey);

// if varcheck is 0 then go and add all the value sto the databse fifnaly 



if(!$varcheck){
        // insert the match details entry first 
add_entirematch_from_season($matchkey);

}



}
if(isset($_POST['submit_contest']))
{
$entryfees=mysql_real_escape_string($_POST['entryfees']);
$maxplayers=mysql_real_escape_string($_POST['maxplayers']);
$minplayers=mysql_real_escape_string($_POST['minplayers']);
$type=mysql_real_escape_string($_POST['type']);
$contesttitle=mysql_real_escape_string($_POST['contesttitle']);
$matchid=mysql_real_escape_string($_POST['matchid']);
$contestid=mysql_real_escape_string($matchid.'_'.$maxplayers);
$adminstatus='running';

$versus=get_api_versus($matchid);
$cmd="insert into match_contest(adminstatus,versus,entry,total_players,minm_players,match_type,chattext,chatusername,joined_usernames,contest_id,contest,match_id,tournament) values ('$adminstatus','$versus','$entryfees','$maxplayers','$minplayers','$type','','','','$contestid','$contesttitle','$matchid','moneymaker')";
$result=mysql_query($cmd);
$winner1=$_POST['winner1'];
$winner2=$_POST['winner2'];
$winner3=$_POST['winner3'];
$winner4=$_POST['winner4'];
$winner5=$_POST['winner5'];
$winner6=$_POST['winner6'];
$winner7=$_POST['winner7'];
$winner8=$_POST['winner8'];
$winner9=$_POST['winner9'];
$winner10=$_POST['winner10'];
$winner11=$_POST['winner11'];

$cmd="insert into prizemoney(matchid,contestid,winner1,winner2,winner3,winner4,winner5,winner6,winner7,winner8,winner9,winner10,winner11,entry,totalplayers) values ('$matchid','$contestid','$winner1','$winner2','$winner3','$winner4','$winner5','$winner6','$winner7','$winner8','$winner9','$winner10','$winner11','$entryfees','$maxplayers')";
//create a blank table for this contest id
$result=mysql_query($cmd);

add_blank_table_for_contest($contestid);
}

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











if(isset($_POST['submit_login']))
{

      $username=$_POST['username1'];
      $password=$_POST['pass1'];
      
      if($pass1==$pass2)
          loginfirst($username,$password);
      

}

if(isset($_GET['logout']))
{

  echo 'cammmmmmmmmm';

signoutuser();



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
    document.getElementById('viewandaddmatch').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>VIEW APIS</strong>
                                        <span class="pull-right text-muted">total:1200</span>
                                    </p>
                                
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
               <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('addleague').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>ADD LEAGUES</strong>
                    
                                    </p>
                                  
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                      <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('blockcustomer').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>Block Users</strong>
                                  
                                    </p>
                                  
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                          <a href="javascript:void(0)" onclick="closeallpopup();
    document.getElementById('notifycustomer').style.display='block';
      ">
                                <div>
                                    <p>
                                        <strong>Notify Users</strong>
       
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
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
   <a href="customertable.php"><i class="fa fa-desktop"></i>Registered Users </a>
                    </li>
          <li>
                        <a href="matchearnings.php"><i class="fa fa-bar-chart-o">Transaction Stats</i></a>
                    </li>
                    <li>
                        <a href="affiliatestable.php"><i class="fa fa-qrcode"></i>Affiliates and Rakes</a>
                    </li>
                    
                    <li>
                        <a href="coupontable.php" class="active-menu"><i class="fa fa-table"></i>Cash coupons and Offers</a>
                    </li>
                    <li>
                        <a href="notificationtable.php"><i class="fa fa-edit"></i>Notify Users</a>
                    </li>


                

                                </ul>

                            </li>
                        </ul>
                    </li>
                  
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">



<center>  <img src="../icons/logo7.png" style="width: 125px;"></center>
            

<!-- ==================== view match api starts here =================================== -->

       <div class="row" id='add_leagues'>

<!-- === insertion row starts here ================================== -->


<?php 
if(isset($_GET['matchidfor']))
{
      $matchid=$_GET['matchidfor'];





?>


<div class="col-md-6">

<strong>you are entering the Money maker for match Id : <?php echo $matchid;?></strong>


<strong>MONEY MAKER TABLES</strong><br>

<img src="../icons/imgleagues/moneymaker.png" width='120'><br>
<form action='#' method='post'>



  <strong>ADD A TABLE EVENT FOR MATCH ID : <?php echo $matchid; ?></strong><br>
<input type='text' name="matchid" style='display:none' value="<?php echo $matchid; ?>">

<label>Enter some contest title :</label><br>

<input type='text' name='contesttitle' class='drop1'><br>





<label>Enter the total number of players allowed :</label><br>

<input type='text' name='maxplayers' class='drop1'><br>



<label>Enter the minimum number of players allowed :</label><br>

<input type='text' name='minplayers' class='drop1'><br>



<label>Entry fees per player :</label><br>

<input type='text' name='entryfees' placeholder='in Rs.'  class='drop1'><br>



    <strong>=============== PRIZE POOL DISTRIBUTION ======================</strong>



    <br>

    <select name="prizetype">
          <option value="percantage">PERCANTAGE</option>
          <option value="money">MONEY</option>

    </select>

    <?php 
    $arr3=array();
        for($r=0;$r<12;$r++)
    {
    ?>
<label>WINNER <?php echo $r;?></label><br>

<input type="text" name="winner<?php echo $r; ?>">

    <?php } ?>
<input type='submit' style="    background: #E08912;
    color: white;
    border: none;
    width: 300px;
    height: 46px;" name='submit_contest'>  <br>
  </form>
</div><!-- == col-md-6 -->


<!--================== table entries for veryfying the details  ======================================== -->

<div class="col-md-6">

<table class="table table-striped" border='2' style='font-family: sans-serif;
    font-size: 10px;
    color: #001D58;'> 
<tr><td>contest ID</td>
  <td>contest name</td>
<td>Entry</td>
<td>Max Players</td>
<td>Min Players</td>
<td>ACTIONS</td>
</tr>

<?php
$arr1=get_all_money_maker_contest($matchid);
for($t=0;$t<sizeof($arr1);$t++)
{ 
?>

<tr><td><?php echo $arr1[$t]['contest_id']; ?></td>
  <td><?php echo $arr1[$t]['contest']; ?></td>
  <td><?php echo $arr1[$t]['entry']; ?></td>
  <td><?php echo $arr1[$t]['total_players']; ?></td>
 <td><?php echo $arr1[$t]['minm_players']; ?></td>
  <td colspan='3'><a href="javascript:void(0)" style="background: #09192A;
    color: white;
    "> view prize </a></td>
</tr>
<?php } ?>
</table>


<!-- ========= table entries for money maker ends here ============================= -->
            </div>
                <!-- /. ROW  -->

</div>
<!--= =============  VIEW API ENDS HERE  ========================================== -->




<!--= =========================== div fro the heads up match tables starts here ======================================================== -->


<div class="col-md-6">

<strong>you are entering the Headsup for match Id : <?php echo $matchid;?></strong>


<strong>HEADS UP TABLES </strong><br>

<label>Please check the amount for this matches</label>
<img src="../icons/imgleagues/headsup.png" width='220'><br>
<form action="" method="post">
  <input type="text" name='headsupamounts' id='headsupamounts'><br>
  <input type='text' name='matchid' value='<?php echo $matchid;?>'><br>
       <input type="checkbox" id='amount2000'  onclick="selectamount('2000')"><label>PAY RS 2000 WIN RS 4000</label><br>
             <input type="checkbox" id='amount1500'  onclick="selectamount('1500')"><label>PAY RS 1500 WIN RS 3000</label><br>
                <input type="checkbox" id='amount1000'  onclick="selectamount('1000')"><label>PAY RS 1000 WIN RS 2000</label><br>
                <input type="checkbox" id='amount500'  onclick="selectamount('500')"><label>PAY RS 500 WIN RS 500</label><br>
                <input type="checkbox" id='amount200'  onclick="selectamount('200')"><label>PAY RS 200 WIN RS 400</label><br>
                <input type="checkbox" id='amount100'  onclick="selectamount('100')"><label>PAY RS 100 WIN RS 200</label><br>
<input type="submit" name="submit_headsup"/> <br/>
</form>
</div>
<div class='col-md-6' >

<?php
$amountsarr=get_all_headsup_amounts($matchid);
if($amountsarr=='')
  echo 'NO TABLE DEFINED FOR THIS MATCHID ';
else{
?>

<table>
  <?php 
$arr1=array();
$arr1=explode(',',$amountsarr);
  for($r=0;$r<sizeof($arr1)-1;$r++){
    ?>
<tr><td>TABLE <?php echo $r+1;?></td><td><?php echo 'RS. '.$arr1[$r];?></td></tr>
<?php } ?>
</table>
<?php } 
?>
  </div>



<!-- ==================== div for the heads up matches ends here ======================================================================== -->
<script>

function selectamount(a){

  if (document.getElementById('amount'+a).checked === true ) {
      
    document.getElementById("headsupamounts").value=document.getElementById("headsupamounts").value+a+',';


}
else if (document.getElementById('amount'+a).checked === false ) {
      var removestring=a+',';
    document.getElementById("headsupamounts").value=document.getElementById("headsupamounts").value.replace(removestring,'');



}
}
</script>



<!-- ============= ADD LEAGUE TABLES STARTS HERE ============================= -->

<?php }else{





 
echo 'NO MATCH ID LOADED TO ENTER TABLES';

?>

<!-- ========= provide a list of match loaded from the API ====================================================== -->
<div class="col-md-12" >
<?php 
$apimatch=load_api_for_table_creation();

?>
<!-- ========getting the list of all the match loaded from api and are not conmpleted or started ============== -->

<table class='striped' style='font-size:12px;text-align:center' border='2'>
<tr><td>SL</td><td>MATCH FORMAT</td><td>API STATUS</td><td colspan='3'>MATCH TITLE</td><td>ACTION</td></tr>

<?php 
for($r=0;$r<sizeof($apimatch);$r++)
  { ?>
<tr><td><?php echo $r+1;?></td><td><?php echo $apimatch[$r]['format'];?></td><td><?php echo $apimatch[$r]['apistatus'];?></td><td colspan='3'><?php echo $apimatch[$r]['match_title']?></td><td><a href='create_tables.php?matchidfor=<?php echo $apimatch[$r]['matchid'];?>'>ADD TABLES</a></td></tr>
        <?php } ?>
</table>
</div>


<!-- =============== list of match loaded from the API ends here ============================================= -->

<?php
} ?>








<!-- =========== ADD LEAGUE TABLE ENDS HERE ================================ -->

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

   document.getElementById('allcustomers').style.display='none';
    document.getElementById('editupdatecustomer').style.display='none';

    document.getElementById('blockcustomer').style.display='none';
    
        document.getElementById('notifycustomer').style.display='none';


}



function show_match_api_data()
{

var t=document.getElementById('matchkey').value;

window.location='?showmatch='+t;


}
   </script>

   <script type="text/javascript">
    $(document).ready(function(){
      refreshTable();
    });

    function refreshTable(){ 


       $('#opponententirepanel').load('updateuserliveapi.php?opponentsteamload=1&contestid=<?php echo $contestid;?>', function(){
           setTimeout(refreshTable,125000);

            });

    }





</script>
</body>
</html>

<?php



include('api/function_api.php');


require_once 'api/lzconfig.php';
require_once 'api/lz.php';
if(isset($_GET['showmatch']))
{

$authData = auth();
if (! $authData) {
  echo "Error Auth, Please verify your access details on lzconfig.php \n";
  return;
}


$token = $authData['access_token'];
  $matchkey=$_GET['showmatch'];
$matcharr=getMatch($token,$matchkey,'full_card');
      
if($matcharr['status_code']=='404')
  echo 'NO API LOADED';

?>
<div id="uploaded_api" style="display:<?php if($matcharr['status_code']=='404')echo 'none'; ?>">
<span style="color:black;font-weight:bold;font-family:helvetica;">
<?php
echo '<br>';
echo 'MATCH TITLE :'.$matcharr['data']['card']['title'];
echo '<br>';
echo 'MATCH KEY :'.$matcharr['data']['card']['key'];
echo '<br>';
echo 'venue :'.$matcharr['data']['card']['venue'];
echo '<br>';
echo 'TEAM1 :'.$matcharr['data']['card']['teams']['a']['name'];

echo '<br>';
echo 'TEAM2 :'.$matcharr['data']['card']['teams']['b']['name'];
echo '<br>';
?>
</span>
<span style="color:black;">CURRENT STATUS :<strong style='color:red'>
<?php
$status=$matcharr['data']['card']['status'];
echo $status; 
if($status=='completed')
{
match_completed_event($matchkey);
}
  ?></strong>


</span><br><Br>
<span style="color:black;">STARTS AT  :<strong style='color:red'>
<?php
  echo $matcharr['data']['card']['start_date']['str']; ?></strong>

</span>


Live score :

<?php
if($matcharr['data']['card']['now']['batting_team']=='a')
{
	$batting_team=$matcharr['data']['card']['teams']['a']['name'];
}
else
$batting_team=$matcharr['data']['card']['teams']['b']['name'];

  echo 'team : '.$batting_team.'  '.$matcharr['data']['card']['now']['runs_str']; 

  ?>

<span>



</span>
<?php

?>




<!-- =============== NEW API CODE ENDS HERE ===================================== -->



<div style="width:100%;background:purple;color:white;text-align:center;vertical-align:middle">
1. getting the playing 11 of both teams 

</div>
<strong>TEAM 1 PLAYERS LIST  with all STATS </strong>
<table style='background:black;width:100%;color:white' border='2'>
<tr><td>PLAYER NUMBER :</td><td>PLAYER Name</td><td>PLAYER type</td>
<td>score</td><td>wickets</td><td>catches</td><td>sixes</td><td>fours</td><td>Balls Faced</td>
<td>Economy</td><td>stump</td><td>strike-rate</td><td>Extras</td><td>overs</td>
<td>POINTS</td>
</tr>

      <?php
              for($k=0;$k<sizeof($matcharr['data']['card']['teams']['a']['match']['players']);$k++){

      ?>
      <tr><td><?php echo $k;?></td><td><?php $playernamesmall=$matcharr['data']['card']['teams']['a']['match']['players'][$k];echo $matcharr['data']['card']['players'][$playernamesmall]['fullname'];?></td>
<!-- checking the values for player typer over here ================== -->
<?php $playername=$matcharr['data']['card']['players'][$playernamesmall]['fullname']; ?>

<td><?php if($matcharr['data']['card']['players'][$playernamesmall]['identified_roles']['keeper']){
        $playertype='KEEPER';
      }
      elseif($matcharr['data']['card']['players'][$playernamesmall]['identified_roles']['batsman'])
      {

        if($matcharr['data']['card']['players'][$playernamesmall]['identified_roles']['bowler'])
          $playertype='ALL ROUNDER';
        else
          $playertype='BATSMAN';
      }
      elseif($matcharr['data']['card']['players'][$playernamesmall]['identified_roles']['bowler'])
      {

        $playertype='BOWLER';
      }
    


echo $playertype;?></td>





<!-- ============== SCORING STATS OF THE PLAYER IS HERE ======================= -->

    <td><?php $runs=$matcharr['data']['card']['players'][$playernamesmall]['match']['innings'][1]['batting']['runs'];echo $runs; ?></td>
<td><?php $wickets=$matcharr['data']['card']['players'][$playernamesmall]['match']['innings'][1]['bowling']['wickets'];echo $wickets; ?></td>

<td><?php $catches=$matcharr['data']['card']['players'][$playernamesmall]['match']['innings'][1]['fielding']['catches'];echo $catches; ?></td>
<td><?php $sixes=$matcharr['data']['card']['players'][$playernamesmall]['match']['innings'][1]['batting']['sixes'];echo $sixes; ?></td>

<td><?php $fours=$matcharr['data']['card']['players'][$playernamesmall]['match']['innings'][1]['batting']['fours'];echo $fours; ?></td>

<td><?php $ballsfaced=$matcharr['data']['card']['players'][$playernamesmall]['match']['innings'][1]['batting']['balls'];echo $ballsfaced; ?></td>


<td><?php $economy=$matcharr['data']['card']['players'][$playernamesmall]['match']['innings'][1]['bowling']['economy'];echo $economy; ?></td>

<td><?php $stump=$matcharr['data']['card']['players'][$playernamesmall]['match']['innings'][1]['fielding']['stumbed'];echo $stump; ?></td>

<td><?php $strike_rate=$matcharr['data']['card']['players'][$playernamesmall]['match']['innings'][1]['batting']['strike_rate'];echo $strike_rate; ?></td>

<td><?php $extras=$matcharr['data']['card']['players'][$playernamesmall]['match']['innings'][1]['bowling']['extras'];echo $extras; ?></td>


<td><?php $overs=$matcharr['data']['card']['players'][$playernamesmall]['match']['innings'][1]['bowling']['overs'];echo $overs; ?></td>

<!-- ============ SCORING STATS OF THE PLAYER ============================== -->
<td><?php

$userpoints=calculate_points($runs,$wickets,$catches,$sixes,$fours,$ballsfaced,$economy,$stump,$strike_rate,$extras,$overs);

?></td>
    <!-- ==== checking the values for the player type here ========== -->


      </tr>
      <?php 
update_player_points($matchkey,$runs,$wickets,$catches,$sixes,$fours,$ballsfaced,$economy,$stump,$strike_rate,$extras,$overs,$playername);


  }?>
</table>

<br><br>
<strong>TEAM 2 PLAYERS LIST  with all STATS </strong>
<table style='background:black;width:100%;color:white' border='2'>
<tr><td>PLAYER NUMBER :</td><td>PLAYER Name</td><td>PLAYER type</td>
<td>score</td><td>wickets</td><td>catches</td><td>sixes</td><td>fours</td><td>Balls Faced</td>
<td>Economy</td><td>stump</td><td>strike-rate</td><td>Extras</td><td>overs</td>
<td>POINTS</td>
</tr>

      <?php
              for($k=0;$k<sizeof($matcharr['data']['card']['teams']['b']['match']['players']);$k++){

      ?>
      <tr><td><?php echo $k;?></td><td><?php $playername=$matcharr['data']['card']['teams']['b']['match']['players'][$k];echo $matcharr['data']['card']['players'][$playername]['fullname'];?></td>
<!-- checking the values for player typer over here ================== -->


<td><?php if($matcharr['data']['card']['players'][$playername]['identified_roles']['keeper']){
        $playertype='KEEPER';
      }
      elseif($matcharr['data']['card']['players'][$playername]['identified_roles']['batsman'])
      {

        if($matcharr['data']['card']['players'][$playername]['identified_roles']['bowler'])
          $playertype='ALL ROUNDER';
        else
          $playertype='BATSMAN';
      }
      elseif($matcharr['data']['card']['players'][$playername]['identified_roles']['bowler'])
      {

        $playertype='BOWLER';
      }
    


echo $playertype;?></td>





<!-- ============== SCORING STATS OF THE PLAYER IS HERE ======================= -->

    <td><?php $runs=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['runs'];echo $runs; ?></td>
<td><?php $wickets=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['bowling']['wickets'];echo $wickets; ?></td>

<td><?php $catches=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['fielding']['catches'];echo $catches; ?></td>
<td><?php $sixes=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['sixes'];echo $sixes; ?></td>

<td><?php $fours=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['fours'];echo $fours; ?></td>

<td><?php $ballsfaced=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['balls'];echo $ballsfaced; ?></td>


<td><?php $economy=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['bowling']['economy'];echo $economy; ?></td>

<td><?php $stump=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['fielding']['stumbed'];echo $stump; ?></td>

<td><?php $strike_rate=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['batting']['strike_rate'];echo $strike_rate; ?></td>

<td><?php $extras=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['bowling']['extras'];echo $extras; ?></td>


<td><?php $overs=$matcharr['data']['card']['players'][$playername]['match']['innings'][1]['bowling']['overs'];echo $overs; ?></td>

<!-- ============ SCORING STATS OF THE PLAYER ============================== -->
<td><?php

calculate_points($matchkey,$runs,$wickets,$catches,$sixes,$fours,$ballsfaced,$economy,$stump,$strike_rate,$extras,$overs);

?></td>
    <!-- ==== checking the values for the player type here ========== -->


      </tr>
      <?php }?>
</table>

<br><br>






</div>

<?php } ?>







<!-- ================== api display part =============================================== -->





?>
<?php
include('functions.php');
if(isset($_POST['name']))
{
$name=trim($_POST['name']);
$query2=mysql_query("SELECT distinct(make) FROM repair_costing2 WHERE make LIKE '%$name%'");
echo "<ul type='none' class='phone_listing' style='    margin-top: -87px;'>";
while($query3=mysql_fetch_array($query2))
{
?>

<li  style='    border-bottom: 1px groove rgba(255, 255, 255, 0.55);' onclick='fill("<?php echo $query3['make']; ?>")'><?php echo $query3['make']; ?></li>
<?php
}
}



if(isset($_POST['modelname']))
{
$name=trim($_POST['modelname']);
$query2=mysql_query("SELECT distinct(model) FROM repair_costing2 WHERE model LIKE '%$name%'");
echo "<ul type='none' class='phone_listing' style='    margin-top: -20px;'>";
while($query3=mysql_fetch_array($query2))
{
?>

<li  style='    border-bottom: 1px groove rgba(255, 255, 255, 0.55);'  onclick='fill2("<?php echo $query3['model']; ?>")'><?php echo $query3['model']; ?></li>
<?php
}
}
?>
</ul>
<?php 
$cmd="SELECT * FROM `repair_costing2` WHERE `reparing _item` like %lcd%";
       $result=mysql_query($cmd);
while($row=mysql_fetch_array($result))
                                                                    {
                                                                       array_push($arr1,$row);
                                                                    }


                                  for($r=0;$r<2;$r++)
                                  {

                                  	$model=$arr1[$r]['model'];
                                  	$cost=$arr1[$r]['cost'];


$newcost=$arr1[$r]['cost']*0.75;


echo 'new cost for model'.$model.' is '.$newcost;


                                  }




?>
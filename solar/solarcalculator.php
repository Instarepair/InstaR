<?php




				if(isset($_POST['sendsolarcost']))
				{
							
							$state=$_POST['state'];
							$monthlybill=$_POST['monthlybill'];
							$permonthcost=$_POST['permonthcost'];
							$rooftoparea=$_POST['rooftoparea'];
				$systemsize1=($rooftoparea/120);
                            $systemsize2=(($monthlybill/$permonthcost)/150);
                            if($systemsize2<$systemsize1)
                            	$systemsize=$systemsize2;
                            else
                            	$systemsize=$systemsize1;

                            echo "<div id='solar_user_values'><style='color: #919191;
    font-family: roboto;'>Your solar requirements  :</style>".'<br>';
						echo "<strong style='color: #919191;
    font-family: roboto;'>".'SYSTEM SIZE : '."</strong><span id='size1'>".$systemsize.'</span><br>';
						$clientcost=80000*$systemsize;
						echo "<strong style='color: #919191;
    font-family: roboto;'>".' CLIENT COST : '."</strong><span id='cost1'>".$clientcost.'</span><br>';
						$modules=$systemsize*4;
						echo "<strong style='color: #919191;
    font-family: roboto;'>".'NUMBER OF MODULES : '."</strong><span id='modules1'>".$modules.'</span><br>';
						$powergenerated=$systemsize*150;
						echo "<strong style='color: #919191;
    font-family: roboto;'>".'POWER GENERATED : '."</strong><span id='power1'>".$powergenerated.'</span><br>';
						$emission=0.541*$powergenerated;
						echo '<strong>'.'EMISSION (C02 SAVINGS) : '.'</strong>'.$emission.'<br>'.'<br>'.'<br>'.'<br>';
						echo "</div>";


				}



?>
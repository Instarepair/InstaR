<?php 
include('../db.php');

$emailown=$_SESSION['name'];







function signoutuser()
{
	unset($_SESSION['adminlogged']);
}

function redirectadmin()
{


	
				?>
						<script type="text/javascript">

window.location='index.php';

						</script>
	<?php 



}


			function return_registration_date($email)
					{
								$cmd="select * from customer where email='$email'";

	                       $result=mysql_query($cmd);
			  while($row=mysql_fetch_array($result))
			     	{
				        	$date1=$row['registration_date'];
				

				          }

				          
						      return $date1;



					}








function get_all_transaction_data()
{
	$arr1=array();
				$cmd="select * from transaction";
	$result=mysql_query($cmd);
				     while($row=mysql_fetch_array($result))
				                 {
				               			array_push($arr1,$row);

				                }

				    
				  return $arr1;






}






			function get_site_profit()
			{
					$cmd="select sum(amount) as total from transaction where type='DEPOSIT'";
						$result=mysql_query($cmd);
				     while($row=mysql_fetch_array($result))
				                 {
				               		$total=$row['total'];

				                }

				                	return $total;


			}



function get_user_deposits($email)
{

			$cmd="select sum(amount) as total1 from transaction where type='DEPOSIT' and email='$email'";
						$result=mysql_query($cmd);
				     while($row=mysql_fetch_array($result))
				                 {
				               		$totaldeposit=$row['total1'];

				                }

return $totaldeposit;


}

function get_user_total_orders($email)
{

			$cmd="select sl from transaction where email='$email'";
						$result=mysql_query($cmd);echo $cmd;

						$count=mysql_num_rows($result);

						return $count;



}



function get_groups_headsup($match_id,$amount)
{

$columnname='aftermatchstart'.$amount;
			$cmd="select $columnname from headsup_plays where match_id='$match_id'";echo  $cmd;
					$result=mysql_query($cmd);
				     while($row=mysql_fetch_array($result))
				                 {
				               		$allgroups=$row[$columnname];

				                }

				       

return $allgroups;












}





				function get_site_money_account()
			{
					$cmd="select sum(amount) as total1 from transaction where type='DEPOSIT'";
						$result=mysql_query($cmd);
				     while($row=mysql_fetch_array($result))
				                 {
				               		$totaldeposit=$row['total1'];

				                }


				                $cmd="select sum(amount) as total2 from transaction where type='REDEEM'";
						$result=mysql_query($cmd);
				     while($row=mysql_fetch_array($result))
				                 {
				               		$totalredeem=$row['total2'];

				                }
				         
				              
				         $moneyinaccount=$totaldeposit-$totalredeem;
				         
				                	return $moneyinaccount;


			}
function get_user_rake($username)
{

			$cmd="select rake_affiliate from customer where username='$username'";
			$result=mysql_query($cmd);


										 while($row=mysql_fetch_array($result))
			              	{
				        	$rake=$row['rake_affiliate'];
				
   
				            }

				          return $rake;





}



	function get_all_user_data()
					{
						$arr4=array();
								$cmd="select * from transaction";

	                       $result=mysql_query($cmd);
			  while($row=mysql_fetch_array($result))
			     	{
				        	array_push($arr4,$row);
				

				          }

				          
						      return $arr4;



					}













// function for getting the tramke of the registered affilaite starts herte 

			function get_affiliate_present_rake($affiliate)
			{

							$cmd="select rake_affiliate from customer where username='$affiliate'";

									 $result=mysql_query($cmd);
			  while($row=mysql_fetch_array($result))
			     	{
				        $rake_affiliate=$row['rake_affiliate'];
				

				          }

				          
						      return $rake_affiliate;




			}






// functiob for getting thee rake ensd here 



													
				function return_usernames_encodings_from_headsupgroup($groupencode)
				{

								$arr1=explode('***',$groupencode);
									$code1=$arr1[0];
										$code2=$arr1[1];

								$user1=explode('$$$',$code1);
								$user2=explode('$$$',$code2);
					
											return array($user1[1],$user2[1]);


				}







function get_discount_coupon_data()
{
				$arr1=array();
								$cmd="select * from coupons_list";

	                       $result=mysql_query($cmd);
			  while($row=mysql_fetch_array($result))
			     	{
				        	array_push($arr1,$row);
				

				          }

				          
						      return $arr1;




}

function get_present_time()
{

			date_default_timezone_set("Asia/Calcutta");
				                          $timenow=date('y/m/d h:i:s');	
				                          return $timenow;


}





// inbsatrepoair ststistics starts here ===================================================================================


 function view_all_customers(){
$arr1=array();

$cmd="select distinct(email) from transaction";
   $result=mysql_query($cmd);
			  while($row=mysql_fetch_array($result))
			     	{
				        	array_push($arr1,$row);
				

				          }

				          
						      return $arr1;






 }


	function getallservicedetails_panel()
								{
									$arr1=array();
									$cmd="select * from techyuser where IsDelete='0' and IsActive='1'";
									$result=mysql_query($cmd);
								  while($row=mysql_fetch_array($result))
                  {
                     array_push($arr1,$row);
                  }
    		              		return  $arr1;

								}


  function get_all_details_by_email($email){
$arr1=array();
$cmd="select * from transaction where email='$email'";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
				        	array_push($arr1,$row);
				

				          }

				      
						      return $arr1;
						  }


						  				function get_total_orders_customer($email){


$cmd="select count(trans_id) as count1 from transaction where email='$email'";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
				     $count1=$row['count1'];
				

				          }

				      
						      return $count1;
						  }




						  function get_total_amountpaid_customer($email){

// calculkate te he sum of amounjt paid to instare[pair by this customer



$cmd="select sum(bill) as bill1 from transaction where email='$email'";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
				     $bill1=$row['bill1'];
				

				          }

				      
						      return $bill1;






						  }



						  // retrurn the scuistome r ka ordered dtaes fronm the webiste of instarepAIR 

						  function get_customer_ordered_dates($email){

$arr2=array();
$cmd="select pickupdate from transaction where email='$email'";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
				array_push($arr2,$row['pickupdate']);

				          }

			
				      	$string=implode(',',$arr2);
						      return $string;
						  }



		  function get_customer_registereddate($email){

$arr2=array();
$cmd="select pickupdate from transaction where email='$email'";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
				array_push($arr2,$row['pickupdate']);

				          }

			return $arr2[0];
						  }



function get_device_repaired_by_date($pickupdate)
{

	$cmd="select model,brand,devicetype from transaction where pickupdate='$pickupdate'";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	$model=$row['model'];
	$brand=$row['brand'];
		$type=$row['devicetype'];
				          }

				          $devicestring=$brand.'- '.$model;


			return array($devicestring,$type);




}




// ********************* order detailing strats here *****************************************************

function view_all_orders_details(){

$arr2=array();
$cmd="select * from transaction order by sl desc";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
				array_push($arr2,$row);

				          }

			return $arr2;





}



// return devoice typer ka pic 



function get_device_type_pic($devicetype){

if($devicetype=='mobile')
	return 'mobile.png';
else if($devicetype=='laptop')
	return 'lappy.png';
else if($devicetype=='desktop')
return 'pc.png';
else
return 'tablet.png';







}



function get_total_callback_on_website(){
$cmd="select count(sl) as count2 from requestacallback";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
							$count2=$row['count2'];

				          }

return $count2;


}
			function get_total_orders_on_website(){

$cmd="select count(trans_id) as count2 from transaction where trackstatus!='cancelled'";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
							$count2=$row['count2'];

				          }

return $count2;


			}



				function get_total_pending_orders_on_website(){

$cmd="select count(trans_id) as count2 from transaction where trackstatus!='delivered' and trackstatus!='cancelled' and trackstatus!=''";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
							$count2=$row['count2'];

				          }

return $count2;


			}

			function get_total_delivered_orders_on_website()
			{

$cmd="select count(trans_id) as count2 from transaction where trackstatus!='delivered'";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
							$count2=$row['count2'];

				          }

return $count2;


			}


			function view_all_vendors(){

				include_app_connection_first();
$arr1=array();
$cmd="select * from venderuser";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
						array_push($arr1,$row);

				          }

return $arr1;






			}



	// ALL REPAIRING RELATED FUNCTIONS OCMES HERE 



			function view_all_pricing(){


$arr1=array();
$cmd="select * from repair_costing2";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
						array_push($arr1,$row);

				          }

return $arr1;







			}


			function view_all_buyback_request(){


$arr1=array();
$cmd="select * from buybackuser";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
						array_push($arr1,$row);

				          }

return $arr1;




			}




							function get_all_the_device_cureent_mrp_for_buyback(){

							include_app_connection_first();

$arr1=array();

$cmd="select * from device_costing";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
						array_push($arr1,$row);

				          }

return $arr1;




							}
function get_buyback_factor1(){
include_app_connection_first();
$arr1=array();

$cmd="select * from accessories_depreciation";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
						array_push($arr1,$row);

				          }

return $arr1;




}


function call_the_factor1_change($period,$depreciation,$charger,$box,$invoice,$amount_range,$sl){


include_app_connection_first();
$cmd="update accessories_depreciation set amount_range='$amount_range',charger='$charger',invoice='$invoice',ear_phone='$ear_phone',box='$box' where sl='$sl'";
$result=mysql_query($cmd);





}



function get_buyback_factor2(){
include_app_connection_first();
$arr1=array();

$cmd="select * from device_depreciation";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
						array_push($arr1,$row);

				          }


				

return $arr1;




}


function close_connection_close()
{
$con=@mysql_connect("localhost","abhinavuser","pass");

mysql_select_db("abhinav_test",$con);
mysql_close($con);



}


// factor 2 buy back change functoion

function call_the_factor2_change($period,$depreciation,$sl)
{
include_app_connection_first();
$cmd="update device_depreciation set period='$period',depreciation='$depreciation' where sl='$sl'";

$result=mysql_query($cmd);

}

function include_app_connection_first(){



$con=@mysql_connect("localhost","user99","pass99");

mysql_select_db("instafinal",$con);


}


 function website_total_sales(){



$cmd="select sum(bill) as sum1 from transaction where status!='cancelled' and trans_id!=''";
$result=mysql_query($cmd);
  while($row=mysql_fetch_array($result))
			     	{
	
				$sum1=$row['sum1'];

				          }

				          				return $sum1;




 }

        function sendmessage($msgborn,$phone1)
{


            $username = 'amitbhalla.pwc@gmail.com';
  $hash = '97b24fe04708309ab00f51dc53944fb44ce9c93f';
  
  // Message details
  $numbers =array($phone1);
  $sender = urlencode('INSTAR');



  $message =urlencode($msgborn);
 
  $numbers = implode(',', $numbers);
 
  // Prepare data for POST request
  $data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
  // Send the POST request with cURL
  $ch = curl_init('http://api.textlocal.in/send/');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  curl_close($ch);
echo $response;





}



                                                                  function getallvendordetails()
                                                                  {


                                                                    // application side database required
                                                                      include_app_connection_first();
                                                                           $arr1=array();
                                        
                                                        $cmd="select * from venderuser where IsDelete='0' and IsActive='1'";
                                                           $result=mysql_query($cmd);echo $cmd;

                                                                    while($row=mysql_fetch_array($result))
                                                                    {
                                                                       array_push($arr1,$row);
                                                                    }
                                                                   return $arr1;




                                                                  }





                                  function get_pickup_phone($pickupcode)
   {

      $cmd="select phone from pickupboy where personcode='$pickupcode'";echo $cmd;
             $result=mysql_query($cmd);

                  while($row=mysql_fetch_array($result))
                  {
                   $phone=$row['phone'];
                  }
                  return $phone;


    }	

function get_vendors_address($vendorcode)
{

        $arr1=array();
  $email=$_SESSION['email'];
      $cmd="select address from vendordetails where code='$vendorcode'";
          $result=mysql_query($cmd);

                  while($row=mysql_fetch_array($result))
                  {
                   $address=$row['address'];
                  }
                  return $address;


}
function get_this_orderid_devicename($orderid){

$cmd="select model,brand,problem from transaction where trans_id='$orderid'";
$result=mysql_query($cmd);

echo $cmd;
while($row=mysql_fetch_array($result))
{

$model=$row['model'];
$brand=$row['brand'];
$problem=$row['problem'];
}
  
        return array($model,$brand,$problem);




}



function get_pickupboy_name($code){



	       $cmd="select * from pickupboy where personcode='$code'";
            $result=mysql_query($cmd);


                  while($row=mysql_fetch_array($result))
                  {
                     $pickupboyname=$row['person'];
                     
                  }


return $pickupboyname;
  
}


function add_app_side_vendor_allotment($vendorcode,$orderid){





list($model,$brand,$problem)=get_this_orderid_devicename($orderid);

$devicename=$brand.' '.$model;




include_app_connection_first();
$cmd="insert into process(VenderId,SRN,Problem,Modelname) values ('$vendorcode','$orderid','$problem','$devicename')";
$result=mysql_query($cmd);




}



function include_main_db(){




$con=@mysql_connect("localhost","user99","pass99");

mysql_select_db("instafinal",$con);


}


        function get_vendors_name($vendorcode)
   {

    include_main_db();

      $cmd="select vendor from vendordetails where code='$vendorcode'";
          $result=mysql_query($cmd);

                  while($row=mysql_fetch_array($result))
                  {
                   $vendorname=$row['vendor'];
                  }
                  return $vendorname;


    }
function get_admins_phone()
					{
		
    		              		return  '8003436321';



					}

function get_bill_details($orderid)
{

  $arr1=array();
  $email=$_SESSION['email'];
      $cmd="select bill from transaction where trans_id='$orderid'";
          $result=mysql_query($cmd);

                  while($row=mysql_fetch_array($result))
                  {
                   $bill=$row['bill'];
                  }
                  return $bill;


}
    function get_phone_customer_from_transaction($orderid)
                            {


                                  $cmd="select * from transaction where trans_id='$orderid'";
                                  $result=mysql_query($cmd);
                                       while($row=mysql_fetch_array($result))
                  {
                          $phone=$row['phonenumber'];
                  }
                  return $phone;

                            }

 function get_order_details($orderid)
{

	$arr1=array();
	$email=$_SESSION['email'];
			$cmd="select * from transaction where trans_id='$orderid'";
			    $result=mysql_query($cmd);

                  while($row=mysql_fetch_array($result))
                  {
                     array_push($arr1,$row);
                  }
                  return $arr1;


}





// ************************** FINANCIAL STATISTIOCS STARTS HERE ***********************************************************************







function all_par1_stats_by_device($par1,$devicetype)
{


		$cmd="select $par1(bill) as ret1 from transaction where devicetype='$devicetype'";
		$result=mysql_query($cmd);

                  while($row=mysql_fetch_array($result))
                  {
                   $ret=$row['ret1'];
                  }
  
                  return $ret;



}


				function amt_par1_total($par2)
				{

							$cmd="select $par2(bill) as ret1 from transaction";
		$result=mysql_query($cmd);

                  while($row=mysql_fetch_array($result))
                  {
                   $ret=$row['ret1'];
                  }



                  return $ret;


				}




		function get_this_percantage_by_total($par1,$par2){


$localstats=all_par1_stats_by_device($par2,$par1);
$globalstats=amt_par1_total($par2);

$percantage=$localstats/$globalstats*100;



return $percantage;
		}



	function view_all_technician()
	{

	$arr1=array();
				$cmd="select * from techyuser";
	$result=mysql_query($cmd);
				     while($row=mysql_fetch_array($result))
				                 {
				               			array_push($arr1,$row);

				                }

				    
				  return $arr1;




	}









function view_all_sanitization()
{

	$arr1=array();
				$cmd="select * from sanitize_orders";
	$result=mysql_query($cmd);
				     while($row=mysql_fetch_array($result))
				                 {
				               			array_push($arr1,$row);

				                }

				    
				  return $arr1;





}




function fetch_all_invoice_data($sl){

	$arr1=array();
				$cmd="select * from sanitize_orders where sl='$sl'";
	$result=mysql_query($cmd);
				     while($row=mysql_fetch_array($result))
				                 {
				               			array_push($arr1,$row);

				                }

				  return $arr1;






}
         function getuserinformation($srn)
                {
                  $arr1=array();
                  $cmd="SELECT * FROM `transaction` WHERE trans_id='$srn'";
                                                   // pickupboy";
                  $result=mysql_query($cmd);
                  $row=mysql_fetch_array($result);
                  // {
                  //    array_push($arr1,$row);
                  // }
                          return  $row;

                }




function fetch_all_order_for_this_orderid($orderid){
$arr1=array();

$cmd="select * from transaction where trans_id='$orderid'";
$result=mysql_query($cmd);

    while($row=mysql_fetch_array($result))
				                 {
				               			array_push($arr1,$row);

				                }

				  return $arr1;







}








// function include_app_connection_first(){



// $con=@mysql_connect("localhost","user3456","pass3456");

// mysql_select_db("abhinav_test",$con);


// }
// function test1()
// {

// include_app_connection_first();

// $cmd="insert into process(VenderId,SRN,Problem,Modelname) values ('$vendorcode','$orderid','$problem','$devicename')";
// $result=mysql_query($cmd);echo $cmd;




// }




          





//*****************************************SEND NOTIFICATION *******************************

         function send_notification($registatoin_ids, $message) {
        // include config
        // include_once './config.php';
 
        // Set POST variables
        $url = 'https://android.googleapis.com/gcm/send';
 
        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $message,
        );
 
        $headers = array(
            'Authorization: key=AIzaSyATvmxEblSCoW7nubKMfrNjb-Efwiyc8uI',
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();
 
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
 
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
 
        // Close connection
        curl_close($ch);
        echo $result;
        echo json_encode($result);
    }                                                         







//************************************************************************************************************
// newly added funbction for the android applicatuion ends here ===========================================

?>


<?php

include('db.php');

if(isset($_POST['req']))
{
$req=$_POST['req'];
}



switch($req){
	
case 'login':
	
	login();
	break;

case 'register':
	register();
	break;

case 'alldata':
	alldata();
	break;	

case 'updatepickup':
	updatepickup();
	break;	

case 'updatedeliver':
	updatedeliver();
	break;

	case 'send_notification':
    $gcm_regid=$_POST['reg'];
	$registatoin_ids = array($gcm_regid);
	$message = array("price" => $_POST['msg']);	
  send_notification($registatoin_ids,$message);
	break;		

  case 'updatekey':
        UpdateKey();
        break;	

}



function UpdateKey(){


$gcm_key=$_POST['key'];
$userId=$_POST['id'];

$SQL = "UPDATE `techyuser` SET `GCMKey`='$gcm_key' WHERE UserId='$userId'";
$result = mysql_query($SQL);

       if($result){   
       
       $arr['status']='1';             
                    echo json_encode($arr);
                    
            }else{
              $arr['status']='2';             
                    echo json_encode($arr);
            }

}


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




function updatepickup(){

$picklist=$_POST['picklist'];
$pickupremark=$_POST['pickupremark'];
$pickupfrontimage=$_POST['frontimage'];
$pickupbackimage=$_POST['backimage'];
$userId=$_POST['userid'];
$SRN=$_POST['srn'];
$isdone=$_POST['isdone'];
$type=$_POST['type'];


$image_front='pickupfront'.$SRN;
$image_back='pickupback'.$SRN;
$pathfront = 'imgupload/'.$image_front.'.png';
$pathback = 'imgupload/'.$image_back.'.png';



$SQL = "UPDATE `techypickupdelivery`SET `checklist`='$picklist',`Remark`='$pickupremark',`FrontImage`='$image_front',`BackImage`='$image_back',`IsDone`='$isdone' WHERE  Id='$userId'";
$result = mysql_query($SQL);

       if($result){   
       
       	if(file_put_contents($pathfront,base64_decode($pickupfrontimage)) || file_put_contents($pathback,base64_decode($pickupbackimage))){
	        $arr['status']='1';
            echo json_encode($arr);
       	    }else{
       	    	 $arr['status']='3';
            echo json_encode($arr);
       	    }
                    
            }else{
            	$arr['status']='2';            	
                    echo json_encode($arr);
            }

}


function updatedeliver(){

$picklist=$_POST['deliverlist'];
$pickupremark=$_POST['deliverremark'];
$pickupfrontimage=$_POST['frontimage'];
$pickupbackimage=$_POST['backimage'];
$userId=$_POST['userid'];
$SRN=$_POST['srn'];
$isdone=$_POST['isdone'];




$image_front='deliverfront'.$SRN;
$image_back='deliverback'.$SRN;
$pathfront = 'imgupload/'.$image_front.'.png';
$pathback = 'imgupload/'.$image_back.'.png';



$SQL = "UPDATE `techypickupdelivery`SET `checklist`='$picklist',`Remark`='$pickupremark',`FrontImage`='$image_front',`BackImage`='$image_back',`IsDone`='$isdone' WHERE  Id='$userId'";
$result = mysql_query($SQL);

       if($result){ 


	                    if(file_put_contents($pathfront,base64_decode($pickupfrontimage)) || file_put_contents($pathback,base64_decode($pickupbackimage))){
	                         $arr['status']='1';
                             echo json_encode($arr);
       	                }else{
       	    	               $arr['status']='3';
                                echo json_encode($arr);
       	                      }
                    
                 }else{
            	       $arr['status']='2';            	
                          echo json_encode($arr);
                       }
       

}




function alldata(){

$userid=$_POST['userid'];

$SQL = "SELECT `Id`,`UserId`, `Type`, `SRN`, `TerminalAddress`, `CustomerAddress`, `Name`, `Mobile`, `Modelname`, `Amount` FROM `techypickupdelivery` WHERE UserId='$userid' AND IsDone='0'";
$result = mysql_query($SQL);


$datamain = array();
  
while ( $db_field = mysql_fetch_assoc($result) ) {
     // print_r($db_field);  
  
  array_push($datamain, $db_field);

}
echo json_encode($datamain);

}


function login(){

	$pass=$_POST['pass'];
	$mail=$_POST['mail'];

	$SQL = "SELECT * FROM `techyuser` WHERE password='$pass' AND MailId='$mail'";
$result = mysql_query($SQL);
if (mysql_num_rows ($result)==0){
  $arr['status']='2';
    echo json_encode($arr);
} else {

$data=mysql_fetch_array($result);
// while ( $db_field = mysql_fetch_assoc($result) ) {
	
   $row = array();

//   // OR just echo the data:
 $row['status']='1';

 $row['id']=$data['Id']; 
  $row['name']=$data['Name']; 
  $row['mobile']=$data['MobileNo'];  
  $row['userid']=$data['UserId']; 
  $row['key']=$data['GcmKey'];  
   

// }
echo json_encode($row);
}
}


function register(){

	$name=$_POST['name'];	
	$mobile=$_POST['mobile'];
	$techy=$_POST['TechyId'];
	$mail=$_POST['mail'];
	$pass=$_POST['pass'];
	
	
	$query1 = "SELECT * FROM `techyuser` WHERE `MailId` = '$mail'";
   $result = mysql_query($query1);
   if (mysql_num_rows ($result)>0){
          $arr['status']='2';
          echo json_encode($arr);
   } else {

           $query1 = "SELECT * FROM `TechyUser` WHERE `TechyId` = '$techy'";
           $result = mysql_query($query1);
          if (mysql_num_rows ($result)>0){
 
              $SQL = "UPDATE `TechyUser` SET `Name`='$name',`MailId`='$mail',`MobileNo`='$mobile',`Password`='$pass' WHERE `TechyId` = '$techy'";
              $result=mysql_query($SQL);
	            if($result){   
                    $arr['status']='1';
                    echo json_encode($arr);
                }

           }else{
	          $arr['status']='3';
              echo json_encode($arr);
              }
 	
	 }
}


?>
<?php
include('db.php');

if(isset($_POST['req']))
{
$req=$_POST['req'];


}

  switch ($req) {
	case 'login':
        $mail=$_POST['mail'];
        $pass=$_POST['pass'];
		
		login($mail,$pass);
		break;

	case 'signup':	   
	     signup();
	break;	
	
	case 'mob':
         mobile();
		break;

	case 'data':
        getNewphonePrice();		
        break;

    case 'devicedeprecation':
        devicedeprecation();		
        break;
		
	case 'deadphone':
        deadphoneprice();		
        break;	

     case 'accessories':
        accessories();		
        break;

    case 'allBrand':
        allBrand();		
        break;

    case 'allRepairType':
        allRepairType();		
        break;

    case 'modelName':
	      $brand=$_POST['brand'];
        modelName($brand);   		
        break;	

    case 'repairTypePrice':
	   $brand=$_POST['brand'];
	   $model=$_POST['model'];
	   $type=$_POST['repairtype'];
	  
        repairTypePrice($brand,$model,$type);   		
        break;

    case 'update_user':
          
		  $name=$_POST['name']; 
		  $address=$_POST['address']; 
		  $mobile=$_POST['mobile']; 
		  $bankname=$_POST['bankname']; 
		  $account=$_POST['account']; 
		  $ifsc=$_POST['ifsc']; 
		  $ac_holdername=$_POST['h_name']; 
		  $id=$_POST['id']; 
		  update_user($name,$address,$mobile,$bankname,$account,$ifsc,$ac_holdername,$id);
		  
         break;	
		 
		 
	case 'processUpdate':
        processUpdate();
         break;
    
    case 'process':
          process();
         break;	
		 
    case 'part':
          getParts();
         break;

    case 'history':
          Allhistory();
         break;

    case 'allParts':
          AllParts();
          break; 

   case 'walkingintery':
          walkingintery();
          break;    

	default:
		// mobile();
		break;
}






//---------------- Second Data Base conoction------------------------

function walkingintery(){

 

$cmd="insert into transaction(sl,trans_id,customer,email,phonenumber,pickupaddress,pickuptime,pickupdate,brand,model,devicetype,problem) values 
('','trans_id3','name2','email2','$phone2','pickupaddress','freetime','freedate','brandname2','model','devicetype','problemid')";

      $result=mysql_query($cmd);
      if($result){
   
    $arr['status']='1';
    echo json_encode($arr);
} else{
   $arr['status']='2';
    echo json_encode($arr);
}

}







//--------------------------ALL PARTS OF MODEL NAME----------------------------

    function AllParts(){
   
   $modelId=$_POST['modelId'];
   
      
  $query1 = "SELECT `Id`, `Name`,  `Price` FROM  `productpart`WHERE modelId =  '$modelId'AND IsActive =  '1'";
   $result = mysql_query($query1);   

  $dataval = array(); 
   while ( $db_field = mysql_fetch_assoc($result) ) {
  
   $row = array(); 
 
    
   $row['name']=$db_field['Name'];
   $row['price']=$db_field['Price'];    
   $row['id']=$db_field['Id'];
    
  array_push($dataval, $row);

}
echo json_encode($dataval);
}




//--------------------------History----------------------------

    function Allhistory(){
   
   $venderId=$_POST['venderId'];
   
      
  $query1 = "SELECT  `SRN`, `Modelname`, `Problem`,`Remark`,'InventrySerialNo',`DateTime` FROM `process` WHERE VenderId='$venderId' AND IsDone=1";
   $result = mysql_query($query1);   

  $dataval = array(); 
   while ( $db_field = mysql_fetch_assoc($result) ) {
  
   $row = array(); 
 
    
   $row['SRN']=$db_field['SRN'];
   $row['Modelname']=$db_field['Modelname'];  
   $row['Problem']=$db_field['Problem'];  
   $row['Remark']=$db_field['Remark'];  
   $row['SerialNo']=$db_field['InventrySerialNo'];  
   $row['date']=$db_field['DateTime'];
    
  array_push($dataval, $row);

}
echo json_encode($dataval);
}


//--------------------------ProductParts----------------------------

    function getParts(){
	 
	
     	
	$query1 = "SELECT `Id`, `Name`, `Description` FROM `productpart` WHERE IsActive=1";
   $result = mysql_query($query1);   

	$dataval = array();	
   while ( $db_field = mysql_fetch_assoc($result) ) {
	
   $row = array(); 
 
   $row['id']=$db_field['Id'];  
   $row['name']=$db_field['Name'];
   $row['description']=$db_field['Description'];     
    
  array_push($dataval, $row);

}
echo json_encode($dataval);
}



//--------------------------Process----------------------------

    function process(){
	 
	 $venderId=$_POST['venderId'];
	 
     	
	$query1 = "SELECT `Id`, `SRN`, `Modelname`, `Problem`, `Received`, `UnderDiagnose`, `InventoryReceived`, `RepairComplete`, `Dispatch`, `Remark` FROM `process` WHERE VenderId='$venderId' AND IsDone=0";
   $result = mysql_query($query1);   

   if (mysql_num_rows ($result)<=0){
  $arr['status']='2';
    echo json_encode($arr);
} else{

$dataval = array(); 
   while ( $db_field = mysql_fetch_assoc($result) ) {
  
   $row = array(); 
 
   $row['id']=$db_field['Id'];  
   $row['SRN']=$db_field['SRN'];
   $row['Modelname']=$db_field['Modelname'];  
   $row['Problem']=$db_field['Problem'];  
   $row['Received']=$db_field['Received'];  
   $row['UnderDiagnose']=$db_field['UnderDiagnose'];  
   $row['InventoryReceived']=$db_field['InventoryReceived'];  
   $row['RepairComplete']=$db_field['RepairComplete'];  
   $row['Dispatch']=$db_field['Dispatch'];  
   $row['Remark']=$db_field['Remark'];  
    
  array_push($dataval, $row);

}
echo json_encode($dataval);

}

	
}
 
//--------------------Process Update-----------------------------


function processUpdate(){
	 
	 $received=$_POST['received'];
	 $underDiagnose=$_POST['underDiagnose'];
	 $inventeryreceived=$_POST['inventeryreceived'];
	 $repairComplit=$_POST['repairComplit'];
	 $dispatch=$_POST['dispatch'];
	 $done=$_POST['done'];
	 $id=$_POST['Id'];
	 $remark=$_POST['remark'];
	 
     	
	$query1 = "UPDATE `process` SET `Received`=$received,`Remark`='$remark',`UnderDiagnose`=$underDiagnose,`InventoryReceived`=$inventeryreceived,`RepairComplete`=$repairComplit,`Dispatch`=$dispatch,`IsDone`=$done WHERE Id='$id'";
   $result = mysql_query($query1);   

	if($result){
   
    $arr['status']='1';
    echo json_encode($arr);
}	
} 
 

function signup(){

	$name=$_POST['name'];
	$address = $_POST['address'];
	$mobile=$_POST['mobile'];
	$vender=$_POST['venderid'];
	$mail=$_POST['mail'];
	$pass=$_POST['pass'];
	$tin=$_POST['tin'];
	
	$query1 = "SELECT * FROM `venderuser` WHERE `MailId` = '$mail'";
   $result = mysql_query($query1);
if (mysql_num_rows ($result)>0){
  $arr['status']='2';
    echo json_encode($arr);
} else {
  $SQL = "INSERT INTO `venderuser`(`Name`, `Address`, `Mobile`, `VenderId`, `MailId`, `Password`, `TinNo`, `BankName`, `AccountNo`, `IFSC`, `AccountHName`) VALUES ('$name','$address','$mobile','$vender','$mail','$pass','$tin','','','','')";
       $result=mysql_query($SQL);
	if($result){
   
    $arr['status']='1';
    echo json_encode($arr);
}	
	 }
}

function login($mail,$pass)
{

// $SQL = "SELECT * FROM tbluser";
// $SQL = "SELECT * FROM `tbluser` WHERE password=$pass AND MailId=$mail"
$SQL = "SELECT * FROM `venderuser` WHERE password='$pass' AND MailId='$mail'";
$result = mysql_query($SQL);
if (mysql_num_rows ($result)==0){
  $arr['status']='2';
    echo json_encode($arr);
} else {
$data = array();
while ( $db_field = mysql_fetch_assoc($result) ) {
	
   $row = array();

  // OR just echo the data:
 $row['status']='1';
  $row['name']=$db_field['Name'];
  $row['address']=$db_field['Address'];
  $row['mobile']=$db_field['Mobile'];
  $row['mailid']=$db_field['MailId']; 
  $row['id']=$db_field['VenderId']; 
  $row['bankname']=$db_field['BankName'];
  $row['accountno']=$db_field['AccountNo '];
  $row['holdername']=$db_field['accountHName'];
  $row['ifsc']=$db_field['IFSC'];
  

}
echo json_encode($row );
}
}

function getNewphonePrice(){	
	
	$query1 = "SELECT brand,model,costing FROM `device_costing`";
   $result = mysql_query($query1);
    
	$data = array();
	$dataval = array();
	$brand="";
	
while ( $db_field = mysql_fetch_assoc($result) ) {
	
   $row = array();

  // OR just echo the data:
  
  if($db_field['brand']!=$brand){
	
if($dataval!=null){
  $data[$brand]=$dataval;
  $dataval=array();
  }	 
  $brand=$db_field['brand']; 
  }
   $row['model']=$db_field['model'];  
  $row['prise']=$db_field['costing'];
  //$row['brand']=$db_field['brand'];  
  array_push($dataval, $row);

}
echo json_encode($data); 
}

// ------------------DeadPhonePrice--------------------------------------

function deadphoneprice(){
	$query1 = "SELECT pricerange,price FROM `dead_phone_costing`";
   $result = mysql_query($query1);   

	$dataval = array();	
   while ( $db_field = mysql_fetch_assoc($result) ) {
	
   $row = array(); 
 
   $row['range']=$db_field['pricerange'];  
  $row['price']=$db_field['price'];
  //$row['brand']=$db_field['brand'];  
  array_push($dataval, $row);

}
echo json_encode($dataval);
}

// --------------------------------------------------------

function allBrand(){
	$query1 = "SELECT brandName,Id FROM `brand` WHERE isActive=1";
   $result = mysql_query($query1);   

	$dataval = array();	
   while ( $db_field = mysql_fetch_assoc($result) ) {
	
   $row = array(); 
 
   $row['brandName']=$db_field['brandName'];  
   $row['id']=$db_field['Id'];
  //$row['brand']=$db_field['brand'];  
  array_push($dataval, $row);

}
echo json_encode($dataval);
}

// --------------------------------------------------------

function allRepairType(){
	$query1 = "SELECT Type FROM `repairtype` WHERE isActive=1";
   $result = mysql_query($query1);   

	$dataval = array();	
   while ( $db_field = mysql_fetch_assoc($result) ) {
	
   $row = array(); 
 
   $row['Type']=$db_field['Type'];  
  //$row['price']=$db_field['price'];
  //$row['brand']=$db_field['brand'];  
  array_push($dataval, $row);

}
echo json_encode($dataval);
}


// --------------getModelName-----------------------------


function modelName($brand){
	$query1 = "SELECT Name,Id FROM `modelname` WHERE BrandName='$brand'";
   $result = mysql_query($query1);   

	$dataval = array();	
   while ( $db_field = mysql_fetch_assoc($result) ) {
	
   $row = array(); 
 
   $row['ModelName']=$db_field['Name'];  
   $row['id']=$db_field['Id'];
  //$row['brand']=$db_field['brand'];  
  array_push($dataval, $row);

}
echo json_encode($dataval);
}


// --------------getPrice-----------------------------


function repairTypePrice($brand,$model,$repairtype){
	$query1 = "SELECT Price FROM `repaircost` WHERE Brand='$brand' AND Model='$model' And RepairType='$repairtype'";
   $result = mysql_query($query1);   

	$dataval = array();	
   while ( $db_field = mysql_fetch_assoc($result) ) {
	
   $row = array(); 
 
   $row['Price']=$db_field['Price'];  
  //$row['price']=$db_field['price'];
  //$row['brand']=$db_field['brand'];  
  array_push($dataval, $row);

}
echo json_encode($dataval);
}

//----------------------------Update User Profile-----------------------------------

function update_user($name,$address,$mobile,$bankname,$account,$ifsc,$ac_holdername,$id){
	
  $SQL = "UPDATE `venderuser` SET `Name`='$name',`Address`='$address',`Mobile`='$mobile',`BankName`='$bankname',`AccountNo`='$account',`IFSC`='$ifsc',`accountHName`='$ac_holdername' WHERE Id='$id'";
       $result=mysql_query($SQL);
	if($result){
   
    $arr['status']='1';
    echo json_encode($arr);
	
	 }
	
	
}

//-------------------------OldPhonePrise-------------------------------------------

function devicedeprecation(){
	$query1 = "SELECT period,depreciation FROM `device_depreciation`";
   $result = mysql_query($query1);   

	$dataval = array();	
   while ( $db_field = mysql_fetch_assoc($result) ) {
	
   $row = array(); 
 
   $row['period']=$db_field['period'];  
  $row['depreciation']=$db_field['depreciation'];
  //$row['brand']=$db_field['brand'];  
  array_push($dataval, $row);

}
echo json_encode($dataval);
}


//--------------------Accessories------------------------------------------


function accessories(){
	$query1 = "SELECT amount_range,ear_phone,invoice,charger,box FROM `accessories_depreciation`";
   $result = mysql_query($query1);   

	$dataval = array();	
   while ( $db_field = mysql_fetch_assoc($result) ) {
	
   $row = array(); 
 
   $row['amount_range']=$db_field['amount_range'];  
  $row['earphone']=$db_field['ear_phone'];
  $row['invoice']=$db_field['invoice'];
  $row['charger']=$db_field['charger'];
  $row['box']=$db_field['box'];
  //$row['brand']=$db_field['brand'];  
  array_push($dataval, $row);

}
echo json_encode($dataval);
}

function mobile()
{

$SQL = "SELECT brand.Id, brand.Name AS 'Brand Name', IFNULL(modal.Name,'') AS 'Modal Name' FROM tblbrand brand LEFT JOIN tblmodal modal on brand.Id=modal.BrandId AND modal.DeviceId=1";
$result = mysql_query($SQL);



$data = array();
$data1 = array();
$PreId = 0;
$val='';
while ( $db_field = mysql_fetch_assoc($result) ) {
     // print_r($db_field);
	
   $row = array();

  $Id =$db_field['Id'];
  if($PreId != $Id)
  {
  	if($PreId != 0)
  	{
  		$col = array();
            $col[$val]=$data;
  		array_push($data1, $col); 
  	}
  	$PreId = $Id;  	
  	$data = array();
  }
    // $row['Name']=$db_field['Brand Name'];
    $val=$db_field['Brand Name'];
    $row['userM']=$db_field['Modal Name'];
    array_push($data, $row);  
}
array_push($data1, $data);
// print_r($val);
echo json_encode($data1);

}

?>

<?php

echo 'maisis working';
$path='invoices/IN1.pdf';
$filename=$path;
$file = $filename;;
$replyto='chandanjha.7@gmail.com';
    $file_size = filesize($file);
    $handle = fopen($file, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $name = basename($file);
    $message='Hello Admin  designer'.$designer.' uploaded a product. Have a look, consider the attachment and verify on the link below to release it automatically'."\r\n";
     $message.='click on this link to activate '.'www.claymango.com/updated/productverified.php?active='.$pcode."\r\n"."\r\n";
    $message.="PRODUCT NAME :".$title."\r\n";
    $message.="MATERIAL USED :".$material."\r\n";
   

      $message.="PRODUCT MAINCATEGORY :".$tag1."\r\n";
    $message.="PRODUCT SUBCATEGORY :".$tag2."\r\n";
       $message.=" ABOUT PRODUCT:".$about."\r\n";
         $message.=" PRICE OF THE ITEM: RS".$cost."\r\n";
    $message.="DESIGNER NAME :".$designer."\r\n";
    $header    = "From: " . $from_name . " <" . $from_mail . ">\n";
$header .= "Reply-To: " . $replyto . "\n";
$header .= "MIME-Version: 1.0\n";
$header .= "Content-Type: multipart/mixed; boundary=\"" . $uid . "\"\n\n";
$emessage = "--" . $uid . "\n";
$emessage .= "Content-type:text/html; charset=iso-8859-1\n";
$emessage .= "Content-Transfer-Encoding: 7bit\n\n";
$emessage .= $message . "\n\n";
$emessage .= "--" . $uid . "\n";
$emessage .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"\n"; // use different content types here
$emessage .= "Content-Transfer-Encoding: base64\n";
$emessage .= "Content-Disposition: attachment; filename=\"" . $filename . "\"\n\n";
$emessage .= $content . "\n\n";
$emessage .= "--" . $uid . "--";

 //mail('amritk058@gmail.com ','new product approval',$message,$header);
    $status=mail('chandanjha.7@gmail.com','new product approval',$message,$header);
    echo 'statusi s'.$status;




   if (mail('chandanjha.7@gmail.com', 'view attacment', "", $header)) {
       echo "mail send ... OK"; // or use booleans here
     else {
       echo "mail send ... ERROR!";
    }
<?php
$email = new PHPMailer();
$email->From      = 'you@example.com';
$email->FromName  = 'Your Name';
$email->Subject   = 'Message Subject';
$email->Body      ='Hi user please find the attchament of invoice for your transaction Id: MB151613';
$email->AddAddress( 'chandanjha.7@gmail.com' );

$file_to_attach = 'invoices/IN1.pdf';

$email->AddAttachment( $file_to_attach , 'chandan1.pdf' );

return $email->Send();
?>
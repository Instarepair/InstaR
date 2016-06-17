<?php 
$subject="html template";
  $to   = "ambidextrous.sodhi@gmail.com";
  $from = '';


  $headers = "From: " . strip_tags($from) . "\r\n";
  $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
  $headers .= "n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = '<html><body>';
 

$message = '<html>
<body>



<a href="www.instarepair.in"><div style="width:100%;height:230px;">

<img src="www.todlabs.com/mailimg/insta-repair-emailer.png">
</div></a>


</body>

</html>';
$subject='instarepair mail !';

 mail($to, $subject, $message, $headers);

 mail('is@instarepair.in','promotion of instarepair', $message, $headers);

?>
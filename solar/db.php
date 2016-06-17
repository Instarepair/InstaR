<?php
//Give your mysql username password and database name

$con=@mysql_connect("localhost","bloguser","blog123");

mysql_select_db("blog",$con);


?>
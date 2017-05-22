<?php 
 	$host = "128.199.168.53";
 	$user = "im12user_db";
 	$pass = "s0Qh5EyajreTuERc";
 	$db_name = "im12";

 	$mysqli = new mysqli($host,$user,$pass,$db_name) OR die("Connection Error!");

 	mysqli_set_charset($mysqli,"utf8");

 ?>
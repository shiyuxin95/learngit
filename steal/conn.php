<?php
 $host='localhost';
 $user='root';
 $password='';
 $db='msgboard';
 
 $mysqli=new mysqli($host,$user,$password,$db);
 
 if($mysqli->connect_error){
 	die('Error:('.$mysqli->connect_errno.')'.$mysqli->connect_error);
 }
?>
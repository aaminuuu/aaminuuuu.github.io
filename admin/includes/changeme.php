<?php
//******WARNING******* dont change the variable name here
//set or change the credentials of your phpmyadmin here 
$adminpass="admin";//admin password
$server="localhost";
$admin="root";
$password="password";
$database="idealcupboard";//note that if you change the database name here all previous data stored will be lost
$con=NEW MySQLi($server,$admin,$password);
if($con->connect_error){}
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if($con->query($sql)){}
$con->close();
$conn=NEW MySQLi($server,$admin,$password,$database);
?>
<?php
$byuser=$_REQUEST["id"];
$blogname=$_REQUEST["bg"];
$server="localhost";
$admin="root";
$password="password";
$database="idealcupboard";
$conn=NEW MySQLi($server,$admin,$password,$database);
$sql="DELETE FROM COMMENT WHERE BYUSER='$byuser' AND TOBLOG='$blogname'";
if($conn->query($sql)){
	header("Location:blogdesc.php?N=$blogname");
}
?>
<?php 
session_start();
include("changeme.php");
if($conn->connect_error){echo "not connected";}
$sql="select 1 from USERS LIMIT 1";
if($conn->query($sql)==FALSE)
{
	$sql="CREATE TABLE USERS(
		USERNAME VARCHAR(250) PRIMARY KEY,
		EMAIL VARCHAR(250),
		NAME VARCHAR(250),
		PASSWORD VARCHAR(250),
		CREATED TIMESTAMP(6) DEFAULT CURRENT_TIMESTAMP(6))";
	if($conn->query($sql)){}
	$sql="CREATE TABLE CONTACT(
		NAME VARCHAR(250),
		EMAIL VARCHAR(250),
		CREATED TIMESTAMP(6) DEFAULT CURRENT_TIMESTAMP(6))";
	if($conn->query($sql)){}
	$sql="CREATE TABLE BLOGS(
		CNAME VARCHAR(250) PRIMARY KEY,
		CIMAGE VARCHAR(250))";
	if($conn->query($sql)){}
		$sql="CREATE TABLE DESCRIPTION(
		CNAME VARCHAR(250),
		TDATA MEDIUMTEXT,
		FOREIGN KEY(CNAME) REFERENCES BLOGS(CNAME))";
	if($conn->query($sql)){}
	$sql="CREATE TABLE COMMENT(
		COMMENTS VARCHAR(250),
		BYUSER VARCHAR(250),
		TOBLOG VARCHAR(250),
		FOREIGN KEY(BYUSER) REFERENCES USERS(USERNAME))";
	if($conn->query($sql)){}
}
if (isset($_SESSION["ISLOGIN"])==FALSE) {
	$_SESSION["ISLOGIN"]=FALSE;
	$_SESSION["USER"]=NULL;
	$_SESSION["NAME"]=NULL;}
$info=NULL;
function login()
{	$info=NULL;
	$username=$_POST["user"];
	$pword=md5($_POST["pword"]);
	include("changeme.php");
	$sql="SELECT * FROM USERS WHERE USERNAME='$username' AND PASSWORD='$pword'";
	$result=$conn->query($sql);
	if($result->num_rows==1)
	{
		$_SESSION["ISLOGIN"]=TRUE;
		$_SESSION["USER"]=$username;
		?><script type="text/javascript">window.location.href='../';</script><?php
	}
	else
	{
		$info="Wrong credentials ! Try Again";
	}
	return "$info";
}
function register()
{
	$username=$_POST["user"];
	$uname=$_POST["name"];
	$mail=$_POST["mail"];
	$pword=md5($_POST["pword"]);
	include("changeme.php");
		$sql="INSERT INTO USERS(USERNAME,EMAIL,NAME,PASSWORD) VALUES('$username','$mail','$uname','$pword')";
		if($conn->query($sql)){
			$info="registered successfully now login";	
		}
	
	return "$info";
}
function coment()
{
	$user=$_SESSION["USER"];
	$comment=$_POST["cmnted"];
	$forblog=$_SESSION["openblog"];
	include("changeme.php");
	$sql="INSERT INTO COMMENT(COMMENTS,BYUSER,TOBLOG) VALUES('$comment','$user','$forblog')";
	if($conn->query($sql)){$info="commented";}else{$info="Failed";}
	return "$info";
}
function edtcmt()
{
	$cmt=$_POST["textcmt"];
	$byuser=$_SESSION["byuser"];
	$blogname=$_SESSION["toblog"];
	include("changeme.php");
	$sql="UPDATE COMMENT SET COMMENTS='$cmt' WHERE BYUSER='$byuser' AND TOBLOG='$blogname'";
	if($conn->query($sql)){
		$info="comment edited";	
	}
}

if(isset($_POST['login'])){$info=login();}
if(isset($_POST['register'])){$info=register();}
if(isset($_POST['comment'])){$info=coment();}
if(isset($_POST['save'])){$info=edtcmt();}
?>
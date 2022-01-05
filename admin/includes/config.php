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
	$adminpass=md5($adminpass);
	$sql="INSERT INTO USERS(USERNAME,EMAIL,NAME,PASSWORD) VALUES('admin','admin@admin','admin','$adminpass')";
	if($conn->query($sql)){}
}
function makeDir($path){return is_dir($path) || mkdir($path);}
makeDir("BLOG");
makeDir("BLOG/BIMAGE/");
$info=NULL;
function updcategory()
{
	$cname=$_POST["ctgyname"];
	$cimage=$_SESSION["updusercov"];
	include("includes/changeme.php");
	$sql="INSERT INTO BLOGS(CNAME,CIMAGE) VALUES('$cname','$cimage')";
	if($conn->query($sql)==TRUE)
		{
			$sql="INSERT INTO DESCRIPTION(CNAME,TDATA) VALUES('$cname','NULL')";
	if($conn->query($sql)==TRUE)
		{
			?><script type="text/javascript">window.location.href='Blogs.php';</script><?php
		}
		}
}
function updsubtopic()
{
	$sdesc=$_POST["desctpc"];
	$ctgyname=$_SESSION["blgedit"];
	include("includes/changeme.php");
	$sql="UPDATE DESCRIPTION SET TDATA='$sdesc' WHERE CNAME='$ctgyname'";
	if($conn->query($sql)==TRUE)
		{
			$_SESSION["blgedit"]=NULL;
			?><script type="text/javascript">window.location.href='Blogs.php';</script><?php
		}
}
function adminlgn()
{
	$pword=md5($_POST["pword"]);
	include("includes/changeme.php");
	$sql="SELECT * FROM USERS WHERE USERNAME='admin'";
	$result = $conn->query($sql);
    $row = $result -> fetch_assoc();
	$adpss=$row["PASSWORD"] ?? NULL;
	if($pword==$adpss)
	{
		$info=NULL;
		?><script type="text/javascript">window.location.href='Users.php';</script><?php
	}
	else
	{
		$info="Wrong password try again";
	}
	return "$info";
}


if(isset($_POST['addctgy'])){updcategory();}
if(isset($_POST['editsbtpc'])){updsubtopic();}
if(isset($_POST['lgnadmn'])){$info=adminlgn();}
?>
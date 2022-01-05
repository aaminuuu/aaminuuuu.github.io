<?php
$ctgy=$_REQUEST["id"];
echo "deleting $ctgy ....";
include("includes/changeme.php");
$sql="DELETE FROM DESCRIPTION WHERE CNAME='$ctgy'";
if($conn->query($sql)==TRUE)
{
	$sql="DELETE FROM BLOGS WHERE CNAME='$ctgy'";
	if($conn->query($sql)==TRUE)
{
	?><script type="text/javascript">window.location.href='Blogs.php';</script><?php
}
}
?>
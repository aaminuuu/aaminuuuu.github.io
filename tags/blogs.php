<?php
include("includes/changeme.php");
$sql="SELECT * FROM BLOGS";
$result = $conn->query($sql);
while($row = $result -> fetch_assoc())
{
    $blogname=$row["CNAME"];
    $blogimage=$row["CIMAGE"];
	$display="<a href=".'"'."blogdesc.php?N=$blogname".'"'."><img src='admin/$blogimage'><br>&nbsp;&nbsp;$blogname</a>";
	echo "$display";
}
?>
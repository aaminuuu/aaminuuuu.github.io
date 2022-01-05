<?php
include("includes/config.php");
$byuser=$_REQUEST["id"];
$blogname=$_REQUEST["bg"];
$cmt=$_REQUEST["cmt"];
$_SESSION["byuser"]=$byuser;
$_SESSION["toblog"]=$blogname;
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=PT+Mono&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<style>
</style>
</head>
<body>
<div class="sidenav">
    <h1><a href="index.php">Ideal Cupboard</a></h1>
    <a href="#about">About</a>
    <a href="#contact">Contact</a>
</div>
<div class="main"><br/><br/>
<form action="" method="POST">
  <div class="form">
    <div class="form-group col-md-11">
      <textarea name="textcmt"><?php echo $cmt; ?></textarea>
  </div>
	<div class="form-group col-md-9">
  <input type="submit" class="button6" name="save" value="save">
  </div>
</form>
<?php echo "$info";?>
</body>
</html> 

<?php include("../includes/config.php");?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/style.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=PT+Mono&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<style>
</style>
</head>
<body background="../fire.gif" style="background-repeat: no-repeat; background-size: cover;">
<button class="button5" onclick='location.href="register.php";' >Register</button>
<div class="sidenav">
    <h1><a href="../">Ideal Cupboard</a></h1>
    <a href="#about">About</a>
    <a href="#contact">Contact</a>
</div>
<div class="main"><br/><br/>
<form action="" method="POST">
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputEmail4">Username</label>
      <input type="text" class="form-control" name="user" id="inputEmail4" placeholder="@username">
    </div>
    <div class="form-group col-md-5">
      <label for="inputPassword4">password</label>
      <input type="password" class="form-control" name="pword" id="inputPassword4" placeholder="enter password" minlength=8 maxlength=15 >
    </div>
  </div>
  
  <input type="submit" class="btn" name="login" value="login">
</form>
<?php echo "$info";?>
</body>
</html> 

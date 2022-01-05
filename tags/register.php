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
<button class="button5" onclick='location.href="login.php";' >login</button>
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
      <label for="inputPassword4">Name</label>
      <input type="text" class="form-control" name="name" id="inputPassword4" placeholder="full name">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-10">
    <label for="inputAddress">Email</label>
    <input type="email" class="form-control" name="mail" id="inputAddress" placeholder="your@email.here">
  </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputEmail4">password</label>
      <input type="password" class="form-control" id="inputEmail4" name="pword" placeholder="min 8 chars" minlength='8' maxlentgh='15'>
    </div>
    <div class="form-group col-md-5">
      <label for="inputPassword4">Re-Enter password</label>
      <input type="password" class="form-control" id="inputPassword4" name="pword2" placeholder="re-enter Password">
    </div>
  </div>
  <input type="submit" class="btn" name="register" value="Register">
</form><?php echo "$info";?>
</body>
</html> 

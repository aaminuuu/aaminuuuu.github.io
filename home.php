<?php include("includes/config.php");?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=PT+Mono&display=swap" rel="stylesheet">
    </head><title>Ideal Cupboard</title>
    <body background="fire.gif" style="background-repeat: no-repeat; background-size: cover;">
    <?php if($_SESSION["ISLOGIN"]==FALSE)
    {
        ?> 
        <button class="button4" onclick='location.href="tags/login.php";' >login</button>
        <button class="button5" onclick='location.href="tags/register.php";' >Register</button>
        <?php 
    }
    else
    {
        ?>
       <button class='button4'><?php echo $_SESSION["USER"]; ?> </button>
         <button class="button5" onclick='location.href="tags/logout.php";' >Logout</button>
        <?php 
    }
    ?>
        <div class="sidenav">
            <a href="index.php"><h2>Ideal Cupboard</h2></a>
            <a href="#about">About</a>
            <a href="#contact">Contact</a>
        </div><br><br>
        <div class="main">
        <?php include("tags/blogs.php");?>
        </div>
    </body>
</html>
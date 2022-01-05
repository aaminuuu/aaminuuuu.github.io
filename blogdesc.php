<?php
$blogname=$_REQUEST["N"];
include("includes/changeme.php");
$sql="SELECT * FROM BLOGS WHERE CNAME='$blogname'";
$result = $conn->query($sql);
$row = $result -> fetch_assoc();
$blogname=$row["CNAME"];
$blogimage="admin/".$row["CIMAGE"];
$sql="SELECT * FROM DESCRIPTION WHERE CNAME='$blogname'";
$result = $conn->query($sql);
$row = $result -> fetch_assoc();
$bdata=$row["TDATA"];
include("includes/config.php");
$_SESSION["openblog"]=$blogname;

?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=PT+Mono&display=swap" rel="stylesheet">
    </head><title>IdealCupboard</title>
    <body>
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
        <button class='button5' ><?php echo $_SESSION["USER"]; ?> </button>
        <?php 
    }
    ?>
        <div class="sidenav-1">
            <a href="index.php"><h2>Ideal Cupboard</h2></a>
            <a href="#about">About</a>
            <a href="#contact">Contact</a>
        </div>
        <div class="main">
            <div class="focusimg">
                <img src="<?php echo $blogimage; ?>">
                <h1><?php echo $blogname; ?></h1>
                <p><?php echo $bdata; ?></p>
            </div>
            <form action="" method="POST">
                <textarea name="cmnted" placeholder="Give some comments ..." maxlength="100" ></textarea>
                <input type="submit" name="comment" value="Comment" class="button6">
            </form><?php echo $info;?>
            
            <h1>Comments :</h1>
            <?php
                include("includes/changeme.php");
                $sql="SELECT * FROM COMMENT WHERE TOBLOG='$blogname'";
                $result = $conn->query($sql);
                while($row = $result -> fetch_assoc())
                {
                    $comment=$row["COMMENTS"];
                    $byuser=$row["BYUSER"];
                    echo " <div class='comments'>";
                    echo " <h2>$byuser</h2>";
                    echo " <p>$comment</p></div><form>";
                    echo "<a href='editcmnt.php?id=$byuser&bg=$blogname&cmt=$comment' class='button6'>Edit</a>";
                    echo "<a href='delcmnt.php?id=$byuser&bg=$blogname' class='button6'>Delete</a>";
                    echo "</form> <hr class='new4'></hr></div>";
                }
            ?>
        </div>
    </body>
</html>

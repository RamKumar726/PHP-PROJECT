<?php
  session_start();
    include("./Db.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../CSS/signup.css">
  <style>
    .left{
    background: #DD4B39;
        

    }
    .right{
        background: white;
    }
    .left img{
        margin-left: -90px;
        margin-top: 180px;
    }
  </style>
</head>
<body>
<div id="login-box">
  <div class="right">
    <form action="./validlogin.php" method="post">
    <h1>Sign In</h1>
    <input type="text" name="semail" placeholder="E-mail" />
    <div class="help"></div>
    <input type="password" name="spass" placeholder="Password" />
    <div class="help"></div>
    
   <a href=""> <input type="submit" name="signin" value="Log in" /></a><br>
   <a href="./signup.php" id="create">Create an Account</a>
    </form>
  </div>
  
  <div class="left">
    <img src="../IMAGES/signupbus.png" width="400px" height="200px">
  </div>
</div>
<script src="../JS/index.js"></script>

</body>
</html>
<?php ?>


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
    body{
      background: rgb(219, 64, 64);
    }
    .right{
      background-color: whitesmoke;
    }
    .help{
      color: red;
      font-size: smaller;
    }
    .left{
      height: fit-content;
      padding-bottom: 38px;
    }
   
  </style>
</head>
<body>
<div id="login-box">
  <div class="left" id="left">
    <h1>Sign up</h1>
    <form action="./signup.php" method="post">
      
    <input type="text" name="name" id="name" placeholder="Username" />
    <div class="help"></div>

    <input type="text" name="email" id="email" placeholder="E-mail" />
    <div class="help"></div>

    <input type="password" name="pass" id="pass" placeholder="Password" />
    <div class="help"></div>

    <input type="password" name="cpass"  id="cpass" placeholder="Retype password" />
    <div class="help"></div>

    
   <a href="./login.php"> <input type="submit" name="signup" value="Sign me up" /></a><br>
   Already have an account<a href="./login.php"> Click Here</a>



    </form>
  </div>
  
  <div class="right" id="right">
    <img src="../IMAGES/sbus.png" width="300px" height="300px">
  </div>
</div>



<script src="../JS/index.js"></script>
</body>
</html>

<?php
    if(isset($_POST['signup'])){
        if(!empty($_POST['name']) && !empty($_POST['email']) &&  !empty($_POST['pass']) && !empty($_POST['cpass'])){
            $name=$_POST['name'];
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            $cpass=$_POST['cpass'];
            $_SESSION['user']=$name;
            
            $sql="INSERT INTO signup (name,email,pass,cpass) VALUES('$name','$email','$pass','$cpass')";
            mysqli_query($conn,$sql);
            echo"<script>alert('successful')</script>";
            header("Location: ./login.php");

            mysqli_close($conn);
        }  
    }
    
    

?>
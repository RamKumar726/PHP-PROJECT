<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NavBar</title>
    <link rel="stylesheet" href="../CSS/HomePage.css">
    <style>
        #user{
            margin-left: 65%;
        }
        #logout{
           border: none;
            background: #e94646e0;
            color: white;
            border-radius: 3px;
            width: 100px;
            height: 30px;
            margin-top: 30px;
            transition: all 0.5s ease-in-out;
        }
        #logout:hover{
            background: #e40505e0;
    text-decoration: none;
    transform: translateY(-10px);
        }
    </style>
</head>
<body>
    <div class="nav">
        <h1><span>Bus</span>Booking</h1>
           <h1 id="user"><?php echo $_SESSION['user'];?></h1>
           <a href="#"><button id="logout">Log out</button></a>
       </div>


    <script>
        document.getElementById('logout').addEventListener('click',function(){
            let logout=confirm('Are You Sure To Logout');
            if(logout==true){
                window.location.href='../PHP/signup.php';
            }
            else{
                window.location.href='../PHP/HomePage.php';
            }
        });
    </script>
</body>

</html>

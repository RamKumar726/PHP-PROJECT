<?php
    session_start();
    include("./Db.php");
?>
<?php
if(isset($_POST['signin'])){
    if(!empty($_POST['semail']) &&  !empty($_POST['spass'])){
        $emailToCheck = $_POST['semail'];
        $passwordToCheck =$_POST['spass'];
        $sql = "SELECT * FROM signup WHERE email ='$emailToCheck' limit 1 ";
        $result=mysqli_query($conn,$sql);
        if($result){
            if($result && mysqli_num_rows($result)>0){
                $user_data=mysqli_fetch_assoc(($result));
                $_SESSION['user']=$user_data['name'];
                if($user_data['pass']==$passwordToCheck){
                    echo"<script>alert('successful')</script>";

                    header("Location: ./HomePage.php");
        die;


                }
                else{
                    echo"<script>alert('invalid user')</script>";

                    header("Location: ./login.php");


                }
            }
        }

        echo"<script>alert('wromg')</script>";
    

    }
}
?>
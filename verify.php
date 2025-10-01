<?php
include_once("db_Connect.php");

$token = $_GET['token'];
$email = $_GET['email'];

$q_verify = "SELECT * FROM user_details WHERE email = '$email' AND token = '$token'";
$res = mysqli_query($con,$q_verify);

if(mysqli_num_rows($res) == 1){

    $updt = "UPDATE user_details SET verified=1 WHERE email = '$email' AND token = '$token'";
    if(mysqli_query($con,$updt)){

        setcookie('success',"Email verified! Now you can login",time()  +5);
        header("Location: login.php");
    } 
    else {
        setcookie('error',"Email verification failed!",time() + 5);
        header("Location: login.php");
    }
}
else{

    setcookie('error','Email not registered',time() + 5);
    header("Location: login.php");
}


?>
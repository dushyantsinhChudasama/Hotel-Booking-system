<?php


include_once("db_Connect.php");

//checking for login
if(isset($_POST['loginBtn'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    //matching email and pass
    $q_login = "SELECT * FROM user_details WHERE email = '$email' ANd password = '$password'";

    //getting role
    $role = "SELECT role FROM user_details WHERE email = '$email' ANd password = '$password'";

    $res_login = mysqli_query($con,$q_login);
    $res_role = mysqli_query($con,$role);

    if(mysqli_num_rows($res_login) > 0)
    {
        if($role == 'user'){

            echo "<script>showAlert('Success','$role');</script>";
        }
        if($role == 'admin'){

            echo "<script>showAlert('error','$role');</script>";

        }
    }
}

else{
    
    echo "<script>showAlert('error','Email not registered');</script>";
}

?>
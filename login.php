<!-- Checking for login -->

<?php
session_start();
include_once("db_Connect.php");

if(isset($_POST['loginBtn'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    //matching email and pass
    $q_login = "SELECT * FROM user_details WHERE email = '$email' AND password = '$password'";
    $res_login = mysqli_query($con,$q_login);


    if(mysqli_num_rows($res_login) > 0)
    {

        $row = mysqli_fetch_assoc($res_login);
        $role = $row['role'];
        $status = $row['status'];
        
        
        //redirecction based on user role
        if($role == 'user'){

            if($status == 'active')
            {

                //creating session
                $_SESSION['login'] = true;
                $_SESSION['uid'] = $row['id'];
                $_SESSION['uname'] = $row['full_name'];

                header('Location: index.php');
            }
            
        }
        if($role == 'admin'){

            //creating admin session

            $_SESSION['loginAdmin'] = true;
            $_SESSION['adminID'] = $row['id'];

            header('Location: admin/dashboard.php');

        }

    } else {
    
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            showAlert('error', 'Email not registered or Invalid Password');
        });
        </script>";
    }
}

?>

<?php
ob_start();
$title_page = "DC Hotels - Login";

?>
<div class="container py-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-7 col-lg-6">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <!-- Header Banner -->
                <div class="text-center py-4 bg-dark">
                    <h3 class="fw-bold text-white mb-0"><i
                                class="bi bi-person-circle fs-3 me-2"></i>Login</h3>
                </div>

                <!-- Login Form -->
                <div class="card-body p-4">
                    <form id="loginForm" method="post" >
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="text" class="form-control border-2 border-teal" id="email" name="email" placeholder="Enter your email" data-validation="required email">
                            <span class="error text-danger" id="emailError">
                            </span>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input type="password" class="form-control border-2 border-teal" id="password" name="password" placeholder="Enter your password" data-validation="required">
                            <span class="error text-danger" id="passwordError">

                            </span>
                        </div>

                        <!-- Remember Me + Forgot Password -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">
                                    Remember Me
                                </label>
                            </div>
                            <a href="forgot_password.php" class="text-decoration-none" style="color:#0d9488;">Forgot Password?</a>
                        </div>

                        <!-- Submit -->
                        <button type="submit" class="btn w-100 text-white fw-semibold bg-dark" name="loginBtn">Login</button>
                    </form>

                    <!-- Divider -->
                    <div class="text-center my-3">
                        <span class="text-muted">OR</span>
                    </div>

                    <!-- Register Link -->
                    <div class="text-center">
                        <p class="mb-0">Don't have an account?
                            <a href="register.php" class="fw-semibold text-decoration-none" style="color:#0d9488;">Register Now</a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
include_once("layout.php")

?>
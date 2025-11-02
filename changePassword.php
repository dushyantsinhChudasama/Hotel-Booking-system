<?php

$title_page = "change password";
ob_start();
include_once("db_Connect.php");

$token = $_GET['token'];
$email = $_GET['email'];

$q_verify = "SELECT * FROM user_details WHERE email = '$email' AND token = '$token'";
$res = mysqli_query($con,$q_verify);

if(mysqli_num_rows($res) == 1)
{


}
else
{
    ?>

    <script>
        alert("Invalid authentication");
    </script>
    <?php
        header("Location: Login.php");
}

if(isset($_POST['changePassword']))
{
    $password = $_POST['password'];

    $update_password = "UPDATE user_details SET password = '$password' WHERE email = '$email' AND token = '$token'";

    if(mysqli_query($con,$update_password))
    {
        ?>

        <script>
            alert("Password changed successfully");
            window.location.href = "Login.php";
        </script>

        <?php
    }
    else
    {
        ?>

        <script>
            alert("Error changing password");
        </script>

        <?php
    }
}

?>

<div class="container py-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-7 col-lg-6">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <!-- Header Banner -->
                <div class="text-center py-4 bg-dark">
                    <h3 class="fw-bold text-white mb-0"><i
                                class="bi bi-person-circle fs-3 me-2"></i>Change password</h3>
                </div>

                <!-- Login Form -->
                <div class="card-body p-4">
                    <form id="loginForm" method="post" >
                        <!-- Email -->
                        <!-- Password -->
                        <div class="mb-3">
                                    <label class="form-label fw-semibold">Password</label>
                                    <input type="password" class="form-control border-2 border-teal" name="password"
                                        placeholder="Enter password" data-validation="required strongPassword min max" id="password"
                                        data-min="8" data-max="25">
                                    <span class="error text-danger" id="passwordError"></span>
                                </div>

                        <!-- Password -->
                        <!-- Confirm Password -->
                        <div class="mb-3">
                                    <label class="form-label fw-semibold">Confirm Password</label>
                                    <input type="password" class="form-control border-2 border-teal"
                                        name="confirm_password" placeholder="Confirm password"
                                        data-validation="required confirmPassword" data-password-id="password">
                                    <span class="error text-danger" id="confirm_passwordError"></span>
                                </div>

                        <!-- Remember Me + Forgot Password -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            
                            <a href="login.php" class="text-decoration-none" style="color:#0d9488;">Login to your account</a>
                        </div>

                        <!-- Submit -->
                        <button type="submit" class="btn w-100 text-white fw-semibold bg-dark" name="changePassword">Change password</button>
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
include_once('layout.php');

?>
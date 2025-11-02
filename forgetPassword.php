<?php
ob_start();
$title_page = "Forget Password";

include_once("db_Connect.php");
include_once("mailer.php");

if(isset($_POST['forgetBtn'])){

    $email = $_POST['email'];

    //matching email and pass
    $q_login = "SELECT * FROM user_details WHERE email = '$email'";
    $res_login = mysqli_query($con,$q_login);


    if(mysqli_num_rows($res_login) > 0)
    {
        $rowLogin = mysqli_fetch_assoc($res_login);
        $token = $rowLogin['token'];



        $body = '
            
        <html>
        <head>
        <meta charset="UTF-8">
        <title>Verify Your Email</title>
        </head>
        <body style="margin:0; padding:0; background-color:#fdf6e3; font-family:Arial, sans-serif;">

        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#fdf6e3; padding:40px 0;">
            <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" border="0" style="background-color:#ffffff; border-radius:12px; box-shadow:0 4px 8px rgba(0,0,0,0.1); overflow:hidden;">
                <tr>
                    <td align="center" style="background-color:#212529; padding:20px;">
                    <h2 style="color:#ffffff; margin:0;">Reset you password</h2>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding:40px 20px;">
                    <p style="font-size:16px; color:#333; margin-bottom:30px;">
                        You can change your password by clicking below
                    </p>
                    <a href="http://localhost/Hotel_Booking_system/changePassword.php?token=' . $token . '&email=' . $email . '" 
                        style="display:inline-block; background-color:#212529; color:#ffffff; text-decoration:none; 
                                font-size:16px; font-weight:bold; padding:14px 30px; border-radius:8px;">
                        Change password
               
                        </a>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="background-color:#f9fafb; padding:15px; font-size:12px; color:#666;">
                    © 2025 DC Hotels. All rights reserved.
                    </td>
                </tr>
                </table>
            </td>
            </tr>
        </table>

        </body>
        </html>

        ';

        if(sendEmail($email,"Password reset link from DC Hotels",$body,"")) {
            setcookie("success","Password reset link sent to email.",time()+5);
            ?>

            <script>
                alert("Reset link sent to entered email");
            </script>
            <?php
            header("Location: forgetPassword.php");
        }
        else {
            setcookie("error","Something went wrong. Try again",time()+5);
            header("Location: register.php");
        }
    }
    else
    {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            showAlert('error', 'Email not registered');
        });
        </script>";
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
                                class="bi bi-person-circle fs-3 me-2"></i>Enter you email</h3>
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

                       
                        

                        <!-- Submit -->
                        <button type="submit" class="btn w-100 text-white fw-semibold bg-dark" name="forgetBtn">Get reset Link</button>
                    </form>

                  
                    
                </div>

            </div>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
include_once('layout.php');

?>
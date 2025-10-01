<?php

include_once("db_Connect.php");
include_once("mailer.php");

if(isset($_POST['regbtn'])){

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pincode = $_POST['pincode'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    
    $profile_picture = uniqid() . $_FILES['profile_photo']['name'];
    $profile_picture_tmp = $_FILES['profile_photo']['tmp_name'];

    $token = bin2hex(random_bytes(50));

    $q_reg = "INSERT INTO user_details (`full_name`,`email`,`mobile`,`pincode`,`password`,`address`,`profile_picture`,`token`) 
    VALUES ('$fullname', '$email', '$mobile', '$pincode', '$password', '$address', '$profile_picture','$token')";

    if(mysqli_query($con,$q_reg)){

        if(!is_dir("Images/profile_pictures"))
        {
            mkdir("Images/profile_pictures");
        }

        move_uploaded_file($profile_picture_tmp,"Images/profile_pictures/" . $profile_picture);

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
                        <h2 style="color:#ffffff; margin:0;">Verify Your Email</h2>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding:40px 20px;">
                        <p style="font-size:16px; color:#333; margin-bottom:30px;">
                            Please verify your email address by clicking the button below.
                        </p>
                        <a href="http://localhost/MCA_Sample-1/verify.php?token=' . $token . '&email=' . $email . '" 
                            style="display:inline-block; background-color:#212529; color:#ffffff; text-decoration:none; 
                                    font-size:16px; font-weight:bold; padding:14px 30px; border-radius:8px;">
                            Verify Email
                   
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

        if(sendEmail($email,"Email Verification from DC Hotels",$body,"")) {
            setcookie("success","Email registered and verification link sent to registered email.",time()+5);
            header("Location: register.php");
        }
    }
    else {
        setcookie("error","Registration Failed. Try again",time()+5);
        header("Location: register.php");
    }
}

?>

    <!-- <script>
        window.location.href = "register.php";
    </script> -->

<?php
ob_start();
$title_page = "DC Hotels - Register";

?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <!-- Header -->
                <div class="text-center py-4 bg-dark">
                    <h3 class="fw-bold text-white mb-0">
                        <i class="fa-solid fa-user-plus me-2"></i>Register
                    </h3>
                </div>

                <span class=" mt-4 badge bg-light text-dark mb-3 text-wrap lh-base">
                            Note : Your details must be matched with your id(Aadhar card, passport, driving license
                            etc...)
                            that will be required during check-in.
                        </span>

                <!-- Form -->
                <form method="post" action="register.php" enctype="multipart/form-data" id="registerForm">
                    <div class="card-body p-4">
                        <div class="row g-4">
                            <!-- Left Column -->
                            <div class="col-lg-6">
                                <!-- Full Name -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Full Name</label>
                                    <input type="text" class="form-control border-2 border-teal" name="fullname"
                                        placeholder="Enter full name" data-validation="required alpha">
                                    <span class="error text-danger" id="fullnameError"></span>
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Email</label>
                                    <input type="text" class="form-control border-2 border-teal" name="email"
                                        placeholder="Enter email" data-validation="required email">
                                    <span class="error text-danger" id="emailError"></span>
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Password</label>
                                    <input type="password" class="form-control border-2 border-teal" name="password"
                                        placeholder="Enter password" data-validation="required" id="password"
                                        data-min="8" data-max="25">
                                    <span class="error text-danger" id="passwordError"></span>
                                </div>

                                <!-- Confirm Password -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Confirm Password</label>
                                    <input type="password" class="form-control border-2 border-teal"
                                        name="confirm_password" placeholder="Confirm password"
                                        data-validation="required confirmPassword" data-password-id="password">
                                    <span class="error text-danger" id="confirm_passwordError"></span>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-lg-6">
                                <!-- Pincode -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Pincode</label>
                                    <input type="text" class="form-control border-2 border-teal"
                                        name="pincode" placeholder="Pincode"
                                        data-validation="required numeric min max" data-min="6" data-max="6">
                                    <span class="error text-danger" id="pincodeError"></span>
                                </div>

                                <!-- Mobile Number -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Mobile Number</label>
                                    <input type="text" class="form-control border-2 border-teal" name="mobile"
                                        placeholder="Enter mobile number" data-validation="required numeric min max"
                                        data-min="10" data-max="10">
                                    <span class="error text-danger" id="mobileError"></span>
                                </div>

                                <!-- Profile Photo -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Profile Photo</label>
                                    <input type="file" class="form-control border-2 border-teal" name="profile_photo"
                                        data-validation="required file filesize" data-filesize="200">
                                    <span class="error text-danger" id="profile_photoError"></span>
                                </div>

                                <!-- Address -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Address</label>
                                    <textarea class="form-control border-2 border-teal" name="address" rows="3"
                                        placeholder="Enter your address" data-validation="required"></textarea>
                                    <span class="error text-danger" id="addressError"></span>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn text-white fw-semibold bg-dark" name="regbtn">
                                        Register
                                    </button>
                                </div>

                                <div class="text-center mt-3">
                                    <p class="mb-0">Already have an account?
                                        <a href="login.php" class="fw-semibold text-decoration-none"
                                            style="color:#0d9488;">Login Now</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include_once("layout.php");

?>
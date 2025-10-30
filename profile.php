<?php
    include_once("db_Connect.php");

  ob_start();
  $title_page = "DC Hotels - Profile";

  session_start();
  if(!(isset($_SESSION['login'])  && $_SESSION['login'] == true))
  {
    header('Location: login.php');
  }

  //getting user details
  $user_id = $_SESSION['uid'];

  $user_data = "SELECT * FROM user_details WHERE id = $user_id";
  $row = mysqli_query($con, $user_data);
  $user =  mysqli_fetch_assoc($row);

?>

<div class="container">
    <div class="row">
        
        <div class="col-lg-12 my-5 px-4">
            <h2 class="fw-bold">PROFILE</h2>
        </div>

        <!-- Profile card -->
        <div class="col-12 mb-5 px-4">
            <div class="bg-white shadow rounded p-3 p-md-4">
                <form action="" method="post">
                    <h5 class="mb-3 fw-bold">Basic Information</h5>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            Name
                            <input class="form-control mt-2 shadow-none" type="text" name="name" id="name" data-validation="required" value="<?php echo $user['full_name']?>">
                            <span class="error text-danger" id="nameError"></span>
                        
                        </div>

                        <div class="col-md-4 mb-3">
                            Phone
                            <input value="<?php echo $user['mobile']?>" class="form-control mt-2 shadow-none" type="text" name="mobile" id="mobile" data-validation="required numeric min max" data-min="10" data-max="10">
                            <span class="error text-danger" id="mobileError"></span>
                        
                        </div>

                        <div class="col-md-4 mb-3">
                            Pincode
                            <input value="<?php echo $user['pincode']?>" class="form-control mt-2 shadow-none" type="text" name="pincode" id="pincode" data-validation="required numeric min max" data-min="6" data-max="6">
                            <span class="error text-danger" id="pincodeError"></span>
                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Address</label>
                            <textarea class="form-control border-2 border-teal" name="address" rows="3"
                             data-validation="required"><?php echo $user['address']?></textarea>
                            <span class="error text-danger" id="addressError"></span>
                        </div>
                    </div>

                    <button type="submit" name="saveUserDetails" class="btn custome-bg shadow-none text-white">Save Changes</button>
                    
                </form>

            </div>
        </div>


          <!-- For changing passwrod -->
        <div class="col-12 mb-5 px-4">
            <div class="bg-white shadow rounded p-3 p-md-4">
                             
                <form action="" method="post">
                    <h5 class="mb-3 mt-4 fw-bold">Chagne password</h5>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            Old Password
                            <input class="form-control mt-2 shadow-none" type="password" placeholder="Enter old password" name="oldPass" id="name" data-validation="required">
                            <span class="error text-danger" id="oldPassError"></span>
                        
                        </div>

                        <div class="col-md-4 mb-3">
                            New Passwrod
                            <input type="password" class="form-control border-2 mt-2 border-teal" name="password"
                                placeholder="Enter password" data-validation="required strongPassword min max" id="password"
                                data-min="8" data-max="25">
                            <span class="error text-danger" id="passwordError"></span>
                        
                        </div>

                        <div class="col-md-4 mb-3">
                            Confirm password
                            <input type="password" class="form-control mt-2 border-2 border-teal"
                                name="confirm_password" placeholder="Confirm password"
                                data-validation="required confirmPassword" data-password-id="password">
                            <span class="error text-danger" id="confirm_passwordError"></span>
                        
                        </div>
                    </div>

                    <button type="submit" name="upPassword" class="btn custome-bg shadow-none text-white">Change password</button>
                    
                </form>
            </div>
        </div>


    </div>
</div>

<?php

//updating user information

if(isset($_POST['saveUserDetails']))
{
    $fullname = $_POST['name'];
    $phone = $_POST['mobile'];
    $pincode = $_POST['pincode'];
    $address = $_POST['address'];

    $upUserInfo = "UPDATE `user_details` SET `full_name`='$fullname', `mobile`=$phone, `pincode`=$pincode, `address`='$address' WHERE `id`=$user_id";

    if(mysqli_query($con,$upUserInfo))
    {
        header('Location: profile.php');
        // echo "<script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     showAlert('success', 'Changes saved successfully');
        // });
        // </script>";
    }
    else{
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            showAlert('error', 'Error saving changes');
        });
        </script>";
    }
}

if(isset($_POST['upPassword']))
{
    $oldPass = $_POST['oldPass'];

    $qOldPass = "SELECT * FROM user_details WHERE id=$user_id AND password='$oldPass'";

    $res = mysqli_query($con,$qOldPass);
    if(mysqli_num_rows($res) == 1)
    {
        $newPass = $_POST['password'];

        $upPassword = "UPDATE `user_details` SET `password`='$newPass' WHERE `id`=$user_id";

        if(mysqli_query($con,$upPassword))
        {
            echo "<script>
            
                alert('Password changed successfully');
            
            </script>";
        }
        else{
            echo "<script>
            
                alert('Error changing password');
            
            </script>";
        }
    }
    else{
        echo "<script>
    
            alert('Old password is incorrect');
        
        </script>";
    }
}

$content = ob_get_clean();
include_once("layout.php")

?>
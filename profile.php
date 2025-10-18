<?php

  ob_start();
  $title_page = "DC Hotels - Profile";

  session_start();
  if(!(isset($_SESSION['login'])  && $_SESSION['login'] == true))
  {
    header('Location: login.php');
  }
?>

<div class="container">
    <div class="row">
        
        <div class="col-lg-12 my-5 px-4">
            <h2 class="fw-bold">PROFILE</h2>
        </div>

        <!-- Profile card -->
        <div class="col-12 mb-5 px-4">
            <div class="bg-white shadow rounded p-3 p-md-4">
                <form action="">
                    <h5 class="mb-3 fw-bold">Basic Information</h5>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            Name
                            <input class="form-control mt-2 shadow-none" type="text" name="name" id="name" data-validation="required">
                            <span class="error text-danger" id="nameError"></span>
                        
                        </div>

                        <div class="col-md-4 mb-3">
                            Phone
                            <input class="form-control mt-2 shadow-none" type="text" name="mobile" id="mobile" data-validation="required numeric min max" data-min="10" data-max="10">
                            <span class="error text-danger" id="mobileError"></span>
                        
                        </div>

                        <div class="col-md-4 mb-3">
                            Pincode
                            <input class="form-control mt-2 shadow-none" type="text" name="pincode" id="pincode" data-validation="required numeric min max" data-min="6" data-max="6">
                            <span class="error text-danger" id="pincodeError"></span>
                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Address</label>
                            <textarea class="form-control border-2 border-teal" name="address" rows="3"
                             data-validation="required"></textarea>
                            <span class="error text-danger" id="addressError"></span>
                        </div>
                    </div>

                    <button type="submit" class="btn custome-bg shadow-none text-white">Save Changes</button>
                    
                </form>
            </div>
        </div>


    </div>
</div>

<?php

$content = ob_get_clean();
include_once("layout.php")

?>
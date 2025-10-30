<?php
ob_start();
$title_page = "Features Faciliteis";
require('../db_Connect.php');

?>
<div class="d-flex align-items-center justify-content-between mb-4">
    <h3>Features & Facilities</h3>
</div>

<!-- Fetures seciton -->
<div class="card border-0 shadow mb-4">
    <div class="card-body">




        <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="card-title m-0">
                Features
            </h5>
            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                data-bs-target="#features-s">
                <i class="bi bi-plus-square"></i>
                Add
            </button>
        </div>

        <div class="table-responsive-md" style="height: 300px; overflow: scroll;">
            <table class="table table-hover border">
                <thead>
                    <tr class="bg-dark text-light">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="tabel-data">


                <?php
                    
                    $q = "SELECT * FROM `features`";
                    $output = "";
                    $row = mysqli_query($con,$q);
                    $i = 1;
                   
                    while($data = mysqli_fetch_assoc($row))
                    {
                        $output.= "
                        
                        <tr>
                        <td>$i</td>
                        <td>
                            $data[name]
                        </td>

                        <td>
                            <form method='POST' style='display:inline;'>
                                <input type='hidden' name='feature_id' value='{$data['id']}'>
                                
                                <button type='submit' class='btn btn-danger btn-sm shadow-none' name='remFeature'>
                                Delete
                            </button>
                            </form>                    
                        </td>
                    </tr>
                        
                        ";

                        $i++;
                    }
                    
                    echo $output;
                    ?>

                   
                </tbody>
            </table>
        </div>

    </div>


</div>

<!-- Facilities seciton -->
<div class="card border-0 shadow mb-4">
    <div class="card-body">



        <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="card-title m-0">
                Facilities
            </h5>
            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                data-bs-target="#facilities-s">
                <i class="bi bi-plus-square"></i>
                Add
            </button>
        </div>

        <div class="table-responsive-md" style="height: 300px; overflow: scroll;">
            <table class="table table-hover border">
                <thead>
                    <tr class="bg-dark text-light">
                        <th scope="col">#</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="tabel-data">

                    <?php
                    
                    $q_getFacility = "SELECT * FROM `facilities`";
                    $output = "";
                    $row = mysqli_query($con,$q_getFacility);
                    $i = 1;
                   
                    while($data = mysqli_fetch_assoc($row))
                    {
                        $output.= "
                        
                        <tr class='align-middle'>
                        <td>$i</td>
                        <td><img src='../Images/facilities/{$data['image']}' width='60px'></td>
                        <td>{$data['name']}</td>
                        <td>{$data['desc']}</td>
                        <td>

                            <form method='POST' style='display:inline;'>
                                <input type='hidden' name='facility_id' value='{$data['id']}'>
                                    
                                <button type='submit' name='remFacility' class='btn btn-danger btn-sm shadow-none'>
                                    Delete
                                </button>
                            </form>        
                           
                        </td>";
                        $i++;
                    }

                    echo $output;
                    ?>

                </tbody>
            </table>
        </div>

    </div>


</div>


<!-- Modal for features-->
<div class="modal fade" id="features-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        
            <form method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Feature</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" name="feature_name" data-validation="required" class="form-control shadow-none">
                            <span id="feature_nameError" class="text-danger small"></span>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none"
                            data-bs-dismiss="modal" onclick="removeErrorClasses()">CANCEL</button>
                        <button type="submit" name="savefeature" class="btn custome-bg text-white shadow-none">SAVE</button>
                    </div>
                </div>
            </form>

    </div>
</div>


<!-- Modal for Facilities-->
<div class="modal fade" id="facilities-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        
    <form method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Facility</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" name="facility_inp" class="form-control shadow-none" data-validation="required">
                            <span id="facility_inpError" class="text-danger small"></span>

                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Icon</label>
                            <input type="file" accept=".svg" name="facility_icon_inp" id="member_picture_inp"  data-validation="required file filesize  " data-filesize="200" class="form-control shadow-none">
                            <span id="facility_icon_inpError" class="text-danger small"></span>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="facility_desc_inp" class="form-control shadow-none" rows="3" data-validation="required"></textarea>
                            <span id="facility_desc_inpError" class="text-danger small"></span>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button onclick="clearFormErrors()" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn custome-bg text-white shadow-none" name="saveFacility">SAVE</button>
                    </div>
                </div>
            </form>

    </div>
</div>

<script>
const featureModal = document.getElementById('features-s');

featureModal.addEventListener('hidden.bs.modal', function () {
    const errorSpan = document.getElementById("feature_nameError");
    const inputField = document.querySelector("input[name='feature_name']");

    if(errorSpan){
        errorSpan.textContent = ""; // remove error text
    }

    if(inputField){
        inputField.classList.remove("is-invalid"); // remove red border
    }

});
</script>

<!-- Inserting and deleting data -->
<?php

    if(isset($_POST['savefeature']))
    {
        $fname = $_POST['feature_name'];

        $q = "INSERT INTO `features` (name) values ('$fname')";

        if(mysqli_query($con,$q))
        {
            header('Location: featrues_facilities.php');
        }
    }

    if(isset($_POST['remFeature']))
    {
        $id = $_POST['feature_id'];

        $del_feature = "DELETE FROM `features` WHERE `id`=$id";
        if(mysqli_query($con,$del_feature))
        {
            header('Location: featrues_facilities.php'); 
        }
    }

    if(isset($_POST['saveFacility']))
    {
        $fname = $_POST['facility_inp'];
        $fdesc = $_POST['facility_desc_inp'];

        $facility_photo = uniqid() . $_FILES['facility_icon_inp']['name'];
        $facility_photo_tmp = $_FILES['facility_icon_inp']['tmp_name'];

        $q_facility = "INSERT INTO `facilities` (`name`, `image`, `desc`) VALUES ('$fname','$facility_photo','$fdesc')";

        if (mysqli_query($con, $q_facility)) {
            if (!is_dir("../Images/facilities")) {
                mkdir("../Images/facilities");
            }
            move_uploaded_file($facility_photo_tmp, "../Images/facilities/" . $facility_photo);
            header('Location: featrues_facilities.php');
        }
    }

    if(isset($_POST['remFacility']))
    {
        $id = $_POST['facility_id'];

        $del_facility = "DELETE FROM `facilities` WHERE `id`=$id";
        if(mysqli_query($con,$del_facility))
        {
            header('Location: featrues_facilities.php'); 
        }
    }


?>

<?php
$content = ob_get_clean();
include_once("index.php");
?>
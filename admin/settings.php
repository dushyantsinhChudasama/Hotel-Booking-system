<?php
ob_start();
$title_page = "Settings";
require('../db_Connect.php');
//fetching data from the database

$q = "SELECT * FROM `settings`";
$data = mysqli_query($con,$q);

$row = mysqli_fetch_assoc($data);
$status = $row['shutdown'];


$q_contact = "SELECT * FROM `contact_details`";
$contact_data = mysqli_query($con,$q_contact);

$row_contact = mysqli_fetch_assoc($contact_data);
?>

<!-- General settings module -->

<div class="container-fluid">
    <div class="row">

        <h3 class="mb-4">SETTINGS</h3>

        <!-- General settings section -->
        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="card-title m-0">
                        General Settings
                    </h5>
                    <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                        data-bs-target="#general-s">
                        <i class="bi bi-pencil-square"></i>
                        Edit
                    </button>
                </div>
                <h6 class="card-subtitle mb-1 fw-bold">Site Title</h6>
                <p class="card-text" id="site_title"><?php echo $row['site_title'];?></p>
                <h6 class="card-subtitle mb-1 fw-bold">About us</h6>
                <p class="card-text" id="site_about">
                <?php echo $row['site_about'];?>
                </p>

            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">General Settings</h5>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Site Title</label>
                                <input type="text" name="site_title" id="site_title_inp"
                                    class="form-control shadow-none" data-validation="required" value="<?php echo $row['site_title'];?>">
                                <span id="site_titleError" class="text-danger small"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">About us</label>
                                <textarea class="form-control shadow-none" name="site_about" id="site_about_inp"
                                    rows="6" data-validation="required"><?php echo $row['site_about'];?></textarea>
                                <span id="site_aboutError" class="text-danger small"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" onclick="resetGeneral()" id="cancelFormBtn" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                            <button name="saveGeneral" type="submit" class="btn custome-bg text-white shadow-none">SAVE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



        <!-- Shutdown section -->
        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="card-title m-0">Shutdown Website</h5>
                    <div class="form-check form-switch">
                        <form method="POST">
                            <!-- Hidden input ensures unchecked state sends 0 -->
                            <input type="hidden" name="shutdown" value="0">
                            <input 
                                class="form-check-input" 
                                type="checkbox" 
                                id="shutdown-toggle"
                                name="shutdown"
                                value="1"
                                onchange="this.form.submit()" 
                                <?php if($status == 1) echo 'checked'; ?>>
                        </form>
                    </div>
                </div>
                <p class="card-text">
                    No customers will be allowed to book rooms through website when shutdown mode is activated.
                </p>
            </div>
        </div>


        <!-- Contacts settings section -->
        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="card-title m-0">
                        Contactss Settings
                    </h5>
                    <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                        data-bs-target="#contacts-s">
                        <i class="bi bi-pencil-square"></i>
                        Edit
                    </button>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <h6 class="card-subtitle mb-1 fw-bold">Address</h6>
                            <p class="card-text" id="address"><?php echo $row_contact['address'];?></p>
                        </div>
                        <div class="mb-4">
                            <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                            <p class="card-text" id="gmap"><?php echo $row_contact['gmap'];?></p>
                        </div>
                        <div class="mb-4">
                            <h6 class="card-subtitle mb-1 fw-bold">Phone Numbers</h6>
                            <p class="card-text mb-1">
                                <i class="bi bi-telephone-fill"></i>
                                <span id="pn1"><?php echo $row_contact['pn1'];?></span>
                            </p>
                            <p class="card-text">
                                <i class="bi bi-telephone-fill"></i>
                                <span id="pn2"><?php echo $row_contact['pn2'];?></span>
                            </p>
                        </div>
                        <div class="mb-4">
                            <h6 class="card-subtitle mb-1 fw-bold">Email</h6>
                            <p class="card-text" id="email"><?php echo $row_contact['email'];?></p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-4">
                            <h6 class="card-subtitle mb-1 fw-bold">Social Links</h6>
                            <p class="card-text mb-1">
                                <i class="bi bi-facebook me-1"></i>
                                <span id="fb"><?php echo $row_contact['fb'];?></span>
                            </p>
                            <p class="card-text mb-1">
                                <i class="bi bi-instagram me-1"></i>
                                <span id="insta"><?php echo $row_contact['insta'];?></span>
                            </p>
                            <p class="card-text">
                                <i class="bi bi-twitter-x me-1"></i>
                                <span id="tw"><?php echo $row_contact['tw'];?></span>
                            </p>
                        </div>
                        <div class="mb-4">
                            <h6 class="card-subtitle mb-1 fw-bold">IFrame</h6>
                            <iframe id="iframe" src="<?php echo $row_contact['ifrmae'];?>" class="border p-2 w-100"
                                loading="lazy"></iframe>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- Modal for Contact section details -->
        <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <form method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Contacts Settings</h5>
                        </div>
                        <div class="modal-body">

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Address</label>
                                            <input type="text" name="address" id="address_inp"
                                                class="form-control shadow-none" value="<?php echo $row_contact['address']?>" data-validation="required">
                                                <span id="addressError" class="text-danger small"></span>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Gogole Mpas links</label>
                                            <input type="text" name="gmap" id="gmap_inp"
                                                class="form-control shadow-none" value="<?php echo $row_contact['gmap']?>" data-validation="required">
                                                <span id="gmapError" class="text-danger small"></span>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Phone Numbers</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i
                                                        class="bi bi-telephone-fill"></i></span>
                                                <input type="number" name="pn1" id="pn1_inp"
                                                    class="form-control shadow-none" value="<?php echo $row_contact['pn1']?>" data-validation="required">
                                                    <span id="pn1Error" class="text-danger small"></span>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i
                                                        class="bi bi-telephone-fill"></i></span>
                                                <input type="number" name="pn2" id="pn2_inp"
                                                    class="form-control shadow-none" value="<?php echo $row_contact['pn2']?>" data-validation="required">
                                                    <span id="pn2Error" class="text-danger small"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Email</label>
                                            <input type="email" name="email" id="email_inp"
                                                class="form-control shadow-none" value="<?php echo $row_contact['email']?>" data-validation="required">
                                                <span id="emailError" class="text-danger small"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Social Links</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i
                                                        class="bi bi-facebook me-1"></i></span>
                                                <input type="text" name="fb" id="fb_inp"
                                                    class="form-control shadow-none" value="<?php echo $row_contact['fb']?>" data-validation="required">
                                                    <span id="fbError" class="text-danger small"></span>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                                                <input type="text" name="insta" id="insta_inp"
                                                    class="form-control shadow-none" value="<?php echo $row_contact['insta']?>" data-validation="required">
                                                    <span id="instaError" class="text-danger small"></span>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-twitter-x"></i></span>
                                                <input type="text" name="tw" id="tw_inp"
                                                    class="form-control shadow-none" value="<?php echo $row_contact['tw']?>" data-validation="required">
                                                    <br><span id="twError" class="text-danger small"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">iFrmae Source</label>
                                            <input type="text" name="iframe" id="iframe_inp"
                                                class="form-control shadow-none" value="<?php echo $row_contact['ifrmae']?>" data-validation="required">
                                                <span id="iframeError" class="text-danger small"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" onclick="resetContact()"
                                class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                <button name="saveContacts" type="submit" class="btn custome-bg text-white shadow-none">SAVE</button>
                        </div>
                    </div>
                </form>

        </div>
        </div>
       

    </div>
</div>

<!-- Updating data -->
<?php

if (isset($_POST['saveGeneral'])) {
    $site_title = $_POST['site_title'];
    $site_about = $_POST['site_about'];
    $id = 1;

    $q = "UPDATE settings SET `site_title` = ?, `site_about` = ? WHERE `id` = ?";
    $stmt = mysqli_prepare($con, $q);
    mysqli_stmt_bind_param($stmt, "ssi", $site_title, $site_about, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            showAlert('success', 'Settings updated');
            setTimeout(() => {
                window.location.href = window.location.href;
            }, 1200);
        });
        </script>";
    } else {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            showAlert('error', 'Something went wrong!');
            setTimeout(() => {
                window.location.href = window.location.href;
            }, 1200);
        });
        </script>";
    }
}

if (isset($_POST['shutdown'])) {
    $newStatus = $_POST['shutdown'] == '1' ? 1 : 0;
    $id = 1;

    $q = "UPDATE settings SET `shutdown` = ? WHERE `id` = ?";
    $stmt = mysqli_prepare($con, $q);
    mysqli_stmt_bind_param($stmt, "ii", $newStatus, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
       
                window.location.href = window.location.href;
           
        </script>";
    } else {
        echo "<script>
        
                window.location.href = window.location.href;
           
        </script>";
    }
}

if(isset($_POST['saveContacts']))
{
    $id = 1;
    $address = $_POST['address'];
    $gmap = $_POST['gmap'];
    $pn1 = $_POST['pn1'];
    $pn2 = $_POST['pn2'];
    $email = $_POST['email'];
    $fb = $_POST['fb'];
    $insta = $_POST['insta'];
    $tw = $_POST['tw'];
    $iframe = $_POST['iframe'];

    $q = "UPDATE `contact_details` SET `address`=?,`gmap`=?,`pn1`=?,`pn2`=?,`email`=?,`fb`=?,`insta`=?,`tw`=?,`ifrmae`=?";
    $stmt = mysqli_prepare($con,$q);
    mysqli_stmt_bind_param($stmt,"sssssssss",$address,$gmap,$pn1,$pn2,$email,$fb,$insta,$tw,$iframe);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            showAlert('success', 'Contacts updated');
            setTimeout(() => {
                window.location.href = window.location.href;
            }, 1200);
        });
        </script>";
    } else {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            showAlert('error', 'Something went wrong!');
            setTimeout(() => {
                window.location.href = window.location.href;
            }, 1200);
        });
        </script>";
    }
}
?>



<script>
    //resetting values for feilds of general settings module
    let site_title = <?php echo json_encode($row['site_title']); ?>;
    let site_about = <?php echo json_encode($row['site_about']); ?>;

    //for contact section
    let address = <?php echo json_encode($row_contact['address']); ?>;
    let gmap = <?php echo json_encode($row_contact['gmap']); ?>;
    let pn1 = <?php echo json_encode($row_contact['pn1']); ?>;
    let pn2 = <?php echo json_encode($row_contact['pn2']); ?>;
    let email = <?php echo json_encode($row_contact['email']); ?>;
    let fb = <?php echo json_encode($row_contact['fb']); ?>;
    let insta = <?php echo json_encode($row_contact['insta']); ?>;
    let tw = <?php echo json_encode($row_contact['tw']); ?>;
    let iframe = <?php echo json_encode($row_contact['ifrmae']); ?>;

    function resetGeneral()
    {
        document.getElementById('site_title_inp').value = site_title;
        document.getElementById('site_about_inp').value = site_about;
    }

    function resetContact()
    {
        document.getElementById('address_inp').value = address;
        document.getElementById('gmap_inp').value = gmap;
        document.getElementById('pn1_inp').value = pn1;
        document.getElementById('pn2_inp').value = pn2;
        document.getElementById('email_inp').value = email;
        document.getElementById('fb_inp').value = fb;
        document.getElementById('insta_inp').value = insta;
        document.getElementById('tw_inp').value = tw;
        document.getElementById('iframe_inp').value = iframe;
    }
</script>

<?php
$content = ob_get_clean();
include_once("index.php");
?>
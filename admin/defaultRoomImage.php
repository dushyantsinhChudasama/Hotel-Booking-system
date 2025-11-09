<?php
ob_start();
$title_page = "Rooms";
include('../db_Connect.php');

if(isset($_POST['updateImage']))
{
    // ✅ handle file from $_FILES instead of $_POST
    if (!empty($_FILES['room_image']['name'])) {

        // create unique name
        $room_image = uniqid() . "_" . $_FILES['room_image']['name'];
        $room_image_tmp = $_FILES['room_image']['tmp_name'];

        // ✅ insert image record into DB
        $image_query = "UPDATE `room_default_image` SET `image` ='$room_image'";
        $res = mysqli_query($con, $image_query);

        if ($res) {
            // ✅ create folder if missing
            if (!is_dir("../images/room_default_image")) {
                mkdir("../images/room_default_image", 0777, true);
            }

            // ✅ move uploaded file
            move_uploaded_file($room_image_tmp, "../images/room_default_image/" . $room_image);
        }
    }
}

$r_getRoomImage = mysqli_query($con, "SELECT * FROM `room_default_image`");
$res = mysqli_fetch_assoc($r_getRoomImage);

?>

<div class="d-flex align-items-center mb-4">
    <a href="rooms.php" class="text-dark me-3" style="font-size: 1.8rem;">
        <i class="bi bi-arrow-left-circle"></i>
    </a>
    <h3 class="m-0">Rooms Default Image</h3>
</div>

<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <h5>Current Image</h5>

        <!-- Bordered Image Box -->
        <div class="card border border-secondary shadow-sm" style="width: 420px;">
            <div class="card-body text-center p-2">
                <div class="border rounded bg-light d-flex align-items-center justify-content-center"
                    style="width: 400px; height: 250px; overflow: hidden;">
                    <img src="../images/room_default_image/<?php echo $res['image']?>" alt="Room Image" class="img-fluid rounded"
                        style="object-fit: cover; width: 100%; height: 100%;">
                </div>
            </div>
        </div>

        <form action="" enctype="multipart/form-data" method="post">

            <div class="mt-4 mb-2">
                <div class="row">

                    <div class="col-md-8">
                        <label class="form-label fw-semibold">Update Image</label>

                        <div class="d-flex align-items-center gap-3">
                            <input type="file" class="form-control border-2 border-teal" name="room_image"
                                accept="image/*" style="max-width: 600px;" data-validation="required file filesize"
                                data-filesize="500">
                            <span class="error text-danger" id="room_imageError"></span>

                            <button type="submit" name="updateImage"
                                class="btn btn-md custome-bg text-white shadow-none" style="width: 150px;">
                                SAVE
                            </button>
                        </div>
                    </div>

                </div>

        </form>

    </div>
</div>

<?php

$content = ob_get_clean();
include_once('index.php');
?>
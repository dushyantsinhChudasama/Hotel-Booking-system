<?php

ob_start();
$title_page = "Room Images Management";
include('../db_Connect.php');

$room_id;

if (isset($_GET['room_id'])) {
    $room_id = $_GET['room_id'];
}

if(isset($_POST['addRoomImage']))
{
    if (!empty($_FILES['room_image']['name'])) {

        // create unique name
        $room_image = uniqid() . "_" . $_FILES['room_image']['name'];
        $room_image_tmp = $_FILES['room_image']['tmp_name'];

        // ✅ insert image record into DB
        $image_query = "INSERT INTO `room_image` (`room_id`, `image`) VALUES ($room_id,'$room_image')";
        $res = mysqli_query($con, $image_query);

        if ($res) {
            // ✅ create folder if missing
            if (!is_dir("../Images/rooms")) {
                mkdir("../Images/rooms", 0777, true);
            }

            // ✅ move uploaded file
            move_uploaded_file($room_image_tmp, "../Images/rooms/" . $room_image);
        }
        else {
            echo "Insert Error: " . mysqli_error($con);
        }
    }
}

if(isset($_POST['image_id']))
{
    $image_id = $_POST['image_id'];

    if(isset($_POST['set_thumb']))
    {
        // reset all thumb to 0
        $reset_thumb_query = "UPDATE `room_image` SET `thumb` = 0 WHERE `room_id` = $room_id";
        mysqli_query($con, $reset_thumb_query);

        // set selected image as thumb
        $set_thumb_query = "UPDATE `room_image` SET `thumb` = 1 WHERE `id` = $image_id";
        mysqli_query($con, $set_thumb_query);
    }

    if(isset($_POST['delete_image']))
    {
        // get image name to delete from folder
        $get_image_query = "SELECT `image` FROM `room_image` WHERE `id` = $image_id";
        $res_get_image = mysqli_query($con, $get_image_query);
        $row = mysqli_fetch_assoc($res_get_image);
        $image_name = $row['image'];

        // delete image record from DB
        $delete_image_query = "DELETE FROM `room_image` WHERE `id` = $image_id";
        mysqli_query($con, $delete_image_query);

        // delete image from folder
        unlink("../Images/rooms/" . $image_name);
    }
}

?>


<div class="d-flex align-items-center mb-4">
    <a href="rooms.php" class="text-dark me-3" style="font-size: 1.8rem;">
        <i class="bi bi-arrow-left-circle"></i>
    </a>
    <h3 class="m-0">Manage Room Images</h3>
</div>

<div class="card border-0 shadow mb-4" style="height: 450px; max-height: 450px;">

    <!-- Scrollable Images Section (350px) -->
    <div class="card-body" style="height: 350px; overflow-y: auto;">
        <h5 class="mb-3">Current Room Images</h5>

        <div class="row g-3">
            <!-- Example Image Card 1 -->
            <?php

                if (isset($_GET['room_id'])) {
                    $room_id = $_GET['room_id'];

                    $q_getRoomImages = "SELECT * FROM `room_image` WHERE `room_id` = '$room_id'";
                    $res_getRoomImages = mysqli_query($con, $q_getRoomImages);
                    $thumbButton = "";
                    $images = "";
                    while ($row = mysqli_fetch_assoc($res_getRoomImages))
                    {
                        $room_id = $row['room_id'];
                        $thumb = $row['thumb'];

                        if($thumb == 1)
                        {
                            $thumbButton = "
                            <button type='submit' name='set_thumb'
                                    class='btn btn-sm btn-success shadow-none rounded-circle d-flex justify-content-center align-items-center'
                                    style='width: 40px; height: 40px;'>
                                    <i class='bi bi-check-lg'></i>
                                </button>
                            ";
                        }   
                        else
                        {
                            $thumbButton = "<button type='submit' name='set_thumb'
                            class='btn btn-sm btn-secondary shadow-none rounded-circle d-flex justify-content-center align-items-center'
                            style='width: 40px; height: 40px;'>
                            <i class='bi bi-check-lg'></i>";
                        }
                        
                        $images .= "
                            <div class='col-md-4'>
                                <div class='border rounded p-2 text-center'>
                                    <img src='../Images/rooms/$row[image]' class='img-fluid rounded mb-2'
                                        style='height: 150px; width: 100%; object-fit: cover;' alt='Room Image 1'>

                                    <form action='' method='post' class='mt-2'>
                                        <input type='hidden' name='image_id' value=$row[id]>
                                        <div class='row g-0'>
                                            <div class='col-6 border-end d-flex justify-content-center align-items-center'>
                                                $thumbButton
                                            </div>
                                            <div class='col-6 d-flex justify-content-center align-items-center'>
                                                <button type='submit' name='delete_image'
                                                    class='btn btn-sm btn-danger shadow-none rounded-circle d-flex justify-content-center align-items-center'
                                                    style='width: 40px; height: 40px;'>
                                                    <i class='bi bi-trash'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        ";
                    }
                    echo $images;
                }
                else {
                    header('location: rooms.php');
                }



            ?>



        </div>
    </div>


    </button>
    <!-- Fixed Footer Section (100px) -->
    <div class="card-footer bg-white border-0" style="height: 100px;">
        <form action="" method="post" enctype="multipart/form-data"
            class="d-flex align-items-center justify-content-between h-100 px-3">
            <div class="d-flex align-items-center">
                <label class="form-label fw-semibold mb-0 me-2">Upload New Image:</label>
                <input type="file" name="room_image" class="form-control" style="width: 450px;"  data-validation="required file">
                <span class="error text-danger" id="room_imageError"></span>
            </div>

            <button type="submit" name="addRoomImage" class="btn btn-md custome-bg text-white shadow-none"
                style="width: 190px;">
                SAVE
            </button>
        </form>
    </div>
</div>


<?php

$content = ob_get_clean();
require_once 'index.php';

?>
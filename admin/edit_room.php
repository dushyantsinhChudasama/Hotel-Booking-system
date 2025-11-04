<?php

ob_start();
$title_page = "Edit room";
include('../db_Connect.php');

if(isset($_GET['room_id']))
{
    $id = $_GET['room_id'];
    // echo $id;
    //getting room details
    $q_room = "SELECT * FROM `rooms` WHERE `id`='$id'";
    $res_room = mysqli_query($con, $q_room);
    $row_room = mysqli_fetch_assoc($res_room);


    //getting selected features and facilties
    $selected_feature = [];
    $q_selected_fea = "SELECT * FROM `room_features` WHERE `room_id`='$id'";
    $res_selected_fea = mysqli_query($con, $q_selected_fea);
    while($row_selected_fea = mysqli_fetch_assoc($res_selected_fea))
    {
        $selected_feature[] = $row_selected_fea['features_id'];
    }

    // print_r($selected_feature);

    $selected_facility = [];
    $q_selected_fac = "SELECT * FROM `room_facilities` WHERE `room_id`='$id'";
    $res_selected_fac = mysqli_query($con, $q_selected_fac);
    while($row_selected_fac = mysqli_fetch_assoc($res_selected_fac))
    {
        $selected_facility[] = $row_selected_fac['facilities_id'];
    }
}

if(isset($_POST['editRoom']))
{
    $room_id = $_GET['room_id'];

    $roomname = $_POST['roomname'];
    $price = $_POST['price'];
    $area = $_POST['area'];
    $quantity = $_POST['quantity'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];
    $description = $_POST['description'];

    // Update main room details
    $update_room = "UPDATE `rooms` SET 
        `name` = '$roomname', 
        `price` = '$price', 
        `area` = '$area', 
        `quantity` = '$quantity', 
        `adult` = '$adults', 
        `children` = '$children', 
        `description` = '$description' 
        WHERE `id` = $room_id";

    if (mysqli_query($con, $update_room)) {

        // Update room facilities and featurs
        mysqli_query($con, "DELETE FROM `room_facilities` WHERE room_id = $room_id");
        
        if (!empty($_POST['facilities'])) {
            foreach ($_POST['facilities'] as $fac_id) {
                $insert_facility = "INSERT INTO `room_facilities`(`room_id`, `facilities_id`) VALUES ($room_id,$fac_id)";
                mysqli_query($con, $insert_facility);
            }
        }

        mysqli_query($con, "DELETE FROM `room_features` WHERE room_id = $room_id");
        if (!empty($_POST['features'])) {
            foreach ($_POST['features'] as $fea_id) {
                $insert_feature = "INSERT INTO `room_features`(`room_id`, `features_id`) VALUES ($room_id,$fea_id)";
                mysqli_query($con, $insert_feature);
            }
        }

        echo "<script>alert('Room updated successfully!'); window.location.href='rooms.php';</script>";
    }
    else
    {
        echo "<script>alert('Error updating room details!');</script>";
    }


}
?>

<div class="d-flex align-items-center mb-4">
    <a href="rooms.php" class="text-dark me-3" style="font-size: 1.8rem;">
        <i class="bi bi-arrow-left-circle"></i>
    </a>
    <h3 class="m-0">Edit Rooms</h3>
</div>

<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <h5>Basic details</h5>

        <form action="" method="post">

            <div class="mt-4 mb-2">
                <div class="row">

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Room Name</label>
                        <input type="text" class="form-control border-2 border-teal" name="roomname"
                            placeholder="Enter room name" data-validation="required alpha" value="<?php echo $row_room['name']?>">
                        <span class="error text-danger" id="roomnameError"></span>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Price</label>
                        <input type="text" class="form-control border-2 border-teal" name="price"
                            placeholder="Enter full name" data-validation="required numeric" value="<?php echo $row_room['price']?>">
                        <span class="error text-danger" id="priceError"></span>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Area</label>
                        <input type="text" class="form-control border-2 border-teal" name="area"
                            placeholder="Enter full name" data-validation="required numeric" value="<?php echo $row_room['area']?>">
                        <span class="error text-danger" id="areaError"></span>
                    </div>

                    <div class="col-md-4 mt-4">
                        <label class="form-label fw-semibold">Quantity</label>
                        <input type="text" class="form-control border-2 border-teal" name="quantity"
                            placeholder="Enter full name" data-validation="required numeric" value="<?php echo $row_room['quantity']?>">
                        <span class="error text-danger" id="quantityError"></span>
                    </div>

                    <div class="col-md-4 mt-4">
                        <label class="form-label fw-semibold">Adults(Max)</label>
                        <input type="text" class="form-control border-2 border-teal" name="adults"
                            placeholder="Enter full name" data-validation="required numeric" value="<?php echo $row_room['adult']?>">
                        <span class="error text-danger" id="adultsError"></span>
                    </div>

                    <div class="col-md-4 mt-4">
                        <label class="form-label fw-semibold">Children(Max)</label>
                        <input type="text" class="form-control border-2 border-teal" name="children"
                            placeholder="Enter full name" data-validation="required numeric" value="<?php echo $row_room['children']?>">
                        <span class="error text-danger" id="childrenError"></span>
                    </div>

                    <div class="col-md-12 mt-4">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea class="form-control border-2 border-teal" name="description" rows="2"
                            placeholder="Enter Room description" data-validation="required"><?php echo $row_room['description']?></textarea>
                        <span class="error text-danger" id="descriptionError"></span>
                    </div>

                </div>

            </div>

            <h5 class="mt-4">Facilities</h5>


            <div class="mt-4 mb-2">
                <div class="row">
                    <!-- getting facilities from database -->
                    <?php

                    $q_facility = "SELECT * FROM `facilities`";
                    $res_facility = mysqli_query($con, $q_facility);

                    while ($row_facility = mysqli_fetch_assoc($res_facility)) {
                        $fac_id = $row_facility['id'];
                        $fac_name = $row_facility['name'];
                        $checked = in_array($fac_id, $selected_facility) ? "checked" : "";

                        echo "
                            <div class='col-md-3'>
                                <label>
                                    <input type='checkbox' name='facilities[]' value='$fac_id'
                                        class='form-check-input shadow-none' $checked>
                                    $fac_name
                                </label>
                            </div>
                        ";
                    }

                    ?>


                </div>

            </div>

            <h5 class="mt-4">Features</h5>

            <div class="mt-4 mb-2">
                <div class="row">

                <?php

                    $q_feature = "SELECT * FROM `features`";
                    $res_feature = mysqli_query($con, $q_feature);

                    while ($row_feature = mysqli_fetch_assoc($res_feature)) {
                        $fea_id = $row_feature['id'];
                        $fea_name = $row_feature['name'];
                        $checked = in_array($fea_id, $selected_feature) ? "checked" : "";

                        echo "
                                <div class='col-md-3'>
                                    <label>
                                        <input type='checkbox' name='features[]' value='$fea_id'
                                            class='form-check-input shadow-none' $checked>
                                        $fea_name
                                    </label>
                                </div>
                            ";
                    }

                    ?>

                </div>

            </div>

            <div class="d-flex justify-content-start">
                <button type="submit" name="editRoom" class="btn btn-md custome-bg text-white shadow-none mt-4" style="width: 190px;">SAVE</button>
            </div>
        </form>

    </div>
</div>

<?php
$content = ob_get_clean();
include_once('index.php')

?>
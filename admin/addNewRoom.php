<?php  
include('../db_Connect.php'); 
ob_start(); 
$title_page = "Add New Room";  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $roomname = $_POST['roomname'];
    $price = $_POST['price'];
    $area = $_POST['area'];
    $quantity = $_POST['quantity'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];
    $description = $_POST['description'];

    // Insert room details
    $insert_room = "INSERT INTO `rooms`(`name`, `area`, `price`, `quantity`, `adult`, `children`, `description`, `status`, `removed`) 
                    VALUES ('$roomname','$area','$price','$quantity','$adults','$children','$description',1,0)";
    
    if (mysqli_query($con, $insert_room)) {
        $room_id = mysqli_insert_id($con); // Get new room ID

        // Insert selected features
        if (!empty($_POST['features'])) {
            foreach ($_POST['features'] as $feature_id) {
                $insert_feature = "INSERT INTO `room_features`(`room_id`, `features_id`) 
                                   VALUES ('$room_id','$feature_id')";
                mysqli_query($con, $insert_feature);
            }
        }

        // Insert selected facilities
        if (!empty($_POST['facilities'])) {
            foreach ($_POST['facilities'] as $facility_id) {
                $insert_facility = "INSERT INTO `room_facilities`(`room_id`, `facilities_id`) 
                                    VALUES ('$room_id','$facility_id')";
                mysqli_query($con, $insert_facility);
            }
        }

        echo "<script>alert('Room added successfully!'); window.location.href='rooms.php';</script>";
    } else {
        echo "<script>alert('Error while adding room.');</script>";
    }
}
?>



<div class="d-flex align-items-center mb-4">
    <a href="rooms.php" class="text-dark me-3" style="font-size: 1.8rem;">
        <i class="bi bi-arrow-left-circle"></i>
    </a>
    <h3 class="m-0">Add New Rooms</h3>
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
                            placeholder="Enter room name" data-validation="required alpha">
                        <span class="error text-danger" id="roomnameError"></span>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Price</label>
                        <input type="text" class="form-control border-2 border-teal" name="price"
                            placeholder="Enter full name" data-validation="required numeric">
                        <span class="error text-danger" id="priceError"></span>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Area</label>
                        <input type="text" class="form-control border-2 border-teal" name="area"
                            placeholder="Enter full name" data-validation="required numeric">
                        <span class="error text-danger" id="areaError"></span>
                    </div>

                    <div class="col-md-4 mt-4">
                        <label class="form-label fw-semibold">Quantity</label>
                        <input type="text" class="form-control border-2 border-teal" name="quantity"
                            placeholder="Enter full name" data-validation="required numeric">
                        <span class="error text-danger" id="quantityError"></span>
                    </div>

                    <div class="col-md-4 mt-4">
                        <label class="form-label fw-semibold">Adults(Max)</label>
                        <input type="text" class="form-control border-2 border-teal" name="adults"
                            placeholder="Enter full name" data-validation="required numeric">
                        <span class="error text-danger" id="adultsError"></span>
                    </div>

                    <div class="col-md-4 mt-4">
                        <label class="form-label fw-semibold">Children(Max)</label>
                        <input type="text" class="form-control border-2 border-teal" name="children"
                            placeholder="Enter full name" data-validation="required numeric">
                        <span class="error text-danger" id="childrenError"></span>
                    </div>

                    <div class="col-md-12 mt-4">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea class="form-control border-2 border-teal" name="description" rows="2"
                            placeholder="Enter Room description" data-validation="required"></textarea>
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
                        echo "
                                <div class='col-md-3'>
                                    <label>
                                        <input type='checkbox' id='facilities' name='facilities[]' value='$fac_id'
                                            class='form-check-input shadow-none'>
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
                        echo "
                                <div class='col-md-3'>
                                    <label>
                                        <input type='checkbox' id='features' name='features[]' value='$fea_id'
                                            class='form-check-input shadow-none'>
                                        $fea_name
                                    </label>
                                </div>
                            ";
                    }

                    ?>

                </div>

            </div>

            <div class="d-flex justify-content-start">
                <button type="submit" name="addRoom" class="btn btn-md custome-bg text-white shadow-none mt-4" style="width: 190px;">SAVE</button>
            </div>
        </form>

    </div>
</div>
                    


<?php

$content = ob_get_clean();
include_once('index.php')

    ?>
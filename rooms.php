<?php
ob_start();
$title_page = "Dc Hotels - Rooms";
include('db_Connect.php');

?>


    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">OUR ROOMS</h2>
        <div class="h-line bg-dark"></div>
    </div>

    <!-- Section for filtering and rooms details -->

    <div class="container-fluid">
        <div class="row">

            <!-- Section for filters -->
            <div class="col-lg-3 mb-4 ps-4">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2 ms-3">FILTERS</h4>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#filterDrpodown" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse flex-column align-items-stretch"
                            style="margin-top:3px; padding:6px" id="filterDrpodown">
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="d-flex align-items-center justify-content-between mb-3"
                                    style="font-size: 18px;">

                                    <span>CHECK AVAILIBILITY</span>
                                    <button id="chk_avail_btn" onclick="chk_avail_clear()"
                                        class="btn btn-sm text-secondary d-none">Reset</button>

                                </h5>

                                <label class="form-label">Check-in</label>
                                <input type="date" class="form-control shadow-none mb-3"
                                    value="<?php echo $checkin_default ?>" id="checkin" onchange="chk_avail_filter()">
                                <label class="form-label">Check-Out</label>
                                <input type="date" class="form-control shadow-none"
                                    value="<?php echo $checkout_default ?>" id="checkout" onchange="chk_avail_filter()">
                            </div>

                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="d-flex align-items-center justify-content-between mb-3"
                                    style="font-size: 18px;">

                                    <span>FACILITIES</span>
                                    <button id="facilities_btn" onclick="facilities_clear()"
                                        class="btn btn-sm text-secondary d-none">Reset</button>

                                </h5>

                                <div class="mb-2">
                                    <input type="checkbox" name="facilities" onclick=" fetch_room()" value="$row[id]"
                                        class="form-check-input shadow-none me-1" id="$row[id]">
                                    <label class="form-label" for="1">Wifi</label>
                                </div>

                                <div class="mb-2">
                                    <input type="checkbox" name="facilities" onclick=" fetch_room()" value="$row[id]"
                                        class="form-check-input shadow-none me-1" id="$row[id]">
                                    <label class="form-label" for="1">Air Conditionar</label>
                                </div>

                                <div class="mb-2">
                                    <input type="checkbox" name="facilities" onclick=" fetch_room()" value="$row[id]"
                                        class="form-check-input shadow-none me-1" id="$row[id]">
                                    <label class="form-label" for="1">Television</label>
                                </div>

                                <div class="mb-2">
                                    <input type="checkbox" name="facilities" onclick=" fetch_room()" value="$row[id]"
                                        class="form-check-input shadow-none me-1" id="$row[id]">
                                    <label class="form-label" for="1">Gyser</label>
                                </div>

                                <div class="mb-2">
                                    <input type="checkbox" name="facilities" onclick=" fetch_room()" value="$row[id]"
                                        class="form-check-input shadow-none me-1" id="$row[id]">
                                    <label class="form-label" for="1">Spa</label>
                                </div>

                                <div class="mb-2">
                                    <input type="checkbox" name="facilities" onclick=" fetch_room()" value="$row[id]"
                                        class="form-check-input shadow-none me-1" id="$row[id]">
                                    <label class="form-label" for="1">Room Heater</label>
                                </div>
                            </div>

                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="d-flex align-items-center justify-content-between mb-3"
                                    style="font-size: 18px;">

                                    <span>GUESTS</span>
                                    <button id="guest_btn" onclick="guests_clear()"
                                        class="btn btn-sm text-secondary d-none">Reset</button>

                                </h5>

                                <div class="d-flex">
                                    <div class="me-3">
                                        <label class="form-label">Adules</label>
                                        <input type="number" min="1" value="<?php echo $adult_default ?>" id="adults"
                                            oninput="guests_filter()" class="form-control shadow-none" />
                                    </div>
                                    <div>
                                        <label class="form-label">Childrens</label>
                                        <input type="number" min="1" value="<?php echo $children_default ?>"
                                            id="children" oninput="guests_filter()" class="form-control shadow-none" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <!-- Section for rooms -->
            <div class="col-lg-9 col-md-12" id="rooms-data">

            <?php
            
                $q_getRooms = "SELECT * FROM `rooms` WHERE `status` = '1' AND `removed` = '0'";
                $res_getRooms = mysqli_query($con, $q_getRooms);

                
                $rooms = "";
                while ($room_data = mysqli_fetch_assoc($res_getRooms)) {

                    $room_id = $room_data['id'];
                    $room_img_qry = "SELECT * FROM `room_image` WHERE `room_id` = '$room_id' and `thumb` = '1'";
                    $res_room_img = mysqli_query($con, $room_img_qry);
                    $room_Image_res = mysqli_fetch_assoc($res_room_img);
                    //$room_Image = "../Images/rooms/".$room_Image_res['image'];

                    if(empty($room_Image_res['image'])) {
                        //getting default room image
                        $default_room_image = "SELECT * FROM `room_default_image`";
                        $res_default_room_image = mysqli_query($con, $default_room_image);
                        $row_default_room_image = mysqli_fetch_assoc($res_default_room_image);
                        //print_r($row_default_room_image);
                        $room_Image = "Images/room_default_image/".$row_default_room_image['image'];
                        //echo $room_Image;
                        //print_r($row_default_room_image);
                        
                    }
                    else
                    {
                        $room_Image = "Images/rooms/".$room_Image_res['image'];
                    }

                    //getting room features and facilites
                    $q_getFeatures = "SELECT f.name FROM `room_features` rf INNER JOIN `features` f ON rf.features_id = f.id WHERE rf.room_id = $room_data[id]";
                    $res_getFeatures = mysqli_query($con, $q_getFeatures);
                    $features = "";
                    while($feature_row = mysqli_fetch_assoc($res_getFeatures))
                    {
                        $features .= "<span class='badge bg-light text-dark text-wrap me-1 mb-1'>$feature_row[name]</span>";
                    }

                    $q_getFacility = "SELECT f.name FROM `room_facilities` rf INNER JOIN `facilities` f ON rf.facilities_id = f.id WHERE rf.room_id = $room_data[id]";
                    $res_getFacility = mysqli_query($con, $q_getFacility);
                    $facility = "";
                    while($facility_row = mysqli_fetch_assoc($res_getFacility))
                    {
                        $facility .= "<span class='badge bg-light text-dark text-wrap me-1 mb-1'>$facility_row[name]</span>";
                    }
                
                    $rooms .= "

                    <div class='card mb-4 border-0 shadow'>
                        <div class='row g-0 p-3 align-items-center'>
                            <div class='col-md-5'>
                                <img src='$room_Image' class='img-fluid rounded' />
                            </div>
                            <div class='col-md-5 px-lg-3 px-md-3'>
                                <h5 class='mb-3'>$room_data[name]</h5>
                                <div class='features mb-4'>
                                    <h6 class='mb-1'>Features</h6>
                                    
                                    $features

                                </div>
                                <div class='facilities mb-3'>
                                    <h6 class='mb-1'>Facilities</h6>
                                   
                                     $facility

                                </div>
                                <div class='guests'>
                                    <h6 class='mb-1'>Guests</h6>
                                    <span class='badge bg-light text-dark text-wrap'>$room_data[adult] Adults</span>
                                    <span class='badge bg-light text-dark text-wrap'>$room_data[children] Children</span>
                                </div>
                            </div>
                            <div class='col-md-2 text-center'>
                                <h6 class='mb-3'>₹2999 per night</h6>
                                <a href='confirm_booking.php?room_id={$room_data['id']}'
                                    class='btn btn-sm text-white w-100 custome-bg shadow-none mb-2'>Book Now</a>
                                    <a href='room_details.php?room_id={$room_data['id']}'
                                    class='btn btn-sm btn-outline-dark w-100 shadow-none'>More details</a>
                                    
                            </div>
                        </div>
                    </div>

                    ";
                
                }

                echo $rooms;
            
            ?>



</div>


            
        </div>
    </div>

<?php

$content = ob_get_clean();
include_once("layout.php");

?>
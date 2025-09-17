<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Rooms</title>

    <?php require('inc/links.php') ?>

    <link rel="stylesheet" href="css/style.css">


</head>

<body>

    <?php require('inc/header.php') ?>


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
                <div class='card mb-4 border-0 shadow'>
                    
                    <div class='row g-0 p-3 align-items-center'>
                        <div class='col-md-5'>
                            <img src='Images/rooms/1.jpg' class='img-fluid rounded' />
                        </div>
                        <div class='col-md-5 px-ld-3 px-md-3'>
                            <h5 class='mb-3'>Simple Room</h5>
                            <div class='features mb-4'>
                                <h6 class='mb-1'>Features</h6>
                                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                                    Bedroom
                                </span>
                                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                                    Kitchen
                                </span>
                                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                                    Feature 1
                                </span>
                                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                                    Feature 2
                                </span>
                            </div>

                            <div class='faciliteis mb-3'>
                                <h6 class='mb-1'>Facilities</h6>
                                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                                    Bedroom
                                </span>
                                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                                    Kitchen
                                </span>
                                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                                    Feature 1
                                </span>
                                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                                    Feature 2
                                </span>
                            </div>

                            <div class='guests'>
                                <h6 class='mb-1'>Guests</h6>
                                <span class='badge bg-light text-dark text-wrap'>
                                    3 Adults
                                </span>
                                <span class='badge bg-light text-dark text-wrap'>
                                    2 Childrens
                                </span>
                            </div>

                        </div>
                        <div class='col-md-2 text-center'>
                            <h6 class='mb-3' style='margin-bottom: 1rem;'>₹2999 per night</h6>
                            <button onclick='checkLoginToBook($login, $room_data[id])'
                                class='btn btn-sm text-white w-100 custome-bg shadow-none mb-2'>Book Now</button>
                            <a href='room_details.php'
                                class='btn btn-sm btn-outline-dark w-100 shadow-none'>More details</a>
                        </div>
                    </div>

                    <div class='row g-0 p-3 align-items-center'>
                        <div class='col-md-5'>
                            <img src='Images/rooms/2.jpg' class='img-fluid rounded' />
                        </div>
                        <div class='col-md-5 px-ld-3 px-md-3'>
                            <h5 class='mb-3'>Simple Room</h5>
                            <div class='features mb-4'>
                                <h6 class='mb-1'>Features</h6>
                                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                                    Bedroom
                                </span>
                                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                                    Kitchen
                                </span>
                                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                                    Feature 1
                                </span>
                                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                                    Feature 2
                                </span>
                            </div>

                            <div class='faciliteis mb-3'>
                                <h6 class='mb-1'>Facilities</h6>
                                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                                    Bedroom
                                </span>
                                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                                    Kitchen
                                </span>
                                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                                    Feature 1
                                </span>
                                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                                    Feature 2
                                </span>
                            </div>

                            <div class='guests'>
                                <h6 class='mb-1'>Guests</h6>
                                <span class='badge bg-light text-dark text-wrap'>
                                    3 Adults
                                </span>
                                <span class='badge bg-light text-dark text-wrap'>
                                    2 Childrens
                                </span>
                            </div>

                        </div>
                        <div class='col-md-2 text-center'>
                            <h6 class='mb-3' style='margin-bottom: 1rem;'>₹2999 per night</h6>
                            <button onclick='checkLoginToBook($login, $room_data[id])'
                                class='btn btn-sm text-white w-100 custome-bg shadow-none mb-2'>Book Now</button>
                            <a href='room_details.php'
                                class='btn btn-sm btn-outline-dark w-100 shadow-none'>More details</a>
                        </div>
                    </div>

                    <div class='row g-0 p-3 align-items-center'>
                        <div class='col-md-5'>
                            <img src='Images/rooms/IMG_78809.png' class='img-fluid rounded' />
                        </div>
                        <div class='col-md-5 px-ld-3 px-md-3'>
                            <h5 class='mb-3'>Simple Room</h5>
                            <div class='features mb-4'>
                                <h6 class='mb-1'>Features</h6>
                                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                                    Bedroom
                                </span>
                                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                                    Kitchen
                                </span>
                                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                                    Feature 1
                                </span>
                                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                                    Feature 2
                                </span>
                            </div>

                            <div class='faciliteis mb-3'>
                                <h6 class='mb-1'>Facilities</h6>
                                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                                    Bedroom
                                </span>
                                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                                    Kitchen
                                </span>
                                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                                    Feature 1
                                </span>
                                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                                    Feature 2
                                </span>
                            </div>

                            <div class='guests'>
                                <h6 class='mb-1'>Guests</h6>
                                <span class='badge bg-light text-dark text-wrap'>
                                    3 Adults
                                </span>
                                <span class='badge bg-light text-dark text-wrap'>
                                    2 Childrens
                                </span>
                            </div>

                        </div>
                        <div class='col-md-2 text-center'>
                            <h6 class='mb-3' style='margin-bottom: 1rem;'>₹2999 per night</h6>
                            <button onclick='checkLoginToBook($login, $room_data[id])'
                                class='btn btn-sm text-white w-100 custome-bg shadow-none mb-2'>Book Now</button>
                            <a href='room_details.php'
                                class='btn btn-sm btn-outline-dark w-100 shadow-none'>More details</a>
                        </div>
                    </div>

                    
                </div>
            </div>

            
        </div>
    </div>


    <?php require('inc/footer.php') ?>

</body>

</html>
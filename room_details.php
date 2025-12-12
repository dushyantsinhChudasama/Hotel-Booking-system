<?php
ob_start();
$title_page = "Dc Hotels - Room Details";
include("db_connect.php");

// ✅ Check and get room_id
if (!isset($_GET['room_id']) || empty($_GET['room_id'])) {
    header("Location: rooms.php");
    exit();
}

$room_id = intval($_GET['room_id']); // prevent SQL injection

// ✅ Get main room details
$q_room = "SELECT * FROM `rooms` WHERE `id` = '$room_id'";
$res_room = mysqli_query($con, $q_room);

if (mysqli_num_rows($res_room) == 0) {
    header("Location: rooms.php");
    exit();
}

$room_details = mysqli_fetch_assoc($res_room);

// ✅ Get room images
$q_images = "SELECT * FROM `room_image` WHERE `room_id` = '$room_id'";
$res_images = mysqli_query($con, $q_images);

// ✅ If no images, get default image
$images_html = "";
$active_class = "active";
if (mysqli_num_rows($res_images) > 0) {
    while ($img = mysqli_fetch_assoc($res_images)) {
        $img_path = "Images/rooms/" . $img['image'];
        $images_html .= "
            <div class='carousel-item $active_class'>
                <img src='$img_path' class='d-block w-100 rounded' alt='Room Image'>
            </div>
        ";
        $active_class = ""; // only first image active
    }
} else {
    // Default image
    $q_default = "SELECT * FROM `room_default_image` LIMIT 1";
    $res_default = mysqli_query($con, $q_default);
    $default_img = mysqli_fetch_assoc($res_default);
    $default_path = "Images/room_default_image/" . $default_img['image'];
    $images_html = "
        <div class='carousel-item active'>
            <img src='$default_path' class='d-block w-100 rounded' alt='Default Room Image'>
        </div>
    ";
}

// ✅ Get room features
$q_features = "SELECT f.name FROM `room_features` rf 
               INNER JOIN `features` f ON rf.features_id = f.id 
               WHERE rf.room_id = '$room_id'";
$res_features = mysqli_query($con, $q_features);
$features_html = "";
while ($f = mysqli_fetch_assoc($res_features)) {
    $features_html .= "<span class='badge bg-light text-dark text-wrap me-1 mb-1'>{$f['name']}</span>";
}

// ✅ Get room facilities
$q_facilities = "SELECT f.name FROM `room_facilities` rf 
                 INNER JOIN `facilities` f ON rf.facilities_id = f.id 
                 WHERE rf.room_id = '$room_id'";
$res_facilities = mysqli_query($con, $q_facilities);
$facilities_html = "";
while ($f = mysqli_fetch_assoc($res_facilities)) {
    $facilities_html .= "<span class='badge bg-light text-dark text-wrap me-1 mb-1'>{$f['name']}</span>";
}
?>

<div class="container">
    <div class="row">

        <!-- Room Name -->
        <div class="col-12 my-5 px-4">
            <a href="rooms.php" class="text-dark" style="font-size: 1.8rem;">
                <i class="bi bi-arrow-left-circle"></i>
            </a>
            <h2 class="fw-bold"><?php echo htmlspecialchars($room_details['name']); ?></h2>
        </div>

        <!-- Room Images Carousel -->
        <div class="col-lg-7 col-md-12 px-4">
            <div id="roomCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                <div class="carousel-inner">
                    <?php echo $images_html; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!-- Room Details -->
        <div class="col-lg-5 col-md-12 px-4">
            <div class="card mb-4 border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <h4>₹<?php echo htmlspecialchars($room_details['price']); ?> per night</h4>

                    <div class="mb-3">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>

                    <div class="mb-4">
                        <h6 class="mb-1">Features</h6>
                        <?php echo $features_html ?: "<span class='text-muted'>No features listed</span>"; ?>
                    </div>

                    <div class="mb-4">
                        <h6 class="mb-1">Facilities</h6>
                        <?php echo $facilities_html ?: "<span class='text-muted'>No facilities listed</span>"; ?>
                    </div>

                    <div class="mb-3">
                        <h6 class="mb-1">Guests</h6>
                        <span class="badge bg-light text-dark text-wrap"><?php echo $room_details['adult']; ?> Adults</span>
                        <span class="badge bg-light text-dark text-wrap"><?php echo $room_details['children']; ?> Children</span>
                    </div>

                    <div class="mb-4">
                        <h6 class="mb-1">Area</h6>
                        <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                            <?php echo htmlspecialchars($room_details['area']); ?> sq. ft.
                        </span>
                    </div>

                    <button class="btn text-white w-100 custome-bg shadow-none mb-2"
                        onclick="window.location.href='confirm_booking.php?room_id=<?php echo $room_id; ?>'">Book Now</button>

                </div>
            </div>
        </div>

        <!-- Description -->
        <div class="col-12 px-4 mt-4">
            <div class="mb-4">
                <h5>Description</h5>
                <p><?php echo nl2br(htmlspecialchars($room_details['description'] ?? "No description available.")); ?></p>
            </div>
        </div>

    </div>
</div>

<?php
$content = ob_get_clean();
include_once("layout.php");
?>

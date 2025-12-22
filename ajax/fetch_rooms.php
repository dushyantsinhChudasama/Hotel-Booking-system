<?php
include('../db_Connect.php');

$facilities = json_decode($_POST['facilities'], true);
$adults = (int)$_POST['adults'];
$children = (int)$_POST['children'];

$sql = "SELECT r.* FROM rooms r";
$join = "";
$where = " WHERE r.status = 1 AND r.removed = 0 ";
$group = "";
$having = "";

/* FACILITIES FILTER (ALL selected) */
if (!empty($facilities)) {
    $fac_ids = implode(',', array_map('intval', $facilities));
    $join .= " INNER JOIN room_facilities rf ON r.id = rf.room_id ";
    $where .= " AND rf.facilities_id IN ($fac_ids) ";
    $group = " GROUP BY r.id ";
    $having = " HAVING COUNT(DISTINCT rf.facilities_id) = " . count($facilities);
}

/* GUEST FILTER */
if ($adults > 0) {
    $where .= " AND r.adult >= $adults ";
}
if ($children >= 0) {
    $where .= " AND r.children >= $children ";
}

$finalQuery = $sql . $join . $where . $group . $having;

$res = mysqli_query($con, $finalQuery);
if (!$res) {
    die(mysqli_error($con));
}

if (mysqli_num_rows($res) == 0) {
    echo "<h4 class='text-center'>No rooms found</h4>";
    exit;
}

while ($room = mysqli_fetch_assoc($res)) {

    /* ROOM IMAGE */
    $img_q = "SELECT image FROM room_image WHERE room_id={$room['id']} AND thumb=1 LIMIT 1";
    $img_r = mysqli_query($con, $img_q);
    $img = mysqli_fetch_assoc($img_r);

    if ($img) {
        $room_img = "Images/rooms/".$img['image'];
    } else {
        $def = mysqli_fetch_assoc(
            mysqli_query($con, "SELECT image FROM room_default_image LIMIT 1")
        );
        $room_img = "Images/room_default_image/".$def['image'];
    }

    /* FEATURES */
    $features_html = "";
    $fq = "
        SELECT f.name
        FROM room_features rf
        JOIN features f ON rf.features_id = f.id
        WHERE rf.room_id = {$room['id']}
    ";
    $fr = mysqli_query($con, $fq);
    while ($f = mysqli_fetch_assoc($fr)) {
        $features_html .= "<span class='badge bg-light text-dark me-1'>{$f['name']}</span>";
    }

    /* FACILITIES */
    $fac_html = "";
    $fa_q = "
        SELECT f.name
        FROM room_facilities rf
        JOIN facilities f ON rf.facilities_id = f.id
        WHERE rf.room_id = {$room['id']}
    ";
    $fa_r = mysqli_query($con, $fa_q);
    while ($fa = mysqli_fetch_assoc($fa_r)) {
        $fac_html .= "<span class='badge bg-light text-dark me-1'>{$fa['name']}</span>";
    }
?>

<div class="card mb-4 border-0 shadow">
    <div class="row g-0 p-3 align-items-center">

        <div class="col-md-5">
            <img src="<?= $room_img ?>" class="img-fluid rounded">
        </div>

        <div class="col-md-5 px-3">
            <h5><?= $room['name'] ?></h5>

            <h6>Features</h6>
            <?= $features_html ?>

            <h6 class="mt-2">Facilities</h6>
            <?= $fac_html ?>

            <h6 class="mt-2">Guests</h6>
            <span class="badge bg-light text-dark"><?= $room['adult'] ?> Adults</span>
            <span class="badge bg-light text-dark"><?= $room['children'] ?> Children</span>
        </div>

        <div class="col-md-2 text-center">
            <h6>₹<?= $room['price'] ?> per night</h6>
            <a href="confirm_booking.php?room_id=<?= $room['id'] ?>"
               class="btn btn-sm text-white custome-bg w-100 mb-2">Book Now</a>
            <a href="room_details.php?room_id=<?= $room['id'] ?>"
               class="btn btn-sm btn-outline-dark w-100">More details</a>
        </div>

    </div>
</div>

<?php } ?>

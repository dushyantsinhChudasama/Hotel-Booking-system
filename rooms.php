<?php
ob_start();
$title_page = "Dc Hotels - Rooms";
include('db_Connect.php');
?>

<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">OUR ROOMS</h2>
    <div class="h-line bg-dark"></div>
</div>

<div class="container-fluid">
    <div class="row">

        <!-- FILTERS -->
        <div class="col-lg-3 mb-4 ps-4">
            <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                <div class="container-fluid flex-lg-column align-items-stretch">

                    <h4 class="mt-2 ms-3">FILTERS</h4>

                    <!-- FACILITIES -->
                    <div class="border bg-light p-3 rounded mb-3">
                        <h5 class="mb-3">Facilities</h5>

                        <?php
                        $fac_q = "SELECT * FROM facilities";
                        $fac_res = mysqli_query($con, $fac_q);

                        if (!$fac_res) {
                            die(mysqli_error($con));
                        }

                        while ($fac = mysqli_fetch_assoc($fac_res)) {
                        ?>
                        <div class="mb-2">
                            <input type="checkbox"
                                   class="form-check-input me-1 facility"
                                   value="<?= $fac['id'] ?>">
                            <label class="form-label"><?= $fac['name'] ?></label>
                        </div>
                        <?php } ?>
                    </div>

                    <!-- GUESTS -->
                    <div class="border bg-light p-3 rounded mb-3">
                        <h5 class="mb-3">Guests</h5>

                        <label>Adults</label>
                        <input type="number" min="1" value="1"
                               id="adults"
                               class="form-control shadow-none mb-2">

                        <label>Children</label>
                        <input type="number" min="0" value="0"
                               id="children"
                               class="form-control shadow-none">
                    </div>

                </div>
            </nav>
        </div>

        <!-- ROOMS -->
        <div class="col-lg-9 col-md-12" id="rooms-data">
            <!-- AJAX content -->
        </div>

    </div>
</div>

<script>
function fetch_rooms() {

    let facilities = [];
    document.querySelectorAll('.facility:checked').forEach(cb => {
        facilities.push(cb.value);
    });

    let adults = document.getElementById('adults').value;
    let children = document.getElementById('children').value;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/fetch_rooms.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        document.getElementById("rooms-data").innerHTML = this.responseText;
    };

    xhr.send(
        "facilities=" + JSON.stringify(facilities) +
        "&adults=" + adults +
        "&children=" + children
    );
}

// Events
document.querySelectorAll('.facility').forEach(cb => {
    cb.addEventListener('change', fetch_rooms);
});
document.getElementById('adults').addEventListener('input', fetch_rooms);
document.getElementById('children').addEventListener('input', fetch_rooms);

// Initial load
fetch_rooms();
</script>

<?php
$content = ob_get_clean();
include_once("layout.php");
?>

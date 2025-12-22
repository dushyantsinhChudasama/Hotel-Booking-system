<?php
include('../db_Connect.php');
ob_start();
$title_page = "New Bookings";

/* FETCH BOOKINGS */
$get_bookings = "SELECT * FROM booking_order WHERE booking_status='booked' AND `arrival` = 0 ORDER BY booking_id DESC";
$result_bookings = mysqli_query($con, $get_bookings);

/* ASSIGN ROOM */
if (isset($_POST['assignRoom'])) {

    $room_no = trim($_POST['room_no']);
    $booking_id = trim($_POST['booking_id']);

    if ($room_no == '' || $booking_id == '') {
        echo "<script>alert('Room number or booking ID missing');</script>";
    } else {

        $update_booking = "
            UPDATE booking_order
            SET room_no='$room_no', arrival=1
            WHERE booking_id='$booking_id'
        ";

        if (mysqli_query($con, $update_booking)) {
            echo "<script>
                alert('Room assigned successfully!');
                window.location.href = 'new_bookings.php';
            </script>";
            exit;
        } else {
            echo "<script>alert('Failed to assign room');</script>";
        }
    }
}

/* CANCEL BOOKING (ADMIN) */
if (isset($_GET['cancel_booking'])) {

    $bid = $_GET['cancel_booking'];

    $cancel_q = "
        UPDATE booking_order
        SET booking_status='cancelled'
        WHERE booking_id='$bid'
    ";

    if (mysqli_query($con, $cancel_q)) {
        echo "<script>
            alert('Booking cancelled successfully');
            window.location.href='new_bookings.php';
        </script>";
        exit;
    }
}
?>

<div class="d-flex align-items-center justify-content-between mb-4">
    <h3>New Bookings</h3>
</div>

<div class="card border-0 shadow mb-4">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover border">
                <thead>
                    <tr class="bg-dark text-light">
                        <th>#</th>
                        <th>User Details</th>
                        <th>Room Details</th>
                        <th>Booking Details</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                $i = 1;
                while ($data = mysqli_fetch_assoc($result_bookings)) {

                    $checkin  = date('d-m-Y', strtotime($data['check_in']));
                    $checkout = date('d-m-Y', strtotime($data['check_out']));
                    $bookdate = date('d-m-Y', strtotime($data['datentime']));
                ?>

                <tr>
                    <td><?= $i++ ?></td>

                    <td>
                        <span class="badge bg-primary">Order ID: <?= $data['order_id'] ?></span><br>
                        <b>Name:</b> <?= $data['user_name'] ?><br>
                        <b>Phone:</b> <?= $data['phonenum'] ?>
                    </td>

                    <td>
                        <b>Room:</b> <?= $data['room_name'] ?><br>
                        <b>Price:</b> ₹<?= $data['price'] ?>
                    </td>

                    <td>
                        <b>Check-in:</b> <?= $checkin ?><br>
                        <b>Check-out:</b> <?= $checkout ?><br>
                        <b>Paid:</b> ₹<?= $data['total_pay'] ?><br>
                        <b>Date:</b> <?= $bookdate ?>
                    </td>

                    <td>
                        <button type="button"
                                class="btn text-white fw-bold custome-bg btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#assign-room"
                                onclick="setBookingId('<?= $data['booking_id'] ?>')">
                            <i class="bi bi-check2-square"></i> Assign Room
                        </button>

                        <br>

                        <a href="new_bookings.php?cancel_booking=<?= $data['booking_id'] ?>"
                           class="btn btn-outline-danger mt-2 fw-bold btn-sm"
                           onclick="return confirm('Are you sure you want to cancel this booking?');">
                           <i class="bi bi-trash"></i> Cancel Booking
                        </a>
                    </td>
                </tr>

                <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ASSIGN ROOM MODAL -->
<div class="modal fade" id="assign-room" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form method="post">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Assign Room</h5>
                </div>

                <div class="modal-body">
                    <label class="form-label fw-bold">Room No</label>
                    <input type="text" name="room_no" class="form-control shadow-none" required>
                    <input type="hidden" name="booking_id" id="booking_id">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn text-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" name="assignRoom"
                            class="btn custome-bg text-white">
                        Save
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>

<script>
function setBookingId(id){
    document.getElementById('booking_id').value = id;
}
</script>

<?php
$content = ob_get_clean();
include_once("index.php");
?>

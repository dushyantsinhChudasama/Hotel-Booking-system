<?php
ob_start();
$title_page = "Refund Bookings";
include('../db_Connect.php');

/* HANDLE REFUND ACTION (SAME PAGE) */
if (isset($_GET['refund_booking'])) {

    $booking_id = (int)$_GET['refund_booking'];

    $refund_q = "
        UPDATE booking_order
        SET refund = 1, booking_status = 'refunded'
        WHERE booking_id = $booking_id
    ";

    if (mysqli_query($con, $refund_q)) {
        echo "<script>
            alert('Amount refunded successfully');
            window.location.href='refund_bookings.php';
        </script>";
        exit;
    } else {
        echo "<script>alert('Refund failed');</script>";
    }
}

/* FETCH REFUNDABLE BOOKINGS */
$q = "
    SELECT * 
    FROM booking_order 
    WHERE refund = 0 
    AND booking_status = 'cancelled'
    ORDER BY booking_id DESC
";
$res = mysqli_query($con, $q);
?>

<div class="d-flex align-items-center justify-content-between mb-4">
    <h3>Refund Bookings</h3>
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
                        <th>Refund Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                if (mysqli_num_rows($res) == 0) {
                    echo "<tr>
                            <td colspan='5' class='text-center fw-bold'>
                                No Refund Requests
                            </td>
                          </tr>";
                } else {
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($res)) {
                ?>
                    <tr>
                        <td><?= $i++ ?></td>

                        <td>
                            <span class="badge bg-primary">
                                Order ID: <?= $row['order_id'] ?>
                            </span><br>
                            <b>Name:</b> <?= $row['user_name'] ?><br>
                            <b>Phone:</b> <?= $row['phonenum'] ?>
                        </td>

                        <td>
                            <b>Room:</b> <?= $row['room_name'] ?><br>
                            <b>Check-in:</b> <?= date('d-m-Y', strtotime($row['check_in'])) ?><br>
                            <b>Check-out:</b> <?= date('d-m-Y', strtotime($row['check_out'])) ?><br>
                            <b>Date:</b> <?= date('d-m-Y', strtotime($row['datentime'])) ?>
                        </td>

                        <td>
                            <b>₹ <?= $row['total_pay'] ?></b>
                        </td>

                        <td>
                            <a href="refund_bookings.php?refund_booking=<?= $row['booking_id'] ?>"
                               class="btn btn-success btn-sm fw-bold"
                               onclick="return confirm('Are you sure you want to refund this booking?');">
                               <i class="bi bi-cash-stack"></i> Refund
                            </a>
                        </td>
                    </tr>
                <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include_once("index.php");
?>

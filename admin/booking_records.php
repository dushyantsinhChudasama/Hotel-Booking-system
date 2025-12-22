<?php
ob_start();
$title_page = "Booking Records";

include('../db_Connect.php');

// fetch all bookings
$q = "SELECT * FROM booking_order ORDER BY booking_id DESC";
$res = mysqli_query($con, $q);
?>

<div class="d-flex align-items-center justify-content-between mb-4">
    <h3>Booking Records</h3>
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
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                if(mysqli_num_rows($res) == 0){
                    echo "<tr><td colspan='6' class='text-center fw-bold'>No Booking Records Found</td></tr>";
                } else {
                    $i = 1;
                    while($row = mysqli_fetch_assoc($res)){
                        
                        // status badge
                        if($row['booking_status'] == 'booked'){
                            $badge = "bg-success";
                        } elseif($row['booking_status'] == 'cancelled'){
                            $badge = "bg-danger";
                        } elseif($row['booking_status'] == 'checked-in'){
                            $badge = "bg-primary";
                        } else {
                            $badge = "bg-secondary";
                        }
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
                            <b>Price:</b> ₹<?= $row['price'] ?>
                        </td>

                        <td>
                            <b>Check-in:</b> <?= date('d-m-Y', strtotime($row['check_in'])) ?><br>
                            <b>Check-out:</b> <?= date('d-m-Y', strtotime($row['check_out'])) ?><br>
                            <b>Amount:</b> ₹<?= $row['total_pay'] ?><br>
                            <b>Date:</b> <?= date('d-m-Y', strtotime($row['datentime'])) ?>
                        </td>

                        <td>
                            <span class="badge <?= $badge ?>">
                                <?= $row['booking_status'] ?>
                            </span>
                        </td>

                        <td>
                            <?php if(!empty($row['payment_id'])){ ?>
                                <a href="download_invoice.php?booking_id=<?= $row['booking_id'] ?>"
                                   class="btn btn-outline-success btn-sm fw-bold mt-2">
                                    <i class="bi bi-file-earmark-arrow-down-fill"></i>
                                </a>
                            <?php } else { ?>
                                <span class="text-muted">N/A</span>
                            <?php } ?>
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

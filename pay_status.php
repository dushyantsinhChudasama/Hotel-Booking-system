<?php
session_start();
include "db_Connect.php";
include "config.php";
require('razorpay-php/Razorpay.php');

use Razorpay\Api\Api;

// values stored from order page
$paymentId = $_GET['payment_id'] ?? null;
$orderId = $_SESSION['razorpay_order_id'] ?? null;
$amount = $_SESSION['order_amount'] ?? null;
$room_id = $_SESSION['room_id'] ?? null;
$checkin = $_SESSION['checkin'] ?? null;
$checkout = $_SESSION['checkout'] ?? null;
$user_id = $_SESSION['uid'] ?? null;
$phonenum = $_SESSION['phonenum'] ?? null;

// Fetch room details
$roomQuery = "SELECT * FROM rooms WHERE id='$room_id'";
$resRoom = mysqli_query($con,$roomQuery);
$room = mysqli_fetch_assoc($resRoom);
$room_name = $room['name'];
$room_price = $room['price'];

//fetch user details
$userQuery = "SELECT * FROM user_details WHERE id='$user_id'";
$resUser = mysqli_query($con,$userQuery);
$user = mysqli_fetch_assoc($resUser);
$user_name = $user['full_name'];
$user_mobile = $user['mobile'];

// Default payment message
$statusMessage = "Payment failed or cancelled.";

if($paymentId)
{
    $api = new Api($razorpay_key, $razorpay_secret);

    try {

        $payment = $api->payment->fetch($paymentId);

        if ($payment && $payment->status == 'captured') 
        {
            $statusMessage = "Payment Successful";

            // Insert booking record
            $q = "INSERT INTO booking_order
    (user_id, room_id, check_in, check_out, order_id, trans_amt, trans_resp_msg, payment_id, room_name, price, total_pay, user_name, phonenum)
    VALUES
    (
        '$user_id',
        '$room_id',
        '$checkin',
        '$checkout',
        '$orderId',
        '$amount',
        '$statusMessage',
        '$paymentId',
        '$room_name',
        '$room_price',
        '$amount',
        '$user_name',
        '$user_mobile'
    )";

            
            if(mysqli_query($con,$q))
            {
                // Booking recorded successfully
            }
            else
            {
                $statusMessage = "Booking recording failed.";
            }
        }
        else
        {
            $statusMessage = "Payment Pending or Failed";
        }

    } catch(Exception $e) {
        $statusMessage = "Something went wrong while verifying payment.";
    }
    finally{
        echo "<script>
                console.log('Payment Status: $statusMessage');
              </script>";
    }
}
else{
    $statusMessage = "No payment reference received.";
}
?>

<?php

ob_start();
$title_page = "Dc Hotels - Payment Status";
?>

  <!-- Showing room name -->
  <div class="container">
        <div class="row">

            <div class="col-12 my-5 px-4">
                <h2 class="fw-bold">PAYMENT STATUS</h2>
            </div>

            <div class="col-12 px4-">
                <p class="fw-bold alert alert-success">
                    <i class="bi bi-check-circle-fill"></i> 
                    Thank you! Booking Successful, with booking id <?php echo $orderId?>
                    <br><br>
                    <a href='bookings.php'>Go to Bookings</a> | 
                    <a href='rooms.php'>Book another Room</a>
                </p>
            </div>
        </div>
    </div>
        <!-- <h3 class="mb-4">Booking Payment Status</h3>

        <p><strong>Status:</strong> <?php echo $statusMessage; ?></p>
        <p><strong>Payment ID:</strong> <?php echo $paymentId ?? "Not Available"; ?></p>
        <p><strong>Order ID:</strong> <?php echo $orderId ?? "Not Available"; ?></p>
        <p><strong>Amount Paid:</strong> ₹<?php echo $amount ?? "0"; ?></p>

        <hr>

        <h4 class="mt-4">Room Details</h4>

        <p><strong>Room Name:</strong> <?php echo $room['name']; ?></p>
        <p><strong>Room Price:</strong> ₹<?php echo $room['price']; ?> per night</p>
        <p><strong>Check-in:</strong> <?php echo $checkin; ?></p>
        <p><strong>Check-out:</strong> <?php echo $checkout; ?></p>

        <?php
        // Fetch room thumbnail image
        $thumbQuery = "SELECT image FROM room_image WHERE room_id='$room_id' AND thumb=1 LIMIT 1";
        $thumbRes = mysqli_query($con,$thumbQuery);
        $thumb = mysqli_fetch_assoc($thumbRes);

        if ($thumb) {
            echo "<img src='Images/rooms/".$thumb['image']."' width='300' class='mt-3 rounded shadow'>";
        }
        ?> -->

        <!-- <a href="rooms.php" class="btn btn-primary mt-4">Book Another Room</a> -->


        <?php
$content = ob_get_clean();
include_once("layout.php");
?>

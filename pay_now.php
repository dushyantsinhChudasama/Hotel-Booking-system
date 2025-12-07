<?php
session_start();
include "db_Connect.php";
include "config.php"; // Razorpay keys
require('razorpay-php/Razorpay.php');

use Razorpay\Api\Api;

if(isset($_POST['pay_now']))
{
    $user_id = $_SESSION['uid'];
    $name=$_POST['name'];
    $phone=$_POST['phonenum'];
    $address=$_POST['address'];
    $checkin=$_POST['checkin'];
    $checkout=$_POST['checkout'];
    $room_id = $_POST['room_id'];

    // Fetch room price
    $q = "SELECT price FROM rooms WHERE id='$room_id'";
    $res = mysqli_query($con,$q);
    $room = mysqli_fetch_assoc($res);
    $perNight = $room['price'];

    // Calculate total days
    $diff = (strtotime($checkout) - strtotime($checkin)) / (60 * 60 * 24);
    $totalAmount = $diff * $perNight;

    // Create razorpay order
    $api = new Api($razorpay_key, $razorpay_secret);

    $orderData = [
        'receipt'         => 'rcptid_' . rand(1000,9999),
        'amount'          => $totalAmount * 100, 
        'currency'        => 'INR'
    ];

    $order = $api->order->create($orderData);
    $orderId = $order['id'];

    // Save for status page
    $_SESSION['order_amount']=$totalAmount;
    $_SESSION['razorpay_order_id']=$orderId;
    $_SESSION['room_id']=$room_id;
    $_SESSION['checkin']=$checkin;
    $_SESSION['checkout']=$checkout;
}
else
{
    header("Location: rooms.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Processing Payment...</title>
</head>
<body>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
var options = {
    "key": "<?php echo $razorpay_key ?>",
    "amount": "<?php echo $totalAmount * 100 ?>",
    "currency": "INR",
    "name": "DC Hotels",
    "description": "Room Booking Payment",
    "order_id": "<?php echo $orderId ?>",
    "handler": function (response){
        window.location.href = "pay_status.php?payment_id=" + response.razorpay_payment_id;
    },
    "prefill": {
        "name": "<?php echo $name ?>",
        "contact": "<?php echo $phone ?>"
    },
    "theme": {
        "color": "#0dcaf0"
    }
};

var rzp = new Razorpay(options);

// 🔥 Auto open Razorpay popup
window.onload = function(){
    rzp.open();
}
</script>

</body>
</html>

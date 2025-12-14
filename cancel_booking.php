<?php

include('db_Connect.php');

if(isset($_GET['can_book']) && isset($_GET['bid']))
{
    $booking_id = $_GET['bid'];

    // Update the booking status to 'cancelled'
    $cancel_booking_query = "UPDATE booking_order SET booking_status='cancelled' WHERE booking_id='$booking_id'";
    $result = mysqli_query($con, $cancel_booking_query);

    if($result)
    {
        // Redirect back to bookings page with success message
        header('Location: bookings.php?message=Booking cancelled successfully');
    }
    else
    {
        // Redirect back to bookings page with error message
        header('Location: bookings.php?error=Failed to cancel booking');
    }
}
else
{
    // Redirect back to bookings page if parameters are missing
    header('Location: bookings.php?error=Invalid request');
}

?>
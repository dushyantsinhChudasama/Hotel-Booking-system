<?php

include('db_Connect.php');

  ob_start();
  $title_page = "DC Hotels - Bookings";

  session_start();
  if(!(isset($_SESSION['login'])  && $_SESSION['login'] == true))
  {
    header('Location: login.php');
  }

  $user_id = $_SESSION['uid'];

  $get_bookings = "SELECT * FROM booking_order WHERE user_id='$user_id' ORDER BY datentime DESC";
  $bookings = mysqli_query($con,$get_bookings);

  $reciepts = "";
?>

<div class="container">
    <div class="row">
        
        <div class="col-lg-12 my-5 px-4">
            <h2 class="fw-bold">BOOKINGS</h2>
        </div>

        <?php
        
        // if(mysqli_fetch_assoc($bookings) == 0)
        // {
        //   echo "<div class='col-lg-12 text-center'>
        //           <h3 class='fw-bold'>No Bookings Made Yet!</h3>
        //         </div>";
        //   exit();
        // }
        while($data = mysqli_fetch_assoc($bookings))
        {
          $badge = "";
          $downloadButton = "";

          //getting the dates
          $chedkin = date('d-m-Y', strtotime($data['check_in']));
          $chedkout = date('d-m-Y', strtotime($data['check_out']));
          $date_time = date('d-m-Y', strtotime($data['datentime']));

          // BADGE
          if ($data['status'] == 'cancelled') {
            $badge = "<span class='badge bg-danger'>Cancelled</span>";
          }

          if ($data['refund'] == 1) {
            $badge = "<span class='badge bg-primary text-white'>Refunded</span>";
          }
          elseif ($data['status'] == 'refund in progress') {
            $badge = "<span class='badge bg-secondary'>Refund in Progress</span>";
          }
          elseif ($data['arrival'] == 1) {
            $badge = "<span class='badge bg-primary'>Completed</span>";
          }
          elseif ($data['status'] == 'booked') {
            $badge = "<span class='badge bg-success'>Booked</span>";
          }


          // BUTTONS
          if ($data['arrival'] == 1) 
          {
            // completed -> invoice
            $downloadButton = "<a href='generate_pdf.php?gen_pdf&id=$data[booking_id]' 
                              class='btn btn-dark mt-2 shadow-none btn-sm'>
                              Download Invoice</a>";
          }
          elseif ($data['refund'] == 1) 
          {
            // already refunded
            $downloadButton = "<button class='btn btn-success mt-2 shadow-none btn-sm'>
                                Amount Refunded</button>";
          }
          elseif ($data['status'] == 'refund in progress') 
          {
            // refund processing
            $downloadButton = "<button class='btn btn-secondary mt-2 shadow-none btn-sm' disabled>
                                Refund in Progress</button>";
          }
          elseif ($data['status'] == 'cancelled') 
          {
            // cancelled -> no button
            $downloadButton = "<button class='btn btn-primary mt-2 shadow-none btn-sm'>
                                Refund in Progress</button>";
          }
          else 
          {
            // active booking -> show cancel
            $downloadButton = "<a href='cancel_booking.php?can_book&bid=$data[booking_id]'
                                class='btn btn-danger mt-2 shadow-none btn-sm'
                                onclick=\"return confirm('Are you sure you want to cancel this booking?');\">
                                Cancel Booking</a>";
          }


          $reciepts .= "
          <div class='col-md-4 px-4 mb-4'>
              <div class='bg-white shadow p-3 rounded'>
              
              <h5>$data[room_name]</h5>
              <p>₹$data[price] per night</p>
              <p>
                    <b>Check In : </b>$chedkin <br>
                    <b>Check Out : </b>$chedkout <br>
                  </p>
  
                  <p>
                  <b>Amount : </b> ₹$data[trans_amt] <br>
                  <b>Order ID : </b> $data[order_id] <br>
                  <b>Date : </b> $date_time <br>
                </p>
  
                <p>
                  $badge
                </p>
  
                  $downloadButton
              </div>
              
          </div>";
        }
        
        echo $reciepts
        ?>


    </div>
</div>

<?php

$content = ob_get_clean();
include_once("layout.php")

?>
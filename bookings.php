<?php

  ob_start();
  $title_page = "DC Hotels - Bookings";

  session_start();
  if(!(isset($_SESSION['login'])  && $_SESSION['login'] == true))
  {
    header('Location: login.php');
  }
?>

<div class="container">
    <div class="row">
        
        <div class="col-lg-12 my-5 px-4">
            <h2 class="fw-bold">BOOKINGS</h2>
        </div>

        <div class="col-md-4 px-4 mb-4">
            <div class="bg-white shadow p-3 rounded">
            
            <h5>Simple Room</h5>
            <p>₹2000 per night</p>
            <p>
                  <b>Check In : </b>08-09-2025 <br>
                  <b>Check Out : </b>05-09-2025 <br>
                </p>

                <p>
                <b>Amount : </b> ₹5499 <br>
                <b>Order ID : </b> ORD_129877 <br>
                <b>Date : </b> 08-09-2025 <br>
              </p>

              <p>
                <span class='badge bg-success'>Booked</span>
              </p>

                <a href='generate_pdf.php?gen_pdf&id=$data[booking_id]'class='btn btn-dark mt-2  shadow-none btn-sm'>
                    Download Invoice
                </a>
            </div>
            
        </div>

        <div class="col-md-4 px-4 mb-4">
            <div class="bg-white shadow p-3 rounded">
            
            <h5>Simple Room</h5>
            <p>₹2000 per night</p>
            <p>
                  <b>Check In : </b>08-09-2025 <br>
                  <b>Check Out : </b>05-09-2025 <br>
                </p>

                <p>
                <b>Amount : </b> ₹5499 <br>
                <b>Order ID : </b> ORD_129877 <br>
                <b>Date : </b> 08-09-2025 <br>
              </p>

              <p>
                <span class='badge bg-success'>Booked</span>
              </p>

              <button type='button' onclick='' class='btn btn-danger mt-2  btn-sm'>
                Cancel
                </button>
            </div>
            
        </div>

        <div class="col-md-4 px-4 mb-4">
            <div class="bg-white shadow p-3 rounded">
            
            <h5>Simple Room</h5>
            <p>₹2000 per night</p>
            <p>
                  <b>Check In : </b>08-09-2025 <br>
                  <b>Check Out : </b>05-09-2025 <br>
                </p>

                <p>
                <b>Amount : </b> ₹5499 <br>
                <b>Order ID : </b> ORD_129877 <br>
                <b>Date : </b> 08-09-2025 <br>
              </p>

              <p>
                <span class='badge bg-danger'>Cancelled</span>
              </p>

              <span class='badge bg-primary'>Refund in process!</span>
            </div>
            
        </div>

        <div class="col-md-4 px-4 mb-4">
            <div class="bg-white shadow p-3 rounded">
            
            <h5>Simple Room</h5>
            <p>₹2000 per night</p>
            <p>
                  <b>Check In : </b>08-09-2025 <br>
                  <b>Check Out : </b>05-09-2025 <br>
                </p>

                <p>
                <b>Amount : </b> ₹5499 <br>
                <b>Order ID : </b> ORD_129877 <br>
                <b>Date : </b> 08-09-2025 <br>
              </p>

              <p>
                <span class='badge bg-danger'>Cancelled</span>
              </p>

              <button type='button' onclick='' class='btn btn-dark mt-2  btn-sm'>
                Download Invoice
                </button>
            </div>
            
        </div>

    </div>
</div>

<?php

$content = ob_get_clean();
include_once("layout.php")

?>
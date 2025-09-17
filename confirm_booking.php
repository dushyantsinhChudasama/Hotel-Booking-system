<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Booking</title>

    <?php require('inc/links.php') ?>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php require('inc/header.php'); ?>

    <div class="container">
        <div class="row">

            <!-- Showing room name -->
            <div class="col-12 my-5 px-4">
                <h2 class="fw-bold">CONFIRM BOOKING</h2>
            </div>

            <!-- For showing room images -->

            <div class="col-lg-7 col-md-12 px-4">


                <div class="card p-3 shadow-sm rounded">
                    <img src="Images/rooms/IMG_11892.png" class="img-fluid rounded mb-3" />
                    <h5>Simple Room</h5>
                    <h6>₹2000 per night</h6>
                </div>


            </div>

            <!-- Room details -->

      <div class="col-lg-5 col-md-12 px-4">
        <div class="card mb-4 border-0 shadow-sm rounded-3">
          <div class="card-body">
            <form action="pay_now.php" method="post" id="booking_form">
              <h6 class="mb-3">BOOKING DETAILS</h6>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label">Name</label>
                  <input name="name" type="text" value="ABC XYZ" class="form-control shadow-none" placeholder="Enter your Name" data-validation="required">
                  <div class="error" id="nameError"></div>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">Phone</label>
                  <input name="phonenum" type="text" value="9712802041" class="form-control shadow-none" placeholder="Enter your Name" data-validation="required">
                  <div class="error" id="phonenumError"></div>
                </div>
                <div class="col-md-12 mb-3">
                  <label class="form-label">Address</label>
                  <textarea name="address" class="form-control shadow-none" rows="1" data-validation="required">RKU Rajkot</textarea>
                  <div class="error" id="addressError"></div>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">check-in</label>
                  <input name="checkin" type="date" class="form-control shadow-none" placeholder="Enter your Name" data-validation="required" >
                  <div class="error" id="checkinError"></div>
                </div>
                <div class="col-md-6 mb-4">
                  <label class="form-label">check-out</label>
                  <input name="checkout" type="date" class="form-control shadow-none" placeholder="Enter your Name" data-validation="required">
                  <div class="error" id="checkoutError"></div>
                </div>
                <div class="col-12">

                  <!-- This is bootstrap spinner(loading) -->
                  <div class="spinner-border text-info d-none" id="info_loader" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>

                  <h6 class="mb-3 text-danger" id="pay_info">Provide check-in and check-out date</h6>
                  <button name="pay_now" class="btn w-100 text-white custome-bg shadow-none mb-1">Pay
                    Now</button>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>

        </div>
    </div>

    <?php require('inc/footer.php'); ?>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Room Details</title>

  <?php require('inc/links.php') ?>

  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <?php require('inc/header.php'); ?>

  <div class="container">
    <div class="row">

      <!-- Showing room name -->
      <div class="col-12 my-5 px-4">
        <h2 class="fw-bold">Simple Room</h2>
      </div>


      <!-- For showing room images -->

      <div class="col-lg-7 col-md-12 px-4">

        <div id="roomCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">


            <div class='carousel-item  active'>
              <img src="Images/rooms/IMG_11892.png" class='d-block w-100 rounded'>
            </div>


          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

      </div>

      <!-- Room details -->

      <div class="col-lg-5 col-md-12 px-4">
        <div class="card mb-4 border-0 shadow-sm rounded-3">
          <div class="card-body">

            <h4>₹2000 per night</h6>


              <div class="mb-3">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
              </div>



              <div class="mb-4">
                <h6 class="mb-1">Features</h6>
                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                  Feature 1
                </span>
              </div>

              <div class="mb-4">
                <h6 class="mb-1">Facilities</h6>
                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                  Facility 1
                </span>
              </div>

              <div class="mb-3">
                <h6 class="mb-1">Guests</h6>
                <span class="badge bg-light text-dark text-wrap">
                  5 Adults
                </span>
                <span class="badge bg-light text-dark text-wrap">
                  2 Childrens
                </span>
              </div>

              <div class="mb-4">
                <h6 class="mb-1">Area</h6>
                <span class='badge bg-light text-dark text-wrap me-1 mb-1'>
                  200 sq. ft.
                </span>
              </div>

              <button class="btn text-white w-100 custome-bg shadow-none mb-2"
                onclick="window.location.href='confirm_booking.php'">Book Now</button>

          </div>
        </div>

      </div>

      <!-- Section for rooms -->
      <div class="col-12 px-4 mt-4">
        <div class="mb-4">
          <h5>Description</h5>
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio nesciunt error sint architecto, itaque
            explicabo ipsum numquam deleniti perspiciatis sit.
          </p>
        </div>


      </div>


    </div>
  </div>

  <?php require('inc/footer.php'); ?>

</body>

</html>
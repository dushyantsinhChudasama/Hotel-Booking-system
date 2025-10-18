<?php

  ob_start();
  $title_page = "DC Hotels - Home"

?>

      <!-- Carousel Portion starts here -->
    <div class="container-fluid px-lg-4 mt-4">
        <!-- Swiper Container -->
        <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
            <img src="Images\carousel\1.png" class="w-100 d-block">
            </div>
            <div class="swiper-slide">
            <img src="Images\carousel\2.png" class="w-100 d-block">
            </div>
            <div class="swiper-slide">
            <img src="Images\carousel\3.png" class="w-100 d-block">
            </div>
            <div class="swiper-slide">
            <img src="Images\carousel\4.png" class="w-100 d-block">
            </div>
            <div class="swiper-slide">
            <img src="Images\carousel\5.png" class="w-100 d-block">
            </div>
            <div class="swiper-slide">
            <img src="Images\carousel\6.png" class="w-100 d-block">
            </div>
        </div>
        <!-- Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Navigation buttons -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

        </div>
    </div>

      <!-- Check avalibility form -->

  <div class="container avalibility-form">
    <div class="row">
      <div class="col-lg-12 bg-white shadow rounded p-4">
        <h5 class="mb-4">Check Booking Avalibility</h5>
        <form action="rooms.php">
          <div class="row align-items-end">
            <div class="col-lg-3 mb-3">
              <label class="form-label" style="font-weight: 500;">Check-in</label>
              <input type="date" class="form-control shadow-none" name="checkin" data-validation="required">
              <div class="error" id="checkinError"></div>
            </div>
            <div class="col-lg-3 mb-3">
              <label class="form-label" style="font-weight: 500;">Check-out</label>
              <input type="date" class="form-control shadow-none" name="checkout" data-validation="required">
              <div class="error" id="checkoutError"></div>
            </div>
            <div class="col-lg-3 mb-3">
              <label class="form-label" style="font-weight: 500;">Adult</label>
              <select class="form-select shadow-none" name="adult">
                
                 <option value='1'>1</option>
                 <option value='1'>2</option>
                 <option value='1'>3</option>
            
              </select>
            </div>
            <div class="col-lg-2 mb-3">
              <label class="form-label" style="font-weight: 500;">Children</label>
              <select class="form-select shadow-none" name="adult">
                
                <option value='1'>1</option>
                <option value='1'>2</option>
                <option value='1'>3</option>
              
             </select>
            </div>
            <input type="hidden" name="check_availibility">
            <div class="col-lg-1 mb-lg-3 mt-2">
              <button type="submit" class="btn custome-bg text-white shadow-none">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


    <!-- Rooms Section -->

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>
   
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 my-3">

                <div class="card border shadow" style="max-width: 350px; margin: auto;">
                    <img src="Images/rooms/1.jpg" alt="" class="card-img-top">

                    <div class="card-body">
                    <h5>Room Name</h5>
                    <h6>₹12345 per night</h6>

                    <div class="features mb-3">
                        <h6 class="mb-1">Features</h6>
                        <span class="badge bg-light text-dark text-wrap me-1 mb-1">F1</span>
                        <span class="badge bg-light text-dark text-wrap me-1 mb-1">F2</span>
                        <span class="badge bg-light text-dark text-wrap me-1 mb-1">F3</span>
                    </div>

                    <div class="facilities mb-3">
                        <h6 class="mb-1">Facilities</h6>
                        <span class="badge bg-light text-dark text-wrap me-1 mb-1">FA1</span>
                        <span class="badge bg-light text-dark text-wrap me-1 mb-1">FA2</span>
                        <span class="badge bg-light text-dark text-wrap me-1 mb-1">FA3</span>
                    </div>

                    <div class="guests mb-3">
                        <h6>Guests</h6>
                        <span class="badge bg-light text-dark text-wrap">5</span>
                        <span class="badge bg-light text-dark text-wrap">3</span>
                    </div>

                    <div class="d-flex justify-content-evenly">
                        <button onclick="checkLoginToBook(<?php echo $login; ?>, <?php echo $room_data['id']; ?>)" 
                        class="btn btn-sm custome-bg shadow-none">Book Now</button>
                        <a href="room_details.php?id=<?php echo $room_data['id']; ?>" 
                        class="btn btn-sm btn-outline-dark shadow-none">More details</a>
                    </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 col-md-6 my-3">

                <div class="card border shadow" style="max-width: 350px; margin: auto;">
                <img src="Images/rooms/IMG_88315.png" alt="" class="card-img-top">

                <div class="card-body">
                <h5>Room Name</h5>
                <h6>₹12345 per night</h6>

                <div class="features mb-3">
                    <h6 class="mb-1">Features</h6>
                    <span class="badge bg-light text-dark text-wrap me-1 mb-1">F1</span>
                    <span class="badge bg-light text-dark text-wrap me-1 mb-1">F2</span>
                    <span class="badge bg-light text-dark text-wrap me-1 mb-1">F3</span>
                </div>

                <div class="facilities mb-3">
                    <h6 class="mb-1">Facilities</h6>
                    <span class="badge bg-light text-dark text-wrap me-1 mb-1">FA1</span>
                    <span class="badge bg-light text-dark text-wrap me-1 mb-1">FA2</span>
                    <span class="badge bg-light text-dark text-wrap me-1 mb-1">FA3</span>
                </div>

                <div class="guests mb-3">
                    <h6>Guests</h6>
                    <span class="badge bg-light text-dark text-wrap">5</span>
                    <span class="badge bg-light text-dark text-wrap">3</span>
                </div>

                <div class="d-flex justify-content-evenly">
                    <button onclick="checkLoginToBook(<?php echo $login; ?>, <?php echo $room_data['id']; ?>)" 
                    class="btn btn-sm custome-bg shadow-none">Book Now</button>
                    <a href="room_details.php?id=<?php echo $room_data['id']; ?>" 
                    class="btn btn-sm btn-outline-dark shadow-none">More details</a>
                </div>
            </div>
        </div>

            </div>

            <div class="col-lg-4 col-md-6 my-3">

            <div class="card border shadow" style="max-width: 350px; margin: auto;">
                <img src="Images/rooms/IMG_78809.png" alt="" class="card-img-top">

                <div class="card-body">
                <h5>Room Name</h5>
                <h6>₹12345 per night</h6>

                <div class="features mb-3">
                    <h6 class="mb-1">Features</h6>
                    <span class="badge bg-light text-dark text-wrap me-1 mb-1">F1</span>
                    <span class="badge bg-light text-dark text-wrap me-1 mb-1">F2</span>
                    <span class="badge bg-light text-dark text-wrap me-1 mb-1">F3</span>
                </div>

                <div class="facilities mb-3">
                    <h6 class="mb-1">Facilities</h6>
                    <span class="badge bg-light text-dark text-wrap me-1 mb-1">FA1</span>
                    <span class="badge bg-light text-dark text-wrap me-1 mb-1">FA2</span>
                    <span class="badge bg-light text-dark text-wrap me-1 mb-1">FA3</span>
                </div>

                <div class="guests mb-3">
                    <h6>Guests</h6>
                    <span class="badge bg-light text-dark text-wrap">5</span>
                    <span class="badge bg-light text-dark text-wrap">3</span>
                </div>

                <div class="d-flex justify-content-evenly">
                    <button onclick="checkLoginToBook(<?php echo $login; ?>, <?php echo $room_data['id']; ?>)" 
                    class="btn btn-sm custome-bg shadow-none">Book Now</button>
                    <a href="room_details.php?id=<?php echo $room_data['id']; ?>" 
                    class="btn btn-sm btn-outline-dark shadow-none">More details</a>
                </div>
                </div>
            </div>

            </div>
        </div>
    </div>


    <!-- Our facilities section -->

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR FACILITIES</h2>

    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">

            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
              <img src="Images/facilities/IMG_1637.svg" width="80px">
              <h5 class="mt-3">Geyser</h5>
            </div>

            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
              <img src="Images/facilities/IMG_8589.svg" width="80px">
              <h5 class="mt-3">Wifi</h5>
            </div>

            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
              <img src="Images/facilities/IMG_29571.svg" width="80px">
              <h5 class="mt-3">Spa</h5>
            </div>

            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
              <img src="Images/facilities/IMG_49949.svg" width="80px">
              <h5 class="mt-3">AC</h5>
            </div>

            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
              <img src="Images/facilities/IMG_64523.svg" width="80px">
              <h5 class="mt-3">Heater</h5>
            </div>

            

        </div>
    </div>

    <!-- Reach us section -->


    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">REACH US</h2>

    <div class="container">
        <div class="row">

            <div class="col-lg-8 p-4 bg-white mb-lg-0 mb-4 rounded">

                <iframe class="w-100 rounded" height="320px" src="https://maps.app.goo.gl/QNRH34Edwp9uELnd7" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            
            </div>


            <div class="col-lg-4">
                <div class="bg-white p-4 rounded mb-4">
                <h5>Call us</h5>
                <a href="tel: +919712802041" class="d-inline-block mb-2 text-dark text-decoration-none">
                    <i class="bi bi-telephone-fill"></i>+919712820410
                </a>
                <br>
                <a href="tel: +919712802041" class="d-inline-block mb-2 text-dark text-decoration-none">
                    <i class="bi bi-telephone-fill"></i>+919712820410
                </a>
                </div>

                <div class="bg-white p-4 rounded mb-4">
                <h5>Follow us</h5>
                <a href="https://x.com" target="_blank" class="d-inline-block mb-3">
                    <span class="badge bg-light text-dark fs-6 p-2">
                    <i class="bi bi-twitter-x me-1"></i> X
                    </span>
                </a>
                <br>
                <a href="https://facebook.com" target="_blank" class="d-inline-block mb-3">
                    <span class="badge bg-light text-dark fs-6 p-2">
                    <i class="bi bi-facebook me-1"></i> Facebook
                    </span>
                </a>
                <br>
                <a href="https://instagram.com" target="_blank" class="d-inline-block mb-3">
                    <span class="badge bg-light text-dark fs-6 p-2">
                    <i class="bi bi-instagram me-1"></i> Instagram
                    </span>
                </a>
                </div>
            </div>

        </div>
    </div>



    <!-- following liks also include script for swiper js -->
<!-- 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script> -->
  <!-- Include Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

 

  <!-- Initialize Swiper -->
  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      spaceBetween: 30,
      effect: 'fade', // Enables fade effect
      loop: true, // Enables infinite loop
      autoplay: {
        delay: 3500, // 3.5 seconds delay
        disableOnInteraction: false, // Keeps autoplay running even after user interaction
      },
      fadeEffect: {
        crossFade: true, // Smooth fade transition
      },
      pagination: {
        el: '.swiper-pagination', // Adds pagination (if required)
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

    var swiper = new Swiper(".swiper-testimonials", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      loop:true,
      slidesPerView: "3",
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
    });
  </script>

<?php

$content = ob_get_clean();
include_once("layout.php")

?>
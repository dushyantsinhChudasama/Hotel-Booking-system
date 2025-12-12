<?php 
include_once('db_Connect.php');
ob_start();
$title_page = "Dc Hotels - Confirm Booking";

session_start();
if(!(isset($_SESSION['login'])  && $_SESSION['login'] == true))
{
  header('Location: login.php');
}


   //getting user details
  $user_id = $_SESSION['uid'];

  $user_data = "SELECT * FROM user_details WHERE id = $user_id";
  $row = mysqli_query($con, $user_data);
  $user =  mysqli_fetch_assoc($row);

//getting room details from the id
$room_id;
if(isset($_GET['room_id']))
{
    $room_id = $_GET['room_id'];
}
else
{
    header('Location: rooms.php');
}

$q_get_rooms = "SELECT * FROM `rooms` WHERE `id` = $room_id";
$res_getRooms = mysqli_query($con, $q_get_rooms);
if(mysqli_num_rows($res_getRooms) == 0)
{
    header('Location: rooms.php');
}
else
{
    $room_thumb_query = "SELECT * FROM `room_image` WHERE `room_id` = $room_id AND `thumb` = 1";
    $res_room_thumb = mysqli_query($con, $room_thumb_query);
    $room = mysqli_fetch_assoc($res_getRooms);
    $roomThumb = mysqli_fetch_assoc($res_room_thumb);
    $roomThumbImage = "Images/rooms/$roomThumb[image]";
}

?>

    <div class="container">
        <div class="row">

            <!-- Showing room name -->
            <div class="col-12 mt-3 mb-2 px-4">
                <h2 class="fw-bold">CONFIRM BOOKING</h2>
            </div>

            <!-- For showing room images -->

            <div class="col-lg-7 col-md-12 px-4">


                <div class="card p-3 shadow-sm rounded">
                    <img src="<?php echo $roomThumbImage?>" class="img-fluid rounded mb-3" />
                    <h5><?php echo $room['name']?></h5>
                    <h6><?php echo $room['price']?> per night</h6>
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
                  <input name="name" type="text" value="<?php echo $user['full_name']?>" class="form-control shadow-none" placeholder="Enter your Name" data-validation="required">
                  <div class="error text-danger" id="nameError"></div>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">Phone</label>
                  <input name="phonenum" type="text" value="<?php echo $user['mobile']?>" class="form-control shadow-none" placeholder="Enter your Name" data-validation="required">
                  <div class="error text-danger" id="phonenumError"></div>
                </div>
                <div class="col-md-12 mb-3">
                  <label class="form-label">Address</label>
                  <textarea name="address" class="form-control shadow-none" rows="3" data-validation="required"><?php echo $user['address']?></textarea>
                  <div class="error text-danger" id="addressError"></div>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">check-in</label>
                  <input name="checkin" type="date" class="form-control shadow-none" placeholder="Enter your Name" data-validation="required" >
                  <div class="error text-danger" id="checkinError"></div>
                </div>
                <div class="col-md-6 mb-4">
                  <label class="form-label">check-out</label>
                  <input name="checkout" type="date" class="form-control shadow-none" placeholder="Enter your Name" data-validation="required">
                  <div class="error text-danger" id="checkoutError"></div>
                </div>
                <div class="col-12">

                  <!-- This is bootstrap spinner(loading) -->
                  <div class="spinner-border text-info d-none" id="info_loader" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>

                  <input type="hidden" name="room_id" value="<?php echo $room_id ?>">
                  <h6 class="mb-3 text-danger" id="pay_info"></h6>
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

    <script>
document.addEventListener("DOMContentLoaded", function () {
  const checkinInput = document.querySelector("input[name='checkin']");
  const checkoutInput = document.querySelector("input[name='checkout']");
  const payInfo = document.getElementById("pay_info");
  const payButton = document.querySelector("button[name='pay_now']");

  const perNightRate = <?php echo $room['price']?>; // per night rate

  function calculateBookingDetails() {
    const checkinDate = new Date(checkinInput.value);
    const checkoutDate = new Date(checkoutInput.value);

    // reset button
    payButton.disabled = true;

    // Reset text color classes every time
    payInfo.classList.remove("text-success", "text-danger", "text-dark");

    if (!checkinInput.value || !checkoutInput.value) {
      payInfo.textContent = "Provide check-in and check-out date";
      payInfo.classList.add("text-danger");
      return;
    }

    const timeDiff = checkoutDate - checkinDate;
    const totalDays = timeDiff / (1000 * 60 * 60 * 24);

    if (isNaN(totalDays)) {
      payInfo.textContent = "Please enter valid dates";
      payInfo.classList.add("text-danger");
      return;
    }

    if (totalDays <= 0) {
      payInfo.textContent = "Checkout date is earlier than check-in date!";
      payInfo.classList.add("text-danger");
    } else {
      const totalAmount = totalDays * perNightRate;
      payInfo.innerHTML = `
        Total Days: <b>${totalDays}</b><br>
        Total Amount: <b>₹${totalAmount}</b>
      `;
      payInfo.classList.add("text-dark");
      payButton.disabled = false; // enable pay button only when valid
    }
  }

  checkinInput.addEventListener("change", calculateBookingDetails);
  checkoutInput.addEventListener("change", calculateBookingDetails);
});
</script>

<?php

$content = ob_get_clean();
include_once('layout.php');

?>
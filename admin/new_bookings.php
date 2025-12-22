<?php
include('../db_Connect.php');
ob_start();
$title_page = "New Bookings";

//getting room details

$get_bookings = "SELECT * FROM `booking_order` WHERE `booking_status`='booked' ORDER BY `booking_id` DESC";
$result_bookings = mysqli_query($con, $get_bookings);


//storing room number in database
if(isset($_POST['assignRoom']))
{
    $room_no = $_POST['room_no'];
    $booking_id = $_POST['booking_id'];

    if(empty($room_no)){
        echo "<script>
            document.getElementById('room_noError').innerText = 'Room number is required';
        </script>";
    } else {

        
        $update_booking = "
            UPDATE `booking_order`
            SET `room_no`='$room_no', `booking_status`='complete'
            WHERE `booking_id`='$booking_id'
        ";

        $result_update = mysqli_query($con, $update_booking);

        if($result_update){
            echo "<script>
                alert('Room assigned successfully!');
                window.location.href = 'new_bookings.php';
            </script>";
        } else {
            echo "<script>
                alert('Failed to assign room.');
            </script>";
        }
    }

    var_dump($_POST);

}

?>

<div class="d-flex align-items-center justify-content-between mb-4">
    <h3>New Bookings</h3>
</div>

<div class="card border-0 shadow mb-4">
    <div class="card-body">

    <div class="text-end mb-4">
        <input type="text" 
            id="searchBooking" 
            class="form-control w-25 d-inline-block shadow-none border border-secondary"
            placeholder="Search by OrderId">
    </div>

        <div class="table-responsive">
            <table class="table table-hover border">
                <thead>
                    <tr class="bg-dark text-light">
                        <th scope="col">#</th>
                        <th scope="col">User Details</th>
                        <th scope="col">Room Details</th>
                        <th scope="col">Booking Details</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="tabel-data">
                <?php

                $i = 1;

                $newBookings = "";
                
                while($data = mysqli_fetch_assoc($result_bookings))
                {
                    $chekin = date('d-m-Y', strtotime($data['check_in']));
                    $checkout = date('d-m-Y', strtotime($data['check_out']));
                    $bookdate = date('d-m-Y', strtotime($data['datentime']));
                    $newBookings .= "
                    
                    <tr>
                <td>$i</td>
                <td>
                    <span class='badge bg-primary'>
                        Order ID: $data[order_id]
                    </span>
                    <br>
                    <b>Name:</b> $data[user_name]
                    <br>
                    <b>Phone:</b> $data[phonenum]
                </td>
                <td>
                    <b>Room:</b> $data[room_name]
                    <br>
                    <b>Price:</b> ₹$data[price]

                </td>

                <td>
                    <b>Check-in:</b> $chekin
                    <br>
                    <b>Check-out:</b> $checkout
                    <br>
                    <b>Paid:</b> ₹$data[total_pay]
                    <br>
                    <b>Date:</b> $bookdate

                <td>
                    <button type='button' class='btn text-white fw-bold custome-bg btn-sm' data-bs-toggle='modal' data-bs-target='#assign-room'>
                    <i class='bi bi-check2-square'></i> Assign Room
                    </button>
                    <br>
                    <button type='button' onclick='cancel_booking()' class='btn btn-outline-danger mt-2 fw-bold  btn-sm'>
                    <i class='bi bi-trash'></i> Cancel Booking
                    </button>
                </td>
            </tr>
                    ";
                    $i++;

                }

                echo $newBookings;
                
                ?>
                
                </tbody>
            </table>
        </div>
    </div>
</div>

    <!-- Modal for Assigninig room -->
    <!-- <div class="modal fade" data-bs-keyboard="false" id="assign-room" tabindex="-1" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog">

            <form id="assign_room_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assign Room</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Room no:</label>
                            <input type="text" name="room_no" class="form-control shadow-none" data-validation="required">
                        </div>
                        <span class="badge bg-light text-dark mb-3 text-wrap lh-base">
                        Note : Only assign room when customer has arrived!
                        </span>
                        <input type="hidden" name="booking_id">
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none"
                            data-bs-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn custome-bg text-white shadow-none">ASSIGN</button>
                    </div>
                </div>
            </form>

        </div>
    </div> -->

    <div class="modal fade" id="assign-room" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <form method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Assign Room</h5>
                        </div>
                        <div class="modal-body">

                            <div class="container-fluid">
                                <div class="row">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Room no:</label>
                                            <input type="text" name="room_no" id="room_inp"
                                                class="form-control shadow-none" data-validation="required">
                                                <span id="room_noError" class="text-danger small"></span>

                                                <!-- Hidden form feild for booking id -->
                                                <input type="hidden" name="booking_id" id="booking_id">
                                        </div>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button"
                                class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                <!-- <button 
                                    type="button"
                                    class="btn text-white fw-bold custome-bg btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#assign-room"
                                    onclick="setBookingId('<?php echo $data['booking_id']; ?>')">
                                    <i class="bi bi-check2-square"></i> Assign Room
                                </button> -->
                                <button type="submit" name="assignRoom" class="btn custome-bg text-white shadow-none">
    SAVE
</button>


                    </div>


                </form>

        </div>
        </div>


    <script>
        function cancel_booking(){
            confirm("Are you sure you wnat to cancel booking?");
        }

        function setBookingId(id){
            document.getElementById('booking_id').value = id;
        }
    </script>
<?php
$content = ob_get_clean();
include_once("index.php");
?>
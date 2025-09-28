<?php
ob_start();
$title_page = "New Bookings";

?>

<div class="d-flex align-items-center justify-content-between mb-4">
    <h3>New Bookings</h3>
</div>

<div class="card border-0 shadow mb-4">
    <div class="card-body">

        <div class="text-end mb-4">
            <!-- <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#add-room">
                                <i class="bi bi-plus-square"></i>
                                Add
                            </button> -->
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
                <tr>
                <td>1</td>
                <td>
                    <span class='badge bg-primary'>
                        Order ID: ORD_12345
                    </span>
                    <br>
                    <b>Name:</b> UserName
                    <br>
                    <b>Phone:</b> 123456789
                </td>
                <td>
                    <b>Room:</b> Simple room
                    <br>
                    <b>Price:</b> ₹2000

                </td>

                <td>
                    <b>Check-in:</b> 01-09-2025
                    <br>
                    <b>Check-out:</b> 01-09-2025
                    <br>
                    <b>Paid:</b> ₹2000
                    <br>
                    <b>Date:</b> 01-09-2025
                </td>

                <td>
                    <button type='button' class='btn text-white fw-bold custome-bg btn-sm' data-bs-toggle='modal' data-bs-target='#assign-room'>
                    <i class='bi bi-check2-square'></i> Assign Room
                    </button>
                    <br>
                    <button type='button' onclick="cancel_booking()" class='btn btn-outline-danger mt-2 fw-bold  btn-sm'>
                    <i class='bi bi-trash'></i> Cancel Booking
                    </button>
                </td>
            </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

    <!-- Modal for Assigninig room -->
    <div class="modal fade" id="assign-room" tabindex="-1" aria-labelledby="exampleModalLabel">
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
                        <button type="submit" class="btn custome-bg text-white shadow-none"
                            data-bs-dismiss="modal">ASSIGN</button>
                    </div>
                </div>
            </form>

        </div>
    </div>


    <script>
        function cancel_booking(){
            confirm("Are you sure you wnat to cancel booking?");
        }
    </script>
<?php
$content = ob_get_clean();
include_once("index.php");
?>
<?php
ob_start();
$title_page = "Booking Records";

?>

<div class="d-flex align-items-center justify-content-between mb-4">
    <h3>Booking Records</h3>
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
                        <th scope="col">Status</th>
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
                    <b>Amount:</b> ₹2000
                    <br>
                    <b>Date:</b> 01-09-2025
                </td>

                <td>
                    <span class='badge bg-success'>booked</span>
                </td>


                <td>
                    <button type='button' onclick='' class='btn btn-outline-success mt-2 fw-bold  btn-sm'>
                        <i class='bi bi-file-earmark-arrow-down-fill'></i>
                    </button>
                </td>
            </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
include_once("index.php");
?>
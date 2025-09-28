<?php
ob_start();
$title_page = "Dashoard";
?>
            <!-- <div class="col-lg-10 ms-auto p-4 overflow-hidden"> -->

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h3>DASHBOARD</h3>
                </div>

                <div class="row mb-4">

                    <div class="col-md-4 mb-4">
                        <a href="new_bookings.php" class="text-decoration-none">
                            <div class="card text-center text-success p-3">
                                <h6>New Bookings</h6>
                                <h1 class="mt-2 mb-0">5</h1>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4">
                        <a href="refund_bookings.php" class="text-decoration-none">
                            <div class="card text-center text-warning p-3">
                                <h6>Refund Bookings</h6>
                                <h1 class="mt-2 mb-0">3</h1>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4">
                        <a href="user_quereis.php" class="text-decoration-none">
                            <div class="card text-center text-info p-3">
                                <h6>User Queries</h6>
                                <h1 class="mt-2 mb-0">1</h1>
                            </div>
                        </a>
                    </div>

                </div>

                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5>Users and Queries</h5>
                </div>

                <div class="row mb-4">

                    <div class="col-md-4 mb-4">
                        <a href="users.php" class="text-decoration-none">
                            <div class="card text-center text-success p-3">
                                <h6>Total Users</h6>
                                <h1 class="mt-2 mb-0">2</h1>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4">
                        <a href="users.php" class="text-decoration-none">
                            <div class="card text-center text-warning p-3">
                                <h6>Banned Users</h6>
                                <h1 class="mt-2 mb-0">5</h1>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4">
                        <a href="user_quereis.php" class="text-decoration-none">
                            <div class="card text-center text-info p-3">
                                <h6>Actice Users</h6>
                                <h1 class="mt-2 mb-0">89</h1>
                            </div>
                        </a>
                    </div>

                </div>

                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5>Rooms</h5>
                </div>

                <div class="row mb-4">

                    <div class="col-md-4 mb-4">
                        <a href="rooms.php" class="text-decoration-none">
                            <div class="card text-center text-success p-3">
                                <h6>Total Rooms</h6>
                                <h1 class="mt-2 mb-0">145</h1>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4">
                        <a href="rooms.php" class="text-decoration-none">
                            <div class="card text-center text-warning p-3">
                                <h6>Actice Rooms</h6>
                                <h1 class="mt-2 mb-0">135</h1>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4">
                        <a href="rooms.php" class="text-decoration-none">
                            <div class="card text-center text-info p-3">
                                <h6>Inactive Rooms</h6>
                                <h1 class="mt-2 mb-0">10</h1>
                            </div>
                        </a>
                    </div>

                </div>


            </div>
        </div>
    </div>

<?php
$content = ob_get_clean();
include_once("index.php");

?>
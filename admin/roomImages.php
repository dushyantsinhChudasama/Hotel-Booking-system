<?php

ob_start();
$title_page = "Room Images Management";
include('../db_Connect.php');
?>


<div class="d-flex align-items-center mb-4">
    <a href="rooms.php" class="text-dark me-3" style="font-size: 1.8rem;">
        <i class="bi bi-arrow-left-circle"></i>
    </a>
    <h3 class="m-0">Manage Room Images</h3>
</div>

<div class="card border-0 shadow mb-4" style="height: 450px; max-height: 450px;">
    
    <!-- Scrollable Images Section (350px) -->
    <div class="card-body" style="height: 350px; overflow-y: auto;">
        <h5 class="mb-3">Current Room Images</h5>

        <div class="row g-3">
            <!-- Example Image Card 1 -->
            <div class="col-md-4">
                <div class="border rounded p-2 text-center">
                    <img src="../Images/rooms/1.jpg" class="img-fluid rounded mb-2"
                        style="height: 150px; width: 100%; object-fit: cover;" alt="Room Image 1">

                    <form action="" method="post" class="mt-2">
                        <input type="hidden" name="image_id" value="1">
                        <div class="row g-0">
                            <div class="col-6 border-end d-flex justify-content-center align-items-center">
                                <button type="submit" name="set_thumb"
                                    class="btn btn-sm btn-success shadow-none rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 40px; height: 40px;">
                                    <i class="bi bi-check-lg"></i>
                                </button>
                            </div>
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <button type="submit" name="delete_image"
                                    class="btn btn-sm btn-danger shadow-none rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 40px; height: 40px;">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Duplicate cards below as needed -->
            <div class="col-md-4">
                <div class="border rounded p-2 text-center">
                    <img src="../Images/rooms/1.jpg" class="img-fluid rounded mb-2"
                        style="height: 150px; width: 100%; object-fit: cover;" alt="Room Image 2">

                    <form action="" method="post" class="mt-2">
                        <input type="hidden" name="image_id" value="2">
                        <div class="row g-0">
                            <div class="col-6 border-end d-flex justify-content-center align-items-center">
                                <button type="submit" name="set_thumb"
                                    class="btn btn-sm btn-secondary shadow-none rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 40px; height: 40px;">
                                    <i class="bi bi-check-lg"></i>
                                </button>
                            </div>
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <button type="submit" name="delete_image"
                                    class="btn btn-sm btn-danger shadow-none rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 40px; height: 40px;">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-4">
                <div class="border rounded p-2 text-center">
                    <img src="../Images/rooms/1.jpg" class="img-fluid rounded mb-2"
                        style="height: 150px; width: 100%; object-fit: cover;" alt="Room Image 2">

                    <form action="" method="post" class="mt-2">
                        <input type="hidden" name="image_id" value="2">
                        <div class="row g-0">
                            <div class="col-6 border-end d-flex justify-content-center align-items-center">
                                <button type="submit" name="set_thumb"
                                    class="btn btn-sm btn-secondary shadow-none rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 40px; height: 40px;">
                                    <i class="bi bi-check-lg"></i>
                                </button>
                            </div>
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <button type="submit" name="delete_image"
                                    class="btn btn-sm btn-danger shadow-none rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 40px; height: 40px;">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-4">
                <div class="border rounded p-2 text-center">
                    <img src="../Images/rooms/1.jpg" class="img-fluid rounded mb-2"
                        style="height: 150px; width: 100%; object-fit: cover;" alt="Room Image 2">

                    <form action="" method="post" class="mt-2">
                        <input type="hidden" name="image_id" value="2">
                        <div class="row g-0">
                            <div class="col-6 border-end d-flex justify-content-center align-items-center">
                                <button type="submit" name="set_thumb"
                                    class="btn btn-sm btn-secondary shadow-none rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 40px; height: 40px;">
                                    <i class="bi bi-check-lg"></i>
                                </button>
                            </div>
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <button type="submit" name="delete_image"
                                    class="btn btn-sm btn-danger shadow-none rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 40px; height: 40px;">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Add more images as needed -->
        </div>
    </div>

    <!-- Fixed Footer Section (100px) -->
    <div class="card-footer bg-white border-0" style="height: 100px;">
        <form action="" method="post" enctype="multipart/form-data"
            class="d-flex align-items-center justify-content-between h-100 px-3">
            <div class="d-flex align-items-center">
                <label class="form-label fw-semibold mb-0 me-2">Upload New Image:</label>
                <input type="file" name="room_image" class="form-control" style="width: 250px;">
            </div>

            <button type="submit" name="addRoom" class="btn btn-md custome-bg text-white shadow-none"
                style="width: 190px;">
                SAVE
            </button>
        </form>
    </div>
</div>


        <?php

        $content = ob_get_clean();
        require_once 'index.php';

        ?>
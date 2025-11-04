<?php
ob_start();
$title_page = "Rooms";
include('../db_Connect.php');

//deleting the room
if(isset($_POST['delete_room']))
{
    $id = $_POST['room_id'];
    $q_delete_room = "UPDATE `rooms` SET `removed` = 1 WHERE `id`='$id'";
    mysqli_query($con, $q_delete_room);
    header("Location: rooms.php");
}

//changing the status of room
if(isset($_POST['changeStatus']))
{
    $id = $_POST['room_id'];

    //get current status
    $q_get_status = "SELECT `status` FROM `rooms` WHERE `id`='$id'";
    $res_get_status = mysqli_query($con, $q_get_status);
    $row = mysqli_fetch_assoc($res_get_status);
    $current_status = $row['status'];

    //toggle status
    if($current_status == 1){
        $new_status = 0;
    } else {
        $new_status = 1;
    }

    //update status in database
    $q_update_status = "UPDATE `rooms` SET `status`='$new_status' WHERE `id`='$id'";
    mysqli_query($con, $q_update_status);
    header("Location: rooms.php");
}


?>

<div class="d-flex align-items-center justify-content-between mb-4">
    <h3>Rooms</h3>
</div>

<div class="card border-0 shadow mb-4">
    <div class="card-body">

        <div class="text-end mb-4">
            <a class="btn btn-dark btn-sm" style="background-color: #000; border-color: #000;" href="addNewRoom.php">
                <i class="bi bi-plus-square"></i>
                Add
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover border">
                <thead>
                    <tr class="bg-dark text-light">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Area</th>
                        <th scope="col">Guests</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="tabel-data">
                    
                        <?php
                        $i = 1;
                        $q_get_rooms = "SELECT * FROM `rooms` WHERE `removed` = 0";
                        $res_get_rooms = mysqli_query($con, $q_get_rooms);
                        $statusButton;
                        $opt = "";
                        while($row = mysqli_fetch_assoc($res_get_rooms)){

                            if($row['status'] == 1){
                                $statusButton = "<button name='changeStatus' class='btn btn-sm btn-dark shadow-none'>active</button>";
                            } else {
                                $statusButton = "<button name='changeStatus' class='btn btn-sm btn-warning shadow-none'>inactive</button>";
                            }

                            $opt .=     "
                                <tr class='align-middle'>
                                <td>$i</td>
                                <td>$row[name]</td>
                                <td>$row[area] sq.ft.</td>
                                <td>
                                    <span class='badge rounded-pill bg-light text-dark'>
                                        Adult: $row[adult]
                                    </span><br>
                                    <span class='badge rounded-pill bg-light text-dark'>
                                        Children: $row[children]
                                    </span>
                                </td>
                                <td>₹$row[price]</td>
                                <td>$row[quantity]</td>
                                <td>
                                    <form method='POST' style='display:inline;'>
                                        <input type='hidden' name='room_id' value='{$row['id']}'>
                                            $statusButton
                                    </form>
                                </td>

                                <td>
                                    <form method='POST' style='display:inline;'>
                                        <input type='hidden' name='room_id' value='{$row['id']}'>
                                        <a href='edit_room.php?room_id={$row['id']}' class='btn btn-primary shadow-none btn-sm'>
                                            <i class='bi bi-pencil-square'></i>
                                        </a>

                                        <a href='roomImages.php?room_id={$row['id']}' class='btn btn-info shadow-none btn-sm'>
                                        <i class='bi bi-images'></i>
                                        </a>

                                        <button type='submit' name='delete_room' class='btn btn-danger shadow-none btn-sm'>
                                                <i class='bi bi-trash'></i>
                                            </button>

                                    </form>
                                </td>
                                </tr>

                                ";
                                $i++;
                        }
                        echo $opt;
                        
                        ?>
                        



                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal for adding room -->

<div class="modal fade" id="add-room" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

    <form id="add_room_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Room</h5>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" name="name" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Area</label>
                                <input type="number" min="1" name="area" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <input type="number" min="1" name="price" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Quantity</label>
                                <input type="number" min="1" name="quantity" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Adult(Max.)</label>
                                <input type="number" min="1" name="adult" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Child (Max.)</label>
                                <input type="number" min="1" name="children" class="form-control shadow-none" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Featrues</label>
                                <div class="row">
                                    <div class='col-md-3'>
                                        <label>
                                            <input type='checkbox' name='features' value='$opt[id]' class='form-check-input shadow-none'>
                                            Feature 1
                                        </label>
                                    </div>

                                    <div class='col-md-3'>
                                        <label>
                                            <input type='checkbox' name='features' value='$opt[id]' class='form-check-input shadow-none'>
                                            Feature 2
                                        </label>
                                    </div>

                                    <div class='col-md-3'>
                                        <label>
                                            <input type='checkbox' name='features' value='$opt[id]' class='form-check-input shadow-none'>
                                            Feature 3
                                        </label>
                                    </div>

                                    <div class='col-md-3'>
                                        <label>
                                            <input type='checkbox' name='features' value='$opt[id]' class='form-check-input shadow-none'>
                                            Feature 4
                                        </label>
                                    </div>

                                    <div class='col-md-3'>
                                        <label>
                                            <input type='checkbox' name='features' value='$opt[id]' class='form-check-input shadow-none'>
                                            Feature 5
                                        </label>
                                    </div>

                                    <div class='col-md-3'>
                                        <label>
                                            <input type='checkbox' name='features' value='$opt[id]' class='form-check-input shadow-none'>
                                            Feature 6
                                        </label>
                                    </div>

                                    </div>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Facilities</label>
                                <div class="row">
                                    
                                    <div class='col-md-3'>
                                        <label>
                                            <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                            Facility 1
                                        </label>
                                    </div>

                                    <div class='col-md-3'>
                                        <label>
                                            <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                            Facility 2
                                        </label>
                                    </div>

                                    <div class='col-md-3'>
                                        <label>
                                            <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                            Facility 3
                                        </label>
                                    </div>

                                    <div class='col-md-3'>
                                        <label>
                                            <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                            Facility 4
                                        </label>
                                    </div>

                                    <div class='col-md-3'>
                                        <label>
                                            <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                            Facility 5
                                        </label>
                                    </div>

                                    <div class='col-md-3'>
                                        <label>
                                            <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                            Facility 6
                                        </label>
                                    </div>
                                           
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label fw-bold">Description</label>
                                <textarea name="desc" rows="4" class="form-control shadow-none" required></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none"
                            data-bs-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn custome-bg text-white shadow-none"
                            data-bs-dismiss="modal">SAVE</button>
                    </div>
                </div>
            </form>

    
    </div>
</div>

    <!-- Modal form manage room images -->

    <div class="modal fade" id="room-images" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Room Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="border-bottom border-3 pb-3 mb-3">
                        <form id="add_image_form">
                            <label class="form-label fw-bold">Add Image</label>
                            <input type="file" accept=".jpg, .jpeg, .png" name="image" class="form-control shadow-none mb-3" required>
                            <button class="btn custome-bg text-white shadow-none" data-bs-dismiss="modal">ADD</button>
                            <input type="hidden" name="room_id">
                        </form>
                    </div>

                    <div class="table-responsive-lg" style="height: 300px; overflow: scroll;">
                            <table class="table table-hover border text-center">
                                <thead>
                                    <tr class="bg-dark text-light sticky-top">
                                        <th scope="col" width="60%">Image</th>
                                        <th scope="col">Thumb</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="room-image-data">
                                    <tr class='align-middle'>
                                        <td><img src="../images/rooms/3.jpg" class='img-fluid'></td>
                                        <td>
                                            <button onclick='thumb_image($row[sr_no], $row[room_id])' class='btn btn-sm btn-secondary shadow-none'>
                                                <i class='bi bi-check-lg'></i>
                                            </button></td>
                                        <td>
                                            <button onclick='rem_image($row[sr_no], $row[room_id])' class='btn btn-sm btn-danger shadow-none'>
                                                <i class='bi bi-trash'></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
                
            </div>
        </div>
    </div>


<?php
$content = ob_get_clean();
include_once("index.php");
?>
<?php
ob_start();
$title_page = "Rooms";

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
                    <tr class='align-middle'>
                        <td>1</td>
                        <td>Simple Room</td>
                        <td>200 sq.ft.</td>
                        <td>
                            <span class='badge rounded-pill bg-light text-dark'>
                                Adult: 4
                            </span><br>
                            <span class='badge rounded-pill bg-light text-dark'>
                                Children: 2
                            </span>
                        </td>
                        <td>₹2999</td>
                        <td>10</td>
                        <td><button class='btn btn-sm btn-dark shadow-none'>active</button></td>
                        <td>
                            <a class='btn btn-primary shadow-none btn-sm'>
                                <i class='bi bi-pencil-square'></i>
                            </a>
                         
                            <a class='btn btn-info shadow-none btn-sm'>
                                <i class='bi bi-images'></i>
                            </a>
                        
                            <a class='btn btn-danger shadow-none btn-sm'>
                                <i class='bi bi-trash'></i>
                            </a>
                        </td>
                    </tr>

                    <tr class='align-middle'>
                        <td>1</td>
                        <td>Simple Room</td>
                        <td>200 sq.ft.</td>
                        <td>
                            <span class='badge rounded-pill bg-light text-dark'>
                                Adult: 4
                            </span><br>
                            <span class='badge rounded-pill bg-light text-dark'>
                                Children: 2
                            </span>
                        </td>
                        <td>₹2999</td>
                        <td>10</td>
                        <td><button class='btn btn-sm btn-warning shadow-none'>Inactive</button></td>
                        <td>
                            <button type='button' class='btn btn-primary shadow-none btn-sm'>
                                <i class='bi bi-pencil-square'></i>
                            </button>

                            <button type='button' class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#room-images'>
                                <i class='bi bi-images'></i>
                            </button>

                            <button type='button' class='btn btn-danger shadow-none btn-sm'>
                                <i class='bi bi-trash'></i>
                            </button>
                        </td>
                    </tr>
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
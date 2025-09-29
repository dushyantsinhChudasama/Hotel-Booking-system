<?php
ob_start();
$title_page = "Features Faciliteis";

?>
<div class="d-flex align-items-center justify-content-between mb-4">
    <h3>Features & Facilities</h3>
</div>

<!-- Fetures seciton -->
<div class="card border-0 shadow mb-4">
    <div class="card-body">

        <div class="text-end">
            <!-- <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#add-room">
                                <i class="bi bi-plus-square"></i>
                                Add
                            </button> -->
        </div>



        <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="card-title m-0">
                Features
            </h5>
            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                data-bs-target="#features-s">
                <i class="bi bi-plus-square"></i>
                Add
            </button>
        </div>

        <div class="table-responsive-md" style="height: 300px; overflow: scroll;">
            <table class="table table-hover border">
                <thead>
                    <tr class="bg-dark text-light">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="tabel-data">
                    <tr>
                        <td>1</td>
                        <td>
                            Feature Name
                        </td>


                        <td>
                            <button type="button" onclick="rem_facility($row[id])"
                                class="btn btn-danger btn-sm shadow-none">
                                Delete
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>
                            Feature Name
                        </td>


                        <td>
                            <button type="button" onclick="rem_facility($row[id])"
                                class="btn btn-danger btn-sm shadow-none">
                                Delete
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>
                            Feature Name
                        </td>


                        <td>
                            <button type="button" onclick="rem_facility($row[id])"
                                class="btn btn-danger btn-sm shadow-none">
                                Delete
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>
                            Feature Name
                        </td>


                        <td>
                            <button type="button" onclick="rem_facility($row[id])"
                                class="btn btn-danger btn-sm shadow-none">
                                Delete
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>
                            Feature Name
                        </td>


                        <td>
                            <button type="button" onclick="rem_facility($row[id])"
                                class="btn btn-danger btn-sm shadow-none">
                                Delete
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>
                            Feature Name
                        </td>


                        <td>
                            <button type="button" onclick="rem_facility($row[id])"
                                class="btn btn-danger btn-sm shadow-none">
                                Delete
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>
                            Feature Name
                        </td>


                        <td>
                            <button type="button" onclick="rem_facility($row[id])"
                                class="btn btn-danger btn-sm shadow-none">
                                Delete
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>
                            Feature Name
                        </td>


                        <td>
                            <button type="button" onclick="rem_facility($row[id])"
                                class="btn btn-danger btn-sm shadow-none">
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>


</div>

<!-- Facilities seciton -->
<div class="card border-0 shadow mb-4">
    <div class="card-body">

        <div class="text-end">
            <!-- <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#add-room">
                                <i class="bi bi-plus-square"></i>
                                Add
                            </button> -->
        </div>



        <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="card-title m-0">
                Facilities
            </h5>
            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                data-bs-target="#facilities-s">
                <i class="bi bi-plus-square"></i>
                Add
            </button>
        </div>

        <div class="table-responsive-md" style="height: 300px; overflow: scroll;">
            <table class="table table-hover border">
                <thead>
                    <tr class="bg-dark text-light">
                        <th scope="col">#</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="tabel-data">
                    <tr class='align-middle'>
                        <td>1</td>
                        <td><img src="../Images/facilities/IMG_8589.svg" width="60px"></td>
                        <td>Wifi</td>
                        <td>High speed internet through wifi. Unlimited Internet</td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm shadow-none">
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>


</div>


<!-- Modal for features-->
<div class="modal fade" id="features-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        
    <form id="feature_s_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Feature</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" name="feature_name" class="form-control shadow-none" required>
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


<!-- Modal for Facilities-->
<div class="modal fade" id="facilities-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        
    <form id="facility_s_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Facility</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" name="facility_name" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Icon</label>
                            <input type="file" accept=".svg" name="facility_icon" id="member_picture_inp" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="facility_desc" class="form-control shadow-none" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn custome-bg text-white shadow-none" data-bs-dismiss="modal">SAVE</button>
                    </div>
                </div>
            </form>

    </div>
</div>

<?php
$content = ob_get_clean();
include_once("index.php");
?>
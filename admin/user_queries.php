<?php
ob_start();
$title_page = "User Queries";
?>

<div class="d-flex align-items-center justify-content-between mb-4">
    <h3>User Queries</h3>
</div>

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
           
            <div class="text-end mb-2">
                <a href="?seen=all" class="btn btn-dark rounded-pill shadow-none btn-sm mark-read">Mark all read</a>
                <a href="?del=all" class="btn btn-danger rounded-pill shadow-none btn-sm">Delete all</a>
            </div>
        </div>

        <div class="table-responsive-md" style="height: 400px; overflow: scroll;">
            <table class="table table-hover border">
                <thead>
                    <tr class="bg-dark text-light">
                        <th scope="col">#</th>
                        <th scope="col" width="7%">Name</th>
                        <th scope="col"width="10%">Email</th>
                        <th scope="col" width="15%">Subject</th>
                        <th scope="col" width="40%">Message</th>
                        <th scope="col" width="10%">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="tabel-data">
                    <tr>
                        <td>1</td>
                        <td>
                            Test Name
                        </td>

                        <td>
                            Test@emil.com
                        </td>

                        <td>
                            Test Subject
                        </td>

                        <td>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae hic impedit esse error placeat at voluptate consectetur voluptatibus provident! Iusto.
                        </td>

                        <td>
                            28-09-2025
                        </td>

                        <td>
                            <a href='?seen=$row[sr_no]' class='btn btn-sm rounded-pill btn-primary mb-2'>Mark as read</a>
                            <a href='?del=$row[sr_no]' class='btn btn-sm rounded-pill btn-danger'>Delete</a>
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
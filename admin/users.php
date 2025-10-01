<?php
ob_start();
$title_page = "Users";

?>

<div class="d-flex align-items-center justify-content-between mb-4">
    <h3>Users</h3>
</div>

<div class="card border-0 shadow mb-4">
    <div class="card-body">
        
        <div class="table-responsive-md" style="height: 400px; overflow: scroll;min-width: 1150px;">
            <table class="table table-hover border">
                <thead>
                    <tr class="bg-dark text-light">
                        <th scope="col">#</th>
                        <th scope="col" width="10%">Name</th>
                        <th scope="col" width="18%">Email</th>
                        <th scope="col" width="10%">Phone no.</th>
                        <th scope="col" width="25%">Location</th>
                        <th scope="col" width="15%">DOB</th>
                        <th scope="col" >Status</th>
                        <th scope="col" width="8%">Verified</th>
                        <th scope="col" width="32%">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="tabel-data">
                    <tr>
                        <td>1</td>
                        <td>
                            Test Name
                        </td>
                        <td>test@email.com</td>
                        <td>1234567890</td>
                        <td>RKU Rajkot dsf sdf |364004</td>
                        <td>04-05-2005</td>
                        <td><button type="button" onclick="" class="btn btn-dark btn-sm shadow-none">
                                active
                            </button>
                        </td>
                        <td><button class="btn btn-warning btn-sm shadow-none">
                                Not Verified
                            </button>
                        </td>
                        <td>
                            28-09-2025
                        </td>
                        <td>
                            <button type='button' onclick='remove_user($row[id])' class='btn btn-danger shadow-none btn-sm'>
                                <i class='bi bi-trash'></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>
                            Test Name
                        </td>
                        <td>test@email.com</td>
                        <td>1234567890</td>
                        <td>RKU Rajkot dsf sdf |364004</td>
                        <td>04-05-2005</td>
                        <td><button type="button" onclick="" class="btn btn-danger btn-sm shadow-none">
                                inactive
                            </button>
                        </td>
                        <td><button class="btn btn-success btn-sm shadow-none">
                                Verified
                            </button>
                        </td>
                        <td>
                            28-09-2025
                        </td>
                        <td>
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

<?php
$content = ob_get_clean();
include_once("index.php");
?>
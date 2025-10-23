<?php
ob_start();
$title_page = "Users";
require('../db_Connect.php');

//getting user details
$q_user = "SELECT * FROM `user_details`";
$res = mysqli_query($con,$q_user);
$i = 1;
$show = "";
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
                        <th scope="col" width="15%">Name</th>
                        <th scope="col" width="18%">Email</th>
                        <th scope="col" width="10%">Phone no</th>
                        <th scope="col" width="30%">Location</th>
                        <th scope="col" >Status</th>
                        <th scope="col" width="11%">Verification</th>
                        <th scope="col" width="14%">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="tabel-data">
                    <?php  
                    
                        while($data = mysqli_fetch_assoc($res))
                        {
                            //this to ban or unban user
                            $status = "<button type='submit' name='statusBtn' class='btn btn-sm btn-dark shadow-none'>
                            active</button>";

                            if($data['status'] == "inactive")
                            {
                                $status = "<button type='submit' name='statusBtn' class='btn btn-sm btn-danger shadow-none'>inactive</button>";
                                
                            }
                            
                            $verify = "<button name='verifyBtn' class='btn btn-warning btn-sm shadow-none'>
                                        Pending
                                    </button>";

                            if($data['verified'] == 1)
                            {
                                $verify = "<button name='verifyBtn' class='btn btn-success btn-sm shadow-none'>
                                        Done
                                    </button>";
                                
                            }

                             //for date

                            $date = date("d-m-Y",strtotime($data["datentime"]));

                            $del_btn = "<button type='submit' class='btn btn-danger shadow-none btn-sm'>
                                <i class='bi bi-trash'></i>
                            </button>";

                            $show .= "
                                <tr>
                                    <td>$i</td>
                                    <td>$data[full_name]</td>
                                    <td>$data[email]</td>
                                    <td>$data[mobile]</td>
                                    <td>$data[address] | $data[pincode]</td>
                                    <td><form method='POST' style='display:inline;'>
                                        <input type='hidden' name='user_id' value='{$data['id']}'>
                                        <input type='hidden' name='status' value='{$data['status']}'>
                                        <button type='submit' name='changeStatus' class='btn btn-sm " . 
                                            ($data['status'] == 'inactive' ? "btn-danger" : "btn-dark") . 
                                            " shadow-none'>" . 
                                            ($data['status'] == 'inactive' ? "inactive" : "active") . 
                                        "</button>
                                    </form></td>
                                    <td>$verify</td>
                                    <td>$date</td>
                                    <td>  
                                        <form method='POST' style='display:inline;'>
                                            <input type='hidden' name='user_id' value='{$data['id']}'>
                                            <button type='submit' name='deleteuser' class='btn btn-danger shadow-none btn-sm'>
                                                <i class='bi bi-trash'></i>
                                            </button>
                                        </form>
                                    </td>
                                
                                    
                                </tr>
                                ";
                            $i++;
                        }

                        echo $show;
                    
                    ?>

                </tbody>
            </table>
        </div>

    </div>


</div>

<?php

if(isset($_POST['changeStatus']))
{
    $user_id = $_POST['user_id'];
    $status = $_POST['status'];

    if($status == "active")
    {
        $status = "inactive";
    }
    else { $status = "active"; }

    $q = "UPDATE `user_details` SET `status` = '$status' WHERE `id` = $user_id";

    if(mysqli_query($con,$q))
    {
        header('Location: users.php');
    }
    
}

if(isset($_POST['deleteuser']))
{
    $user_id = $_POST['user_id'];
    
    $q = "DELETE FROM `user_details` WHERE `id`=$user_id";
    
    if(mysqli_query($con,$q))
    {
        header('Location: users.php');
    }
}

?>

<?php
$content = ob_get_clean();
include_once("index.php");
?>
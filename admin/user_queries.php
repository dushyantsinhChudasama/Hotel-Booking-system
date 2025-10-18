<?php
ob_start();
$title_page = "User Queries";
require('../db_Connect.php');
require('functions.php');
?>

<div class="d-flex align-items-center justify-content-between mb-4">
    <h3>User Queries</h3>
</div>

<div class="card border-0 shadow mb-4">
    <div class="card-body">


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
                        <th scope="col" width="30%">Message</th>
                        <th scope="col" width="10%">Date</th>
                        <th scope="col" width="10%">Action</th>
                    </tr>
                </thead>
                <tbody id="tabel-data">
                    
                        <!-- Fetching data of user queries from database -->
                        <?php
                            $q = "SELECT * FROM `user_queries`";
                            $data = mysqli_query($con,$q);

                            $i = 1;

                            while($row = mysqli_fetch_assoc($data))
                            {
                                $seen = '';

                                if($row['seen'] == 0)
                                {
                                    $seen = "<a href='?seen=$row[id]' class='btn btn-sm rounded-pill btn-primary'>Mark as read</a>";
                                }
                                $seen .= "<a href='?del=$row[id]' class='btn btn-sm rounded-pill btn-danger mt-2'>Delete</a>";

                                echo<<<query
                                        <tr>
                                            <td>$i</td>
                                            <td>$row[name]</td>
                                            <td>$row[email]</td>
                                            <td>$row[subject]</td>
                                            <td>$row[message]</td>
                                            <td>$row[date]</td>
                                            <td>$seen</td>
                                        </tr>
                                    query;
                                    $i++;
                            }
                        ?>
                 
                </tbody>
            </table>
        </div>

    </div>
</div>


<!-- Performing seen or delete operatio -->
<?php

if(isset($_GET['seen']))
{
   $frm_data = filteration($_GET);

   if($frm_data['seen'] == 'all')
   {
        $updSeenAll = "UPDATE `user_queries` SET `seen`=?";
        $values = [1];

        if(update($updSeenAll,$values,'i'))
        {
            alertShow('success','Mark all as read!');
        }
        else
        {
            alertShow('danger','can not Mark all as read!');
        }
   }
   else
   {
        $updSeen = "UPDATE `user_queries` SET `seen` = ? WHERE `id` = ?";
        $values = [1,$frm_data['seen']];

        if(update($updSeen,$values,'ii'))
        {
            alertShow('success','Mark as read!');
        }
        else
        {
            alertShow('danger','can not Mark as read!');

        }
   }

   
   echo "<script>
    setTimeout(() => { 
        window.location.href = window.location.pathname; 
    }, 1200); // wait 1.2s to let user see alert
</script>";

}


if(isset($_GET['del']))
{
    $frm_data = filteration($_GET);
   //deleting
   if($frm_data['del'] == 'all')
   {
        $updSeenAll = "DELETE FROM `user_queries`";

        if($frm_data['del'] == 'all')
        {
            $q = "DELETE FROM `user_queries`";

            if(mysqli_query($con, $q))
            {
                alertShow('success','All Data Deleted!');
            }
            else
            {
                alertShow('error','Operation Failed!');
            }
        }
   }
   else
   {
        $updSeen = "DELETE FROM `user_queries` WHERE `id` = ?";
        $values = [$frm_data['del']];

        if(deletQ($updSeen,$values,'i'))
        {
            alertShow('success','Message deleted!');
        }
        else
        {
            alertShow('danger','can not delete the message!');

        }
   }


   echo "<script>
    setTimeout(() => { 
        window.location.href = window.location.pathname; 
    }, 1200); 
</script>";

}

?>



<?php
$content = ob_get_clean();
include_once("index.php");
?>
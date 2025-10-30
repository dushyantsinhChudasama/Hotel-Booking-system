<?php

include('db_Connect.php');
ob_start();
$title_page = "DC Hotels - Facilities";

//getting facilities data

$facility = "SELECT * FROM `facilities`";
$result = mysqli_query($con, $facility);

?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">OUR FACILITIES</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Experience Comfort and Luxury with Our Premium Facilities. <br> Explore the Modern Amenities Designed for Your Convenience.
        </p>
    </div>

    <div class="container">
        <div class="row">

            <?php

            $output = "";
            
            while($rows = mysqli_fetch_assoc($result)){

                $output .= "<div class='col-lg-4 col-md-6 mb-5 px-4'>
                <div class='bg-white rounded shadow p-4 border-4 border-dark pop'>
                    <div class='d-flex align-items-center mb-2'>
                        <img src='Images/facilities/{$rows['image']}' width='40px'>
                        <h5 class='m-0 ms-3'>{$rows['name']}</h5>
                    </div>
                    <p>
                        {$rows['desc']}
                    </p>
                </div>
            </div>";
            
            }
            
            echo $output;
            ?>

        </div>
    </div>

<?php

$content = ob_get_clean();
include_once("layout.php");

?>
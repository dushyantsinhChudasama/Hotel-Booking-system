<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
    <?php require('inc/links.php');?>
    <link rel="stylesheet" href="css/style.css">
    <!-- Include Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    

    <?php require('inc/header.php')?>


    <div class="my-5 px-4">
        <h2 class="fw-bold text-center h-font">ABOUT US</h2>
        <div class="h-line bg-dark"></div>
        <div class="mt-3 text-center">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
            Esse veniam quo totam ea magni iste minus praesentium illo velit sit!
        </div>
    </div>


    <div class="container">
        <div class="row justift-content-between align-items-center">
            <div class="col-lg-6 col-md-4 mb-4">
                <h3 class="mb-3">ABC XYZ(Name Here)</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                    Consequuntur reprehenderit fugiat quis ex maxime quae iusto!
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                    Consequuntur reprehenderit fugiat quis ex maxime quae iusto!
                </p>
            </div>

            <div class="col-lg-5 mb-4 ">
                <img src="Images/about/about.jpg" class="w-100">
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <div class="row">

            <div class="col-lg-3 mb-4 px-4 box">
                <div class="bg-white rounded shadow p-4 text-center border-top border-4">
                    <img src="Images/about/hotel.svg" alt="" width="70px">
                    <h4 class="mt-3">400+ Staffs</h4>
                </div>
            </div>

            <div class="col-lg-3 mb-4 px-4 box">
                <div class="bg-white rounded shadow p-4 text-center border-top border-4">
                    <img src="Images/about/customers.svg" width="70px">
                    <h4 class="mt-3">2000+ Customers</h4>
                </div>
            </div>

            <div class="col-lg-3 mb-4 px-4 box">
                <div class="bg-white rounded shadow p-4 text-center border-top border-4">
                    <img src="Images/about/rating.svg" width="70px">
                    <h4 class="mt-3">1500+ Reviews</h4>
                </div>
            </div>

            <div class="col-lg-3 mb-4 px-4 box">
                <div class="bg-white rounded shadow p-4 text-center border-top border-4">
                    <img src="Images/about/staff.svg" width="70px">
                    <h4 class="mt-3">400+ Staff</h4>
                </div>
            </div>

            

        </div>
    </div>


    <?php require('inc/footer.php')?>

    
</body>
</html>
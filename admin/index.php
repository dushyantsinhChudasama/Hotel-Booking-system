<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title_page?></title>
    <?php include('../inc/links.php');?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
      rel="stylesheet" 
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" 
      crossorigin="anonymous">

  <!-- This is header file -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/jquery.validate.js"></script>
    <script src="../js/additional-methods.js"> </script>
    <script src="../js/validate.js"></script>

    <style>
        .custome-bg {
      background-color: #21ceac;
    }

    .custome-bg:hover {
      background-color: #279e8c;
    }

    .login-form{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        width: 400px;
    }
    </style>

  <?php require('../inc/links.php');?>
  <link rel="stylesheet" href="css/style.css">
</head>


<body class="bg-light">
  <!-- top bar -->
  <div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
    <h3 class="mb-0 h-font">DC Hotels</h3>
    <a href="logout.php" class="btn btn-light btn-sm">LOG OUT</a>
  </div>    

  <!-- Sidebar + Main Content Wrapper -->
  <div class="container-fluid">
    <div class="row">
      
      <!-- Sidebar -->
      <div class="col-lg-2 bg-dark border-top border-3 border-secondary min-vh-100" id="dashboard-menu">
        <nav class="navbar navbar-expand-lg navbar-dark">
          <div class="container-fluid flex-lg-column align-items-stretch">
            <h4 class="mt-2 text-light">ADMIN PANEL</h4>
            <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDrpodown">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                  <a class="nav-link text-light" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                  <button class="btn text-white px-3 w-100 text-start d-flex align-items-center justify-content-between"
                          type="button" data-bs-toggle="collapse" data-bs-target="#bookingLinks">
                    <span>Bookings</span>
                    <span><i class="bi bi-caret-down-fill"></i></span>
                  </button>
                  <div class="collapse show px-3 small mb-1" id="bookingLinks">
                    <ul class="nav nav-pills flex-column rounded border border-secondary">
                      <li class="nav-item"><a class="nav-link text-white" href="new_bookings.php">New Bookings</a></li>
                      <li class="nav-item"><a class="nav-link text-white" href="refund_bookings.php">Refund Bookings</a></li>
                      <li class="nav-item"><a class="nav-link text-white" href="booking_records.php">Booking Records</a></li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item"><a class="nav-link text-light" href="rooms.php">Rooms</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="featrues_facilities.php">Feature & Facilities</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="user_queries.php">User Queries</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="users.php">Users</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="settings.php">Settings</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>

      <!-- Main Content -->
      <div class="col-lg-10 p-4 overflow-hidden">
        <?php if(isset($content)) echo $content; ?>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-q2nyWg8t+58Nw2K+fHsP1iUzVotmLx5qVtkn9aZJ6Uy9O2HL3mE6kP0rtITr5U3p" 
        crossorigin="anonymous"></script>

<script>
  function setActive() {
    let a_tags = document.getElementsByTagName('a');
    for (let i=0; i<a_tags.length; i++) {
      let file = a_tags[i].href.split('/').pop();
      let file_name = file.split('.')[0];
      if(document.location.href.indexOf(file_name) >= 0) {
        a_tags[i].classList.add('active');
      }
    }
  }
  setActive();
</script>
</body>

</html>
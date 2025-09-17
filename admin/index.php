<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <?php include('../inc/links.php');?>

    <link rel="stylesheet" href="css/style.css">
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
</head>
<body class="bg-light">
    <div class="login-form text-center bg-white rounded shadow overflow-hidden">
        <form action="dashboard.php" method="post">
        <h4 class="text-white bg-dark py-3">ADMIN LOGIN PANEL</h4>
            <div class="p-4">
            <div class="mb-3">
              <input name="admin_name" data-validation="required" type="text" class="form-control shadow-none text-center" placeholder="Admin Name">
              <div class="error" id="admin_nameError"></div>
            </div>
            <div class="mb-3">
              <input name="admin_pass" data-validation="required" type="password" class="form-control shadow-none text-center" placeholder="Password">
              <div class="error" id="admin_passError"></div>
            </div>
            <button name="login" type="submit" class="btn text-white custome-bg shadow-none">LOGIN</button>
            </div>
        </form>
    </div>
</body>
</html>
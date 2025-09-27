
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title_page?></title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .custome-bg {
            background-color: #21ceac !important;
            color: white !important;
            box-shadow: none !important;
        }

        .custome-bg:hover {
            background-color: #279e8c !important;
        }
    </style>


    <!-- Include Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Custom styling for the carousel container */
        .swiper-container {
            width: 100%;
            height: 60vh;
        }

        .swiper-slide img {
            width: auto;
            height: 100%;
            object-fit: cover;
        }

        .swiper-pagination-bullet {
            background: #fff;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #fff;
        }

        .custome-bg {
            background-color: #21ceac;
            color: white;
        }

        .custome-bg:hover {
            background-color: #279e8c;
        }

        .avalibility-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        /* Profile Image Styling */
        .profile img {
            width: 30px;
            /* Adjust as needed */
            height: 30px;
            /* Keep equal for circular image */
            object-fit: cover;
            /* Ensures the image fills the size properly */
            margin-bottom: 10px;
            /* Spacing below image */
            display: flex;
        }

        .book-btn {}
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Q6E1ZX4Yc1PqkKNXMqDcfTJtMJbSt2Ke4C6Fq9EroPN1L7gZVJQBk6m1hKuy9d5E" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/common.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Include Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <!-- This is header file -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/additional-methods.js"> </script>
    <script src="js/validate.js"></script>

</head>

<body class="bg-light">

    <!-- Navigation bar -->
    <nav id="nav-bar" class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">DC Hotels</a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link me-2" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="rooms.php">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="facilities.php">Facilities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="contact.php">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="about.php">About us</a>
                    </li>

                </ul>
                <div class="d-flex">
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal"
                        data-bs-target="#loginModal">
                        Login
                    </button>
                    <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal"
                        data-bs-target="#registerModal">
                        Register
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Modal for login -->

    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="login-form">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center"> <i
                                class="bi bi-person-circle fs-3 me-2"></i>User Login
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="text" name="email_mob" class="form-control shadow-none"
                                placeholder="Enter your email" data-validation="email">
                            <div class="error" id="email_mobError"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="pass" class="form-control shadow-none"
                                placeholder="Enter your Password" data-validation="required password">
                            <div class="error" id="passError"></div>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-dark shadow-none" type="submit"> LOGIN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal for registration -->
    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="register-form">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center"> <i
                                class="bi bi-person-circle fs-3 me-2"></i>User
                            Registration</h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="badge bg-light text-dark mb-3 text-wrap lh-base">
                            Note : Your details must be matched with your id(Aadhar card, passport, driving license
                            etc...)
                            that will be required during check-in.
                        </span>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Name</label>
                                    <input name="name" data-validation="required" type="text"
                                        class="form-control shadow-none" placeholder="Enter your Name">
                                    <div class="error" id="nameError"></div>

                                </div>
                                <div class="col-md-6 p-0">
                                    <label class="form-label">Email</label>
                                    <input name="email" type="text" data-validation="email"
                                        class="form-control shadow-none" placeholder="Enter your email">
                                    <div class="error" id="emailError"></div>
                                </div>

                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input name="phonenum" data-validation="required" type="text"
                                        class="form-control shadow-none" placeholder="Enter your Phone">
                                    <div class="error" id="phonenumError"></div>
                                </div>
                                <!-- <div class="col-md-6 p-0 mb-3">
                  <label class="form-label">Picture</label>
                  <input name="profile" type="file" accept=".jpg, .jpeg, .png, .webp" class="form-control shadow-none" placeholder="Enter your Picture" required>
                </div> -->
                                <div class="col-md-12 p-0 mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea name="address" data-validation="required" class="form-control shadow-none"
                                        rows="1"></textarea>
                                    <div class="error" id="addressError"></div>
                                </div>

                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Pincode</label>
                                    <input name="pincode" type="text" data-validation="required"
                                        class="form-control shadow-none" placeholder="Enter your Pincode">
                                    <div class="error" id="pincodeError"></div>
                                </div>

                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Date of birth</label>
                                    <input name="dob" type="date" data-validation="required"
                                        class="form-control shadow-none" placeholder="Enter your DOB">
                                    <div class="error" id="dobError"></div>
                                </div>

                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Password</label>
                                    <input name="pass" type="password" data-validation="required"
                                        class="form-control shadow-none" placeholder="Enter your password">
                                    <div class="error" id="passError"></div>
                                </div>

                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input name="cpass" type="password" data-validation="required"
                                        class="form-control shadow-none" placeholder="Enter your Confirm Password">
                                    <div class="error" id="cpassError"></div>
                                </div>

                            </div>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-dark shadow-none" type="submit">REGISTER</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
        if(isset($content)){

            echo $content;
          
        }
    ?>


    <!-- Footer -->

    <div class="container-fluid bg-white mt-5">
        <div class="row">
            <div class="col-lg-4 p-4">
                <h3 class="fw-bold h-font fs-3 mb-2">DC Hotels</h3>
                <p>
                    <!-- <?php echo $settings_r['site_about'] ?> -->
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, tempora, quos vel eaque assumenda
                    explicabo velit, et consectetur vero cum fugiat accusantium architecto! Atque error eligendi
                    exercitationem similique dolores, dolore accusantium explicabo.
                </p>
            </div>

            <div class="col-lg-4 p-4">
                <h5 class="mb-3">Links</h5>
                <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none ">Home</a><br>
                <a href="rooms.php" class="d-inline-block mb-2 text-dark text-decoration-none ">Rooms</a><br>
                <a href="facilities.php" class="d-inline-block mb-2 text-dark text-decoration-none ">Facilities</a><br>
                <a href="contact.php" class="d-inline-block mb-2 text-dark text-decoration-none ">Contact us</a><br>
                <a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none ">About us</a>
            </div>

            <div class="col-lg-4 p-4">
                <h5 class="mb-3">Follow us</h5>
                <a href="https://twitter.com" target="_blank"
                    class="d-inline-block text-dark text-decoration-none mb-2"><i class="bi bi-twitter-x me-1"></i> X
                </a><br>
                <a href="https://facebook.com" target="_blank"
                    class="d-inline-block text-dark text-decoration-none mb-2"><i class="bi bi-facebook me-1"></i>
                    Facebook </a><br>
                <a href="https://instagram.com" target="_blank"
                    class="d-inline-block text-dark text-decoration-none mb-2"><i class="bi bi-instagram me-1"></i>
                    Instagram
                </a><br>
            </div>
        </div>
    </div>

    <h6 class="text-center bg-dark text-white p-3 m-0">Design and Devloped by DC Hotels</h6>

    <!-- Include Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



    <script>
        function setActive() {
            let navbar = document.getElementById('nav-bar"');
            let a_tags = document.getElementsByTagName('a');

            for (i = 0; i < a_tags.length; i++) {
                let file = a_tags[i].href.split('/').pop();
                let file_name = file.split('.')[0];

                if (document.location.href.indexOf(file_name) >= 0) {
                    a_tags[i].classList.add('active');
                }
            }
        }
        setActive()
    </script>


</body>

</html>
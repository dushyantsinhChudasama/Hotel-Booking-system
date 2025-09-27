



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
            <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                Login
            </button>
            <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
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
            <h5 class="modal-title d-flex align-items-center"> <i class="bi bi-person-circle fs-3 me-2"></i>User Login
            </h5>
            <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="text" name="email_mob" class="form-control shadow-none" placeholder="Enter your email" data-validation="email">
              <div class="error" id="email_mobError"></div>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="pass" class="form-control shadow-none" placeholder="Enter your Password" data-validation="required password">
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
            <h5 class="modal-title d-flex align-items-center"> <i class="bi bi-person-circle fs-3 me-2"></i>User
              Registration</h5>
            <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <span class="badge bg-light text-dark mb-3 text-wrap lh-base">
              Note : Your details must be matched with your id(Aadhar card, passport, driving license etc...)
              that will be required during check-in.
            </span>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">Name</label>
                  <input name="name" data-validation="required" type="text" class="form-control shadow-none" placeholder="Enter your Name">
                  <div class="error" id="nameError"></div>

                </div>
                <div class="col-md-6 p-0">
                  <label class="form-label">Email</label>
                  <input name="email" type="text" data-validation="email" class="form-control shadow-none" placeholder="Enter your email">
                  <div class="error" id="emailError"></div>
                </div>

                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">Phone Number</label>
                  <input name="phonenum" data-validation="required" type="text" class="form-control shadow-none" placeholder="Enter your Phone">
                    <div class="error" id="phonenumError"></div>
                </div>
                <!-- <div class="col-md-6 p-0 mb-3">
                  <label class="form-label">Picture</label>
                  <input name="profile" type="file" accept=".jpg, .jpeg, .png, .webp" class="form-control shadow-none" placeholder="Enter your Picture" required>
                </div> -->
                <div class="col-md-12 p-0 mb-3">
                  <label class="form-label">Address</label>
                  <textarea name="address" data-validation="required" class="form-control shadow-none" rows="1"></textarea>
                  <div class="error" id="addressError"></div>
                </div>

                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">Pincode</label>
                  <input name="pincode" type="text" data-validation="required" class="form-control shadow-none" placeholder="Enter your Pincode">
               <div class="error" id="pincodeError"></div>
                </div>
                
                <div class="col-md-6 p-0 mb-3">
                  <label class="form-label">Date of birth</label>
                  <input name="dob" type="date" data-validation="required" class="form-control shadow-none" placeholder="Enter your DOB">
                  <div class="error" id="dobError"></div>
                </div>
                
                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">Password</label>
                  <input name="pass" type="password" data-validation="required" class="form-control shadow-none" placeholder="Enter your password">
                  <div class="error" id="passError"></div>
                </div>
                
                <div class="col-md-6 p-0 mb-3">
                  <label class="form-label">Confirm Password</label>
                  <input name="cpass" type="password" data-validation="required" class="form-control shadow-none" placeholder="Enter your Confirm Password">
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
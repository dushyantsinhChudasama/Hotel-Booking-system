<?php
ob_start();
$title_page = "DC Hotels - Contact";

?>
    <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">CONTACT US</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
      Lorem ipsum dolor sit amet consectetur adipisicing 
      elit. Distinctio rem non <br> cupiditate numquam eum 
      minima vitae minus in harum repellendus.
    </p>
  </div>

  <div class="container">
    <div class="row">

      <div class="col-lg-6 col-md-6 mb-5 px-4">
        <div class="bg-white rounded shadow p-4">
          <iframe class="w-100 rounded" height="320px" src="https://maps.app.goo.gl/QasQ95tjRUyZFL5w6" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <h5>Address</h5>
          <a href="https://maps.app.goo.gl/QasQ95tjRUyZFL5w6" target="_blank" class="d-inline-block text-decoration-none text-dark">
            <i class="bi bi-geo-alt-fill"></i>XYZ, Rajkot, Gujarat
          </a>
          <h5 class="mt-4">Call us</h5>
            <a href="tel: +919712802041" class="d-inline-block mb-2 text-dark text-decoration-none">
              <i class="bi bi-telephone-fill"></i>+919712802041
            </a>
            <br>
            <a href="tel: ++919712802041" class="d-inline-block mb-2 text-dark text-decoration-none">
              <i class="bi bi-telephone-fill"></i>+919712802041
            </a>
          
          <h5 class="mt-4">Email</h5>
            <a href="mailto: dushyant9803@gmail.com" class="d-inline-block mb-2 text-dark text-decoration-none">
              <i class="bi bi-envelope-fill"></i>dushyant9803@gmail.com
            </a>

            <h5 class="mt-4">Follow us</h5>
          <a href="https://www.x.com" target="_blank" class="d-inline-block mb-3">
            <span class="badge bg-light text-dark fs-6 p-2">
            <i class="bi bi-twitter-x me-1"></i> X
            </span>
          </a>
          <br>
          <a href="https://www.facebook.com" target="_blank" class="d-inline-block mb-3">
            <span class="badge bg-light text-dark fs-6 p-2">
            <i class="bi bi-facebook me-1"></i> Facebook
            </span>
          </a>
          <br>
          <a href="https://www.instagram.com" target="_blank" class="d-inline-block mb-3">
            <span class="badge bg-light text-dark fs-6 p-2">
            <i class="bi bi-instagram me-1"></i> Instagram
            </span>
          </a>

        </div>
      </div>

      <div class="col-lg-6 col-md-6 px-4">
        <div class="bg-white rounded shadow p-4">
          <form method="post" id="login-form">
            <h5>Send a Message</h5>
            <div class="mt-3">
              <label class="form-label" style="font-weight: 500;">Name</label>
              <input type="text" name="name" class="form-control shadow-none" data-validation="required">
              <div class="error" id="nameError"></div>
            </div>
            <div class="mt-3">
              <label class="form-label" style="font-weight: 500;">Email</label>
              <input type="text" name="email" class="form-control shadow-none" data-validation="required email">
              <div class="error" id="emailError"></div>
            </div>
            <div class="mt-3">
              <label class="form-label" style="font-weight: 500;">Subject</label>
              <input type="text" name="subject" class="form-control shadow-none" data-validation="required">
              <div class="error" id="subjectError"></div>
            </div>
            <div class="mt-3">
              <label class="form-label" style="font-weight: 500;">Message</label>
              <textarea class="form-control shadow-none" name="message" data-validation="required" rows="5" style="resize: none;"></textarea>
              <div class="error" id="messageError"></div>
            </div>
            <button type="submit" name="send" class="btn btn-sm text-white mt-4 text-center" style="background-color: var(--teal); font-size: 20px;">SEND</button>

          </form>
        </div>
      </div>

    </div>
  </div>


<?php 
$content = ob_get_clean();
include_once("layout.php");
?>
    
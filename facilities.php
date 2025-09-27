<?php
ob_start();
$title_page = "DC Hotels - Facilities";

?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">OUR FACILITIES</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Lorem ipsum dolor sit amet consectetur adipisicing 
            elit. Distinctio rem non <br> cupiditate numquam eum 
            minima vitae minus in harum repellendus.
        </p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="Images/Facilities/IMG_1637.svg" width="40px">
                        <h5 class="m-0 ms-3">Geyser</h5>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio rem non cupiditate numquam eum minima vitae minus in harum repellendus.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="Images/Facilities/IMG_1637.svg" width="40px">
                        <h5 class="m-0 ms-3">Geyser</h5>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio rem non cupiditate numquam eum minima vitae minus in harum repellendus.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="Images/Facilities/IMG_1637.svg" width="40px">
                        <h5 class="m-0 ms-3">Geyser</h5>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio rem non cupiditate numquam eum minima vitae minus in harum repellendus.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="Images/Facilities/IMG_1637.svg" width="40px">
                        <h5 class="m-0 ms-3">Geyser</h5>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio rem non cupiditate numquam eum minima vitae minus in harum repellendus.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="Images/Facilities/IMG_1637.svg" width="40px">
                        <h5 class="m-0 ms-3">Geyser</h5>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio rem non cupiditate numquam eum minima vitae minus in harum repellendus.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="Images/Facilities/IMG_1637.svg" width="40px">
                        <h5 class="m-0 ms-3">Geyser</h5>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio rem non cupiditate numquam eum minima vitae minus in harum repellendus.
                    </p>
                </div>
            </div>
        </div>
    </div>

<?php

$content = ob_get_clean();
include_once("layout.php");

?>
<?php
ob_start();
$title_page = "Settings";

?>

<!-- General settings module -->

<div class="container-fluid">
    <div class="row">

        <h3 class="mb-4">SETTINGS</h3>

        <!-- General settings section -->
        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="card-title m-0">
                        General Settings
                    </h5>
                    <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                        data-bs-target="#general-s">
                        <i class="bi bi-pencil-square"></i>
                        Edit
                    </button>
                </div>
                <h6 class="card-subtitle mb-1 fw-bold">Site Title</h6>
                <p class="card-text" id="site_title">

                    DC HOTELS

                </p>
                <h6 class="card-subtitle mb-1 fw-bold">About us</h6>
                <p class="card-text" id="site_about">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi vel numquam aut dolore dolor,
                    architecto corrupti, ab est enim quae repellat assumenda ipsum unde voluptatum pariatur reiciendis!
                    Necessitatibus, voluptas? Tempore.
                </p>

            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                 
            <form>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">General Settings</h5>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Site Title</label>
                                <input type="text" name="site_title" id="site_title_inp"
                                    class="form-control shadow-none">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">About us</label>
                                <textarea class="form-control shadow-none" name="site_about" id="site_about_inp"
                                    rows="6"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" onclick="resetGeneralForm()" class="btn text-secondary shadow-none"
                                data-bs-dismiss="modal">CANCEL</button>
                            <button type="button" onclick="upd_general(site_title.value,site_about.value)"
                                class="btn custome-bg text-white shadow-none" data-bs-dismiss="modal">SAVE</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>


        <!-- Shutdown section -->
        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="card-title m-0">
                        Shutdown Website
                    </h5>
                    <div class="form-check form-switch">
                        <form>
                            <input class="form-check-input" type="checkbox" id="shutdown-toggle">
                        </form>
                    </div>
                </div>
                <p class="card-text">
                    No customers will be allowed to book rooms through website, when shutdown mode is avtivated.
                </p>
            </div>
        </div>

        <!-- Contacts settings section -->
        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="card-title m-0">
                        Contactss Settings
                    </h5>
                    <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                        data-bs-target="#contacts-s">
                        <i class="bi bi-pencil-square"></i>
                        Edit
                    </button>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <h6 class="card-subtitle mb-1 fw-bold">Address</h6>
                            <p class="card-text" id="address">Rajkot</p>
                        </div>
                        <div class="mb-4">
                            <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                            <p class="card-text" id="gmap">https://maps.app.goo.gl/mdLHbAKuQLnLY7cy7</p>
                        </div>
                        <div class="mb-4">
                            <h6 class="card-subtitle mb-1 fw-bold">Phone Numbers</h6>
                            <p class="card-text mb-1">
                                <i class="bi bi-telephone-fill"></i>
                                <span id="pn1"></span>1234567890
                            </p>
                            <p class="card-text">
                                <i class="bi bi-telephone-fill"></i>
                                <span id="pn2"></span>1234567890
                            </p>
                        </div>
                        <div class="mb-4">
                            <h6 class="card-subtitle mb-1 fw-bold">Email</h6>
                            <p class="card-text" id="email">teset@email.com</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-4">
                            <h6 class="card-subtitle mb-1 fw-bold">Social Links</h6>
                            <p class="card-text mb-1">
                                <i class="bi bi-facebook me-1"></i>
                                <span id="fb"></span>https://link.socialmedia.com
                            </p>
                            <p class="card-text">
                                <i class="bi bi-instagram me-1"></i>
                                <span id="insta"></span>https://link.socialmedia.com
                            </p>
                            <p class="card-text">
                                <i class="bi bi-twitter-x me-1"></i>
                                <span id="tw"></span>https://link.socialmedia.com
                            </p>
                        </div>
                        <div class="mb-4">
                            <h6 class="card-subtitle mb-1 fw-bold">IFrame</h6>
                            <iframe id="iframe" src="https://share.google/6LBlWaNijPd0BwOJ3" class="border p-2 w-100"
                                loading="lazy"></iframe>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- Modal for Contact section details -->
        <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <form id="contact_s_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Contacts Settings</h5>
                        </div>
                        <div class="modal-body">

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Address</label>
                                            <input type="text" name="address" id="address_inp"
                                                class="form-control shadow-none">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Gogole Mpas links</label>
                                            <input type="text" name="gmap" id="gmap_inp"
                                                class="form-control shadow-none">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Phone Numbers (with country cdoe)</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i
                                                        class="bi bi-telephone-fill"></i></span>
                                                <input type="number" name="pn1" id="pn1_inp"
                                                    class="form-control shadow-none">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i
                                                        class="bi bi-telephone-fill"></i></span>
                                                <input type="number" name="pn2" id="pn2_inp"
                                                    class="form-control shadow-none">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Email</label>
                                            <input type="email" name="email" id="email_inp"
                                                class="form-control shadow-none">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Social Links</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i
                                                        class="bi bi-facebook me-1"></i></span>
                                                <input type="text" name="fb" id="fb_inp"
                                                    class="form-control shadow-none">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                                                <input type="text" name="insta" id="insta_inp"
                                                    class="form-control shadow-none">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="bi bi-twitter-x"></i></span>
                                                <input type="text" name="tw" id="tw_inp"
                                                    class="form-control shadow-none">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">iFrmae Source</label>
                                            <input type="text" name="iframe" id="iframe_inp"
                                                class="form-control shadow-none">
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" onclick="contacts_inp(contacts_data)"
                                class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                            <button type="button" onclick="upd_contacts()" class="btn custome-bg text-white shadow-none"
                                data-bs-dismiss="modal">SAVE</button>
                        </div>
                    </div>
                </form>

        </div>
        </div>
       

    </div>
</div>

<script>
    
    let general_data, contact_data;

    let contact_s_form = document.getElementById("contact_s_form");

    //for getting general form data
    function get_general()
    {
        let site_title = document.getElementById("site_title");
        let site_about = document.getElementById("site_about");

        let site_title_inp = document.getElementById("site_title_inp");
        let site_about_inp = document.getElementById("site_about_inp");

        let shutdown_toggle = document.getElementById("shutdown-toggle");

        //getting data from ajax file
        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/settings_crud.php",true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

        xhr.onload = function()
        {
            general_data = JSON.parse(this.responseText);

            //setting data
            site_title.innerText = general_data.site_title;
            site_about.innerText = general_data.site_about;

            site_title_inp.value = general_data.site_title_inp;
            site_about_inp.value = general_data.site_about_inp;

            //for shutdown data-bs-toggle
            if(general_data.shutdown_toggle == 0)
            {
                shutdown_toggle.checked = false;
                shutdown_toggle.value = 0;
            }
            else
            {
                shutdown_toggle.checked = true;
                shutdown_toggle.value = 1;
            }
        }

        xhr.send('get-general');
    }

</script>

<?php
$content = ob_get_clean();
include_once("index.php");
?>
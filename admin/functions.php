<?php

function alertShow($type, $msg) {
    $bs_class = ($type == "success") ? "alert-success" : "alert-danger";
    $unique_id = uniqid("alert_"); // generate unique ID

    echo <<<ALERT
    <div class="alert $bs_class alert-dismissible fade show custome-alert" role="alert" id="$unique_id">
        <strong class="me-3">$msg</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
        // Auto-hide after 3 seconds
        setTimeout(() => {
            const alertBox = document.getElementById("$unique_id");
            if (alertBox) {
                alertBox.classList.remove("show"); // fade-out effect
                setTimeout(() => alertBox.remove(), 300); // remove completely
            }
        }, 2000);
    </script>
ALERT;
}


?>
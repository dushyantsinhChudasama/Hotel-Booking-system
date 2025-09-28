<?php
ob_start();
$title_page = "User Queries";
?>


<?php
$content = ob_get_clean();
include_once("index.php");
?>
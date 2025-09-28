<?php
ob_start();
$title_page = "Settings";

?>


<?php
$content = ob_get_clean();
include_once("index.php");
?>
<?php
ob_start();
$title_page = "Users";

?>


<?php
$content = ob_get_clean();
include_once("index.php");
?>
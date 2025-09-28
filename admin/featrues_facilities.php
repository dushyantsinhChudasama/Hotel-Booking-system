<?php
ob_start();
$title_page = "Features Faciliteis";

?>


<?php
$content = ob_get_clean();
include_once("index.php");
?>
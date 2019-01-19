<?php
//$filename = "../";
//$filename .= $_GET['file'];
//unlink($filename);
if (array_map('unlink', glob( "../*.xlsx"))) {
    echo '<script>document.location.href = "../myforge.php";</script>';
} else {
    echo '<script>console.log("Could Not Delete Reports, Contact System Administrator")</script>';
    echo '<script>document.location.href = "../myforge.php";</script>';
}
?>
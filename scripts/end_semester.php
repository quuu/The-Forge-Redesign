<?php
require_once '../controllers/db_connector.php';

//drop everything in projects
$conn = dbConnect();
$target = $conn->prepare("DELETE FROM `projects` WHERE 1");
$target->execute();

//reset all machines to open
$conn = dbConnect();
$target = $conn->prepare("UPDATE `hardware` SET `inUse`= 0 WHERE 1");
$target->execute();

//drop all users except TA's
$conn = dbConnect();
$target = $conn->prepare("DELETE FROM `users` WHERE `type` != \"TA\"");
$target->execute();

?>


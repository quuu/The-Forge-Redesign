<?php
if(isset($_COOKIE['FORGE-SESSION'])){
    require_once('db_connector.php');
    $conn = dbConnect();
    $stmt = $conn->prepare("DELETE FROM `sessions` WHERE `sessionID`=:sessID");
    $stmt->bindParam(":sessID", $_COOKIE['FORGE-SESSION']);
    $stmt->execute();
    //Set it in the past to the browser garbage collects it
    setcookie("FORGE-SESSION",'', time() - 36000,'/');
}
header("Location: ../index.php");
?>
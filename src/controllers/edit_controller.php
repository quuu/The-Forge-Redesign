<?php

include_once "db_connector.php";
if(isset($_POST['rcsID']) && isset($_POST['rin'])){

    $conn = dbConnect();

    //TODO: password changing

    // get the rin
    $rin = $_POST['rin'];
    //update query
    $stmt = $conn->prepare('UPDATE Users SET rcsID = :rcsID, firstName = :firstname, lastName = :lastname, email = :email WHERE rin = :rin');

    //replace necessary fields
    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $rin = $_POST['rin'];
    $rcsID = $_POST['rcsID'];
    $stmt->bindParam(':firstname',$first);
    $stmt->bindParam(':lastname',$last);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':rin',$rin);
    $stmt->bindParam(':rcsID', $rcsID);
    $stmt->execute();
    exit();
}else{
  die("ERROR");
}
?>

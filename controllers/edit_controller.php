<?php

include_once "db_connector.php";
if(isset($_POST['rcsID']) && isset($_POST['rin'])){
  
  /**
   * if password doesn't need to be changed
   */
  if(!(isset($_POST['password']))){
    $conn = dbConnect();
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
    $stmt->bindParam(':rcsID',$rcsID);
    $stmt->execute();
    exit();
  }
  /**
   * if password needs to be changed
   */
  else{
    $conn = dbConnect();
    // get the rin
    $rin = $_POST['rin'];
    //update query
    $stmt = $conn->prepare('UPDATE Users SET rcsID = :rcsID, firstName = :firstname, lastName = :lastname, email = :email, password = :password WHERE rin = :rin');

    //replace necessary fields
    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $rin = $_POST['rin'];
    $rcsID = $_POST['rcsID'];
    
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $stmt->bindParam(':firstname',$first);
    $stmt->bindParam(':lastname',$last);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':rin',$rin);
    $stmt->bindParam(':rcsID',$rcsID);
    $stmt->bindParam(':password',$password);
    $stmt->execute();
      header("Location: ../myforge.php");
    exit(); 
  }
}else{
  die("ERROR");
}
?>

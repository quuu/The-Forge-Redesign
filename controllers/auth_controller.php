<?php
include_once "db_connector.php";
//Takes care of redirecting user if their session is expired
if(isset($_COOKIE['FORGE-SESSION'])){
  //DB connection initialized
  $conn = dbConnect();
  $sessionID = $_COOKIE['FORGE-SESSION'];
  $stmt = $conn->prepare('SELECT * FROM Sessions WHERE sessionID = :sessionID');
  $stmt->bindParam(':sessionID',$sessionID);
  $stmt->execute();
  $session = $stmt->fetch(PDO::FETCH_ASSOC);
  //If the session is found
  if($session){
    $expiration = strtotime($session['expiration']);
    $current_time = time();
    //If the session has expired
    if($current_time >= $expiration){
      //Deletes the session from the database
      $stmt = $conn->prepare('DELETE FROM Sessions WHERE sessionID = :sessionID');
      $stmt->bindParam(':sessionID',$sessionID);
      $stmt->execute();
      //Sets the cookie to expire in the past so the browser deletes it
      setcookie ("FORGE-SESSION", "", time() - 3600,'/');
      header("Location: ./index.php");
      exit();
    }else{
        // We update the expiration to be later on if the user is in fact already logged in
        $expiration = date("Y-m-d H:i:s",time() + (24*60*60));
        $stmt = $conn->prepare('UPDATE Sessions SET expiration = :expir WHERE sessionID = :sessionID');
        $stmt->bindParam(':expir', $expiration);
        $stmt->bindParam(':sessionID',$sessionID);
        $stmt->execute();
        // Update their cookie so that it doesn't expire before the database thinks it should
        setcookie("FORGE-SESSION",$sessionID, time() + (24*60*60),'/');
    }
  }else{
    //If not set correctly, shoot them back to the login page
    header("Location: ./login.php");
    exit();
  }
}else{
  //If not set correctly, shoot them back to the login page
  header("Location: ./login.php");
  exit();
}

function adminOnly($user){
  //If user is not an admin go back
  if($user['type'] != "admin"){
    header("Location: ./login.php");
    exit();
  }
}

 ?>
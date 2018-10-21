<?php
include_once "db_connector.php";

if(isset($_POST['username']) && isset($_POST['password']) && $_POST['g-recaptcha-response']!==""){
 $secret = '6LfIpzIUAAAAAGW4iawS0P0c-f0PBOCeCBdc0qVT';
 $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
 $responseData = json_decode($verifyResponse);
  if($responseData->success) {
    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $rin = $_POST['rin'];
    $username = $_POST['username'];
    $pass = password_hash($_POST['password'],PASSWORD_DEFAULT);

    $conn = dbConnect();
    //Checks to see if there are users in the database with the same username
    $stmt = $conn->prepare('SELECT * FROM Users WHERE Username = :username');
    $stmt->bindParam(':username',$username);
    $stmt->execute();
    $duplicate_user = $stmt->fetch();
    if($duplicate_user){
      //Redirects the user to the create account page again and displays an error
      echo "<script type='text/javascript'>alert('That username is unavailable!');</script>";
      echo "<script type='text/javascript'>window.location = '../create_account.php';</script>";
      exit();
    }
    $stmt = $conn->prepare('INSERT INTO Users (FirstName,LastName,Email,RIN,Username,Password)
    VALUES (:firstname,:lastname,:email,:RIN,:Username,:Password)');
    $stmt->bindParam(':firstname',$first);
    $stmt->bindParam(':lastname',$last);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':RIN',$rin);
    $stmt->bindParam(':Username',$username);
    $stmt->bindParam(':Password',$pass);
    $stmt->execute();
    echo "<script type='text/javascript'>alert('Sucessfully Signed Up!');</script>";
    echo "<script type='text/javascript'>window.location = '../login.php';</script>";
    exit();
  }else{
    echo "<script type='text/javascript'>alert('Failed to Sign Up!');</script>";
    echo "<script type='text/javascript'>window.location = '../create_account.php';</script>";
    exit();
  }
}else{
  die("ERROR");
}
?>
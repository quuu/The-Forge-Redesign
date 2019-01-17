<!DOCTYPE html>
<html class="bg-secondary">

<head>
  <?php include 'style.php';?>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<body class="bg-light">
  <div class="bg-secondary pt-3 p-2">
      <?php include 'nav_bar.php';?>
  </div>
  <?php


  $name;
  $email;
  $message;
  $from;
  $to = 'roberr5@rpi.edu';
  $subject;
  $errName;
  $errEmail;
  $errSubject;
  $errMessage;
  $result;



  if (isset($_POST["submit"])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $message = $_POST['message'];
      $from = "From $name<$email>";
      $subject = $_POST['subject'];

      // Check if name has been entered
      if (!$_POST['name']) {
          $errName = 'Please enter your name';
      }

      // Check if email has been entered and is valid
      if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
          $errEmail = 'Please enter a valid email address';
      }

      //Check if subject has been entered
      if (!$_POST['subject']) {
          $errSubject = 'Please enter the subject';
      }

      //Check if message has been entered
      if (!$_POST['message']) {
          $errMessage = 'Please enter your message';
      }

      // If there are no errors, send the email
      if (!$errName && !$errEmail && !$errMessage && !$errSubject) {
          if (mail ($to, $subject, $message, $from)) {
              $result='<div class="alert alert-success">Your message has been sent</div>';
              echo $result;
          } else {
              $result='<div class="alert alert-danger">There was an error sending your message. Please try again later</div>';
              echo $result;
          }
      }
  }
  ?>

  <?php include 'footer.php';?>
</body>

</html>
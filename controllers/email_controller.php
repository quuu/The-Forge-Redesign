<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//TODO: convert this to use a if ($_POST) block
//Load Composer's autoloader
require '../vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.sendgrid.net';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'rpi_forge';                 // SMTP username
    $mail->Password = 'MILL@RPI123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('rpi.forge@gmail.com', 'NO_REPLY@RPI_FORGE');
    $mail->addAddress('volkb@rocketmail.com');     // Add a recipient TODO: alter this to use POST and get name from projects table

    //Content
    $body = 'Your print has failed <b>your machine will be held for one hour, you must come in and restart it during that time</b> after that, the printer will be freed for use';
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'FAILED PRINT NOTIFICATION';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

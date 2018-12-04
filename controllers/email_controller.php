<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
include_once 'db_connector.php';
if(isset($_POST['machine'])) {
    $machine_in = $_POST['machine'];

    //grab the Rin of that Machine
    $conn = dbConnect();
    $numUses = $conn->prepare("SELECT inUseBy FROM hardware WHERE machineName = :machine");
    $stmt->bindParam(':machine',$machine_in);
    $numUses->execute();
    $rin_ret = $numUses->fetchColumn();

    //grab the email from that RIN
    $conn = dbConnect();
    $numUses = $conn->prepare("SELECT email FROM users WHERE rin = :rin");
    $stmt->bindParam(':rin',$rin_ret);
    $numUses->execute();
    //now we have the email
    $email_ret = $numUses->fetchColumn();


    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.sendgrid.net';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'rpi_forge';                 // SMTP username
        $mail->Password = 'MILL@RPI12345';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('rpi.forge@gmail.com', 'NO_REPLY@RPI_FORGE');
        $mail->addAddress($email_ret);     // Add a recipient

        //Content
        $body = 'Your print has failed <b>your machine will be held for one hour, you must come in and restart it during that time</b> after that, the printer will be freed for use';
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'FAILED PRINT NOTIFICATION';
        $mail->Body = $body;
        $mail->AltBody = strip_tags($body);

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}

function generateMachineDropDown(){
    $connection = dbconnect();
    $stmt = $connection->prepare('SELECT machineName FROM hardware WHERE inUse = 1');
    $stmt->execute();
    $machines = $stmt->fetchall();
    foreach($machines as $machine){
        $item = "<option value=" . "\"" . $machine["machineName"] . "\"" . ">";
        $item .= $machine["machineName"];
        echo $item;
    }
}
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Load PHPMailer classes
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $mail = new PHPMailer(true);
    $mail->isSMTP();   
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'cse.lib.rguktb@gmail.com';                     //SMTP username
    $mail->Password   = 'jercxptfxmqkjiqp';                            //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->setFrom('cse.lib.rguktb@gmail.com', 'CSE Dept. Library RGUKT-B');
    $mail->addAddress($email, $name);
    $mail->isHTML(true); 
    $mail->Subject = $subject;
    $mail->Body    = $message;
    // Send the email
    $response = array();
    $response['flag'] = "false";
    if ($mail->send()) {
        $response['flag']="true";
    } else {
        
        $response['flag']="false";
    }
    header("Content-Type: application/json");
    echo json_encode($response);
}
?>

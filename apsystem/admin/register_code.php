<?php
session_start();
include '../conn.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

$otp = rand(100000, 999999);


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
    //Server settings
    //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'johnmatrixmariano@gmail.com';                     //SMTP username
    $mail->Password   = 'phiz zlln rxxj qigi';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@AngadananHR.com', 'Angadanan');
    $mail->addAddress('mmatrixmariano5@gmail.com');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'New Account OTP';
    $mail->Body = 'Dear Owner,<br><br>
    Thank you for attempting to create an HR admin account. As part of our security measures, we require verification via a one-time password (OTP). Below is the OTP that you will need to complete the account creation process:<br><br>
    OTP: <b>' . $otp . '</b><br><br>
    Please enter this OTP on the registration page to proceed with creating your HR admin account.<br><br>
    If you did not initiate this request, please ignore this email.<br><br>
    Best regards,<br>
    Municipality of Angadanan IT Team';

    $mail->send();
    $_SESSION['code'] = $otp;
    echo $_SESSION['code'];
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

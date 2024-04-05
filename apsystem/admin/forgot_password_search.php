<?php
session_start();
require 'includes/conn.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

$userEmail = $_POST['username'];

$sql = "SELECT username,email FROM admin WHERE username = ? OR email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $userEmail,$userEmail);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $username = $row['username'];
        $email = $row['email'];
        $generatedToken = generateToken();
        insertToken($generatedToken, $email, $conn);
        $generatedLink = 'http://localhost/Angadanan/apsystem/admin/forgot_password_page.php?token=' . $generatedToken;
        http_response_code(200);
    }
} else {
    http_response_code(404);
    echo "User not found!";
}

$stmt->close();
$conn->close();



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
    $mail->addAddress($email);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Password Reset';
    $mail->Body = 'Dear '.$username.',<br><br>

    You are receiving this email because you have requested to reset your password. Please click on the following link to proceed with the password reset process: <br><br>

    ' . $generatedLink . ' <br><br>

    If you did not initiate this password reset request, kindly ignore this email.<br><br>

    Thank you for your attention to this matter.<br><br>

    Best regards,<br>
    Municipality of Angadanan';


    $mail->send();
    $_SESSION['otp'] = $otp;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


function generateToken($length = 20)
{
    return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', $length)), 0, $length);
}

function insertToken($generatedToken, $email, $conn)
{
    $sql = "INSERT INTO forgot_password (email, token, created_on) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $generatedToken); // Binding two parameters
    $stmt->execute();
}

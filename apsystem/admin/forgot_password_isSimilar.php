<?php

session_start();
require 'includes/conn.php';

// Assuming you're receiving the password and confirmPassword via POST
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$passwordHashed = password_hash($password, PASSWORD_DEFAULT);


// Assuming you have stored the token in the session
$token = $_SESSION['token'];


// Query email using token
$stmt = $conn->prepare("SELECT email FROM forgot_password WHERE token = ?");
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$email = $row['email'];

if ($password != $confirmPassword) {
    http_response_code(400); // Set HTTP status code to 400 (Bad Request)
    echo "Password mismatched!";
    exit;
} 
if (strlen($password) < 8) {
    http_response_code(400);
    echo "Password should be longer than 8 characters!";
    exit;
} else if ($password == $confirmPassword) {
    http_response_code(200); // Set HTTP status code to 200 (OK)
    // Update password for the admin with the retrieved email
    try {
        // Update admin password
        $stmt = $conn->prepare("UPDATE admin SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $passwordHashed, $email);
        $stmt->execute();

        // Mark forgot password token as used
        $stmt = $conn->prepare("DELETE FROM forgot_password WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        echo "Password updated successfully!";
    } catch (Exception $e) {
        // Handle any exceptions or errors
        http_response_code(400);
        echo "An error occurred: " . $e->getMessage();
    }

    echo "Password updated successfully!";
}

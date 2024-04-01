<?php
session_start();
include 'includes/conn.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['cpassword'];
$confirmCode = $_POST['code'];
$code = $_SESSION['code'];

if($code != $confirmCode){
    $_SESSION['error'] = 'Code does not match!';
    error();
}
// Check if passwords match
if ($password != $confirmPassword) {
    $_SESSION['error'] = 'Password does not match!';
    error();
}

// Check for existing username
$sql = "SELECT * FROM admin WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Username already exists
    $_SESSION['error'] = 'Username already exists!';
    error();
}

// Check for existing email
$sql = "SELECT * FROM admin WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Email already exists
    $_SESSION['error'] = 'Email already exists!';
    error();

}

if(!isset($_POST['error'])){
    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO admin (firstname, lastname, username, email, password, created_on) 
        VALUES (?, ?, ?, ?, ?, NOW())";

    try {
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            throw new Exception("Error in preparing statement: " . $conn->error);
        }

        $stmt->bind_param("sssss", $fname, $lname, $username, $email, $password);
        if (!$stmt->execute()) {
            throw new Exception("Error in executing statement: " . $stmt->error);
        }

        // If execution reaches here, the insertion was successful
        header('Location:index.php');
        exit;
    } catch (Exception $e) {
        // Handle any exceptions that occurred during database operations
        echo "Error: " . $e->getMessage();
    }

}
else{
    echo $_SESSION['error'];
}

$stmt->close();
$conn->close();

function error(){
    header('Location:register.php');
    exit;
}
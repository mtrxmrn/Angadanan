<?php
include 'includes/session.php';

try {
    if (isset($_POST['add'])) {
        // Retrieve form data
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $emailAddress = $_POST['emailAddress'];
        $verification = $_POST['verification'];
        $filename = $_FILES['photo']['name'];
        $password = password_hash("@ng@d@n@n", PASSWORD_DEFAULT);

        if($verification != $_SESSION['otp']){
            $_SESSION['error'] = 'Wrong OTP';
            header('location:admin.php');
            return;
        }
        // Handle file upload
        if (!empty($filename)) {
            move_uploaded_file($_FILES['photo']['tmp_name'], '../images/' . $filename);
        }

        // Capitalize first name and last name
        $firstname = ucfirst($firstname);
        $lastname = ucfirst($lastname);

        $userSQL = "SELECT username FROM admin WHERE username = '$username'";
        $result = $conn->query($userSQL);

        if ($result->num_rows > 0) {
            $_SESSION['error'] = 'Username exist!';
            header('location:admin.php');
            return;
        }

        // Prepare SQL query
        $sql = "INSERT INTO admin (username, password, firstname, lastname, email, permission, photo, created_on) VALUES ('$username', '$password', '$firstname', '$lastname', '$emailAddress', '1','$filename', NOW())";

        // Execute SQL query
        if ($conn->query($sql)) {
            $_SESSION['success'] = 'Admin added successfully';
            header('location: admin.php');
        } else {
            throw new Exception($conn->error);
        }
    } else {
        $_SESSION['error'] = 'Fill up add form first';
    }
} catch (Exception $e) {
    $_SESSION['error'] = 'An error occurred: ' . $e->getMessage();
}

// Redirect to admin.php

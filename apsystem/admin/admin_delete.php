<?php
include 'includes/session.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    if ($id == $_SESSION['admin'] || $_SESSION['permission'] != 5) {
        $_SESSION['error'] = 'Error: Cannot delete own account or insufficient permissions!';
        header('location: admin.php');
        return;
    }
    $sql = "DELETE FROM admin WHERE id = '$id'";
    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Employee deleted successfully';
    } else {
        $_SESSION['error'] = $conn->error;
    }
} else {
    $_SESSION['error'] = 'Select item to delete first';
}

echo 'ID: ' . $id . '<br>Session ID: ' . $_SESSION['admin'];
header('location: admin.php');

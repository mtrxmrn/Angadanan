<?php
include 'includes/session.php';

if (isset($_POST['edit'])) {
	$empid = $_POST['id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$middlename = $_POST['middlename'];
	$emailAddress = $_POST['edit_email'];
	$address = $_POST['address'];
	$birthdate = $_POST['birthdate'];
	$contact = $_POST['contact'];
	$civil_status = $_POST['civil_status'];
	$religion = $_POST['religion'];
	$citizenship = $_POST['citizenship'];
	$gender = $_POST['gender'];
	$position = $_POST['position'];
	$schedule = $_POST['schedule'];

	$sql = "UPDATE employees SET firstname = '$firstname', lastname = '$lastname', middlename = '$middlename', emailAddress = '$emailAddress', address = '$address', birthdate = '$birthdate', contact_info = '$contact', civil_status = '$civil_status', religion = '$religion', citizenship = '$citizenship', gender = '$gender', position_id = '$position', schedule_id = '$schedule' WHERE id = '$empid'";
	if ($conn->query($sql)) {
		$_SESSION['success'] = 'Employee updated successfully';
	} else {
		$_SESSION['error'] = $conn->error;
	}
} else {
	$_SESSION['error'] = 'Select employee to edit first';
}

header('location: employee.php');

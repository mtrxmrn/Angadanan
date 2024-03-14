<?php
include 'includes/session.php';

try {
	if (isset($_POST['add'])) {
		// Retrieve form data
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$middlename = $_POST['middlename'];
		$emailAddress = $_POST['emailAddress'];
		$address = $_POST['address'];
		$birthdate = $_POST['birthdate'];
		$contact = $_POST['contact'];
		$gender = $_POST['gender'];
		$position = $_POST['position'];
		$schedule = $_POST['schedule'];
		$filename = $_FILES['photo']['name'];
		$civil_status = $_POST['civil_status'];
		$religion = $_POST['religion'];
		$citizenship = $_POST['citizenship'];

		// Handle file upload
		if (!empty($filename)) {
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/' . $filename);
		}

		// Generate employee ID
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
			$letters .= $char;
		}
		for ($i = 0; $i < 10; $i++) {
			$numbers .= $i;
		}
		$employee_id = substr(str_shuffle($letters), 0, 3) . substr(str_shuffle($numbers), 0, 9);

		// Capitalize first name and last name
		$firstname = ucfirst($firstname);
		$lastname = ucfirst($lastname);

		// Prepare SQL query
		$sql = "INSERT INTO employees (employee_id, firstname, lastname, middlename, emailAddress, address, birthdate, contact_info, civil_status, religion, citizenship, gender, position_id, schedule_id, photo, created_on) VALUES ('$employee_id', '$firstname', '$lastname', '$middlename', '$emailAddress','$address', '$birthdate', '$contact', '$civil_status', '$religion', '$citizenship', '$gender', '$position', '$schedule', '$filename', NOW())";

		// Execute SQL query
		if ($conn->query($sql)) {
			$_SESSION['success'] = 'Employee added successfully';
			header('location: employee.php');
		} else {
			throw new Exception($conn->error);
		}
	} else {
		$_SESSION['error'] = 'Fill up add form first';
	}
} catch (Exception $e) {
	$_SESSION['error'] = 'An error occurred: ' . $e->getMessage();
}

// Redirect to employee.php

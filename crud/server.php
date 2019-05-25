<?php 
error_reporting(0);
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'crud');

	// initialize variables
	$name = "";
	$address = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];

		mysqli_query($db, "INSERT INTO info (name, address) VALUES ('$name', '$address')"); 
		$_SESSION['msg'] = "Address saved"; 
		header('location: index.php');
	}
// Update records 

	if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$address = $_POST['address'];

	mysqli_query($db, "UPDATE info SET name='$name', address='$address' WHERE id=$id");
	$_SESSION['msg'] = "Address updated!"; 
	header('location: index.php');
}
// Delete record 

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM info WHERE id=$id");
	$_SESSION['msg'] = "Address deleted!"; 
	header('location: index.php');
}

// Retrieve recods
	$results = mysqli_query($db, "SELECT * FROM info"); ?>
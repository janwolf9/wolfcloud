<?php
	session_start();
	$username= $_SESSION['username2'];
	$db = mysqli_connect("localhost", "klinkas_sportski", "]0Z+H?93ns9~", "klinkas_sportanje");

	// initialize variables
	$name = "";
	$address = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];

		mysqli_query($db, "INSERT INTO $username (name) VALUES ('$name')");
		$_SESSION['message'] = "Datoteka shranjena";
		header('location: index.php');
	}


	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$address = $_POST['address'];

		mysqli_query($db, "UPDATE $username SET name='$name' WHERE id=$id");
		$_SESSION['message'] = "Datoteka posodobljena!";
		header('location: index.php');
	}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM $username WHERE id=$id");
	$_SESSION['message'] = "Datoteka izbrisana!";
	header('location: index.php');
}


	$results = mysqli_query($db, "SELECT * FROM $username");


?>

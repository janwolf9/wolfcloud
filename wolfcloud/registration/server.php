<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect("localhost", "klinkas_sportski", "]0Z+H?93ns9~", "klinkas_sportanje");

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  if (count($errors) == 0) {
    $results14 = mysqli_query($db, " CREATE TABLE `$username` (`id` int(11) NOT NULL, `name` varchar(255) NOT NULL, `mime` varchar(255) NOT NULL, `data` longblob NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
    if (mysqli_num_rows($results14) == 1) {
      echo "uspelo";
    }else {
      echo "ni uspelo";
    }
  }
  if (count($errors) == 0) {
    $results15 = mysqli_query($db, " ALTER TABLE `$username` ADD PRIMARY KEY (`id`);");
    if (mysqli_num_rows($results15) == 1) {
      echo "uspelo";
    }else {
      echo "ni uspelo";
    }
  }
  if (count($errors) == 0) {
    $results2 = mysqli_query($db, "ALTER TABLE `$username` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;");
    if (mysqli_num_rows($results2) == 1) {
      echo "uspelo";
    }else {
      echo "ni uspelo";
    }
  }
  if (count($errors) == 0) {
    $results3 = mysqli_query($db, "UPDATE users SET tabela = 1 WHERE username = '$username';");
    if (mysqli_num_rows($results3) == 1) {
      echo "uspelo";
      header('location: ../update/index.php');
    }else {
      echo "ni uspelo";
      header('location: ../update/index.php');
    }
  }
  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1");
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$query = "INSERT INTO users (username, email, password)
  			  VALUES('$username', '$email', '$password_1')";
  	mysqli_query($db, "INSERT INTO users (username, email, password)
  			  VALUES('$username', '$email', '$password_1')");
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: ../update/index.php');
  }
  sendmail($email, "Uspešna prijava v Wolfcloud", "Uživajte ob vseh funkcijah, ki jih nudi wolfcloud");
}
function sendmail($mail, $sub, $msg)
{
  mail($mail,$sub,$msg);
}
  if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, "SELECT * FROM users WHERE username='$username' AND password='$password'");
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: registration/index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
if (isset($_POST['change_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email2 = mysqli_real_escape_string($db, $_POST['email2']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_12']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_22']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email2)) { array_push($errors, "Email is required"); }
  if (empty($password_12)) { array_push($errors, "Password is required"); }
  if ($password_12 == $password_22) {
if (count($errors) == 0) {
  $query = "UPDATE users SET `password` = '$password_12' WHERE `email` = '$email2'";
  $results = mysqli_query($db, "UPDATE users SET password = '$password_12' WHERE email = '$email2'");
  if (mysqli_num_rows($results) == 1) {
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: registration/index.php');

}}
}
}

?>

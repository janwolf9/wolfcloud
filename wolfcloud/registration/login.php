<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Prijava</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Login</h2>
	</div>
	<form action = "" method = "post">
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>
	<?php
	   session_start();
		 $con =  mysqli_connect("localhost", "klinkas_sportski", "]0Z+H?93ns9~", "klinkas_sportanje");
	   if($_SERVER["REQUEST_METHOD"] == "POST") {
	      // username and password sent from form
				if (isset($_POST['login_user'])) {
					$myusername = mysqli_real_escape_string($con,$_POST['username']);
		      $mypassword = mysqli_real_escape_string($con,$_POST['password']);

		      $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";

					$results = mysqli_query($con, "SELECT * FROM users WHERE username='$myusername' AND password='$mypassword'");
	        if (mysqli_num_rows($results) == 1) {
	          $_SESSION['username'] = $myusername;
	          $_SESSION['success'] = "You are now logged in";
	          header('location: ../php/prva.php');
	        }else {
	          array_push($errors, "Wrong username/password combination");
	        }
				}
	   }
	?>
</body>
</html>

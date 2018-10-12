<?php
   session_start();
   $user = $_SESSION['username1'];
   echo $user;
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $password = mysqli_real_escape_string($con, $_POST['password']);
   $password2 = mysqli_real_escape_string($con, $_POST['password_2']);
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    $con =  mysqli_connect("localhost", "klinkas_sportski", "]0Z+H?93ns9~", "klinkas_sportanje");
      if (isset($_POST['change_user'])) {

         $geslo = rand(11111,999999);
       //  $username = mysqli_real_escape_string($con, $_POST['username']);
         $email = mysqli_real_escape_string($con, $_POST['email']);
         $password = mysqli_real_escape_string($con, $_POST['password']);

         if (empty($password)) {
           array_push($errors, "Password is required");
         }
         if (count($errors) == 0) {
           $query = "UPDATE users SET password = '$password' WHERE username = '$user";
           $results = mysqli_query($con, "UPDATE users SET password = '$password' WHERE username = '$user';");
           if (mysqli_num_rows($results) == 1) {
             header('location: ../index.php');
           }else {
             array_push($errors, "Wrong username/password combination");
           }

       }

  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Spreminjanje gesla</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Spremeni</h2>
  </div>

  <form action = "" method = "post">
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="change_user">Change</button>
  	</div>
  	<p>
  		Zadovoljn? <a href="../index.php">Nazaj</a>
  	</p>
  </form>
</body>
</html>

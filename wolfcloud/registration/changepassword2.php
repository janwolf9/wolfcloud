<?php
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    $con =  mysqli_connect("localhost", "klinkas_sportski", "]0Z+H?93ns9~", "klinkas_sportanje");
      if (isset($_POST['change_user'])) {
      $geslo = rand(11111,999999);
    //  $username = mysqli_real_escape_string($con, $_POST['username']);
      $email = mysqli_real_escape_string($con, $_POST['email']);

      if (empty($password)) {
        array_push($errors, "Password is required");
      }
      $msg = "Your new password is $geslo";
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= "Content-Type: text/plain;charset=utf-8 \n";
      $headers .= "From: $email\n";

      //mail($email_it_to,$subject,$email_message,$headers);
      mail($email, "Password", $msg);
      if (count($errors) == 0) {
        $query = "UPDATE users SET password = '$password' WHERE username = '$user";
        $results = mysqli_query($con, "UPDATE users SET password = '$geslo' WHERE email = '$email';");
        if (mysqli_num_rows($results) == 1) {
          header('location: ../index.php');
        }else {
          array_push($errors, "Wrong username/password combination");
        }
      }
    }
   }
   function sendmail($mail, $geslo, $msg)
   {
     mail($mail,"Password",$msg);
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
  	<h2>Pozabljeno geslo</h2>
  </div>
  <form action = "" method = "post">
    <label>Email</label>
    <input type="email" name="email" value="<?php echo $email; ?>">
  </div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="change_user">Change</button>
  	</div>
  	<p>
  		Already a member? <a href="../index.php">Sign in</a>
  	</p>
  </form>
</body>
</html>

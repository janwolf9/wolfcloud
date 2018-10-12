<?php include('server.php') ?>
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

  <form method="post" action="changepassword.php">
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email2" value="<?php echo $email2; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_12">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_22">
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

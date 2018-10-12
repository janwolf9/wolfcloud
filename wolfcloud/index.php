<?php
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    $con =  mysqli_connect("localhost", "klinkas_sportski", "]0Z+H?93ns9~", "klinkas_sportanje");
      if (isset($_POST['login_user'])) {
      $username = mysqli_real_escape_string($con, $_POST['username']);
      $password = mysqli_real_escape_string($con, $_POST['password']);
      $stevilo = 0;
      if (empty($username)) {
        array_push($errors, "Username is required");
      }
      if (empty($password)) {
        array_push($errors, "Password is required");
      }
  
      $result14 = mysqli_query($con, "SELECT * FROM users WHERE username='$username' LIMIT 1");
      $user = mysqli_fetch_assoc($result14);

      if ($user) {
        if ($user['username'] != $username) {
          echo "ni pravilno";
        }
      }
      if (count($errors) == 0) {
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($con, "SELECT * FROM users WHERE username='$username' AND password='$password'");
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username1'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: update/index.php');
        }else {
          echo "Username or Password is incorrect";
        }
      }
    }
   }
?>
<html>
   <head>
   <meta http-equiv="last-modified" content="Thu, 23 Jan 2018 14:11:42 GMT" />
	<meta charset="utf-8">
	<title>Prijava</title>
	<meta name="description" content="" >
	<meta name="author" content="Eden in edini Jan Wolf">
	<meta property="og:title" content="Wolfcloud"/>
	<meta property="og:image" content="http://klinka.si/fasenk/img/logo_285.png"/>
	<meta property="og:site_name" content="Wolfcloud"/>
	<meta property="og:description" content="Free cloud"/>

	<!-- Mobile Specific Metas
 ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 <!-- Favicons
 ================================================== -->
	<link rel="apple-touch-icon" sizes="57x57" href="content/itservice/images/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="content/itservice/images/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="content/itservice/images/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="content/itservice/images/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="content/itservice/images/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="content/itservice/images/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="content/itservice/images/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="content/itservice/images/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="content/itservice/images/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="content/itservice/images/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="content/itservice/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="content/itservice/images/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="content/itservice/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="content/itservice/images/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
         .btn {
           padding: 10px;
           font-size: 15px;
           color: white;
           background: #5F9EA0;
           border: none;
           border-radius: 5px;
         }
      </style>
   </head>
   <body bgcolor = "#FFFFFF">
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
            <div style = "margin:30px">
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <!--<input type = "submit" value = " Submit " name="login_user"/><br />-->
                  <div class="input-group">
                	  <button type="submit" class="btn" name="login_user">Prijava</button>
                	</div>
                  <h1>                         </h1>
                  <!--<input type="button" value="Register" href="registration/register.php" >-->
                  <a href="registration/register.php" target="_blank">Register</a>
                  <a href="registration/changepassword2.php" target="_blank">Pozabljeno geslo</a>
               </form>
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            </div>
        </div>
      </div>
   </body>
</html>

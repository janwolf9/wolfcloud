<?php
  session_start();

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../index.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: ../index.php");
  }
  if (isset($_GET['change'])) {
  	header("location: changepassword1.php");
  }
  $userr =  $_SESSION['username'];
  $_SESSION['username1'] = $userr;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="UTF-8">
  <link href="http://vjs.zencdn.net/6.6.3/video-js.css" rel="stylesheet">

  <!-- If you'd like to support IE8 -->
  <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
  <a href="https://www.000webhost.com/1053555.html" target="_blank"><img src="https://www.000webhost.com/images/banners/300x600/2.jpg" alt="Web hosting" width="300" height="600" border="0" /></a>
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php
          	echo $_SESSION['success'];
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
      <p> <a  href="changepassword1.php"style="color: red;">change</a> </p>
    <?php endif ?>
    <script src="http://vjs.zencdn.net/6.6.3/video.js"></script>
    <video id="my-video" class="video-js" controls preload="auto" width="850" height="530"
      poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
        <source src="../video/brat1.mp4" type='video/mp4'>
        <source src="MY_VIDEO.webm" type='video/webm'>
          <track src="en.srt" kind="subitles" srclang="en" label="English" default>
          <track src="slo1.vtt" kind="subitles" srclang="slo" label="Slovensko" default>
        <p class="vjs-no-js">
          To view this video please enable JavaScript, and consider upgrading to a web browser that
          <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
        </p>
      </video>
    <a href="https://klinka.si/slavkino/html/stan.html" target="_blank">Priki</a>
</div>

</body>
</html>

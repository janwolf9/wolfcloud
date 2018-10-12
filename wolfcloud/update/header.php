<?php
include('server.php');
$username = $_SESSION['username1'];
$_SESSION['username2'] = $username;
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../html/css/style1.css">
<table class="table1">
  <tr>
    <th class="td1"><img src="../slike/wolfcloud1.png" alt="Logo" ></th>
    <th class="td1">
         <button type="submit" name="login_user">WolfNet</button>
    </th>
    <th class="td1">Spremeni geslo</th>
    <th class="td1"><?php echo $username; ?></th>
    <th class="td1"><?php  if (isset($_SESSION['username1'])) : ?>
  	 <a href="../index.php?logout='1'" style="color: black;">logout</a>
  <?php endif ?></th>
  </tr>
<table>
</html>

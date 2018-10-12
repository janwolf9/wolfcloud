<?php
include('server.php');
$username = $_SESSION['username1'];
$_SESSION['username2'] = $username;
echo $username;
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: ../index.php");
}
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM $username WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$address = $n['address'];
		}

	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>WolfcLoud</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
	#div1 {
	    width: 350px;
	    height: 70px;
	    padding: 10px;
	    border: 1px solid #aaaaaa;
	}
	</style>
	<script>
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
}
</script>
<?php

include('header.php') ?>
</head>
<body>
	<table style="height:auto; width:auto;">
<tbody>
<tr style="height:auto;;">
<td style="width:120px; height:auto;">&nbsp;
<img src="../slike/wolfcloud1.png" alt="Logo" >
</td>
<td style="width:auto; height: auto;">&nbsp;
	<div align="right">
	 <?php  if (isset($_SESSION['username'])) : ?>
	 <a href="../index.php?logout='1'" style="color: black;">logout</a>
<?php endif ?>
</div>
</td>
</tr>
<!--<tr style="height: auto;;">-->
<td style="width:auto;; height:auto;;">&nbsp;</td>
<td style="width:1600px;; height:auto;;">&nbsp;
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>
	<?php
	$dbh = new PDO("mysql:host=localhost;dbname=klinkas_sportanje","klinkas_sportski","]0Z+H?93ns9~");
	if(isset($_POST['btn'])){
			$namee = $_FILES['myfile']['name'];
			$mime = $_FILES['myfile']['type'];
			$data = file_get_contents($_FILES['myfile']['tmp_name']);
			$stmt = $dbh->prepare("insert into $username values('',?,?,?)");
			$stmt->bindParam(1,$namee);
			$stmt->bindParam(2,$mime);
			$stmt->bindParam(3,$data, PDO::PARAM_LOB);
			$stmt->execute();
	}
	?>

	<form method="post" enctype="multipart/form-data">
			<input type="file" name="myfile"/>
			<button name="btn">Upload</button>
	</form>
<?php $results = mysqli_query($db, "SELECT * FROM $username"); ?>

<table>
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>

	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
				<td><?php echo "<li><a href='view.php?id=".$row['id']."' target='_blank'>".$row['name']."</a></li>"; ?></td>
			<!--<td><?php echo $row['name']; ?></td>-->
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
<form method="post" action="server.php" >

	<input type="hidden" name="id" value="<?php echo $id; ?>">

	<div class="input-group">
		<label>Name</label>
		<input type="text" name="name" value="<?php echo $name; ?>">
	</div>
	<div class="input-group">
		<label>Id</label>
		<input type="text" name="address" value="<?php echo $addrese?>">
	</div>
	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php endif ?>
	</div>
</form>
</td>
</tr>
</tbody>
</table>

</body>
</html>

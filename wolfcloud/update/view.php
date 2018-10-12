<?php
session_start();
 $username = $_SESSION['username2'];
$dbh = new PDO("mysql:host=localhost;dbname=klinkas_sportanje","klinkas_sportski","]0Z+H?93ns9~");
$id = isset($_GET['id'])? $_GET['id'] : "";
$stat = $dbh->prepare("select * from $username where id=?");
$stat->bindParam(1,$id);
$stat->execute();
$row = $stat->fetch();
header("Content-Type:".$row['mime']);
echo $row['data'];
//echo '<img src="data:image/jpeg;base64,'.base64_encode($row['data']).'"/>';

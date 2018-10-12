<?php
$data = json_decode(file_get_contents("php://input"));

$username = $data->username;
$email = $data->email;
$password1 = $data->password1;
$password2 = $data->password2;

mysql_connect("localhost", "klinkas_sportski", "]0Z+H?93ns9~");
mysql_select_db("klinkas_sportanje");

mysql_query("INSERT INTO users (username, email, password)
      VALUES('$username', '$email', '$password1')") or die(mysql_error());
echo $username." ".$password;
//header("Location: ../index.php");
?>

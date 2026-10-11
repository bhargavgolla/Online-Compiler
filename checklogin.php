<?php
session_start();

require_once("config.inc.php");

$con=mysqli_connect($host, $user, $pass, $db_name) or DIE('Connection to host is failed, perhaps the service is down!');

$username=mysqli_real_escape_string($con, $_POST["username"]);
$password=md5(mysqli_real_escape_string($con, $_POST["password"]));

$result=mysqli_query($con, "SELECT * FROM $tbl_name WHERE username='$username' and password='$password'");

if(mysqli_num_rows($result)==1)
{
	$_SESSION['username']=$username;
	header("Location: ./$username/");
}
else
{
	header('Location: index.php?login_attempt=1');
}

mysqli_close($con);
?>

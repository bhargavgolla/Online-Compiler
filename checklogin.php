<?php
session_start();

require_once("config.inc.php");

$con=mysql_connect($host, $user, $pass) or DIE('Connection to host is failed, perhaps the service is down!');
mysql_select_db($db_name) or DIE('Database name is not available!');

$username=mysql_real_escape_string($_POST["username"]);
$password=md5(mysql_real_escape_string($_POST["password"]));

$result=mysql_query("SELECT * FROM $tbl_name WHERE username='$username' and password='$password'");

if(mysql_num_rows($result)==1)
{
	$_SESSION['username']=$username;
	header("Location: ./$username/");
}
else
{
	header('Location: index.php?login_attempt=1');
}

mysql_close($con);
?>

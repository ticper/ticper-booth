<?php
	require('dbconfig.php');

	session_start();

	$username = $_REQUEST['user'];
	$password = $_REQUEST['pass'];

	$dblink = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

	$sql = mysqli_query($dblink, "SELECT * FROM userbooth WHERE id = '$username'");
	$result = mysqli_fetch_array($sql);

	if($result['id'] != $username or $result['password'] != $password) {
		print("<script>alert('User not found or can't match password.'); location.href = 'index.php';</script>");
	} else if ($result['userid'] == $username and $result['password'] == $password) {
		$_SESSION['user'] = $username;
		print("<script>location.href = 'home.php';</script>");
	}
?>
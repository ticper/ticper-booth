<?php
	session_start();

	$username = $_REQUEST['user'];
	$password = $_REQUEST['pass'];

	$dblink = mysqli_connect('localhost', 'ticper', 'ticp-37648', 'ticper');

	$sql = mysqli_query($dblink, "SELECT * FROM userbooth WHERE id = '$username'");
	$result = mysqli_fetch_assoc($sql);

	if($result['id'] != $username or $result['password'] != $password) {
		print("<script>alert('User not found or can't match password.'); location.href = 'index.php';</script>");
	} else if ($result['id'] == $username and $result['password'] == $password) {
		$_SESSION['user'] = $username;
		print("<script>location.href = 'home.php';</script>");
	}
?>
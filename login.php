<?php
	require_once('loader.php');

	session_start();

	$username = $_REQUEST['user'];
	$password = $_REQUEST['pass'];

	$dblink = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	if ($dblink -> connect_errno) {
		print('<h1>データベース接続確立エラー</h1><br>');
		print($mysqli -> connect_error);
		exit();
	}

	$sql = mysqli_query($dblink, "SELECT * FROM userbooth WHERE userid = '$username'");
	$result = mysqli_fetch_array($sql);

	if($result['userid'] != $username or $result['password'] != $password) {
		print('<script>alert("'.$lang_user_wrong.'"); location.href = "index.php";</script>');
	} else if ($result['userid'] == $username and $result['password'] == $password) {
		$_SESSION['user'] = $username;
		print("<script>location.href = 'home.php';</script>");
	}
?>
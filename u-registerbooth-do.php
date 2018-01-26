<?php
	$userid = $_POST['userid'];
	$name = $_POST['name'];
	$pass = $_POST['pass'];

	require_once('config/config.php');

	$sql = mysqli_query($link, "SELECT * FROM user_booth WHERE userid = '$userid'");
	$result = mysqli_fetch_assoc($sql);
	if ($result['userid'] == $userid) {
		print('<script>alert("ユーザが既に存在します。"); location.href = "u-registerbooth.php";</script>');
	} else {
		$sql = mysqli_query($link, "INSERT INTO user_booth VALUES ('$userid', '$name', '$pass')");
		print('<script>alert("登録しました。"); location.href = "u-registerbooth.php";</script>');
	}
?>
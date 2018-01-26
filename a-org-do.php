<?php
	session_start();
	if (isset($_SESSION['user_id']) == '') {
		print("<script>location.href = 'index.php';</script>");
	} else {
	}
	$name = $_POST['name'];
	$whereis = $_POST['where'];
	$password = $_POST['pass'];

	mysqli_real_escape_string($name);
	mysqli_real_escape_string($whereis);
	mysqli_real_escape_string($password);


	require_once('config/config.php');

	$user = $_SESSION['user_id'];

	if (!empty($name) AND !empty($whereis) AND !empty($password) {
		$sql = mysqli_query($link, "SELECT count(*) AS num FROM org");
		$result = mysqli_fetch_assoc($sql);
		$id = $result['num'] + 1;
		$sql = mysqli_query($link, "INSERT INTO org VALUES ('$id', '$name', '$whereis', '$password');");
		$message = "会計 - 団体「".$name."」を追加";
		$sql = mysqli_query($link, "INSERT INTO log VALUES (CURRENT_TIMESTAMP, '$message', '$user');");
		print("<script>alert('登録しました。');location.href = 'a-org.php';</script>");
	} else {
		$message = "会計 - 不正な操作(空白/XSS)";
		$sql = mysqli_query($link, "INSERT INTO log VALUES (CURRENT_TIMESTAMP, '$message', '$user');");
		print("<script>alert('不正な操作です。	');location.href = 'a-org.php';</script>");
	}

?>
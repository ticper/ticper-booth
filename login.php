<?php
	session_start();
	require_once('config/config.php');
	
	$user_id = $_POST['user_id'];
	$password = $_POST['password'];
	if(!empty($user_id) OR !empty($password)) {
		$hash = password_hash($password, PASSWORD_DEFAULT);
		$sql = mysqli_query($link, "SELECT * FROM user_booth WHERE userid = '$user_id';");
		$result = mysqli_fetch_assoc($sql);

		if ($result['userid'] == $user_id AND $result['password'] == $password) {
			$_SESSION['user_id'] = $user_id;
			print('<script>location.href="home.php";</script>');
		} else {
			print('<script>alert("入力内容が間違っています。"); location.href="index.php";</script>');
		}
	} else {
		print("<script>alert('クリスサイトスクリプティングの可能性があるため、初期ページに転移します。'; location.href='index.php';</script>");
	}
?>
<?php
	require_once('config/config.php');
	session_start();
	if (isset($_SESSION['user_id']) == '') {
		print("<script>location.href = 'index.php';</script>");
	} else {
	}
	$user = $_SESSION['user_id'];
	$org = $_POST['org'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$desc = $_POST['desc'];
	$stock = $_POST['stock'];

	$sql = mysqli_query($link, "SELECT count(*) AS num FROM food");
	$result = mysqli_fetch_assoc($sql);
	$id = $result['num'] + 1;

	if (!empty($org) AND !empty($name) AND !empty($price) AND !empty($desc) AND !empty($stock)) {
		$sql = mysqli_query($link, "SELECT count(*) AS num FROM food WHERE org = '$org'");
		$result = mysqli_fetch_assoc($sql);
		$inid = $result['num'] + 1;
		$sql = mysqli_query($link, "INSERT INTO food VALUES ('$id', '$name', '$org', '$inid', '$price', '$desc', '$stock');");
		$message = "会計 - 食品「".$name."」を追加";
		$sql = mysqli_query($link, "INSERT INTO log VALUES (CURRENT_TIMESTAMP, '$message', '$user');");
		print("<script>alert('登録しました。');location.href = 'a-food.php';</script>");
	} else {
		$message = "会計 - 不正な操作(空白/XSS)";
		$sql = mysqli_query($link, "INSERT INTO log VALUES (CURRENT_TIMESTAMP, '$message', '$user');");
		print("<script>alert('不正な操作です。	');location.href = 'a-food.php';</script>");
	}
?>
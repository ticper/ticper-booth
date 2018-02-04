<?php
	$acode = $_POST['rcode'];
	require_once('config/config.php');
	$sql = mysqli_query($link, "SELECT acode, food, used FROM tickets WHERE acode = '$acode'");
	$result = mysqli_fetch_assoc($sql);
	$food = $result['food'];
	if($result['acode'] == $acode) {
		if($result['used'] == 0) {
			$sql = mysqli_query($link, "DELETE FROM tickets WHERE acode = '$acode'");
			$sql = mysqli_query($link, "UPDATE food SET stock = stock + 1 WHERE id = '$food'");
			print('<script>alert("払い戻しを行ってください。"); location.href = "haraimodoshi.php";</script>');
		} else {
			print('<script>alert("この食券は使用済みです。"); location.href = "haraimodoshi.php";</script>');
		}
	} else {
		print('<script>alert("この食券は存在しません。"); location.href = "haraimodoshi.php";</script>');
	}
?>
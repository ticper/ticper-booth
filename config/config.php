<?php
	$db_host = "db.ticper.com";
	$db_user = "ticper2";
	$db_pswd = "ticp-37648";
	$db_name = "ticper2";

	$link = mysqli_connect($db_host, $db_user, $db_pswd, $db_name);
	mysqli_set_charset($link, "utf8");
?>

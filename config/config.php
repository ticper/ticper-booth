<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pswd = "ticp-37648";
	$db_name = "ticper";

	$link = mysqli_connect($db_host, $db_user, $db_pswd, $db_name);
	mysqli_set_charset($link, "utf8");
?>

<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pswd = "";
	$db_name = "ticper2";

	$link = mysqli_connect($db_host, $db_user, $db_pswd, $db_name);
	mysqli_set_charset($link, "utf8");
?>
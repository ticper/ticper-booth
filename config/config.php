<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pswd = "ticp-37648";
	$db_name = "ticper";

	$link = mysqli_connect($db_host, $db_user, $db_pswd, $db_name);
	mysqli_set_charset($link, "utf8");
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Config</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<p>Can't open config file.</p>
	</body>
</html>
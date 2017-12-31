<?php
  session_start();
	require_once('loader.php');

	if (isset($_SESSION['user']) == '') {
		header('<script>alert();location.href = "index.php";</script>');
	} else {}

	$username = isset($_SESSION['user']);

	$dblink = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	mysqli_set_charset($dblink, "utf8");

	$sql = mysqli_query($dblink, "SELECT name FROM userbooth WHERE userid = '$username'");
	$result = mysqli_fetch_assoc($sql);

	$_SESSION['recepid'] = isset($_POST['recepid']);

	print('<script>location.href = "t-checkout.php";</script>');
?>


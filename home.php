<?php
	session_start();
	if (isset($_SESSION['user_id']) == '') {
		print("<script>location.href = 'index.php';</script>");
	} else {
		print("<script>location.href = 'home.php';</script>");
	}
?>

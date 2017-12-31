<?php
	require_once('config/config.php');
	if ($lang = 'EN') {
		require_once('lang/lang_en.php');
	} elseif ($lang = 'JP') {
		require_once('lang/lang_jp.php');
	}
?>
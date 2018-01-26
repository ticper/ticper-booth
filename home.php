<?php
	session_start();
	if (isset($_SESSION['user_id']) == '') {
		print("<script>location.href = 'index.php';</script>");
	} else {
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		
		<meta name="robots" content="noindex,nofollow" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<meta name="description" content="食券管理Webアプリケーションツール「Ticper」" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="ログイン" />
		<meta property="og:site_name" content="Ticper" />
		<title>ホーム - Ticper</title>

		<!-- Jquery -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Materialize -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.3/css/materialize.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.3/js/materialize.min.js"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
	<body>
		<ul id="dropdown1" class="dropdown-content">
  			<li><a href="a-org.php">団体登録</a></li>
  			<li><a href="a-food.php">食品登録</a></li>
  			<li><a href="i-orgfood.php">団体・食品一覧</a></li>
  			<li class="divider"></li>
		</ul>
		<ul id="dropdown2" class="dropdown-content">
			<li><a href="u-registerorg.php">団体ユーザ登録</a></li>
			<li><a href="u-registerbooth.php">会計ユーザ登録</a></li>
		</ul>
		<nav>
			<div class="nav-wrapper blue darken-4">
				<div class="container">
					<a href="#!" class="brand-logo">Ticper</a>
					<a href="#" data-target="mobilemenu" class="sidenav-trigger"><i class="material-icons">menu</i></a>
					<ul class="right hide-on-med-and-down">
						<li><a href="r-qrcheck.php">受付</a></li>
						<li><a class="dropdown-trigger" href="#!" data-target="dropdown1">団体・食品<i class="material-icons right">arrow_drop_down</i></a></li>
						<li><a class="dropdown-trigger" href="#!" data-target="dropdown2">ユーザ<i class="material-icons right">arrow_drop_down</i></a></li>
					</ul>
					<ul class="sidenav" id="mobilemenu">
						<li><a href="r-qrcheck.php">受付</a></li>
						<li><a href="a-org.php">団体登録</a></li>
						<li><a href="a-food.php">食品登録</a></li>
						<li><a href="i-orgfood.php">団体・食品一覧</a></li>
						<li><a href="u-registerorg.php">団体ユーザ登録</a></li>
						<li><a href="u-registerbooth.php">会計ユーザ登録</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<script>
			$(document).ready(function(){
    			$('.sidenav').sidenav();
    			$(".dropdown-trigger").dropdown();
  			});
  		</script>
  		<div class="container">
  			<div class="row">
  				<div class="col s12">
  					<?php
  						$user_id = $_SESSION['user_id'];
  						require_once('config/config.php');
  						$sql = mysqli_query($link, "SELECT name FROM user_booth WHERE userid = '$user_id'");
  						$result = mysqli_fetch_assoc($sql);
  					?>
  					<h2>メニュー</h2>
  					<p>ようこそ、<?php print($result['name']); ?>さん。<br>画面上部のメニューからやりたいことを選択してください。</p>
  				</div>
  			</div>
  		</div>
 	</body>
</html>

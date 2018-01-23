<?php
	session_start();
	if(isset($_SESSION['user_id']) == '') {

	} else {
		print("<script>location.href = 'home.php';</script>");
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
		<title>ログイン - Ticper</title>

		<!-- Jquery -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Materialize -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.3/css/materialize.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.3/js/materialize.min.js"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
	<body>
		<nav>
			<div class="nav-wrapper blue darken-4">
				<div class="container">
					<a href="#!" class="brand-logo">Ticper</a>
					<a href="#" data-target="mobilemenu" class="sidenav-trigger"><i class="material-icons">menu</i></a>
					<ul class="right hide-on-med-and-down">
						<li><a href="https://org.yamabuki.ticper.com">団体用Ticper</a></li>
						<li><a href="https://yamabuki.ticper.com">顧客用Ticper</a></li>
					</ul>
					<ul class="sidenav" id="mobilemenu">
						<li><a href="https://org.yamabuki.ticper.com">団体用Ticper</a></li>
						<li><a href="https://yamabuki.ticper.com">顧客用Ticper</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<script>
			$(document).ready(function(){
    			$('.sidenav').sidenav();
  			});
  		</script>
  		<div class="container">
  			<div class="row">
  				<div class="col s12">
  					<h2>ログイン</h2>
  					<form action="login.php" method="POST">
  						<div class="input-field col m6 s12">
  							<input id="user_id" type="text" class="validate" name="user_id">
  							<label for="user_id">ユーザID</label>
  						</div>
  						<div class="input-field col m6 s12">
  							<input id="password" type="password" class="validate" name="password">
  							<label for="password">パスワード</label>
  						</div>
  						<input type="submit" class="btn">
  					</form>
  				</div>
  			</div>
  		</div>
	</body>
</html>
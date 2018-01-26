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
		<title>団体・食券一覧 - Ticper</title>

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
  					<h2>団体一覧</h2>
  					<table>
  						<tr><th>ID</th><th>団体名</th><th>場所</th></tr>
  						<?php
  							require_once('config/config.php');
  							$sql = mysqli_query($link, "SELECT * FROM org");
  							while ($result = mysqli_fetch_assoc($sql)) {
  								print("<tr><td>".$result['id']."</td><td>".$result['name']."</td><td>".$result['place']."</td></tr>");
  							}
  						?>
  					</table>
  					<br>
  					<h2>食品一覧</h2>
  					<table>
  						<?php
  							$sql = mysqli_query($link, "SELECT * FROM org");
  							while ($result = mysqli_fetch_assoc($sql)) {
  								$org = $result['id'];
  								print('<tr><th colspan="4">'.$result['name'].'</th></tr>');
  								print('<tr><th>ID</th><th>商品名</th><th>団体内ID</th><th>価格</th>');
  								$sql2 = mysqli_query($link, "SELECT id, name, inid, price FROM food WHERE org = '$org'");
  								while($result2 = mysqli_fetch_assoc($sql2)) {
  									print('<tr><td>'.$result2['id'].'</td><td>'.$result2['name'].'</td><td>'.$result2['inid'].'</td><td>'.$result2['price'].'円</td></tr>');
  								}
  								print('</table><br><table>');
  							}
  						?>
  				</div>
  			</div>
  		</div>
  	</body>
</html>
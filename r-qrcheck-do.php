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
		<title>QRチェック - Ticper</title>

		<!-- Jquery -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Materialize -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.3/css/materialize.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.3/js/materialize.min.js"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

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
  			<div class="col s12">
  				<h2>注文確認</h2>
  				<table>
  					<tr><th>団体名</th><th>食品名</th><th>価格</th><th>備考</th></tr>
  					<?php
  						$gokei = 0;
  						require_once('config/config.php');
  						$rcode = $_POST['rcode'];
  						$sql = mysqli_query($link, "SELECT * FROM reserve WHERE rcode = '$rcode'");
  						while($result = mysqli_fetch_assoc($sql)) {
  							$biko = "";
  							$food = $result['food'];
  							$sql2 = mysqli_query($link, "SELECT name, org, price, stock FROM food WHERE id = '$food'");
  							$result2 = mysqli_fetch_assoc($sql2);
  							if ($result2['stock'] = 0) {
  								$biko = "売り切れ";
  							} else {
  								$gokei = $gokei + $result2['price'];
  							}
  							$org = $result2['org'];
  							$sql2 = mysqli_query($link, "SELECT name FROM org WHERE id = '$org'");
  							$result3 = mysqli_fetch_assoc($sql2);
  							print('<tr><td>'.$result3['name'].'</td><td>'.$result2['name'].'</td><td>'.$result2['price'].'円</td><td>'.$biko.'</td></tr>');
  						}
  						print('<tr><td></td><td>合計</td><td>'.$gokei.'円</td></tr>');
  					?>
  				</table>
  			</div>
  		</div>
  	</body>
</html>

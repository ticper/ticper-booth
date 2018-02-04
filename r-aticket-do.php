<?php
	session_start();
		if (isset($_SESSION['user_id']) == '') {
		print("<script>location.href = 'index.php';</script>");
	} else {
	}
	
	$rcode = $_SESSION['rcode'];

	$azukari = $_POST['azukari'];
	$price = 0;

	require_once('config/config.php');
	$data = 0;

	$sql = mysqli_query($link, "SELECT * FROM reserve WHERE rcode = '$rcode'");
	while ($result = mysqli_fetch_assoc($sql)) {
		$rand = rand(100000, 999999);
		$food = $result['food'];
		$sql5 = mysqli_query($link, "SELECT stock FROM food WHERE id = '$food'");
		$result5 = mysqli_fetch_assoc($sql5);
		if($result5['stock'] != 0) {
			$sql2 = mysqli_query($link, "INSERT INTO tickets VALUES ('$rand', '$food', '0', '$rcode')");
			$sql3 = mysqli_query($link, "UPDATE food SET stock = stock - 1 WHERE id = '$food'");
			$sql4 = mysqli_query($link, "SELECT price FROM food WHERE id = '$food'");
			$result2 = mysqli_fetch_assoc($sql4);
			$data = $data + 1;
			$price = $price + $result2['price'];
		} else {

		}
	}
	$_SESSION['rcode'] = '';
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
						<li><a href="haraimodoshi.php">払い戻し</a></li>
						<li><a href="status.php">ステータス</a></li>
						<li><a href="logout.php">ログアウト</a></li>
					</ul>
					<ul class="sidenav" id="mobilemenu">
						<li><a href="r-qrcheck.php">受付</a></li>
						<li><a href="a-org.php">団体登録</a></li>
						<li><a href="a-food.php">食品登録</a></li>
						<li><a href="i-orgfood.php">団体・食品一覧</a></li>
						<li><a href="u-registerbooth.php">会計ユーザ登録</a></li>
						<li><a href="haraimodoshi.php">払い戻し</a></li>
						<li><a href="status.php">ステータス</a></li>
						<li><a href="logout.php">ログアウト</a></li>
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
  					<h3>チケット表示コード</h3>
  				</div>
  			</div>
  			<div class="row">
  				<div class="col m6 s12">
  					<img src="https://api.qrserver.com/v1/create-qr-code/?data=<?php print($rcode); ?>&size=300x300" alt="QRコード" />
  				</div>
  			</div>
  			<div class="col s12">
  				<h4>お釣りは、<?php print($azukari - $price); ?>円です。</h4>
  				<p>チケット表示コード<b> <?php print($rcode); ?> </b>を顧客端末に入力させるか、QRコードを読み取ってください。</p>
  			</div>
  		</div>
  	</body>
</html>
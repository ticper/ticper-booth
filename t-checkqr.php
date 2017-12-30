<?php
  session_start();
	require_once('loader.php');

	if (isset($_SESSION['user']) == '') {
		header('<script>alert();location.href = "index.php";</script>');
	} else {}

	$username = isset($_SESSION['user']);

	$dblink = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

	$sql = mysqli_query($dblink, "SELECT name FROM userbooth WHERE userid = '$username'");
	$result = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.2/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.2/js/materialize.min.js"></script>

    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php print($lang_title_qrcheck); ?></title>
  </head>
  <body>
    <nav>
  		<div class="nav-wrapper">
  			<div class="container">
  				<a href="#!" class="brand-logo">Ticper for Booth</a>
  				<ul class="right hide-on-med-and-down">
       			<li><a href="t-checkqr.php"><?php print($lang_menu_qrcheck); ?></a></li>
      			<li><a href="t-status.php"><?php print($lang_menu_status); ?></a></li>
       			<li><a href="t-rguserb.php"><?php print($lang_menu_register_booth_user); ?></a></li>
       			<li><a href="t-rgusero.php"><?php print($lang_menu_register_org_user); ?></a></li>
      			<li><a href="t-rgfood.php"><?php print($lang_menu_register_food); ?></a></li>
       			<li><a href="t-rgorg.php"><?php print($lang_menu_register_org); ?></a></li>
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
    	<p><?php print($lang_qr_please_shot); ?></p>
    	<video id="preview"></video>
     	<div class="row">
     		<form class="col s12" action="t-checkqrdo.php" method="POST">
     			<div class="row">
     				<label for="recepid"><?php print($lang_receptionid); ?></label>
     				<input id="recepid" type="text" class="validate">
     			</div>
     			<div class="row">
     				<input type="submit" class="btn">
				</div>     				
     		</form>
     	</div>

     	<script>
      		var videoTag = document.getElementById('preview');
      		var info = document.getElementById('recepid');
      		var scanner = new Instascan.Scanner({ video: videoTag });
      
      		//QRコードを認識して情報を取得する
      		scanner.addListener('scan', function (value) {
        		info.value = value;
      		});
      
      		//PCのカメラ情報を取得する
      		Instascan.Camera.getCameras()
      		.then(function (cameras) {
          
          		//カメラデバイスを取得できているかどうか？
          		if (cameras.length > 0) {
            	
            	//スキャンの開始
            	scanner.start(cameras[0]);
          	}
          	else {
            	alert('カメラを見つけることができませんでした。');
          	}
      		})
      		.catch(function(err) {
        		alert(err);
      		});
    	</script>
    </div>
  </body>
</html>
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

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php print($lang_title_menu); ?></title>
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
  	<table>
  		<thead>
  			<tr>
  				<th>食品名</th><th>QRコード</th>
  			</tr>
  		</thead>
  		<tbody>

  			<?php
  				$reserveid = $_SESSION['recepid'];
  				$sql = mysqli_query($dblink, "SELECT * FROM reserve WHERE rsid = '$reserveid'");
  				while($result = mysqli_fetch_assoc($sql)) {
  					print('<tr>');
  					print()
  				}
  			?>
  </body>
 </html>

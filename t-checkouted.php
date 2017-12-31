<?php
  session_start();
	require_once('loader.php');

	if (isset($_SESSION['user']) == '') {
		header('<script>alert();location.href = "index.php";</script>');
	} else {}

	$username = $_SESSION['user'];

	$dblink = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

	$sql = mysqli_query($dblink, "SELECT name FROM userbooth WHERE userid = '$username'");
	mysqli_set_charset($dblink, "utf8");
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
  	<div class="container">
  		<table>
  			<tbody>
  				<?php
  					$recepid = isset($_SESSION['recepid']);
  					$goukei = 0;
  					$sql = mysqli_query($dblink, "SELECT * FROM reserve WHERE rsid = '$recepid'");
  					while ($result = mysqli_fetch_assoc($sql)) {
  						$org = $result['org'];
  						$food = $result['food'];
  						$ac = rand(1000, 9999);
  						$sql2 = mysqli_query($dblink, "INSERT INTO ticket ('id', 'org', 'food', 'ac') VALUES (NULL, '$org', '$food', '$ac');");
  						$sql3 = mysqli_query($dblink, "SELECT name, price FROM food WHERE id = '$food'");
  						$result2 = mysqli_fetch_assoc($sql3);
  						$goukei = $goukei + $result2['price'];
  						print('<tr>');
  						print('<td>'.$result2['name'].'('.$ac.')</td>');
  						print('<td><img src="https://api.qrserver.com/v1/create-qr-code/?data='.$ac.'&size=200x200" alt="QRコード" />'.'</td>');
  						print('</tr>');
  					}
  				?>
  			</tbody>
  			<?php
  				print('<hr />');
  				print('<table>');
  				print('<tbody>');
  				print('<tr>');
  				print('<td>'.$lang_checkout_total.'</td><td>'.$goukei." ".$lang_money."</td>");
  				print('</tr><tr>');
  				print('<td>'.$lang_checkout_deposit.'</td><td>'.$_POST['dp']." ".$lang_money."</td>");
  				print('</tr><tr>');
  				$change = $_POST['dp'] - $goukei;
  				print('<td>'.$lang_checkout_change.'</td><td>'.$change." ".$lang_money."</td></tr>");
  				print('</tbody>');
  				print('</table>');
  			?>
  			<form>
				<input type="button" value="このページを印刷する" onclick="window.print();" class="btn" />
			</form>
  		</table>

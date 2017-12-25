<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="UTF-8">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.2/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.2/js/materialize.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン - Ticper</title>
  </head>
  <body>
  	<nav>
  		<div class="nav-wrapper">
  			<div class="container">
  				<a href="#!" class="brand-logo">Ticper for Booth</a>
  				<a href="#" data-target="mobile" class="sidenav-trigger">M</a>
  				<ul class="sidenav" id="mobile">
  					<li><a href="#">Ticper for Org</a></li>
  					<li><a href="#">Ticper fot Cust</a></li>
  				</ul>
  			</div>
  		</div>
  	</nav>
  	<script>
  		$(document).ready(function(){
    		$('.sidenav').sidenav();
  		});
  	</script>
  	<br>
  	<div class="container">
  		<div class="row">
  			<form class="col s12" action="login.php" method="GET">
  				<div class="row">
  					<div class="input-field col s6">
  						<input id="user" type="text" class="validate" name="user">
  						<label for="user">User Name</label>
  					</div>
  				</div>
  				<div class="row">
  					<div class="input-field col s6">
  						<input id="pass" type="password" class="validate" name="pass">
  						<label for="pass">Password</label>
  					</div>
  				</div>
  				<div class="row">
  					<input type="submit" class="btn">
  				</div>
  			</form>
  		</div>
  	</div>
  </body>
</html>

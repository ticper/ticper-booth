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
  </body>
</html>

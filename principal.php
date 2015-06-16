<!DOCTYPE html>
<html>

<head>
	<link href="principal.css" rel="stylesheet">
	<script src="principal.js"></script>
	<script src="../Bootstrap/dist/js/jquery-1.11.2.min.js"></script>
</head>
<header>
	<?php 
		session_start();
		if(!isset($_SESSION['id'])){
			require_once('header.html');
		}
		else{
			require_once('user_header.php');
		}
	?>
</header>

<body>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-2 col-md-5 col-lg-3">
			<div class="container-fluid" id="selector">
				<ul class="nav" id="ordenes">
					<li class="active" onclick="activar(this)"><a href="#"><i class="glyphicon glyphicon-time" style="color:inherit;"></i> Últimas subastas</a></li>
				</ul>
			</div>
		</div>
		<div class="col-sm-2 col-md-5 col-lg-9">
			<div class="container-fluid" style="background-color:white;" id="subastas">
	      		<br>
	      		<?php
		      		echo '<iframe frameborder="NO" onload="autofitIframe(this);" src="listado.php" style="width:100%"></iframe>';
		      	?>
      		</div>
		</div>
	</div>

</div>
<br>
<br>
<br>
</body>

</html>
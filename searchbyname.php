<!DOCTYPE html>
<html>

<head>
	<link href="css/principal.css" rel="stylesheet">
	<script src="js/principal.js"></script>
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

<body onload="mostrar('porNombre')">

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-2 col-md-5 col-lg-3">
			<div class="container-fluid" id="selector">
				<ul class="nav" id="ordenes">
					<li class="item" onclick="activar(this)"><a href="principal.php"><i class="glyphicon glyphicon-time" style="color:inherit;"></i> Últimas subastas</a></li>
					<h5>Órden del listado</h5>
					<li class="active" onclick="activar(this)"><a href="#" onclick="mostrar('porNombre')"><i class="glyphicon glyphicon-sort-by-alphabet" style="color:inherit;"></i> Por Nombre</a></li>
					<li class="item" onclick="activar(this)"><a href="#" onclick="mostrar('porFecha')" ><i class="glyphicon glyphicon-sort-by-attributes" style="color:inherit;"></i> Por Fecha</a></li>
					<li class="item" onclick="activar(this)"><a href="#" onclick="mostrar('porCategoria')"><i class="glyphicon glyphicon-sort-by-attributes" style="color:inherit;"></i> Por Categoría</a></li>
				</ul>
			</div>
		</div>
		<div class="col-sm-2 col-md-5 col-lg-9">
			<div class="container-fluid" style="background-color:white;" id="subastas">
	      		<br>
	      		<div id="porNombre" style="display:none">
	      			<?php
		      			echo '<iframe frameborder="NO" onload="autofitIframe(this);" style="width:100%" src="DBquery/buscar_nombre.php?busqueda='.$_REQUEST['busqueda'].'&orden=Nombre">'.'</iframe>';
		      		?>
	      		</div>
	      		<div id="porFecha" style="display:none">
	      			<?php
		      			echo '<iframe frameborder="NO" onload="autofitIframe(this);" style="width:100%" src="DBquery/buscar_nombre.php?busqueda='.$_REQUEST['busqueda'].'&orden=Fec_init">'.'</iframe>';
		      		?>
	      		</div>
	      		<div id="porCategoria" style="display:none">
	      			<?php
		      			echo '<iframe frameborder="NO" onload="autofitIframe(this);" style="width:100%" src="DBquery/buscar_nombre.php?busqueda='.$_REQUEST['busqueda'].'&orden=cate">'.'</iframe>';
		      		?>
	      		</div>
      		</div>
		</div>
	</div>

</div>
<br>
<br>
<br>
</body>

</html>
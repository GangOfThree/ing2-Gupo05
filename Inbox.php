<!DOCTYPE html>
<html>

<head>
	<link href="css/paginaMostrarSubasta.css" rel="stylesheet">
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
		<div class="col-lg-1"></div>
		<div class="col-lg-10" style="left:3%;width:95%"><!-- controlar height js -->
			<div class="container-fluid material_card" style="min-height:400px">
				<center><h1>Bandeja de Notificaciones</h1></center>
				<hr>
				<?php require_once("DBquery/listado_notificaciones.php"); ?>
			</div>
		</div>
		<div class="col-lg-1"></div>
	</div>
	<br>
	<br>
</body>
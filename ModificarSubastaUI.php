<!DOCTYPE html>
<html>

<head>
	<link href="css/paginaMostrarSubasta.css" rel="stylesheet">
	<script src="../Bootstrap/dist/js/jquery-1.11.2.min.js"></script>
	<script src="../Bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="js/user_profile.js"></script>
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
		<div class="col-lg-10" style="left:3%;width:95%">
			<div class="container-fluid material_card">
				<iframe frameborder="NO" onload="autofitIframe(this);" style="width:100%" src="paginaModificacion.php?s=<?php echo $_REQUEST['s'] ?>"></iframe>
				<br>
			</div>
		</div>
		<div class="col-lg-1"></div>
	</div>
	<br>
	<br>
</body>
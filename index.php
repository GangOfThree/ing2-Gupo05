<!DOCTYPE html>
<html>

<head>
	<!--<link href="../Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="../Bootstrap/dist/js/jquery-1.11.2.min.js"></script>
	<script src="../Bootstrap/dist/js/bootstrap.min.js"></script>
	-->
	<link href="inicio.css" rel="stylesheet">
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
	<script>
	$(document).ready(function(){
		$("#learnMore").click(function(){$('#startBG').bPopup({
				speed: 650,
				positionStyle: 'absolute',
				position: ["auto",85],
				modalColor: 'none'
			});
		});
	});
	</script>
	<script>
		$(document).ready(function(){
			$("#learnInicio").click(function(){
				$('#signInWindow').bPopup({
					speed: 650,
					transition: 'slideIn',
					transitionClose: 'slideBack',
					positionStyle: 'absolute'
				});
			});
		});
		$(document).ready(function(){
			$("#learnRegistro").click(function(){
				$('#registerWindow').bPopup({
					speed: 650,
					transition: 'slideIn',
					transitionClose: 'slideBack',
					positionStyle: 'absolute'
				});
			});
		});
	</script>
</header>

<body>
	<!--<div class="container" id="contenido">-->
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<!--<ol class="carousel-indicators">
			  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			  <li data-target="#myCarousel" data-slide-to="1"></li>
			  <li data-target="#myCarousel" data-slide-to="2"></li>
			  <li data-target="#myCarousel" data-slide-to="3"></li>
			</ol>-->

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="img/kriptonita.jpg" alt="Chania" width="100%" height="100%">
				</div>

				<div class="item">
					<img src="img/llama.jpg" alt="llama.jpg" width="100%" height="100%">
				</div>

				<div class="item">
					<img src="img/marco.jpg" alt="marco.jpg" width="100%" height="100%">
				</div>

				<div class="item">
					<img src="img/silla.jpg" alt="silla.jpg" width="100%" height="100%">
				</div>
			</div>
		<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span <!--class="glyphicon glyphicon-chevron-left"--> aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span <!--class="glyphicon glyphicon-chevron-right"--> aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<div id="maintext" class="container">
				<div class="row">
                <div class="col-md-12 text-center">
					<center><a href="principal.php"><img id="logofrente" src="logofrente.jpg" width=20%></a><center>
					
                    <h1><b>¡Bienvenido a Bestnid!<b></h1>
                    <h3>Encontrá todo lo que buscás y necesitas... </h3>
                    <center><a class="btn btn-clear btn-sm btn-min-block" id="learnMore"><h5><b>Conocé más...</b></h5></a></center>
					<!--<div class="">
                        <a class="btn btn-clear btn-sm btn-min-block">Aprender más...</a>
						<a class="btn btn-clear btn-sm btn-min-block">Iniciar sesión</a>-->
					</div>
                </div>
				</div>
        </div>
		<div id="startBG" class="container">
			<div align="center">
					<center><h1>¿Qué es Bestnid™?</h1></center>
					<h4 align="justify">Una subasta o remate es una venta organizada de un producto basado en la competencia directa, 
					es decir, aquel comprador (postor) que pague la mayor cantidad de dinero o de bienes es quien se quedará 
					con el producto en cuestión. Bestnid es considerado un remate, pero un tanto particular. En Bestnid, el bien 
					subastado no se adjudica al postor que más dinero haya ofrecido por él, sino que cada postor comunica por qué 
					necesita dicho producto, y el subastador elegirá un ganador<br> 
					Es asi como hemos logrado crear una sistema organizado sobre el cual eran posibles todas las operaciones de subasta y 
					compra de productos de una manera fácil, intuitiva y segura para usuarios de todo el mundo.</h4>
					<hr>
					<?php 
						if(!isset($_SESSION['id'])){ ?>
							<b>Registrate y empezá a disfrutar de Bestnid!</b><br><br>
							<span>
							<button class="btn btn-default redbutton" id="learnRegistro">Registro</button>
							<button class="btn btn-default redbutton" id="learnInicio">Iniciar Sesión</button></span>
					<?php } else {?>
							<img src="logofrente.jpg" class="logo" title="Bestnid" style="box-shadow: 0px 0px 40px #000000;" border=4>
					<?php } ?>
				
			</div>
		</div>
	<!--</div>-->
</body>
</html>
<!DOCTYPE html>
<html>

<head>
<title>Bestnid</title>
<meta charset="UTF-8">
<link href="../Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="../Bootstrap/dist/js/jquery-1.11.2.min.js"></script>
<script src="../Bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../Bootstrap/dist/js/jquery.bpopup.min.js"></script>
<script src="js/validacion_registro.js"></script>
<script src="js/validacion_sesion.js"></script>
<script src="js/manejoPopups.js"></script>
<link href="css/header.css" rel="stylesheet">
<script src="js/fileinput.min.js" type="text/javascript"></script>
<link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
</head>

<header>
	
<div id="header" class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			
			<a class="navbar-brand" href="principal.php">
				<img src="resources/logo.png" class="logo" title="Bestnid" border=4>
			</a>
			<!--<div class="navbar-collapse collapse">-->
				<a href="principal.php"><img src="resources/letras.png" class="letras" title="Bestnid"></a>
				<ul class="nav navbar-nav">
					<!--<li class="active"><a href="/">Home</a></li>-->
					<li class="dropdown" id="categorias"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Categorias </b><b class="caret"></b></a>
							<ul class="dropdown-menu" id="menucategorias">
								<li><a href="searchbycategory.php?busqueda=Antigüedades">Antigüedades</a></li> 
								<li><a href="searchbycategory.php?busqueda=Electrodomesticos">Electrodomesticos</a></li>
								<li><a href="searchbycategory.php?busqueda=Electronica">Electrónica</a></li>
								<li><a href="searchbycategory.php?busqueda=Inmuebles">Inmuebles</a></li>
								<li><a href="searchbycategory.php?busqueda=Juegos y juguetes">Juegos y juguetes</a></li> 
								<li><a href="searchbycategory.php?busqueda=Mueble">Muebles</a></li> 
								<li><a href="searchbycategory.php?busqueda=Musica">Música</a></li> 
								<li><a href="searchbycategory.php?busqueda=Peliculas y cine">Peliculas y cine</a></li> 
								<li><a href="searchbycategory.php?busqueda=Ropa">Ropa</a></li>
								<li><a href="searchbycategory.php?busqueda=Servicios">Servicios</a></li>
								<li><a href="searchbycategory.php?busqueda=Vehiculos">Vehículos</a></li>
								<li><a href="searchbycategory.php?busqueda=Otros">Otros...</a></li> 								
							</ul>
					</li>
					<form action="searchbyname.php" class="navbar-form navbar-right" id="busqueda">
						<div class="input-group">
							<input type="text" class="form-control" name="busqueda" size="<?php if(!isset($_SESSION)){session_start();} if($_SESSION['admin'] ==1){
																																			echo '60%';
																																		} 
																																		else{
																																			echo '70%';
																																		}?>" placeholder="Buscar...">
							<span class="input-group-btn">
								<button class="btn btn-default searchButton" type="submit" ><span class="glyphicon glyphicon-search"></button>
							</span>
						</div>
					</form>
					<?php if(!isset($_SESSION)){session_start();} if($_SESSION['admin'] ==1){?>
					<li class="dropdown" id="reportes"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-stats"></i> Reportes <b class="caret"></b></a>
						<ul class="dropdown-menu" id="menucategorias">
							<li><a href="reporteVentas.php">Reporte de ventas</a></li> 
							<li><a href="reporteUsuarios.php">Reporte de usuarios</a></li> 
						</ul>
					</li>
					<?php } ?>
					<div id="userName">
					<li id="userlink"><span><a class="ex1" href="user_profile.php"><i class="glyphicon glyphicon-user"></i>
					<?php if(!isset($_SESSION)){session_start();} echo $_SESSION['nombre'];echo " "; echo $_SESSION['apellido']; ?></a></span></li></div>
					<li id="closelink"><span><a class="ex1" href="DBquery/cerrar_sesion.php"><i class="glyphicon glyphicon-off"></i> Cerrar Sesión</a></span><li>
				</ul>
			<!--</div>-->
			
		</div>
	</div>
</div>


</header>
<body>
<a href="paginaAltaSubasta.php"><div class="materialButton" data-toggle="tooltip" data-placement="left" title="Agregar una nueva subasta!"><img src="resources/add.png" id="add"></div></a>
<div id="back" class="container"></div>
</body>
</html>
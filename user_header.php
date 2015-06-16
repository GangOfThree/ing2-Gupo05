<!DOCTYPE html>
<html>

<head>
<title>Bestnid</title>
<meta charset="UTF-8">
<link href="../Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="../Bootstrap/dist/js/jquery-1.11.2.min.js"></script>
<script src="../Bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../Bootstrap/dist/js/jquery.bpopup.min.js"></script>
<script src="validacion_registro.js"></script>
<script src="validacion_sesion.js"></script>
<script src="manejoPopups.js"></script>
<link href="header.css" rel="stylesheet">
<script src="js/fileinput.min.js" type="text/javascript"></script>
<link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
</head>

<header>
	
<div id="header" class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			
			<a class="navbar-brand" href="index.php">
				<img src="logo.png" class="logo" title="Bestnid" border=4>
			</a>
			<!--<div class="navbar-collapse collapse">-->
				<a href="index.php"><img src="letras.png" class="letras" title="Bestnid"></a>
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
							<input type="text" class="form-control" name="busqueda" size="70%" placeholder="Buscar...">
							<span class="input-group-btn">
								<button class="btn btn-default searchButton" type="submit" ><span class="glyphicon glyphicon-search"></button>
							</span>
						</div>
					</form>
					<div id="userName">
					<li id="userlink"><span><a class="ex1" href="user_profile.php"><i class="glyphicon glyphicon-user"></i>
					<?php if(!isset($_SESSION)){session_start();} echo $_SESSION['nombre'];echo " "; echo $_SESSION['apellido']; ?></a></span></li></div>
					<li id="closelink"><span><a class="ex1" href="cerrar_sesion.php"><i class="glyphicon glyphicon-off"></i> Cerrar Sesión</a></span><li>
				</ul>
			<!--</div>-->
			
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="signInBG" id="registerWindow">
		<div id="registerForm" class="container">
			<center><h2>Crear Subasta</h2></center>
			<form method="post"  action="mioPorAhora.php" enctype="multipart/form-data" ><!--action="user_alta.php"-->
			  <div class="form-group">
				<input class="form-control register" type="text" maxlength="30" name="Tit" placeholder="Titulo" tabindex="1" required>
			  </div>
			  <div class="form-group">
				<input class="form-control register" type="text" maxlenght="200" name="descripcion" placeholder="descripcion" tabindex="2" required>
			  </div> 
			  <div class"form-group" >
			 
        <?php 
               		  $fecha1 = date('Y-m-j');
					  $nuevafecha1 = strtotime ( '+30 day' , strtotime ( $fecha1 ) ) ;
					  $nuevafechaMax = date ( 'Y-m-j' , $nuevafecha1 );
					  
 
                      $fecha2 = date('Y-m-j');
					  $nuevafecha2 = strtotime ( '+15 day' , strtotime ( $fecha2 ) ) ;
					  $nuevafechaMin = date ( 'Y-m-j' , $nuevafecha2 );
 
        ?>
             	         Fecha final de la subasta:
			         <input max="2015-07-06" min="<?php echo $nuevafechaMin ?>" name="fechafin" type="date" />
                   <!--  <input type="date" name="fechafin"   <?php echo $nuevafechaMax ?>  size="10" required><br><br><br> -->
              </div>
              <div class"form-group" >
				<label> seleccione una categoria  </label>
			 	 <select name="categoria">    
    		  	           		<option value="2"> Electrodomesticos</option>
						    	<option value="3" > Electronica</option>
								<option value="4" > Inmuebles</option>
								<option value="5" > Juegos y juguetes</option>
								<option value="6" > Muebles</option>
								<option value="7" > Musica </option>
								<option value="8" > Peliculas y cine</option>
								<option value="9" > Ropa</option>
								<option value="10" > Servicios</option>
								<option value="11" > Vehiculos</option>
								<option value="1" selected="selected" >  Otros..</option>
				 </select>
				 <br></br>
			</div>
			
			  <div class="form-group">
                <label>Seleccionar imagen:</label>
                <input id="file-3" type="file" name="imagenes[]"   required>
				<script>
					$("#file-3").fileinput({
				    showCaption: false,
				    browseClass: " btn btn-default searchButton" ,
				    fileType: "any",
				    showUpload:false,
					});
				</script>
			  </div>
		      <div>
			    <center><button  class="btn btn-default searchButton" >Crear</button></center>
	          </div>
		   </form>	
	</div>
		<br>	
	</div>
</div>
</header>
<body>
<div class="materialButton" id="agregarSubasta" data-toggle="tooltip" data-placement="left" title="Agregar una nueva subasta!"><img src="add.png" id="add"></div>
<div id="back" class="container"></div>
</body>
</html>
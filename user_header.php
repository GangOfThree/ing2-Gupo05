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
<?php   include("/DBquery/DBGetCategorias");?>
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
               <?php while($cate=mysql_fetch_array($registros)){
                  ?>
                   <li><a href=<?php echo "searchbycategory.php?busqueda=".$cate['nombreCat'] ?> ><?php echo $cate['nombreCat']?></a></li>
                   <?php } ?>
                  <?php if($_SESSION['admin']==1){ ?>
                  <li class="divider"></li>
                  <li><a data-toggle="modal" href="#cat">agregar categoria</a></li>
                  <?php } ?>
											
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
							<li><a data-toggle="modal" href="#RepoVenta">Reporte de ventas</a></li> 
							<li><a data-toggle="modal" href="#r">Reporte de usuarios</a></li> 
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


<!--modal de reporte venta -->

  <div class="modal fade" id="RepoVenta" role="dialog">
    <div class="modal-dialog" id="uno">
    
      <!-- Modal content-->
      <div class="modal-content">
       	 <div class="modal-header">
        	  <button type="button" class="close" data-dismiss="modal">&times;</button>
        	  <h4 class="modal-title">Reportar Ventas</h4>
        </div>
       	 <form method="get" action="DBquery/conReporteVentas.php">
        <div class="modal-body">
           <center>
               <form method="get" action="DBquery/conReporteVentas.php">
                   <label for="fecha1"> seleccionar fecha inicio:</label>
                    <br>
                   <input id="fecha1" name="fechaini" type="date" />
                    <br><br>
                    <label for="fecha"> seleccionar fecha hasta:</label>
                    <br>
                    <input id="fecha" name="fechafin" type="date" />
                    <br>
         </div>
         <div class="modal-footer">
                <button type="submit" class="btn btn-primary">enviar</button>
                 </form>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
               </center>
                </form>
        </div>
      </div>
    </div>
  </div>
</div>





<!--agregar categoria-->


  <div class="modal fade" id="cat" role="dialog">
    <div class="modal-dialog" id="uno">
    
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar categoria</h4>
        </div>
          <form method="get" action="DBquery/altaCategoria.php">
        <div class="modal-body">
          <center>
                   <label for="incate"> Escriba un nombre de categoria:</label>
                    <br>
                   <input  name="categoria"  id="incate" />
                    <br><br>
                  </center>
         </div>
         <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Agregar</button>
                 </form>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
               </center>
                </form>
        </div>
      </div>
    </div>
  </div>
</div>




<!-- modal reporte registro -->


  <div class="modal fade" id="r" role="dialog">
    <div class="modal-dialog" >
    
      <!-- Modal content-->
      <div class="modal-content">
       	 <div class="modal-header">
        	  <button type="button" class="close" data-dismiss="modal">&times;</button>
        	  <h4 class="modal-title">Reportar Usuarios Registrados</h4>
        </div>
       	 <form method="get" action="DBquery/conRepoUsuario.php">
        <div class="modal-body">
           <center>
               <form method="get" action="DBquery/conReporteVentas.php">
                   <label for="fecha1"> seleccionar fecha inicio:</label>
                    <br>
                   <input id="fecha1" name="fechaini" type="date" />
                    <br><br>
                    <label for="fecha"> seleccionar fecha hasta:</label>
                    <br>
                    <input id="fecha" name="fechafin" type="date" />
                    <br>
         </div>
         <div class="modal-footer">
                <button type="submit" class="btn btn-primary">enviar</button>
                 </form>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
               </center>
                </form>
        </div>
      </div>
    </div>
  </div>
</div>











</header>
<body>
<a href="AltaSubastaUI.php"><div class="materialButton" data-toggle="tooltip" data-placement="left" title="Agregar una nueva subasta!"><img src="resources/add.png" id="add"></div></a>
<div id="back" class="container"></div>
</body>
</html>
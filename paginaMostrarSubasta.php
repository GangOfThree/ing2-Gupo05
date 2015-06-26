<!DOCTYPE html>
<html>

<head>
	<link href="css/paginaMostrarSubasta.css" rel="stylesheet">
	<script src="../Bootstrap/dist/js/jquery-1.11.2.min.js"></script>
	<script src="js/ofertar.js"></script>
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

<?php
$idsub=$_REQUEST['idsubasta'];

include("DBquery/DBconnect.php");
$conexion=mysql_connect($host,$user,$pw)
	or  die("Problemas en la conexion");

mysql_select_db("bestnid",$conexion) 
	or  die("Problemas en la selección de la base de datos");

$registros=mysql_query("select * from subasta inner join categoria on subasta.cate=categoria.ID_CAT  where subasta.ID_SUB=$idsub",$conexion) or
	die("Problemas en el select:".mysql_error());

$reg=mysql_fetch_array($registros); 
?>

<script>
	$(document).ready(function(){
		var screenSize=$(window).height();
    	$('#imagenProducto').height(screenSize - 310);
    	$('#infoSubasta').height(screenSize - 230);
    	$('#detalleSubasta').height(screenSize - 100);
    	$('#formularioOferta').height(screenSize - 170);
    	$('#descripcionSubasta').height(screenSize - 557);
	});

</script>
<body>
	<div class="container-fluid">
	<div class="row">

		<div class="col-lg-9">
			<div class="container-fluid material_card" id="infoSubasta">
				<div class="row">
					<!-- <div class="container-fluid"> -->
					<div class="col-lg-12">
						<h3><b><?php echo $reg['Titulo'] ?></b></h3>
						<h6 style="color:#cbcbcb; position: absolute; bottom: 0;  right:1%">publicado el <?php echo date_format(date_create($reg['Fec_init']),'d/m/Y')?></h6>
					</div>
					
					<center><div class="horizontal-line"></div></center>
					<!-- </div> -->
				</div>
				<div class="row">
					<div class="col-lg-1"></div>
					<div class="col-lg-10">
						<center><img id="imagenProducto" class="img-thumbnail" src="<?php echo $reg['Foto'] ?>"></center>
					</div>
					<div class="col-lg-1"></div>
				</div>
			</div>
			<br>
			<div class="container-fluid material_card" id="descripcionSubasta">
				<b>Descripción</b>
				<p><?php echo $reg['Descripcion'] ?></p>
				<p><b>Categoría:</b> <?php echo $reg['nombreCat'] ?></p>
			</div>
	    </div>

	    <?php if(isset($_SESSION['id']) && $_SESSION['id']!=$reg['user']){ ?>
	    <div class="col-lg-3">
				<div class="container-fluid material_card" id="detalleSubasta">
					
					<div class="container-fluid" >
						    <div class="form-area" id="form">  
						        <form method="post"  action="DBquery/altaOferta.php" >
						        <br style="clear:both">
						                    <h4 style=" text-align: center;">Ofertar</h4>
						                    <div class="horizontal-line"></div>
						                    <div id="formularioOferta" class="container" style="width:100%">
						                  	<div class="form-group">
						                      <label for="monto">Monto de la subasta:</label>
						                       <br>
						                      <input type="number" class="form-control" id="monto" name="Monto" value="1.00" placeholder="Monto" required>
						                   </div>
						           
						                    <br>
						                    <div>
						                      <input type="hidden" name="idsub" value="<?php echo $idsub ?>"> </input>
						                    </div>
						                    
						                    <div class="form-group">
						                    <label for="Motivo" color="white"> Agregar un Motivo:</label>
						                    <textarea class="form-control" style="width:100%; max-width:100%; max-height:300px" type="textarea" name="Motivo" id="Motivo" placeholder="Motivo" maxlength="300" rows="7" required></textarea>
						                        <span class="help-block"><p id="characterLeft" class="help-block "></p></span>                    
						                    </div>
								            <center>
									        <button id="botonOfertar" class="btn btn-default searchButton disabled">Enviar Oferta</button>
									        </center>
									        </div>
						        </form>
						    </div>
					</div>

				</div>
		</div>
		<?php } ?>
	</div>
	<br>
	<br>
	<div class="row">
		<div class="col-lg-12">
			<div class="container-fluid material_card transparent">
				<h1 class="text-center">Comentarios para la subasta</h1>
				<?php require_once("DBquery/comentar.php") ?>
				<hr>
				<?php require_once("DBquery/listado_preg.php") ?>
			</div>
		</div>
	</div>
	</div>
	<br>
	<br>
</body>


<?php
mysql_close($conexion);
?>


</html>
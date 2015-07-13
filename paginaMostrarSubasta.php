<!DOCTYPE html>
<html>

<head>
	<link href="css/paginaMostrarSubasta.css" rel="stylesheet">
	<script src="../Bootstrap/dist/js/jquery-1.11.2.min.js"></script>
	<script src="js/ofertar.js"></script>
	<script src="js/paginaMostrarSubasta.js"></script>
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

$conto="0";
if(isset($_SESSION['id'])){
$canto=mysql_query("select user, count(*) as cant_or 
                     from oferta
                     where  $_SESSION[id]=user",$conexion) or
	die("Problemas en el select:".mysql_error());


#ofertas de el usuario logueado con la subasta actual
$consulo=mysql_query("select *  from oferta where oferta.user=$_SESSION[id] and oferta.sub=$_REQUEST[idsubasta]",$conexion) or
	die("Problemas en el select:".mysql_error());
$tempo="basura";
while ($tmp=mysql_fetch_array($consulo))
	{
  $conto=$conto+"1";
  $tempo=$tmp['Motivo'];
}
}

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

		<?php 
        
	    if((isset($_SESSION['id']) && ($_SESSION['id']!=$reg['user']) && ($reg['Activo']==1)) || ($conto!="0")){ ?>
		<div class="col-lg-9">
		<?php } else{ ?>
		<div class="col-lg-12">
		<?php } ?>
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
        
	    <?php 
        
	    if(isset($_SESSION['id']) && ($_SESSION['id']!=$reg['user']) && ($conto=="0") && ($reg['Activo']==1)){ ?>
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
						                      <label for="monto">Monto de la subasta en $:</label>
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
		<?php } else if($conto!="0"){ 
		?><!-- detalles -->
        <div  class="col-lg-3">
            <div class="container-fluid material_card" id="idsubastaOfertada">
            	<div class="container-fluid">
                <h2>Usted ya oferto en esta subasta</h2>
                <br>
                <center>
                <button class="btn btn-danger" data-toggle="modal" data-target="#p">detalles</button>      
                </center>
                </div>
             </div>
        </div>
	<?php }?>
	</div>




	<br>
	<br>
	<div id="containerComentarios" class="row">
		<div class="col-lg-12">
			<div class="container-fluid material_card transparent">
				<h1 class="text-center">Comentarios para la subasta</h1>
				<?php if(isset($_SESSION['id']) && $_SESSION['id']!=$reg['user'] && $reg['Activo']==1){ ?>
				<?php require_once("DBquery/comentar.php") ?>
				<hr>
				<?php } ?>
				<?php require_once("DBquery/listado_preg.php") ?>
			</div>
		</div>
	</div>
	</div>
	<br>
	<br>
	<button id="viewCommentsButton" class="btn btn-default searchButton" onclick="scrollToAnchor('containerComentarios')">Ver comentarios</button>

</body>

<!--modal de detalles ofertas-->
 <div class="modal fade" id="p" role="dialog">
    <div class="modal-dialog" >
    
      <!-- Modal content-->
      <div class="modal-content">
       	 <div class="modal-header">
        	  <button type="button" class="close" data-dismiss="modal">&times;</button>
        	  <h4 class="modal-title">Detalles de la oferta enviada:</h4>
        </div>
       	  <div class="modal-body">
       	  	<label>Motivo de la subasta:</label>
           <h6><?php echo $tempo?></h>  
           
         </div>
         <div class="modal-footer">
                
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
           
        </div>
      </div>
    </div>
  </div>
</div>









<?php
mysql_close($conexion);
?>


</html>
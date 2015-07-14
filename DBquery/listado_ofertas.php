<!DOCTYPE html>
<html>

<head>
	<link href="../../Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/listado_ofertas.css" rel="stylesheet">
	<script src="../../Bootstrap/dist/js/jquery-1.11.2.min.js"></script>
	<script src="../../jquery-ui/jquery-ui.js"></script>
	<script src="../../Bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="../js/listado_ofertas.js"></script>
</head>
<body>
<?php

session_start();
include("DBconnect.php");
$conexion=mysql_connect($host,$user,$pw)  
  or  die("Problemas en la conexion");

mysql_select_db("bestnid",$conexion) 
  or  die("Problemas en la selección de la base de datos");

$subastaActual=$_REQUEST['idsubasta'];  

$registros=mysql_query("select *
						from(select ID_SUB,Titulo,Activo,Cancelado,user as vendedor from subasta where subasta.ID_SUB=$subastaActual) s 
																				inner join oferta on s.ID_SUB=oferta.sub
																				inner join usuario on oferta.user=usuario.ID_USR
						where Activo=0 and Cancelado=0 and s.vendedor=$_SESSION[id]",$conexion) or die("Problemas en el select:".mysql_error());
?>
<table class=" table table-hover table-condensed">
	<thead>
	      <tr>
	        <th class="autoFixed">Motivo</th>
	        <th></th>
	      </tr>
	</thead>
	<tbody>
	<?php
	while ($reg=mysql_fetch_array($registros))
	{
	?>
		<tr>
			<td id="reasonColumn"><p><?php echo $reg['Motivo']; ?></p></td>
			<td id="chooseColumn">
				<a class="btn btn-primary btn-xs" id="choose" data-toggle="modal" data-target="#<?php echo $reg['ID_OFE'] ?>" style="display:none; width:90%">Vender Producto</a>
			</td>
		<!-- </tr> -->
		<div class="modal fade" id="<?php echo $reg['ID_OFE'] ?>" data-backdrop="false" role="dialog">
			<div class="modal-dialog"  style="width:50%">
					
				<!-- Modal content-->
				<div class="modal-content">

						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">  Elegir ganador de subasta</h4>
						</div>

						<div class="modal-body">
							<p>¿Esta seguro de elegir esta oferta?</p>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<button type="button" class="btn btn-primary" id="confirm" onclick="return registrarVenta(<?php echo $reg['ID_OFE']; ?>)" data-dismiss="modal"
							data-toggle="modal" data-target="#<?php echo $reg['user'] ?>">Aceptar</button>
						</div>
				</div>	
			</div>
		</div>
		</tr>

		<!-- modal con mails -->
		<div class="modal fade" id="<?php echo $reg['user'] ?>" data-backdrop="false" role="dialog">
			<div class="modal-dialog"  style="width:50%">
					
				<!-- Modal content-->
				<div class="modal-content">

						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"> ¡Ganador de subasta elegido!</h4>
						</div>

						<div class="modal-body">
							<div class="material_card">
								<div class="container mailhead"> <b>Datos de contacto</b></div>
								<div class="container">
									<b>Nombre:</b> <?php echo $reg['Nombre'] ?>
									<br>
									<b>Apellido:</b> <?php echo $reg['Apellido'] ?>
									<br>
									<b>E-mail:</b> <?php echo $reg['Mail'] ?>
								</div>
							</div>
							<br>
							<div class="material_card">
								<div class="container mailhead"> <b>Detalle de la venta</b></div>
								<div class="container">
									<b>Monto Recaudado:</b> $<?php echo ($reg['Monto']-(($reg['Monto']*30)/100)) ?>
								</div>
							</div>	
							<br>
							<i>*Estos datos van a estar disponibles en tu bandeja de notificaciones, los mismos
								tambien serán enviados al correo con el cual te registraste.</i>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
						</div>
				</div>	
			</div>
		</div>
	
	<?php  
	}
	mysql_close($conexion);
	?>
	</tbody>
</table>
</body>
</html>
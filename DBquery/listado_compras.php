<!DOCTYPE html>
<html>

<head>
	<link href="css/listado_detalles.css" rel="stylesheet">
</head>
<body>
<?php

include("DBconnect.php");
$conexion=mysql_connect($host,$user,$pw)  
  or  die("Problemas en la conexion");

mysql_select_db("bestnid",$conexion) 
  or  die("Problemas en la selección de la base de datos");

$registros=mysql_query("select *
                       from venta inner join subasta on subasta.ID_SUB=venta.sub
                       			  inner join usuario on venta.user_ven=usuario.ID_USR
                       where user_comp=$_SESSION[id]",$conexion) or die("Problemas en el select:".mysql_error());
?>
<table class=" table table-hover">
	<thead>
	      <tr>
	        <th>Subasta</th>
	        <th>Fecha de adjudicación</th>
	        <th></th>
	      </tr>
	</thead>
	<tbody>
<!-- fijarse el cellspacing -->
	<?php
	while ($reg=mysql_fetch_array($registros))
	{
	?>
	
		<tr>
			<td style="width:30%">
			<a href="paginaMostrarSubasta.php?idsubasta=<?php echo $reg['ID_SUB'] ?>"><img src="<?php echo $reg['Foto']?>" style="max-width:8%"></a>
			<a href="paginaMostrarSubasta.php?idsubasta=<?php echo $reg['ID_SUB'] ?>"><?php echo $reg['Titulo']; ?></a>
			</td>
			<td><?php echo date_format(date_create($reg['Fecha']),'d/m/Y') ?></td>
			<td style="width:16%"><a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#<?php echo $reg['NRO_VEN'] ?>">Ver Detalles</a></td>
		</tr>

		<div class="modal fade" id="<?php echo $reg['NRO_VEN'] ?>" role="dialog">
				<div class="modal-dialog" style="width:50%">
					
					<div class="modal-content">
				
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"> Detalles de la subasta</h4>
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
									<b>Monto a abonar:</b> $<?php echo ($reg['Monto']+$reg['Monto_dueno']) ?>
								</div>
							</div>	
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
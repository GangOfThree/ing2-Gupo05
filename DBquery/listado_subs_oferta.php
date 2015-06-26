<!DOCTYPE html>
<html>

<head>
</head>
<body>
<?php

include("DBconnect.php");
$conexion=mysql_connect($host,$user,$pw)  
  or  die("Problemas en la conexion");

mysql_select_db("bestnid",$conexion) 
  or  die("Problemas en la selección de la base de datos");

$registros=mysql_query("select *, count(*) as cant_ofertas
                       from subasta inner join oferta on subasta.ID_SUB=oferta.sub
                       where Activo=0 and Cancelado=0 and subasta.user=$_SESSION[id] and not exists(select * from venta where subasta.ID_SUB=venta.sub)
                       group by ID_SUB",$conexion) or die("Problemas en el select:".mysql_error());
?>
<table class=" table table-hover">
	<thead>
	      <tr>
	        <th>Subasta</th>
	        <th>Fecha de vencimiento</th>
	        <th>Cantidad de ofertas</th>
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
			<td><?php echo date_format(date_create($reg['Fec_fin']),'d/m/Y') ?></td>
			<td><p><?php echo $reg['cant_ofertas']; ?></p></td>
			<td><a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#<?php echo $reg['ID_SUB'] ?>">Ver Ofertas</a></td>
		</tr>

		<div class="modal fade" id="<?php echo $reg['ID_SUB'] ?>" role="dialog">
			<div class="col-sm-1"></div>
    		<div class="col-sm-10">
				<div class="modal-dialog" style="width:100%">
				
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<div class="container-fluid">
								<div class="col-sm-1">
									<div class="row">
										<img src="<?php echo $reg['Foto']?>" class="img-thumbnail" style="max-width:90%">
									</div>
								</div>
								<div class="col-sm-10">
									<div class="row">
										<h4 class="modal-title">  <?php echo $reg['Titulo'] ?></h4>
										<h5 class="modal-title">  Ofertas</h5>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-body">
							<iframe frameborder="NO" style="height:400px;width:100%" 
							src="DBquery/listado_ofertas.php?idsubasta=<?php echo $reg['ID_SUB'] ?>"></iframe>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
					
				</div>
			</div>
			<div class="col-sm-1"></div>
		</div>
	
	<?php  
	}
	mysql_close($conexion);
	?>
	</tbody>
</table>
</body>
</html>
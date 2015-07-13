<!DOCTYPE html>

<link href="css/listado_notificaciones.css" rel="stylesheet">
<script src="js/listado_notificaciones.js"></script>

<?php 
include("DBconnect.php");
$conexion=mysql_connect($host,$user,$pw)  
  or  die("Problemas en la conexion");

mysql_select_db("bestnid",$conexion) 
  or  die("Problemas en la selección de la base de datos");

$registros=mysql_query("select *
			from notificacion
			where Destino=$_SESSION[id] and Borrado=0
			order by ID_NTF desc",$conexion) or die("Problemas en el select:".mysql_error());
?>

<body>
<?php 
if(mysql_num_rows($registros)==0) { 
	echo "<center><h4>Actualmente no posee notificaciones!</h4></center>";
}
else{
?>
<table class="table table-condensed table-hover">
<thead>
	<tr>
	  <!-- <th class="span1"><input type="checkbox"></th> -->
      <th class="span2">De:</th>
      <th class="span2"></th>
      <th class="span9">Mensaje</th>
      <th class="span2"></th>
	</tr>
  </thead>
  <tbody>
	<?php while ($reg=mysql_fetch_array($registros)){ ?>
	<tr href="#" onclick="return marcarLeido(<?php echo $reg['ID_NTF'] ?>)" data-dismiss="modal"data-toggle="modal" data-target="#<?php echo $reg['ID_NTF'] ?>" <?php if($reg['Leido']==0){echo 'style="font-weight: bold;"';}?>>

		<!-- <td><input type="checkbox"></td> -->
		<td style="width:10%"><?php echo $reg['Origen'] ?></td>
		<td class="autoFixed"><span class="label pull-right">Notificación</span></td>
		
		<td><div class="mail-text">
			<?php echo str_replace ('<b>' ,' ' , (str_replace ('<br>' ,' ' ,$reg['Mensaje'] ))); ?>
		</div></td>

		<td class="autoFixed"><?php 
		if((date_create($reg['Fecha']))==(date_create("today"))){
			echo date_format(date_create($reg['Hora']), 'g:ia');
		}
		else{
			echo date_format(date_create($reg['Fecha']),'d/m/Y');
		}

		?></td>

	</tr>

	<div class="modal fade" id="<?php echo $reg['ID_NTF'] ?>" role="dialog">
		<div class="modal-dialog"  style="width:50%">
				
			<!-- Modal content-->
			<div class="modal-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">  Mensaje</h4>
					</div>

					<div class="modal-body">
						<div class="container-fluid mail-field"><b>De: </b><?php echo $reg['Origen'] ?></div>
						<div style="height:5px"></div>
						<div class="mail-field">
							<div class="container mail-head"> Mensaje</div>
							<div class="container-fluid"><p><?php echo $reg['Mensaje'] ?></p></div>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</div>
			</div>	
		</div>
	</div>


	<?php } ?>
  </tbody>
</table>
<?php } ?>
</body>
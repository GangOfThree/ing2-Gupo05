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

$registros=mysql_query("select *
                       from usuario inner join pregunta on usuario.ID_USR=pregunta.user inner join subasta on subasta.ID_SUB=pregunta.sub
                       where eliminado=0 and usuario.ID_USR=$_SESSION[id]
                       order by Fecha",$conexion) or die("Problemas en el select:".mysql_error());
?>
<table class=" table table-hover">
	<thead>
	      <tr>
	        <th>Subasta</th>
	        <th>Comentario</th>
	        <th>Fecha</th>
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
			<td><p><?php echo $reg['Contenido']; ?></p></td>
			<td><?php echo date_format(date_create($reg['Fecha']),'d/m/Y') ?></td>
			<td><a class="btn btn-primary btn-xs" href="paginaMostrarSubasta.php?idsubasta=<?php echo $reg['ID_SUB'] ?>">Ver subasta</a></td>
		</tr>
	
	<?php  
	}
	mysql_close($conexion);
	?>
	</tbody>
</table>
</body>
</html>
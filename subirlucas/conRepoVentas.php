 <html>

<link href="../../Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/listado_subs_oferta.css" rel="stylesheet">

<head>
</head>
<body>
<?php

 session_start();
include("DBquery/DBconnect.php");
$conexion=mysql_connect($host,$user,$pw)  
  or  die("Problemas en la conexion");

mysql_select_db("bestnid",$conexion) 
  or  die("Problemas en la selección de la base de datos");

$registros=mysql_query("select *usuario where (Fecha_reg between '$_REQUEST[fechaini]' AND '$_REQUEST[fechafin]');",$conexion) or die("Problemas en el select:".mysql_error());
?>

<table class=" table table-hover">
	<thead>
	      <tr>
	        <th>Nombre y apellido</th>
	        <th>Fecha de alta</th>
	        <th>Mail</th>
	        <th>Dni</th>
	        <th>Numero de tarjeta</th>
	        <th> </th>
	      </tr>
	</thead>
	<tbody>
<!-- fijarse el cellspacing -->
	<?php
	$cantsubastas="0";
	while ($reg=mysql_fetch_array($registros))
	{
	?>
	
		<tr>
			<td style="width:30%">
			
			<?php echo $reg['Nombre']." ".$reg['Apellido']; ?>
			</td>
			<td><?php echo date_format(date_create($reg['Fecha_reg']),'d/m/Y') ?></td>
			<td><p><?php echo $reg['Mail'] ?></p></td>
			<td> <?php echo  $reg['DNI']  ?></td>
			<td> <?php echo  $reg['Nro_tarjeta'] ?></td>
			<td></td>
			<td><a class="btn btn-primary btn-xs">Ver Venta<a></td>
		</tr>
	
	<?php  
	}
	mysql_close($conexion);
	?>
	</tbody>
</table>
</body>
</html>
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

$registros=mysql_query(" select * from usuario where (usuario.Fecha_reg between '$_REQUEST[fechaini]' AND '$_REQUEST[fechafin]');",$conexion) or die("Problemas en el select:".mysql_error());
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
	{ $cantsubastas=$cantsubastas+"1";
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
	} ?>
	<tr>
      <th>Cantidad de Registros</th>
      <th>Fecha inicio del rango solicitado</th>
      <th>Fecha fin rango solicitado</th>
	</tr>
    <tr>
       <td>
          <?php echo $cantsubastas  ?>
       </td>
       <?php echo $cantsubastas['fechaini']  ?>
       <td>
       	<?php echo $_REQUEST['fechafin']  ?>
       </td>
       <td>
         <?php echo $_REQUEST['fechafin']  ?>
       </td>
    </tr>
    <?php
	mysql_close($conexion);
	?>
	</tbody>
</table>
</body>
</html>
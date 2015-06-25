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

$registros=mysql_query("select * from venta inner join subasta on venta.sub=subasta.ID_SUB inner join usuario on venta.user_comp=usuario.ID_USR where (venta.Fecha between '$_REQUEST[fechaini]' AND '$_REQUEST[fechafin]');",$conexion) or die("Problemas en el select:".mysql_error());
?>

<table class=" table table-hover">
	<thead>
	      <tr>
	        <th>Subasta</th>
	        <th>Fecha de venta</th>
	        <th>comprador</th>
	        <th>Monto</th>
	        <th>Monto a Bestnid</th>
	        <th> </th>
	      </tr>
	</thead>
	<tbody>
<!-- fijarse el cellspacing -->
	<?php
	$montototal="0";
	$montobestnid="0";
	$cantventas="0";
	while ($reg=mysql_fetch_array($registros))
	{
	?>
	    
		<tr>
			<td style="width:30%">
			<img src="<?php echo $reg['Foto']?>" style="max-width:8%">
			<?php echo $reg['Titulo']; ?>
			</td>
			<td><?php echo date_format(date_create($reg['Fecha']),'d/m/Y') ?></td>
			<td><p><?php echo $reg['Nombre']." ".$reg['Apellido'] ?></p></td>
			<td>$ <?php echo  $reg['Monto']  ?></td>
			<td>$ <?php echo  $reg['Monto_dueno'] ?></td>
			<td></td>
			
		</tr>
	
	<?php 
	$montototal= $montototal + $reg['Monto'];
	$montobestnid=$montobestnid + $reg['Monto_dueno'];
	$cantventas=$cantventas + "1";
	}?>
	<tr>
      <th>Cantidad de ventas Registradas</th>
      <th>Fecha inicio del rango solicitado</th>
      <th>Fecha fin rango solicitado</th>
      <th>Monto total ventas</th>
      <th>Monto total para bestnid</th>
	</tr>
    <tr>
       <td>
          <?php echo $cantventas ?>
       </td>
        <td>
       	<?php echo $_REQUEST['fechaini']  ?>
       </td>
       <td>
         <?php echo $_REQUEST['fechafin']  ?>
       </td>
       <td>$
         <?php echo $montototal; ?>
       </td>
       <td>$
        <?php echo $montobestnid;?>
       </td>
    </tr>
    <?php
	mysql_close($conexion);
	?>
	</tbody>
</table>
</body>
</html>
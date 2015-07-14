<?php

session_start();
include("DBconnect.php");
$conexion=mysql_connect($host,$user,$pw) 
  or die("Problemas en la conexion");
  
mysql_select_db("bestnid",$conexion) or
  die("Problemas en la seleccion de la base de datos");

$ofertaActual=$_REQUEST['idoferta'];

$registros=mysql_query("select * 
			 from (select user as comprador,Motivo,Monto,sub from oferta where oferta.ID_OFE=$ofertaActual) o inner join subasta on o.sub=subasta.ID_SUB
			 where Activo=0 and Cancelado=0 and subasta.user=$_SESSION[id]",
			 $conexion) or die("Problemas en el select".mysql_error());

$reg=mysql_fetch_array($registros);


$montoRecaudado=($reg['Monto'] * 30) / 100;
$monto=$reg['Monto'] - $montoRecaudado;


mysql_query("INSERT INTO venta(Fecha,Motivo,Monto,Monto_dueno,sub,user_ven,user_comp) VALUES
   ( CURDATE(),'$reg[Motivo]','$monto','$montoRecaudado','$reg[sub]','$reg[user]','$reg[comprador]')", 
   $conexion) or die("Problemas en el select".mysql_error());
mysql_close($conexion);
echo 0;

?>
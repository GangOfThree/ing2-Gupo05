<?php

session_start();
include("DBconnect.php");
$conexion=mysql_connect($host,$user,$pw) 
  or die("Problemas en la conexion");
  
mysql_select_db("bestnid",$conexion) or
  die("Problemas en la seleccion de la base de datos");

$ofertaActual=$_REQUEST['idoferta'];

$registros=mysql_query("select * 
			 from oferta inner join subasta on oferta.sub=subasta.ID_SUB
			 			inner join usuario on oferta.user=usuario.ID_USR
			 where subasta.user=$_SESSION[id] and oferta.ID_OFE=$ofertaActual", $conexion) or die("Problemas en el select".mysql_error());

$reg=mysql_fetch_array($registros);

$mensajeVendedor='Elegiste el ganador para tu subasta:"'.$reg['Titulo'].'"'.
				 '<br>'.
				 '<u><b>Datos del ganador</b></u>'.
				 '<br>'.
				 '<b>Nombre: </b>'.$reg['Nombre'].
				 '<br>'.
				 '<b>Apellido: </b>'.$reg['Apellido'].
				 '<br>'.
				 '<b>E-mail: </b>'.$reg['Mail'].
				 '<br>'.
				 '<u><b>Datos de la subasta</b></u>'.
				 '<br>'.
				 '<b>Monto recaudado: </b>$'.$reg['Monto'];

$mensajeComprador='Ganaste la subasta:"'.$reg['Titulo'].'"'.
				 '<br>'.
				 '<u><b>Datos del vendedor</b></u>'.
				 '<br>'.
				 '<b>Nombre: </b>'.$_SESSION['nombre'].
				 '<br>'.
				 '<b>Apellido: </b>'.$_SESSION['apellido'].
				 '<br>'.
				 '<b>E-mail: </b>'.$_SESSION['mail'].
				 '<br>'.
				 '<u><b>Datos de la subasta</b></u>'.
				 '<br>'.
				 '<b>Monto a abonar: </b>$'.$reg['Monto'];


mysql_query("INSERT INTO notificacion(Origen,Destino,Fecha,Hora,Mensaje) VALUES
   ( 'Bestnid','$_SESSION[id]',CURDATE(),CURTIME(),'$mensajeVendedor')", $conexion) or die("Problemas en el select".mysql_error());
mysql_query("INSERT INTO notificacion(Origen,Destino,Fecha,Hora,Mensaje) VALUES
   ( 'Bestnid','$reg[ID_USR]',CURDATE(),CURTIME(),'$mensajeComprador')", $conexion) or die("Problemas en el select".mysql_error());
mysql_close($conexion);

?>
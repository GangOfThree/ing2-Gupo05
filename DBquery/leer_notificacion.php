<?php 
	$idntf=$_REQUEST['idnotificacion'];
    include("DBconnect.php");
	$conexion=mysql_connect($host,$user,$pw) 
      or  die("Problemas en la conexion");
      mysql_select_db("bestnid",$conexion) 
       or  die("Problemas en la selección de la base de datos");
       
	$registros=mysql_query("UPDATE notificacion SET Leido=1 where ID_NTF= $idntf and Leido=0",$conexion) 
	or die("Problemas en el select:".mysql_error());

	echo mysql_affected_rows();
mysql_close($conexion);
?>
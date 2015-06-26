<?php

$ID=$_REQUEST['p'];
include("DBconnect.php");
$conexion=mysql_connect($host,$user,$pw)
or die("Problemas en la conexion");
mysql_select_db("bestnid",$conexion)
or die("Problemas en la seleccion de la base de datos");

mysql_query("UPDATE pregunta SET eliminado=1 where ID_PREG=$ID", $conexion)
or die("Problemas en el update:".mysql_error());

$reg=mysql_query("select *
			from pregunta 
			where pregunta.ID_PREG=$ID", $conexion)
or die("Problemas en el select:".mysql_error());
$reg=mysql_fetch_array($reg);

//$message = "Se elimino su comentario, click en aceptar para volver a los comentarios";
//echo "<script>";
//echo "if(confirm('$message'));"
header('Location: ../paginaMostrarSubasta.php?idsubasta='.$reg['sub']);
mysql_close($conexion);
?>
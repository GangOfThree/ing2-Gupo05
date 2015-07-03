<?php
include("DBconnect.php");
$conexion=mysql_connect($host,$user,$pw)
	or  die("Problemas en la conexion");

mysql_select_db("bestnid",$conexion) 
	or  die("Problemas en la selección de la base de datos");


mysql_query("INSERT INTO categoria(nombreCat) VALUES
   ('$_REQUEST[categoria]')", 
   $conexion) or die("Problemas en el select".mysql_error());
mysql_close($conexion);
echo "<script>";
  
echo 'window.location = "../principal.php"';
echo "</script>";
?>
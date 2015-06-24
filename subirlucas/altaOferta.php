<?php

include("DBconnect.php");
session_start();
$conexion=mysql_connect($host,$user,$pw)
  or die("Problemas en la conexion");
mysql_select_db("bestnid",$conexion) or
  die("Problemas en la seleccion de la base de datos");

mysql_query("INSERT INTO oferta(Motivo,Monto,sub,user) VALUES
   ('$_REQUEST[Motivo]','$_REQUEST[Monto]','$_REQUEST[idsub]','$_SESSION[id]')", 
   $conexion) or die("Problemas en el select".mysql_error());
mysql_close($conexion);


$mensaje = " oferta enviada!";


echo "<script>";
echo "alert('$mensaje');";  
echo 'window.location = "../paginaMostrarSubasta.php?idsubasta='.$_REQUEST['idsub'].'"';
echo "</script>";
?>
?>
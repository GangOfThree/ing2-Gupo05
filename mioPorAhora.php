<?php


$host = "localhost";
$user = "root";
$pw = "lucas";
$db = "bestnid";

$directory="img/";
 $nombreArchivo=$_FILES['imagenes']['name'][0];
 $nombreTemporal=$_FILES['imagenes']['tmp_name'][0];
 $ruta=$directory.$nombreArchivo;
 move_uploaded_file($nombreTemporal,$ruta);

$conexion=mysql_connect($host,$user,$pw) 
  or die("Problemas en la conexion");
  
mysql_select_db("bestnid",$conexion) or
  die("Problemas en la seleccion de la base de datos");
mysql_query("INSERT INTO subasta(Titulo,descripcion,cate,Fec_init,Fec_fin,Foto) VALUES
   ('$_REQUEST[Tit]','$_REQUEST[descripcion]','$_REQUEST[categoria]',CURDATE(),'$_REQUEST[fechafin]','$ruta')", 
   $conexion) or die("Problemas en el select".mysql_error());
mysql_close($conexion);


?>

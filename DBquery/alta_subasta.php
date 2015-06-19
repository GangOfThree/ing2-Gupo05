<?php

session_start();
$host = "localhost";
$user = "root";
$pw = "christian";
$db = "bestnid";

$directory="img/";
 $nombreArchivo=$_FILES['imagenes']['name'][0];
 $nombreTemporal=$_FILES['imagenes']['tmp_name'][0];
 $ruta=$directory.$nombreArchivo;
 $rutaServer="../".$ruta;
 move_uploaded_file($nombreTemporal,$rutaServer);

$conexion=mysql_connect($host,$user,$pw) 
  or die("Problemas en la conexion");
  
mysql_select_db("bestnid",$conexion) or
  die("Problemas en la seleccion de la base de datos");
mysql_query("INSERT INTO subasta(Titulo,descripcion,cate,Fec_init,Fec_fin,Foto,user) VALUES
   ('$_REQUEST[Tit]','$_REQUEST[descripcion]','$_REQUEST[categoria]',CURDATE(),'$_REQUEST[fechafin]','$ruta','$_SESSION[id]')", 
   $conexion) or die("Problemas en el select".mysql_error());
mysql_close($conexion);
header ("Location: ../principal.php");
echo "<script>";
echo "alert('Se agrego la subasta correctamente!'));";  
echo "</script>"; 
?>

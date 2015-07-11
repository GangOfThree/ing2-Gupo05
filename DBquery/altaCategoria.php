<?php
include("DBconnect.php");
$conexion=mysql_connect($host,$user,$pw)
	or  die("Problemas en la conexion");

mysql_select_db("bestnid",$conexion) 
	or  die("Problemas en la selección de la base de datos");



$total=mysql_num_rows((mysql_query("select * from categoria where nombreCat='$_REQUEST[categoria]' and activa=1",$conexion)));
if($total==0){
   mysql_query("INSERT INTO categoria(nombreCat) VALUES
   ('$_REQUEST[categoria]')", 
   $conexion) or die("Problemas en el select".mysql_error());

$mensaje = "categoria dada de alta exitosamente";
echo "<script>";
echo "if(confirm('$mensaje'));";  
echo "window.location = '../paginaAdmCategorias.php';";
// modificar vuelta
echo "</script>";

}else{
 $mensaje="la categoria que usted intento dar de alta ya extiste";
 echo "<script>";
echo "if(confirm('$mensaje'));";  
echo "window.location = '../paginaAdmCategorias.php';";
// modificar vuelta
echo "</script>";
}
?>
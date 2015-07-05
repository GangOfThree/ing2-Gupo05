<?php 
if(isset($_REQUEST['cate'])){
  include("DBconnect.php");
	$conexion=mysql_connect($host,$user,$pw) 
      or  die("Problemas en la conexion");
      mysql_select_db("bestnid",$conexion) 
       or  die("Problemas en la selección de la base de datos");
       
    


$categoriasArreglo=$_REQUEST['cate'];
$cant= count($categoriasArreglo);
for ($i=0; $i < $cant; $i++) { 
  $registros=mysql_query("UPDATE categoria SET activa=0 where ID_CAT = $categoriasArreglo[$i] ",$conexion) or
  die("Problemas en el select:".mysql_error());
     
   }
mysql_close($conexion);
$mensaje = "categorias borradas";
echo "<script>";
echo "if(confirm('$mensaje'));";  
echo "window.location = '../paginaAdmCategorias.php';";
// modificar vuelta
echo "</script>";

}else{
 $mensaje="no ha seleccionado categoria para borrar";
 echo "<script>";
echo "if(confirm('$mensaje'));";  
echo "window.location = '../paginaAdmCategorias.php';";
// modificar vuelta
echo "</script>";
}
?>
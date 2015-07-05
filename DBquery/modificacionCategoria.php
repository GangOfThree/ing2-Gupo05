<?php 

  include("DBconnect.php");
	$conexion=mysql_connect($host,$user,$pw) 
      or  die("Problemas en la conexion");
      mysql_select_db("bestnid",$conexion) 
       or  die("Problemas en la selección de la base de datos");
       
    
$registros=mysql_query("select ID_CAT from categoria where activa=1",$conexion)or die("Problemas en el select:".mysql_error());

$categoriasArreglo=$_REQUEST['cate'];
$cant= count($categoriasArreglo);

$i=0;
while($cate=mysql_fetch_array($registros)){
 
 $regi=mysql_query("UPDATE categoria SET nombreCat='$categoriasArreglo[$i]' where ID_CAT = $cate[ID_CAT] ",$conexion) or
  die("Problemas en el select:".mysql_error());
$i=$i+1;


}

mysql_close($conexion);

$mensaje = "Modificacion exitosa!";
echo "<script>";
echo "alert('$mensaje');";  
echo 'window.top.location.href = "../paginaAdmCategorias.php";';
echo "</script>";


?>
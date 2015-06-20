<?php 
	$ID=$_REQUEST['s'];
	$algo=(int)$ID;
    include("DBconnect.php");
	$conexion=mysql_connect($host,$user,$pw) 
      or  die("Problemas en la conexion");
      mysql_select_db("bestnid",$conexion) 
       or  die("Problemas en la selección de la base de datos");
       
       $registros=mysql_query("UPDATE subasta SET Activo=0 where ID_SUB= $algo ",$conexion) or
  die("Problemas en el select:".mysql_error());
     echo "";

mysql_close($conexion);

$mensaje = "subasta cancelada, click en aceptar para volver a ver el listado";
echo "<script>";
echo "if(confirm('$mensaje'));";  
echo "window.location = 'listado_user.php';";
// modificar vuelta
echo "</script>";


?>
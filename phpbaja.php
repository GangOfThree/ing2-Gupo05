<?php 
	$ID=$_REQUEST['s'];
	$algo=(int)$ID;
     $conexion=mysql_connect("localhost","root","lucas") 
      or  die("Problemas en la conexion");
      mysql_select_db("bestnid",$conexion) 
       or  die("Problemas en la selección de la base de datos");
       
       $registros=mysql_query("UPDATE subasta SET Activo=0 where ID_SUB= $algo ",$conexion) or
  die("Problemas en el select:".mysql_error());
     echo "";

mysql_close($conexion);

    

?>
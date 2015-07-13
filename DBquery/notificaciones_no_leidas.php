<?php


session_start();
include("DBconnect.php");
$conexion=mysql_connect($host,$user,$pw)  
  or die("Problemas en la conexion");
mysql_select_db("bestnid",$conexion) or
  die("Problemas en la seleccion de la base de datos");

$noLeidos=mysql_num_rows(mysql_query("SELECT * FROM notificacion WHERE Destino='$_SESSION[id]' and Leido=0",$conexion));
if($noLeidos==0){
	$noLeidos='';
}
echo $noLeidos;

?>
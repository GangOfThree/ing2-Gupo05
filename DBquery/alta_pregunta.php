<?php

if ($_REQUEST['pregunta']!= ""){
session_start();
$idsub=$_REQUEST['idsubasta'];
$contenido=$_REQUEST['pregunta'];
$usuario=$_SESSION['id'];

include("DBconnect.php");

$conexion=mysql_connect($host,$user,$pw)
or die("Problemas en la conexion");

mysql_select_db("bestnid",$conexion) 
or die("Problemas en la seleccion de la base de datos");

mysql_query("INSERT INTO `pregunta` (`ID_PREG`, `Contenido`, `Fecha`, `user`, `sub`, `respuesta`, `eliminado`) VALUES (NULL, '$contenido', CURRENT_DATE(), '$usuario', '$idsub', NULL, '0')");

} else{
	// Aca va mensaje "Ingrese una pregunta en donde dice 'Ingrese su pregunta...' antes de hacer clic en 'Publicar pregunta' para que se guarde su pregunta en esta subasta"
	// Y de paso el redireccionamiento o alguna otra cosa
}




?>
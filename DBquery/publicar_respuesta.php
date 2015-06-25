<?php

if($_REQUEST['respuesta']!= ""){
session_start();
include("DBconnect.php");
$idsub=$_REQUEST['idsubasta'];
$contenido=$_REQUEST['respuesta'];
$idpreg=$_REQUEST['idpreg'];
$usuario=$_SESSION['id'];

$conexion=mysql_connect($host,$user,$pw)
or die("Problemas en la conexion");

mysql_select_db("bestnid",$conexion)
or die("Problemas en la seleccion de la base de datos");

$resultado=mysql_query("SHOW TABLE STATUS LIKE 'pregunta'");
$fila=mysql_fetch_array($resultado);
$idrespuesta=$fila['Auto_increment'];

mysql_query("UPDATE pregunta SET respuesta=$idrespuesta where ID_PREG=$idpreg");

mysql_query("INSERT INTO `pregunta` (`ID_PREG`, `Contenido`, `Fecha`, `user`, `sub`, `respuesta`, `eliminado`) VALUES (NULL, '$contenido', CURRENT_DATE(), '$usuario', '$idsub', NULL, '0')");

} else{
	// Mensaje de "Ingrese una respuesta donde dice 'Responder esta pregunta...' antes de hacer clic en el boton 'Responder'" mas redireccionamiento
}

?>
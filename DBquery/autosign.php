<?php


include("DBconnect.php");


$conexion=mysql_connect($host,$user,$pw) 
  or die("Problemas en la conexion");
mysql_select_db("bestnid",$conexion) or
  die("Problemas en la seleccion de la base de datos");

$registros=mysql_query("SELECT * FROM usuario WHERE Mail='$_REQUEST[email]'",$conexion);

$reg=mysql_fetch_array($registros);
session_start();
$_SESSION['id']=$reg['ID_USR'];
$_SESSION['nombre']=$reg['Nombre'];
$_SESSION['apellido']=$reg['Apellido'];
$_SESSION['dni']=$reg['DNI'];
$_SESSION['tarjeta']=$reg['Nro_tarjeta'];
$_SESSION['mail']=$reg['Mail'];
$_SESSION['password']=$reg['Password'];
$_SESSION['admin']=$reg['Admin'];
$_SESSION['userActivo']=$reg['userActivo'];

header('Location: ../principal.php');
mysql_close($conexion);
?>
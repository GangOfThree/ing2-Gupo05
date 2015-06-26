<?php
include("DBconnect.php");
$conexion=mysql_connect($host,$user,$pw)  
  or die("Problemas en la conexion");
mysql_select_db("bestnid",$conexion) or
  die("Problemas en la seleccion de la base de datos");

$registros=mysql_query("SELECT * FROM usuario WHERE Mail='$_REQUEST[email]'",$conexion);
$total=mysql_num_rows($registros);
if($total==0){
	echo 1;
}
else{
	$reg=mysql_fetch_array($registros);
	if($_REQUEST['password'] == $reg['Password']){
		session_start();
		$_SESSION['id']=$reg['ID_USR'];
		$_SESSION['nombre']=$reg['Nombre'];
		$_SESSION['apellido']=$reg['Apellido'];
		$_SESSION['dni']=$reg['DNI'];
		$_SESSION['tarjeta']=$reg['Nro_tarjeta'];
		$_SESSION['mail']=$reg['Mail'];
		$_SESSION['password']=$reg['Password'];
		$_SESSION['admin']=$reg['Admin'];
		echo 0;
	}
	else{
		echo 2;
	}
}
mysql_close($conexion);
?>
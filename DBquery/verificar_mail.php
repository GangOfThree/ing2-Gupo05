<?php
	$mail=$_REQUEST['usuarioMail'];
	include("DBconnect.php");
	$conexion=mysql_connect($host,$user,$pw)
	or die("Problemas en la conexion");

	mysql_select_db("bestnid",$conexion)
	or die("Problemas en la seleccion de la base de datos");

	$registros=mysql_query("select Mail from usuario where Mail='$_REQUEST[usuarioMail]'")
	or die("Problemas en el select:".mysql_error());

	$reg=mysql_fetch_array($registros);
	if(isset($reg['mail'])){
		echo "Se ha enviado una contraseña temporal a su mail que expirara en 24 horas";
	}
	else{ 
		echo "Este mail no existe";
	}
?>
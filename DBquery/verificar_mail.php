<?php
	$userMail=$_REQUEST['usuarioMail'];
	include("DBconnect.php");
	$conexion=mysql_connect($host,$user,$pw)
	or die("Problemas en la conexion");

	mysql_select_db("bestnid",$conexion)
	or die("Problemas en la seleccion de la base de datos");

	$registros=mysql_query("select Mail from usuario where Mail='$userMail'")
	or die("Problemas en el select:".mysql_error());

	$total=mysql_num_rows($registros);
	if($total==0){
		echo 0;
	}
	else{
		echo 1;
	}
?>
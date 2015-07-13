<?php
    include("DBconnect.php");
	$conexion=mysql_connect($host,$user,$pw) 
      or  die("Problemas en la conexion");
	mysql_select_db("bestnid",$conexion) 
       or  die("Problemas en la selección de la base de datos");
	session_start();

	mysql_query("UPDATE usuario 
				SET userActivo=1 
				where ID_USR=$_SESSION[id]",$conexion);
	$_SESSION['userActivo']=1;
?>
<?php
    include("DBconnect.php");
	$conexion=mysql_connect($host,$user,$pw) 
      or  die("Problemas en la conexion");
	mysql_select_db("bestnid",$conexion) 
       or  die("Problemas en la selección de la base de datos");
	session_start();
    

	$_SESSION[$_REQUEST['tipo']]=$_REQUEST['valor'];
	mysql_query("UPDATE usuario 
				 SET Nombre='$_SESSION[nombre]', Apellido='$_SESSION[apellido]', DNI='$_SESSION[dni]', Nro_tarjeta='$_SESSION[tarjeta]', Mail='$_SESSION[mail]', Password='$_SESSION[password]' 
				 where ID_USR=$_SESSION[id]",$conexion) 
	or die("Problemas en el select:".mysql_error());
	echo $_SESSION['nombre'].' '.$_SESSION['apellido'];
?>
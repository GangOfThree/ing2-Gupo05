<?php
    include("DBconnect.php");
	$conexion=mysql_connect($host,$user,$pw) 
      or  die("Problemas en la conexion");
	mysql_select_db("bestnid",$conexion) 
       or  die("Problemas en la selección de la base de datos");
	session_start();

	$total=mysql_num_rows((mysql_query("select * 
									   from usuario inner join subasta on ID_USR=user
							           where subasta.Activo=1 and ID_USR='$_SESSION[id]'",$conexion)));
	if($total==0){
		echo $_SESSION['password'];
	}
	else{
		echo 0;
	}
?>
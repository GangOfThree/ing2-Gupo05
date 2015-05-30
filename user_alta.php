<?php
$conexion=mysql_connect("localhost","root","christian") 
  or die("Problemas en la conexion");
mysql_select_db("bestnid",$conexion) or
  die("Problemas en la seleccion de la base de datos");


$total=mysql_num_rows((mysql_query("SELECT * FROM usuario WHERE Mail='$_REQUEST[email]'",$conexion)));
if($total==0){
	mysql_query("INSERT INTO usuario(DNI,Nombre,Apellido,Fecha_reg,Mail,Password,Nro_tarjeta) 
	VALUES ('$_REQUEST[dni]','$_REQUEST[nombre]','$_REQUEST[apellido]',CURDATE(),'$_REQUEST[email]','$_REQUEST[password]','$_REQUEST[tarjeta]')", $conexion) 
	or die("Problemas en el select".mysql_error());
	echo 0;
}
else{
	echo 1;
}
mysql_close($conexion);
?>                                                                                                                                                         
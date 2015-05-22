<html>

<link href="../Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<head>
</head>
<body>
<?php
$conexion=mysql_connect("localhost","root","christian") 
  or die("Problemas en la conexion");
mysql_select_db("bestnid",$conexion) or
  die("Problemas en la seleccion de la base de datos");
mysql_query("insert into usuario(DNI,Nom_ape,Fecha_reg,Mail,Password,Nro_tarjeta) values 
   ('$_REQUEST[dni]','$_REQUEST[nombreyapellido]',CURDATE(),'$_REQUEST[email]','$_REQUEST[password]','$_REQUEST[tarjeta]')", 
   $conexion) or die("Problemas en el select".mysql_error());
mysql_close($conexion);
echo "El usuario fue dado de alta.";
?>
<br>
<br>
<a href="inicio.php"><button class="btn btn-default">Regresar</button></a> 
</body>
</html>
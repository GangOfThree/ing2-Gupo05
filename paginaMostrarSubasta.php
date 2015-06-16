<?php
$idsub=$_REQUEST['idsubasta'];
$conexion=mysql_connect("localhost","root","christian") 
  or  die("Problemas en la conexion");

mysql_select_db("bestnid",$conexion) 
  or  die("Problemas en la selección de la base de datos");

$registros=mysql_query("select * from subasta  where subasta.ID_SUB=$idsub",$conexion) or
  die("Problemas en el select:".mysql_error());
  
?>
<html>

<head>

<link href="../Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="buscar.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="pagmod.css">
</head>
<body>
   <div>
      <center>
     <?php 	
     
      ?>

<table border="1">

<tr>
<?php        while ($reg=mysql_fetch_array($registros)) {
    

  ?>
    <div id="caja" align="center">
                  <br>
    			  <center> <img  class="img-thumbnail" id="imagen" src="<?php echo $reg['Foto'] ?>" alt="img1"width="70" height="70"> </center>
                  <center>   <h1 class="text-danger"><?php echo $reg['Titulo'] ?></h1> </center>
                   <center>   <h3 class="text-info"><?php echo $reg['Descripcion'] ?> </h3></center>
                  <center> <h5 class="text-info" >Fecha inicio:<?php  echo $reg['Fec_init'] ?> Fecha fin:<?php  echo $reg['Fec_fin'] ?></h5>  </center>
                  <center><h3 class="text-info"> Categoria: <?php echo $reg['cate'] ?>  </h3></center>
  
   </div>
</table>
</center>
</body>


<?php
}
mysql_close($conexion);
?>


</html>
<?php
$idsub=$_REQUEST['idsubasta'];

$conexion=mysql_connect("localhost","root","lucas") 
  or  die("Problemas en la conexion");

mysql_select_db("bestnid",$conexion) 
  or  die("Problemas en la selección de la base de datos");

$registros=mysql_query("select * from subasta  where subasta.ID_SUB=$idsub",$conexion) or
  die("Problemas en el select:".mysql_error());
  
?>
<html>

<head>
<script src="ofertar.js"></script>
<script src="../Bootstrap/dist/js/jquery-1.11.2.min.js"></script>
<link href="../Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="ofertar.css">
<link href="css/buscar.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/pagmod.css">
<script src="js/manejoPopups.js"></script>
<script type="text/javascript">

$(document).ready(function()){
 $("#mostrar").click(function(){$("").fadeIn(1000););

 }

}

</script>
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
  
  



<div class="container" >
<div class="col-md-5">
    <div class="form-area" id="form">  
        <form method="post"  action="DBquery/altaOferta.php" >
        <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Ofertar</h3>
                  <div class="form-group">
                      <label for="monto">Monto de la subasta:</label>
                       <br>
                      <input type="text" class="form-control" id="monto" name="Monto" value="1.00" placeholder="Monto" required>
                   </div>
           
                    <br>
                    <div>
                      <input type="hidden" name="idsub" value="<?php echo $idsub ?>"> </input>
                    </div>
                    <div class="form-group">
                    <label for="Motivo" color="white"> agregar un Motivo:</label>
                    <textarea class="form-control" type="textarea" name="Motivo" id="Motivo" placeholder="Motivo" maxlength="200" rows="7"></textarea>
                        <span class="help-block"><p id="characterLeft" class="help-block "></p></span>                    
                    </div>
            <center>
        <button class="btn btn-default searchButton">Enviar Oferta</button>
        </center>
        </form>
    </div>
</div>
</div>

   </div>
</table>
</center>
<li>
<button >mostrar</button>
</li>
</body>

<?php
}
mysql_close($conexion);
?>


</html>
<!DOCTYPE html>
<?php
#$idsubasta=$_REQUEST['id'];
$idsub=$_REQUEST['s'];
include("DBquery/DBconnect.php");
$conexion=mysql_connect($host,$user,$pw) 
  or  die("Problemas en la conexion");
// $conexion=mysql_connect("localhost","root","lucas") 
//   or  die("Problemas en la conexion");

mysql_select_db("bestnid",$conexion) 
  or  die("Problemas en la selección de la base de datos");

   $sentencia="select * from subasta inner join categoria on categoria.ID_CAT = subasta.cate where ID_SUB=$idsub";
    $query=mysql_query($sentencia);
  

?>
<?php   include("/DBquery/DBGetCategorias");?>

<html>

<head>
  
  
<link href="../Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="../Bootstrap/dist/js/jquery-1.11.2.min.js"></script>
<script src="../Bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../Bootstrap/dist/js/jquery.bpopup.min.js"></script>
<script src="validacion.js"></script>
<script src="manejoPopups.js"></script>
<link href="css/header.css" rel="stylesheet">
<link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/pagmod.css">
<script src="js/fileinput.min.js" type="text/javascript"></script>
<script src="js/pagmod.js"></script>
</head>

<body >
 <div align="center" width="300"> 








<?php
session_start();
$userid= $_SESSION['id'];
?>

<html>

<head>
<title>Bestnid</title>
<meta charset="UTF-8">
<link href="../Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="../Bootstrap/dist/js/jquery-1.11.2.min.js"></script>
<script src="../Bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../Bootstrap/dist/js/jquery.bpopup.min.js"></script>
<script src="validacion.js"></script>
<script src="manejoPopups.js"></script>
<link href="css/header.css" rel="stylesheet">
<link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<script language="JavaScript"> 
function cance(uid){ 

        var pagina="user_profile.php";
       window.top.location.href=pagina;
    
} 
</script>

<script src="js/fileinput.min.js" type="text/javascript"></script>
</head>

<body style="background-color:white">
  
    <div id="registerForm" class="container">
      <center><h2>Modificar</h2></center>
      <?php   while ($arreglo=mysql_fetch_array($query)){ ?>
      <form method="post"  action="DBquery/modificacion.php" enctype="multipart/form-data" ><!--action="user_alta.php"-->
        <div class="form-group">
         <label>Modificar titulo:</label>
        <input class="form-control register" type="text" maxlength="30" name="titulo" placeholder="Titulo" tabindex="1" value="<?php echo $arreglo['Titulo'] ?>" required>
        </div>
        <input type="hidden" name="id" value="<?php echo $idsub ?>"> </input>
        <div class="form-group">
          
          <label for="Modificar Descripcion">Modificar Descripcion:</label>
          <textarea class="form-control register"  maxlenght="200" rows="5" id="Modificar Descripcion" name="description"> <?php echo $arreglo['Descripcion'] ?></textarea>
         </div> 
        <div class"form-group" >
        <label> seleccione una categoria si desea modificar </label>
         <select name="category"  >    
                <!-- <option value="<?php echo $arreglo['ID_CAT'] ?>"> <?php echo $arreglo['nombreCat'] ?> </option>    <input class="form-control register" type="text" maxlenght="200" name="description" placeholder="descripcion" tabindex="2" value="<?php echo $arreglo['Descripcion'] ?>" >
       --> <?php while($cate=mysql_fetch_array($registros)){
                  ?>

                  <option value=<?php echo $cate['ID_CAT'] ?> > <?php echo $cate['nombreCat']?></option>
                  <?php }?>
                <!--<option value="2"> Electrodomesticos</option>
                <option value="3" > Electronica</option>
                <option value="4" > Inmuebles</option>
                <option value="5" > Juegos y juguetes</option>
                <option value="6" > Muebles</option>
                <option value="7" > Musica </option>
                <option value="8" > Peliculas y cine</option>
                <option value="9" > Ropa</option>
                <option value="10" > Servicios</option>
                <option value="11" > Vehiculos</option>
                <option value="1" selected="selected" >  Otros..</option>-->
         </select>
         <br></br>
      </div>
  
<div class="container">
       <div class="form-group">
           <center> <div id="caja" style="width:30%">
                <label>Imagen subasta Actual:</label>
                    <br>
                    <!-- <center> -->
                    <img src="<?php echo $arreglo['Foto']?>" class="file-preview-frame" style="position:relative;left:10%" > <!-- </center> -->
                    <br><br><center>
                    <br><br><br><br><br><br><br><br>
                   <label>Seleccionar nueva imagen:</label>
                     <input id="file-3" type="file" name="imagenes[]" >
                        <script>
                        $("#file-3").fileinput({
                        showCaption: false,
                        browseClass: " btn btn-default searchButton" ,
                        fileType: "any",
                        showUpload:false,
                         });
                        </script></center>
                <br>          
                <div id="separartop">
                 <center><a  class="btn btn-default searchButton" onClick="cance(<?php echo $userid?>)"  >Cancelar</a> <button  class="btn btn-default searchButton"  >Modificar</button></center>
                 <center></center>
                </div>
              </form>  
            </div></center>
      </div>
  </div>
    <br>  
  </div>
  <?php } 
  
mysql_close($conexion);

  ?>
</div>
</body>
</html>










</div>
</body>

</html>
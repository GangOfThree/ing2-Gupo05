<?php
/*#$idsubasta=$_REQUEST['id'];
$idsub=$_REQUEST['s'];
$conexion=mysql_connect("localhost","root","lucas") 
  or  die("Problemas en la conexion");

mysql_select_db("bestnid",$conexion) 
  or  die("Problemas en la selección de la base de datos");

   $sentencia="select * from subasta inner join categoria on categoria.ID_CAT = subasta.cate where ID_SUB=$idsub";
    $query=mysql_query($sentencia);
  
*/
?>
<!DOCTYPE html>

<html>

<head>
  
 
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
<link rel="stylesheet" type="text/css" href="css/alta.css">
<link rel="stylesheet" type="text/css" href="ofertar.css">
<script src="../Bootstrap/dist/js/jquery-1.11.2.min.js"></script>
<script src="../Bootstrap/dist/js/bootstrap.min.js"></script>

<script src="../Bootstrap/dist/js/jquery.bpopup.min.js"></script>
<script src="validacion.js"></script>
<script src="manejoPopups.js"></script>
<link href="css/header.css" rel="stylesheet">
<link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<script language="JavaScript"> 
function cance(uid){ 

        var pagina="DBquery/listado_user.php?iduser="+uid;
       document.location.href=pagina;
    
} 
</script>

<script src="js/fileinput.min.js" type="text/javascript"></script>
</head>

<body>
  
    <div id="registerForm" class="container">
      <center><h2>Crear Subasta</h2></center>
      <form method="post"  action="DBquery/alta_subasta.php" enctype="multipart/form-data" ><!--action="user_alta.php"-->
        <div class="form-group">
         <label>Agregar titulo:</label>
        <input class="form-control register" type="text" maxlength="30" name="Titulo" placeholder="Titulo" tabindex="1"  required>
        </div>
        <div class="form-group">
          <label for="Agregar Descripcion">Agregar Descripcion:</label>
          <textarea  class="form-control" placeholder="Descripcion..." maxlenght="200" rows="5" id="Agregar Descripcion" name="description"  required> </textarea>
         </div> 
         <br><br>
         <div>
          <label for="fecha"> seleccionar fecha fin de la subasta:</label>
          <br>
           <input id="fecha" name="fechafin" type="date" min="2015-07-12" max="2015-07-27" required/>
         </div>
         <br><br>
        <div class"form-group" >
        <label> seleccione una categoria  </label>
         <select name="category"  >    
                <option value="2"> Electrodomesticos</option>
                <option value="3" > Electronica</option>
                <option value="4" > Inmuebles</option>
                <option value="5" > Juegos y juguetes</option>
                <option value="6" > Muebles</option>
                <option value="7" > Musica </option>
                <option value="8" > Peliculas y cine</option>
                <option value="9" > Ropa</option>
                <option value="10" > Servicios</option>
                <option value="11" > Vehiculos</option>
                <option value="1" selected="selected" >  Otros..</option>
         </select>
         <br></br>
      </div>
   <center>
<div class="container">
       <div class="form-group" wid>
                         
                   <br>
                   <br><br>
                   <label>Seleccionar nueva imagen:</label>
                    <br>
                   <div id="caja" >
            
                   <center>
                     <input class="altacss" id="file-3" type="file" name="imagenes[]" required > <center></center>
                        <script>
                        $("#file-3").fileinput({
                        showCaption: false,
                        browseClass: " btn btn-default searchButton" ,
                        fileType: "any",
                        showUpload:false,
                         });
                        </script> 
                  </div>
                <div id="separartop">
                  <br><br><br>
                 <center><a  class="btn btn-default searchButton" onClick="cance(<?php echo $userid?>)"  >Cancelar</a> <button  class="btn btn-default searchButton"  >Crear</button></center>
                 <center></center>
                </div>
              </form>  
            </div></center>
          </center>
      </div>
  
    <br>  
  </div>
  
</div>
</body>
</html>










</div>
</body>

</html>
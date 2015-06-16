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
<link href="header.css" rel="stylesheet">
<link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

<script src="js/fileinput.min.js" type="text/javascript"></script>
</head>

<body>  

<li id="registro"><span><a class="ex1" href="#">Modificar</a></span></li>

<div class="container-fluid">
  <div class="signInBG" id="registerWindow">
    <div id="registerForm" class="container">
      <center><h2>Modificar</h2></center>
      <?php   while ($arreglo=mysql_fetch_array($query)){ ?>
      <form method="post"  action="modificacion.php" enctype="multipart/form-data" ><!--action="user_alta.php"-->
        <div class="form-group">
         <label>Modificar titulo:</label>
        <input class="form-control register" type="text" maxlength="30" name="titulo" placeholder="Titulo" tabindex="1" value="<?php echo $arreglo['Titulo'] ?>" required>
        </div>
        <input type="hidden" name="id" value="<php echo $idsub ?>"> </input>
        <div class="form-group">
          <label>Modificar Descripcion</label>
        <input class="form-control register" type="text" maxlenght="200" name="description" placeholder="descripcion" tabindex="2" value="<?php echo $arreglo['Descripcion'] ?>" >
        </div> 
        <div class"form-group" >
        <label> seleccione una categoria si desea modificar </label>
         <select name="category"  >    
                <option value="<?php echo $arreglo['ID_CAT'] ?>"> <?php echo $arreglo['nombreCat'] ?> </option>
                <option value="2"> Electrodommesticos</option>
                <option value="3" > electronica</option>
                <option value="4" > inmuebles</option>
                <option value="5" > juegos y jugetes</option>
                <option value="6" > mouebles</option>
                <option value="7" > musica </option>
                <option value="8" > peliculas y cine</option>
                <option value= "9" > Ropa</option>
                <option value="10" > servicios</option>
                <option value="11" > vehiculos</option>
                <option value="1"  >  otros</option>
         </select>
         <br></br>
      </div>
  <div class="form-group">
                <label>Imagen subasta Actual</label>
                <br>
                <img src="<?php echo $arreglo['Foto']?>" class="file-preview-frame" >
                
                <label>Seleccionar nueva imagen:</label>
                <input id="file-3" type="file" name="imagenes[]"   >
                <!--<div class="file-preview-frame" >
                 <img src="<?php echo $arreglo['Foto']?>" class="file-preview-frame" >
                </div>-->
          <script>
          $("#file-3").fileinput({
            showCaption: false,
            
            browseClass: " btn btn-default searchButton" ,
            fileType: "any",
            showUpload:false,
          });
        </script>
        </div>
          <div>
          <center><button  class="btn btn-default searchButton" >Modificar</button></center>
            </div>
       </form>  
  </div>
    <br>  
  </div>
  <?php } ?>
</div>
</body>
</html>
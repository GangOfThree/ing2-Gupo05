<!DOCTYPE html>
<html>

<head>
<!-- <link href="../../Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="../../Bootstrap/dist/js/jquery-1.11.2.min.js"></script>
<script src="../../Bootstrap/dist/js/bootstrap.min.js"></script> -->
<title>Subastas</title>
<link href="../css/buscar.css" rel="stylesheet">

</head>

<body>
<?php
// session_start();
$idsub=$_REQUEST['idsubasta'];
?>
<!-- <div class="container">
  <div class="row">
    <h3>Comentar subasta</h3>
  </div> -->
    
    <!-- <div class="row"> -->
    
    <!-- <div class="col-md-6"> -->
                <h4>Comentar subasta</h4>
                <div class="widget-area no-padding blank">
                <div class="status-upload">
                  <form method="post" action=<?php echo 'DBquery/alta_pregunta.php?idsubasta='.$idsub;?>>
                    <textarea rows=10 cols=100 name="pregunta" style="width:100%; max-width:100%; height:50px" placeholder="Ingrese su pregunta..." required></textarea> <!-- Queda mas lindo con ese tamaño de columna y fila porque queda abajo el boton de publicar -->
                    <p class="text-right"><button type="submit" class="btn btn-primary"><i class="fa fa-share"></i> Publicar pregunta</button></p>
                  </form>
                </div><!-- Status Upload  -->
              </div><!-- Widget Area -->
          <!-- </div> -->
        
    <!-- </div> -->
<!-- </div> -->

</body>
</html>
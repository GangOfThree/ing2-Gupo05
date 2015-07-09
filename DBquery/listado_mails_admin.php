<!DOCTYPE html>
<head>

<link href="../../Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="../../Bootstrap/dist/js/jquery-1.11.2.min.js"></script>
<script src="../../Bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include("DBconnect.php");

$conexion=mysql_connect($host, $user, $pw)
or die("Problemas en la conexion");

mysql_select_db("bestnid", $conexion)
or die("Problemas en la seleccion de la base de datos");

$registros=mysql_query("select Mail from usuario where Admin=1")
or die("Problemas en la consulta:".mysql_error());



?>

<div class="container">
  <h2>Modal Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Datos de contacto</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Mails de contacto con los administradores</h4>
        </div>
        <div class="modal-body">
          <p>
            <?php
              while($reg=mysql_fetch_array($registros)){
                echo $reg['Mail'].'<br>';}
            ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>
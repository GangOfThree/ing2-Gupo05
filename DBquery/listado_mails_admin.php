<!DOCTYPE html>
<head>

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
  <div class="modal fade" id="modalContacto" role="dialog">
    <div class="modal-dialog">
    
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
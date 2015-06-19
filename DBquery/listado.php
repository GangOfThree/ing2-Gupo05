<!DOCTYPE html>
<html>

<head>
<link href="../../Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="../../Bootstrap/dist/js/jquery-1.11.2.min.js"></script>
<script src="../../Bootstrap/dist/js/bootstrap.min.js"></script>
<title>Subastas</title>
<link href="../css/buscar.css" rel="stylesheet">
<script language="JavaScript"> 
function pregunta(idsubasta){ 
    if (confirm('¿Estas seguro de que deseas eliminar esta subasta?')){ 
       document.location.href='phpbaja.php?s='+idsubasta;
    } 
} 
</script>
<script language="JavaScript"> 
function preguntamod(idsubasta){ 
    if (confirm('¿ir a pagina modificar?')){ 
       document.location.href='paginaModificacion.php?s='+idsubasta;
    } 
} 
</script>



<script language="JavaScript"> 
function psuba(idsubasta){ 
     document.location.href='../paginaMostrarSubasta.php?idsubasta='+idsubasta;
} 
</script>



</head>

<body>
<?php
$conexion=mysql_connect("localhost","root","christian") 
  or  die("Problemas en la conexion");

mysql_select_db("bestnid",$conexion) 
  or  die("Problemas en la selección de la base de datos");

$registros=mysql_query("select * from subasta inner join categoria on categoria.ID_CAT=subasta.cate inner join usuario on subasta.user=usuario.ID_USR where Activo=1 order by subasta.Fec_init DESC limit 10",$conexion) or
  die("Problemas en el select:".mysql_error());
echo '<table border="1">';

$totalf=4;


echo '<tr>';

$cant=count($registros);


while ($reg=mysql_fetch_array($registros))
{
  $idsub=$reg['ID_SUB'];
  if ($totalf>0){
    echo '<td>'.'<div class="container-fluid" id=div1 >'.
                  '<br>'.
                  '<center>'.'<img id=img1 onclick="psuba('.$idsub.')"  src="../'.$reg['Foto'].'" alt=img1>'.'</center>'.
                  '<center>'.'<a onclick="psuba('.$idsub.')">'.$reg['Titulo'].  '</a>'.'</center>'.'<br>'.'</center>'.
                  '<center>'.
                  'Categoria: '.$reg['nombreCat'].
                  '</center>'.
                  '<hr>'.
                  '<center>'.
                  '<a class="btn btn-primary btn-xs" onclick="psuba('.$idsub.')"  > Abrir </a> '.
                  '</center>'. 
                  //'<center>'.
                  //'<a class="btn btn-primary btn-xs"  onclick="pregunta('.$idsub.')"  > Cancelar </a> '.
                  
                  //'<a class="btn btn-primary btn-xs"  onclick="preguntamod('.$idsub.')"  > Modificar </a> '.
                  //'</center>'.
                  '<br>'. 
                  '</div>'.
          '</td>'; 
    $totalf=$totalf-1;
    
  }
  else{

    #              '<button type="button" id="separar" href="paginaModificacion.php" class="btn btn-primary btn-xs">Modificar</button>'.'</span>'.
    echo '</tr>';
    echo '<tr>';
    $totalf=4;
          echo '<td>'.'<div class="container-fluid" id=div1 >'.
                  '<br>'.
                  '<center>'.'<img id=img1 onclick="psuba('.$idsub.')"  src="../'.$reg['Foto'].'" alt=img1>'.'</center>'.
                  '<center>'.'<a onclick="psuba('.$idsub.')">'.$reg['Titulo'].  '</a>'.'</center>'.'<br>'.'</center>'.
                  '<center>'.
                  'Categoria: '.$reg['nombreCat'].
                  '</center>'.
                  '<hr>'. 
                  '<center>'.
                  '<a class="btn btn-primary btn-xs" onclick="psuba('.$idsub.')" > Abrir </a> '.
                  '</center>'.
                  // '<center>'.
                  // '<a class="btn btn-primary btn-xs"  onclick="pregunta('.$idsub.')"  > Cancelar </a> '.
                  
                  // '<a class="btn btn-primary btn-xs"  onclick="preguntamod('.$idsub.')"  > Modificar </a> '.
                  // '</center>'.
                  '<br>'. 
                  '</div>'.
          '</td>'; 
    $totalf=$totalf-1;
  }

}
echo '</tr>';
echo '</table>';
mysql_close($conexion);
?>
</body>
</html>
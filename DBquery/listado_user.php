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
    // if (confirm('¿ir a pagina modificar?')){ 
       window.top.location.href='../ModificarSubastaUI.php?s='+idsubasta;
    // } 
} 
</script>



<script language="JavaScript"> 
function psuba(idsubasta){ 
     window.top.location.href='../paginaMostrarSubasta.php?idsubasta='+idsubasta;
} 
</script>

</head>

<body>

<?php

session_start();

include("DBconnect.php");
$conexion=mysql_connect($host,$user,$pw)  
  or  die("Problemas en la conexion");

mysql_select_db("bestnid",$conexion) 
  or  die("Problemas en la selección de la base de datos");

$registros=mysql_query("select * 
                        from subasta inner join categoria on categoria.ID_CAT=subasta.cate inner join usuario on subasta.user=usuario.ID_USR 
                        where subasta.user=$_SESSION[id]",$conexion) or die("Problemas en el select:".mysql_error());


echo '<table border="1">';

$totalf=4;


echo '<tr>';

$cant=count($registros);


while ($reg=mysql_fetch_array($registros))
{
  $idsub=$reg['ID_SUB'];
  if($reg['Activo'] == 1){ 
    $tiempoRest= date_diff(date_create("today"),date_create($reg['Fec_fin']));
    if(date_create("today") == date_create($reg['Fec_fin'])){
      $tiempoAMostrar=$tiempoRest->format('Finaliza en unas horas');
    }
    else{
      $tiempoAMostrar=$tiempoRest->format('Finaliza en %r%a días');
    }
  }  
  else{
      if($reg['Cancelado'] == 1){
        $tiempoAMostrar="Subasta cancelada";
      }
      else{
        $tiempoAMostrar="Subasta finalizada"; 
      }
  }

  if ($totalf>0){
    echo '<td>'.'<div class="container-fluid" id=div1 >'.
                  '<br>'.
                  '<center>'.'<img id=img1 onclick="psuba('.$idsub.')"  src="../'.$reg['Foto'].'" alt=img1>'.'</center>'.
                  '<center>'.'<a onclick="psuba('.$idsub.')">'.$reg['Titulo'].  '</a>'.'</center>'.'</center>'.
                  '<center>'.
                  'Categoria: '.$reg['nombreCat'].
                  '<h6>'.$tiempoAMostrar.'</h6>'.
                  '</center>'.
                  '<hr>';
                  if($reg['Activo']==1){ ?>
                      <center>
                      <a class="btn btn-primary btn-xs"  onclick="pregunta(<?php echo $idsub ?>)"  > Cancelar </a>
                      <a class="btn btn-primary btn-xs"  onclick="preguntamod(<?php echo $idsub ?>)"  > Modificar </a>
                      </center>
                  <?php 
                  }
            echo  '<br>'. 
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
                  '<center>'.'<a onclick="psuba('.$idsub.')">'.$reg['Titulo'].  '</a>'.'</center>'.'</center>'.
                  '<center>'.
                  'Categoria: '.$reg['nombreCat'].
                  '<h6>'.$tiempoAMostrar.'</h6>'.
                  '</center>'.
                  '<hr>';
                  if($reg['Activo']==1){ ?>
                      <center>
                      <a class="btn btn-primary btn-xs"  onclick="pregunta(<?php echo $idsub ?>)"  > Cancelar </a>
                      <a class="btn btn-primary btn-xs"  onclick="preguntamod(<?php echo $idsub ?>)"  > Modificar </a>
                      </center>
                  <?php 
                  }
            echo  '<br>'. 
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
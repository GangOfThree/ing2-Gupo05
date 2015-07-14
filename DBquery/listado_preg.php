<!DOCTYPE html>
<html>

<head>
<!-- <link href="../../Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="../../Bootstrap/dist/js/jquery-1.11.2.min.js"></script>
<script src="../../Bootstrap/dist/js/bootstrap.min.js"></script>
<title>Subastas</title> -->
<link href="../css/buscar.css" rel="stylesheet">
<script language="JavaScript">
function preguntaeli(idpregunta){
    if (confirm('¿Esta seguro de que desea eliminar este comentario?')){
      document.location.href='DBquery/php_eliminar_comentario.php?p='+idpregunta;
    }
}
</script>

</head>

<body>
<?php
// session_start();
// include("DBconnect.php");
// $idsub=$_REQUEST['idsubasta'];
$conexion=mysql_connect($host,$user,$pw)  
  or  die("Problemas en la conexion");

mysql_select_db("bestnid",$conexion) 
  or  die("Problemas en la selección de la base de datos");

$registros=mysql_query("SELECT distinct p.ID_PREG as i_p, r.ID_PREG as i_r, p.Nombre as n_p, r.Nombre as n_r, p.Fecha as f_p, r.Fecha as f_r, p.Contenido as c_p, r.Contenido as c_r, p.dueno as s_d, p.usuario as p_d, p.eliminado as p_eli, r.eliminado as r_eli, p.activo as act from (select distinct ID_PREG, Nombre, Contenido, Fecha, p2.user as usuario, sub as subasta, s1.user as dueno, respuesta, eliminado, activo 
from pregunta as p2 inner join usuario u1 on p2.user=u1.ID_USR inner join subasta as s1 on p2.sub=s1.ID_SUB where s1.user!=p2.user and s1.ID_SUB=$idsub) AS p left join (select distinct ID_PREG, Nombre, Contenido, Fecha, p3.user as usuario, sub as subasta, s2.user as dueno, respuesta, eliminado 
from pregunta as p3 inner join usuario u2 on p3.user=u2.ID_USR inner join subasta as s2 on p3.sub=s2.ID_SUB where s2.user=p3.user and s2.ID_SUB=$idsub) AS r on p.respuesta=r.ID_PREG order by p.Fecha, p.ID_PREG",$conexion) or
  die("Problemas en el select:".mysql_error());

if(mysql_num_rows($registros) == 0){
  echo '<h5>'.'Todavia no hay comentarios para esta subasta'.'</h5>';
  echo '<br>';
}




echo '<table border="1">';

echo '<tr>';


while ($reg=mysql_fetch_array($registros))
{
 echo '<!-- First Comment -->'.
          '<article class="row">'.
            //'<div class="col-md-2 col-sm-2 hidden-xs">'.
              //'<figure class="thumbnail">'.
                //'<img class="img-responsive" src="ing2-Gupo05/resources/logofrente.jpg"/>'.
                //'<figcaption class="text-center">'.$reg['n_p'].'</figcaption>'.
              //'</figure>'.
            //'</div>'.
            '<div class="col-md-10 col-sm-10">'.
              '<div class="panel panel-default arrow left">'.
                '<div class="panel-heading right">Pregunta hecha el '; ?>
                  <?php echo date_format(date_create($reg['f_p']),'d/m/Y').'</div>'.
                '<div class="panel-body">'.
                  '<div class="comment-post">'.
                    '<p>';
                      if($reg['p_eli']==0){
                         echo $reg['c_p'];
                      } else{
                          echo "<i>Comentario eliminado</i>";
                      }
                      echo '</p>'.
                   '</div>'.
                  '<br>';
                  ?>
                  <?php if (isset($_SESSION['id'])){
                    if( (($_SESSION['id']==$reg['s_d']) && (!isset($reg['i_r']) )) && ($reg['act']==1) ){
                      if ($reg['p_eli']==0 ){?>
                      <form method="post" action="<?php echo 'DBquery/publicar_respuesta.php?idsubasta='.$idsub.'&idpreg='.$reg['i_p'];?>">
                     
                      <p class="text-right"><textarea rows=1 cols=100 name="respuesta" style="width:100%; max-width:100%; height:50px" placeholder="Responder esta pregunta..."></textarea>
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-reply"></i> Responder</button></p>
                      </form>
                      <br>
                      <p class="text-right"><a href="#" class="btn btn-default btn-sm" onclick=preguntaeli(<?php echo $reg['i_p'];?>)><i class="fa fa-trash"></i> Eliminar</a></p>
                  <?php
                }} else{
                    if ( (($_SESSION['id']==$reg['p_d']) || ($_SESSION['id']==$reg['s_d'])) && ($reg['p_eli']==0) ){?>
                      <p class="text-right"><a href="#" class="btn btn-default btn-sm" onclick=preguntaeli(<?php echo $reg['i_p'];?>)><i class="fa fa-trash"></i> Eliminar</a></p>
                    <?php
                    }
                }}
                echo '</div>'.
              '</div>'.
            '</div>'.
          '</article>';
  if(isset($reg['n_r']))
  {
    echo '<!-- Second Comment Reply -->'.
          '<article class="row">'.
            '<div class="col-md-1 col-sm-1 col-md-offset-0 col-sm-offset-0 hidden-xs">'.
              //'<figure class="thumbnail">'.
                //'<img class="img-responsive" src="resources/placeholder-user.jpg" />'.
                //'<figcaption class="text-center">'.$reg['n_r'].'</figcaption>'.
              //'</figure>'.
            '</div>'.
            '<div class="col-md-9 col-sm-9">'.
              '<div class="panel panel-default arrow left">'.
                '<div class="panel-heading right">Respuesta hecha el '; ?>
                  <?php echo date_format(date_create($reg['f_r']),'d/m/Y').'</div>'.
                '<div class="panel-body">'.
                  '<div class="comment-post">'.
                    '<p>';
                      if ($reg['r_eli']==0){
                        echo $reg['c_r'];
                      } else{
                        echo "Comentario eliminado";
                      }
                     echo '</p>'.
                  '</div>';
                  ?>
                  <?php if (isset($_SESSION['id'])){
                    if( ($_SESSION['id']==$reg['s_d']) && ($reg['r_eli']==0) ){?>
                       <p class="text-right"><a href="#" class="btn btn-default btn-sm" onclick=preguntaeli(<?php echo $reg['i_r'];?>)><i class="fa fa-trash"></i> Eliminar</a></p>
                  <?php
                  }}
                  echo '</div>'.
              '</div>'.
             '</div>'.
          '</article>';
  }

}
echo '</tr>';
echo '</table>';
// mysql_close($conexion);
?>
</body>
</html>
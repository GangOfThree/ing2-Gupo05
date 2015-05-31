<html>

<link href="../listar.css" rel="stylesheet">
<head>
<title>Subastas</title>
<style>
table, th, td {
    border: 0px solid black;
    padding: 5px;
    background-color: #EEE7E7;
}
table {
    border-spacing: 15px;
}
td:hover {
    background-color: #D4263C;
}
#div1{
    background-color: #FFFFFF;
    border-radius: 15px;
}
#img1{ 
    border-radius: 15px;
    top:1px;
}
</style>
</head>
<body>
<?php
$conexion=mysql_connect("localhost","root","") 
  or  die("Problemas en la conexion");

mysql_select_db("bestnid",$conexion) 
  or  die("Problemas en la selección de la base de datos");

if (empty($_GET["orden"])){
  $registros=mysql_query("select * from subasta inner join categoria on categoria.ID_CAT=subasta.cate inner join usuario on subasta.user=usuario.ID_USR where Activo=1 and Titulo like '%$_GET[busqueda]%'",$conexion) or
  die("Problemas en el select:".mysql_error());
}
else {
  if (empty($_GET["sorted"])){
    $registros=mysql_query("select * from subasta inner join categoria on categoria.ID_CAT=subasta.cate inner join usuario on subasta.user=usuario.ID_USR where Activo=1 and Titulo like '%$_GET[busqueda]%' order by $_GET[orden]",$conexion) or
    die("Problemas en el select:".mysql_error());
  }
  else {
    if($_GET["sorted"]=="asc"){
      $registros=mysql_query("select * from subasta inner join categoria on categoria.ID_CAT=subasta.cate inner join usuario on subasta.user=usuario.ID_USR where Activo=1 and Titulo like '%$_GET[busqueda]%' order by $_GET[orden] ASC",$conexion) or
      die("Problemas en el select:".mysql_error());
    }
    else {
      if($_GET["sorted"]=="desc"){
        $registros=mysql_query("select * from subasta inner join categoria on categoria.ID_CAT=subasta.cate inner join usuario on subasta.user=usuario.ID_USR where Activo=1 and Titulo like '%$_GET[busqueda]%' order by $_GET[orden] DESC",$conexion) or
        die("Problemas en el select:".mysql_error());
      }
    }
  }
}


echo '<table border="1">';

$totalf=6;


echo '<tr>';

$cant=count($registros);


while ($reg=mysql_fetch_array($registros))
{
  if ($totalf>0){
    echo '<td>'.'<div id=div1>'.'<center>'.'<img id=img1 src="'.$reg['Foto'].'" alt=img1 width=200 height=150>'.'</center>'.'<br>'.'<center>'.'<a>'.$reg['Titulo'].'</a>'.'</center>'.'<br>'.'<center>'.'Categoria: '.$reg['Nombre'].'</center>'.'<br>'.'<center>'.'Fecha de inicio de esta subasta: '.'<br>'.$reg['Fec_init'].'</center>'.'<br>'.'</div>'.'</td>'; 
    $totalf=$totalf-1;
    
  }
  else{
    echo '</tr>';
    echo '<tr>';
    $totalf=6;
    echo '<td>'.'<div id=div1>'.'<center>'.'<img id=img1 src="'.$reg['Foto'].'" alt=img1 width=200 height=150 >'.'</center>'.'<br>'.'<center>'.'<a>'.$reg['Titulo'].'</a>'.'</center>'.'<br>'.'<center>'.'Categoria: '.$reg['Nombre'].'</center>'.'<br>'.'<center>'.'Fecha de inicio de esta subasta: '.'<br>'.$reg['Fec_init'].'</center>'.'<br>'.'</div>'.'</td>';
    $totalf=$totalf-1;
  }

}
echo '</tr>';
echo '</table>';
mysql_close($conexion);
?>
</body>
</html>
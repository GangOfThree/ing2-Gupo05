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
    border-spacing: 10px;
}
td:hover {
    background-color: #D4263C;
}
#div1{
     margin-top: 60px;
     margin-right: 40px;
    background-color: #FFFFFF;
    border-radius: 15px;
}
#img1{ 
    border-radius: 10px;
    top:1px;
}
#separar{
  
  margin-right: 5px;
margin-right: 5px; 

}
</style>
<script language="JavaScript"> 
function pregunta(){ 
    if (confirm('¿Estas seguro de que deseas eliminar esta subaste?')){ 
       document.tuformulario.submit() 
    } 
} 
</script>
</head>
<header><?php 
  require_once('header.html');
?></header>


<body>
<?php
$conexion=mysql_connect("localhost","root","lucas") 
  or  die("Problemas en la conexion");

mysql_select_db("bestnid",$conexion) 
  or  die("Problemas en la selección de la base de datos");

$registros=mysql_query("select * from subasta inner join categoria on categoria.ID_CAT=subasta.cate inner join usuario on subasta.user=usuario.ID_USR where Activo=1",$conexion) or
  die("Problemas en el select:".mysql_error());

echo '<table border="1">';

$totalf=6;


echo '<tr>';

$cant=count($registros);


while ($reg=mysql_fetch_array($registros))
{
  $idsub=$reg['ID_SUB'];
  if ($totalf>0){
    echo '<td>'.'<div id=div1>'.'<center>'.'<img id=img1 src="'.$reg['Foto'].'" alt=img1 width=200 height=150>'.'</center>'.'<br>'.'<center>'.'<a>'.$reg['Titulo'].$idsub.'</a>'.'</center>'.'<br>'.'<center>'.'Categoria: '.$reg['Nombre'].
    '</center>'.'<br>'. '<a class="btn btn-primary btn-xs" href="phpbaja.php?s='.$idsub.'" onclick="pregunta()"  > Cancelar </a> '.
     '<button type="button" id="separar" class="btn btn-primary btn-xs">Modificar</button>'.'</span>'.'<br>'.'</div>'.'</td>'; 
    $totalf=$totalf-1;
    
  }
  else{
    echo '</tr>';
    echo '<tr>';
    $totalf=6;
    echo '<td>'.'<div id=div1>'.'<center>'.'<img id=img1 src="'.$reg['Foto'].'" alt=img1 width=200 height=150 >'.'</center>'.'<br>'.'<center>'.'<a>'.$reg['Titulo'].'</a>'.'</center>'.'<br>'.'<center>'.'Categoria: '.$reg['Nombre'].'</center>'.'<br>'.'<center>'.'Fecha de inicio de esta subasta: '.$reg['Fec_init'].'</center>'.'<br>'.'</div>'.'</td>';
    $totalf=$totalf-1;
  }

}
echo '</tr>';
echo '</table>';
mysql_close($conexion);
?>
</body>
</html>
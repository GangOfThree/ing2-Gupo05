<?php

$ID=$_REQUEST['id'];
	$idsubasta=(int)$ID;
    $tit=$_REQUEST['titulo'];
    $desc=$_REQUEST['description'];
    $cat=$_REQUEST['category'];
    $directory="img/";
    $nombreArchivo=$_FILES['imagene']['name'][0];
    $nombreTemporal=$_FILES['imagene']['tmp_name'][0];
    $ruta=$directory.$nombreArchivo;
   
  $conexion=mysql_connect("localhost","root","christian") 
      or  die("Problemas en la conexion");
      mysql_select_db("bestnid",$conexion) 
       or  die("Problemas en la selección de la base de datos");
       if(isset($tit)){
       	     
           mysql_query("UPDATE subasta SET Titulo='$tit' where ID_SUB=$idsubasta ",$conexion) or
           die("Problemas en el select:".mysql_error());
         }
       if(isset($desc)){
       	
          mysql_query("UPDATE subasta SET Descripcion='$desc' where ID_SUB=$idsubasta ",$conexion) or
          die("Problemas en el select:".mysql_error());
        }
       if(isset($cat)){
          

          mysql_query("UPDATE subasta SET cate='$cat' where ID_SUB=$idsubasta ",$conexion) or
          die("Problemas en el select:".mysql_error());

       }  
       if ($ruta!="img/") {
         
          mysql_query("UPDATE subasta SET Foto='$ruta' where ID_SUB=$idsubasta ",$conexion) or
          die("Problemas en el select:".mysql_error());
             
         move_uploaded_file($nombreTemporal,$ruta);

       }
      

mysql_close($conexion);

session_start();


$mensaje = "Modificacion exitosa, click en aceptar para volver a ver el listado";
echo "<script>";
echo "alert('$mensaje');";  
echo 'window.location = "listado_user.php?userid='.$_SESSION['id'].'";';
echo "</script>";
?>
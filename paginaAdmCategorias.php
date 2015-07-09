<!DOCTYPE html>
<?php
session_start();
require_once('user_header.php');
?>
<html>

<head>
<link href="css/paginaMostrarSubasta.css" rel="stylesheet">
	<script src="../Bootstrap/dist/js/jquery-1.11.2.min.js"></script>
	<script src="../Bootstrap/dist/js/bootstrap.min.js"></script>
  <link href="css/principal.css" rel="stylesheet">
  <script src="js/principal.js"></script>
<?php   include("/DBquery/DBGetCategorias");?>

</head>

<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-1"></div>
		<div class="col-lg-10" style="left:3%;width:95%">
			<div class="container-fluid material_card">
				<center>
          <table class="table table-striped">
                    <h4>Categorias</h4>
                        <thead>
                          <tr>
                            <th>Nunero categoria</th>
                            <th>Nombre categoria</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                                <?php 
                                   $cont=0;

                                    while($cate=mysql_fetch_array($registros)){
                                        	$cont=$cont+1;
                                            
                                             if ($cont%2==0){
                                               $lala="danger";
                                             }else{
                                               $lala="";
                                             }
                                           
                                 ?>
                                           <tr class=<?php echo $lala ?> >
                                            <td><?php echo $cont." " ?> </td>
                                            <td><?php echo $cate['nombreCat']?><td>
                                           </tr>
                                           
                                         <?php }?>
                        </tbody>
                   </table>


                     <br>
                  <button class="btn btn-danger" data-toggle="modal" data-target="#agregar">agregar</button>
                  <button class="btn btn-danger"data-toggle="modal" data-target="#modificar">Modificar</button>
                  <button class="btn btn-danger" data-toggle="modal" data-target="#eliminar">eliminar</button>

                   <br><br>
    				<button type="button" class="btn btn-danger" onClick="location='principal.php'">
   						 <span class="glyphicon glyphicon-arrow-left"></span> Volver a la pagina principal
 					 </button>
 			 </center>
               </div>
            </div>
		</div>
		<div class="col-lg-1"></div>
	</div>>

<!-- agregar categria -->




<div class="modal fade" id="agregar" role="dialog">
    <div class="modal-dialog" >
    
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar categoria</h4>
        </div>
          <form method="get" action="DBquery/altaCategoria.php">
        <div class="modal-body">
          <center>
                   <label for="incate"> Escriba un nombre de categoria:</label>
                    <br>
                   <input  name="categoria"  id="incate" />
                    <br><br>
                  </center>
         </div>
         <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Agregar</button>
                 </form>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
               </center>
                </form>
        </div>
      </div>
    </div>
  </div>
</div>












<!--eliminar categoria-->
 <div class="modal fade" id="eliminar" role="dialog">
    <div class="modal-dialog" >
    
      <!-- Modal content-->
      <div class="modal-content">
       	 <div class="modal-header">
        	  <button type="button" class="close" data-dismiss="modal">&times;</button>
        	  <h4 class="modal-title">Seleccione la o las categorias que desea eliminar:</h4>
        </div>
       	  <div class="modal-body">
       	  	<form action="DBquery/bajaCategoria.php" method="get">
       	  	<center>
       	  	<?php   include("/DBquery/DBGetCategorias");?>


       <table class="table table-striped">
                    <h4>Categorias</h4>
                        <thead>
                          <tr>
                            <th>Nombre categoria</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                                <?php 
                                   $cont=0;
                                   while($cate=mysql_fetch_array($registros)){
                                          $cont=$cont+1;
                                           if ($cont%2==0){
                                               $lala="danger";
                                             }else{
                                               $lala="";
                                             }
                                           
                                 ?>
                                           <tr class=<?php echo $lala ?> >
                                            <td><input type="checkbox" name="cate[]" value=<?php echo $cate['ID_CAT']?>> 
                                              <label><?php echo $cate['nombreCat']?></label>
                                              </td>
                                           
                                           </tr>
                                           
                                    <?php }?>
                        </tbody>
                   </table>

         </center>
         </div>
         <div class="modal-footer">
         	<br>
              <button type="submit" class="btn btn-danger">Borrar</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

           
        </div>
    </form
      </div>
    </div>
  </div>
</div>


<!--modificar nmbre categoria-->

<div class="modal fade" id="modificar" role="dialog">
    <div class="modal-dialog" >
    
      <!-- Modal content-->
      <div class="modal-content">
       	 <div class="modal-header">
        	  <button type="button" class="close" data-dismiss="modal">&times;</button>
        	  <h4 class="modal-title">Modifique el campo de la categoria que desea:</h4>
        </div>
       	  <div class="modal-body">
       	  	<form action="DBquery/modificacionCategoria.php" method="get">
       	  	<center>
       	  	<?php   include("/DBquery/DBGetCategorias");?>
       	   <table class="table table-striped">
                    <h4>Categorias</h4>
                        <thead>
                          <tr>
                            <th>Numero categoria</th>
                            <th>Nombre categoria</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                                <?php 
                                   $cont=0;
                                   while($cate=mysql_fetch_array($registros)){
                                          $cont=$cont+1;
                                           if ($cont%2==0){
                                               $lala="danger";
                                             }else{
                                               $lala="";
                                             }
                                           
                                  ?>
                                         <tr class=<?php echo $lala ?> >
                                            <td> <label><?php echo $cont?></label>  </td>     
                                            <td>  <input type="Text"  name="cate[]" value=<?php echo $cate['nombreCat']?>> </td>
                                           
                                         </tr>
                             <?php }?>
                      </tbody>
                   </table>

         </center>
         </div>
         <div class="modal-footer">
         	<br>
              <button type="submit" class="btn btn-danger">Modificar</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

           <br>
        </div>
    </form>
    </div>
    </div>
  </div>
</div>
<?php ?>
 
</body>
</html
 
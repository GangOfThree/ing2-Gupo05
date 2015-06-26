<!DOCTYPE html>
<html>

<head>
	<link href="css/user_profile.css" rel="stylesheet">
    <script src="js/user_profile.js"></script>
    <script src="../Bootstrap/dist/js/jquery-1.11.2.min.js"></script>
</head>
<header>
<?php 
	session_start();
	if(!isset($_SESSION['id'])){
		// require_once('header.html'); llamar a alert y redireccionar
	}
	else{
		require_once('user_header.php');		
	}
?>
</header>

<body>
    <div class="container-fluid">
	<div class="col-sm-1"></div>
    
    <div class="col-sm-10">
    	<div class="row">
    		<div class="container material_card">
    			<h2>Mis Datos</h2>
    			<hr>
                <div class="col-sm-2">
                    <img src="resources/placeholder-user.jpg" style="width:100%">
                    <br>
                    <br>
                </div>
                <div class="col-sm-10">
                    <p><b><?php if($_SESSION['admin']==1){ echo "Usuario Administrador"; } ?></b>
                    <br>
                    <b>Nombre:</b> <?php echo $_SESSION['nombre'] ?>
                    <br>
                    <b>Apellido:</b> <?php echo $_SESSION['apellido'] ?>
                    <br>
                    <b>DNI:</b> <?php echo $_SESSION['dni'] ?>
                    <br>
                    <b>E-mail:</b> <?php echo $_SESSION['mail'] ?>
                    <br>
                    <b>Número de tarjeta:</b> <?php echo $_SESSION['tarjeta'] ?>
                    <br>
                    <b>Contraseña:</b> *********</p>
                </div>
    		</div>
        </div>
        <br>
        <div class="row">
            <div class="container material_card">
                <h2 id="desplegar"onclick="mostrar('userSubastas')">Mis Subastas <b id="arrow" class="caret"></b></h2>
                <div id="userSubastas" style="display:none">
                    <hr>
                    <iframe frameborder="NO" onload="autofitIframe(this);" style="width:100%" src="DBquery/listado_user.php?userid=<?php echo $_SESSION['id']; ?>"></iframe>
                </div>
            </div>
        </div> 
        <br>
        <div class="row">
            <div class="container material_card">
                <h2 id="desplegar"onclick="mostrar('userComentarios')">Mis Comentarios <b id="arrow" class="caret"></b></h2>
                <div id="userComentarios" style="display:none">
                    <hr>
                    <?php require_once("DBquery/listado_mis_comentarios.php"); ?>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="container material_card">
                <h2 id="desplegar"onclick="mostrar('ofertasRecibidas')">Ofertas recibidas <b id="arrow" class="caret"></b></h2>
                <div id="ofertasRecibidas" style="display:none">
                    <hr>
                    <?php require_once("DBquery/listado_subs_oferta.php"); ?>
                </div>
            </div>
        </div> 
    </div>
    
    <div class="col-sm-1"></div>
    </div>
    <br>
    <br>
    <br>
</body>

</html>
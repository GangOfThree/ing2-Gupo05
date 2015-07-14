<!DOCTYPE html>
<html>

<head>
    <script src="../Bootstrap/dist/js/jquery-1.11.2.min.js"></script>
    <link href="css/user_profile.css" rel="stylesheet">
    <script src="js/user_profile.js"></script>
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
    		<div id="profileContainer" class="container material_card">
    			<div class="row">
                    <div class="col-sm-10">
                        <h2>Mis Datos</h2>
                    </div>
                    <div align="right" class="col-sm-2">
                        <button id="deleteButton" class="btn btn-default searchButton" onclick="querySubastaActiva()"><i class="glyphicon glyphicon-trash"></i> Eliminar mi cuenta</button>
                    </div>

                    <div class="modal fade" id="closeAccount" role="dialog" data-backdrop="static">
                        <div class="modal-dialog" style="width:50%">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"> Desactivar cuenta</h4>
                                </div>
                                <div class="modal-body">
                                    <div id='passForDelete' class='form-group' style="display:none">
                                        <label class='control-label' for='newPassInput'>Para desactivar tu cuenta ingresá tu contraseña:</label>
                                        <input id='passDeleteInput' type='password' class='form-control passwordCheck' minlength='6' maxlength='20' onkeyup='verificarPassDelete(this)' required
                                        data-toggle='popover' data-placement='right' data-content='Ingresá la contraseña con la que te registraste'>
                                        <span class='glyphicon glyphicon-ok form-control-feedback' aria-hidden='true'></span>
                                    </div>
                                    <span id="mensajeNonDelete" style="display:none"><center><h4>No se puede desactivar tu cuenta, existen subastas activas en tu perfil.</h4></center></span>
                                    <!-- <p><center><b>¿Esta seguro que desea desactivar su cuenta?</b></center></p>
                                    <p><center><i>*Tenga en cuenta que la cuenta sera desactivada solo en el caso que no posea subastas activas.</i></center></p> -->
                                </div>
                                <div class="modal-footer">
                                    <span id="controlDelete">
                                    <button id="confirmDelete" type="button" class="btn btn-primary" disabled data-toggle="modal" data-target="#closeAccountFeedback">Aceptar</button>
                                    <button id="cancelDelete" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    </span>
                                    <button id="closeDelete" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="closeAccountFeedback" role="dialog" data-backdrop="static">
                        <div class="modal-dialog" style="width:35%">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"> Aviso</h4>
                                </div>
                                <div class="modal-body">
                                    <center><p><b>¿Estás seguro de desactivar tu cuenta?</b><br>Podrás volverla a activar iniciando sesión como lo haces tradicionalmente</p></center>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="closeProfile();">Aceptar</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
    			<hr>
                <div class="col-sm-2">
                    <img src="resources/placeholder-user.jpg" style="width:100%">
                    <br>
                    <br>
                </div>
                <div class="col-sm-10">
                <p>
                    <span><b><?php if($_SESSION['admin']==1){ echo "Usuario Administrador"; } ?></b></span>
                    <br>
                    <span class="data-user">
                        <b>Nombre:</b> 
                        <span class="dataToShow" id="content"><?php echo $_SESSION['nombre'] ?></span> 
                        <span id="edit-input" class="hidden">
                            <input id="nombre" class="edit-input" style="width:20%" pattern="^[A-Za-zñÑáéíóúÁÉÍÓÚ]*" 
                            value="<?php echo $_SESSION['nombre'] ?>" name="nombre" maxlength="60" required
                            data-toggle="popover"  data-placement="left" data-content="Ingrese un nombre, Solo se aceptan letras"> 
                            <button class="btn btn-primary btn-xs" id="confirm" onclick="modify(this,'nombre')"> Aceptar</button>
                            <button class="btn btn-primary btn-xs" id="cancel"> Cancelar</button>
                        </span>
                        <button id="edit" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Editar</button>
                    </span>
                    <br>

                    <span class="data-user">
                    <b>Apellido:</b> 
                    <span class="dataToShow" id="content"><?php echo $_SESSION['apellido'] ?></span> 
                    <span id="edit-input" class="hidden">
                            <input id="apellido" class="edit-input" style="width:20%" pattern="^[A-Za-zñÑáéíóúÁÉÍÓÚ]*" 
                            value="<?php echo $_SESSION['apellido'] ?>" name="apellido" maxlength="60" required
                            data-toggle="popover"  data-placement="left" data-content="Ingrese un apellido, Solo se aceptan letras"> 
                            <button class="btn btn-primary btn-xs" id="confirm" onclick="modify(this,'apellido')"> Aceptar</button>
                            <button class="btn btn-primary btn-xs" id="cancel"> Cancelar</button>
                    </span>
                    <button id="edit" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Editar</button>
                    </span>
                    <br>

                    <span class="data-user">
                    <b>DNI:</b> 
                    <span class="dataToShow" id="content"><?php echo $_SESSION['dni'] ?></span> 
                    <span id="edit-input" class="hidden">
                            <input id="dni" class="edit-input" style="width:20%" pattern="^[0-9]*" 
                            value="<?php echo $_SESSION['dni'] ?>" name="dni" maxlength="15" required
                            data-toggle="popover"  data-placement="left" data-content="Ingrese su número de DNI, Solo se aceptan números"> 
                            <button class="btn btn-primary btn-xs" id="confirm" onclick="modify(this,'dni')"> Aceptar</button>
                            <button class="btn btn-primary btn-xs" id="cancel"> Cancelar</button>
                    </span>
                    <button id="edit" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Editar</button>
                    </span>
                    <br>

                    <span class="data-user">
                    <b>E-mail:</b> 
                    <span class="dataToShow" id="content" name="mailFieldContent"><?php echo $_SESSION['mail'] ?></span> 
                    <span id="edit-input" class="hidden">
                            <input id="mail" class="edit-input" style="width:20%" type="email" 
                            value="<?php echo $_SESSION['mail'] ?>" name="email" maxlength="55" required onkeyup="verificarMailIngresado(this)"
                            data-toggle="popover"  data-placement="left" data-content="Ingrese un e-mail, debe contener '@'"> 
                            <button class="btn btn-primary btn-xs" id="confirm" name="mailConfirm" onclick="modify(this,'mail')"> Aceptar</button>
                            <button class="btn btn-primary btn-xs" id="cancel" name="mailCancel"> Cancelar</button>
                            <span id="mensajeMail"></span>
                    </span>
                    <button id="edit" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Editar</button>
                    </span>
                    <br>

                    <span class="data-user">
                    <b>Número de tarjeta:</b> 
                    <span class="dataToShow" id="content"><?php echo $_SESSION['tarjeta'] ?></span> 
                    <span id="edit-input" class="hidden">
                            <input id="tarjeta" class="edit-input" style="width:20%" pattern="^[0-9]*" 
                            value="<?php echo $_SESSION['tarjeta'] ?>" name="tarjeta" maxlength="30" required
                            data-toggle="popover"  data-placement="left" data-content="Ingrese su número de tarjeta, Solo se aceptan números"> 
                            <button class="btn btn-primary btn-xs" id="confirm" onclick="modify(this,'tarjeta')"> Aceptar</button>
                            <button class="btn btn-primary btn-xs" id="cancel"> Cancelar</button>
                    </span>
                    <button id="edit" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Editar</button>
                    </span>
                    <br>
                    <span id="showPassword" class="data-user"><b>Contraseña:</b> ********* <button id="editPass" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#changePassword"><i class="glyphicon glyphicon-edit"></i> Editar</button></span>
                    <div class="modal fade" data-backdrop="static" id="changePassword" role="dialog">
                        <div class="modal-dialog" style="width:50%">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                    <h4 class="modal-title"> Cambiar contraseña</h4>
                                </div>
                                <div class="modal-body">
                                    <br>
                                    <div id="oldPass" class="form-group">
                                        <label class="control-label" for="oldPassInput">Ingrese su contraseña actual:</label>
                                        <input id="oldPassInput" type="password" pattern="<?php echo $_SESSION['password'] ?>" class="form-control passwordCheck" minlength="6" maxlength="20" onkeyup="verificarPassAnterior(this)" required
                                        data-toggle="popover" data-placement="right" data-content="Atencion!, ingrese su contraseña actual">
                                        <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div id="newPass" class="form-group">
                                        <label class="control-label" for="newPassInput">Ingrese su nueva contraseña:</label>
                                        <input id="newPassInput" type="password" class="form-control passwordCheck" minlength="6" maxlength="20" onkeyup="verificarNuevoPass(this)" required
                                        data-toggle="popover" data-placement="right" data-content="Recuerde, la contraseña debe contener como mínimo 6 caracteres">
                                        <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div id="confirmNewPass" class="form-group">
                                        <label class="control-label" for="confirmNewPassInput">Vuelva a ingresar su nueva contraseña</label>
                                        <input id="confirmNewPassInput" type="password" class="form-control passwordCheck" minlength="6" maxlength="20" onkeyup="confirmarNuevoPass(this)" required disabled
                                        data-toggle="popover" data-placement="right" data-content="Recuerde respetar el mismo orden de los carateres que componen la nueva contraseña">
                                        <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="newPasswordButton" type="button" class="btn btn-primary" data-dismiss="modal" onclick="modifyPassword()" disabled>Aceptar</button>
                                    <button id="cancelPassEdit" type="button" class="btn btn-default" data-dismiss="modal" onclick="resetPassFields()">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </p>
                <br>
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
        <br>
        <div class="row">
            <div class="container material_card">
                <h2 id="desplegar"onclick="mostrar('compras')">Mis subastas ganadas <b id="arrow" class="caret"></b></h2>
                <div id="compras" style="display:none">
                    <hr>
                    <?php require_once("DBquery/listado_compras.php"); ?>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="container material_card">
                <h2 id="desplegar"onclick="mostrar('misOfertas')">Mis Ofertas <b id="arrow" class="caret"></b></h2>
                <div id="misOfertas" style="display:none">
                    <hr>
                    <?php require_once("DBquery/listado_mis_ofertas.php"); ?>
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
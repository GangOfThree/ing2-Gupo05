<!DOCTYPE html>
<html>

<head>
	<link href="css/paginaMostrarSubasta.css" rel="stylesheet">
	<script src="../Bootstrap/dist/js/jquery-1.11.2.min.js"></script>
	<script src="../Bootstrap/dist/js/bootstrap.min.js"></script>
	<link href="css/paginaAyuda.css" rel="stylesheet">
	<script src="js/paginaAyuda.js"></script>
</head>


<header>
<?php 
	session_start();
	if(!isset($_SESSION['id'])){
		require_once('header.html');
	}
	else{
		require_once('user_header.php');
	}
?>
</header>
<body>
<?php include('DBquery/listado_mails_admin.php'); ?>

	<button id="viewContactButton" class="btn btn-default searchButton" data-toggle="modal" data-target="#modalContacto"><i class="glyphicon glyphicon-send"></i> Contacto</button>
	<div class="container-fluid">
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8" style="width:70%">
			<div class="row">
				<div class="container-fluid material_card">
					<h2><span id="title-help">¡Bienvenido a la ayuda de Bestnid!</span>
					<a <?php if(isset($_SESSION['id']) && $_SESSION['admin']==1){ ?>
						href="resources/help/ManualdeAdministrador.pdf" download="Manual de Administrador.pdf"
					<?php }
					else{ ?>
						href="resources/help/ManualdeUsuario.pdf" download="Manual de Usuario.pdf"
					<?php } ?>>
					<button id="download" class="btn btn-default searchButton pull-right"><i class="glyphicon glyphicon-cloud-download"></i> Descargar en PDF</button></a>
					</h2>
				</div>
			</div>
			<div class="separador"></div>
			<div class="row">
				<div class="container-fluid material_card">
					<h4>Introducción <b class="caret pull-right" style="position:relative;top:8px"></b></h4>
					<div class="sliderPanel">
					<p>Bestnid es un sistema de remates donde sus usuarios pueden subastar bienes y ofertar por ellos. 
					En Bestnid las subastas son un tanto particulares, ya que el bien subastado no se adjudica al postor 
					que más dinero haya ofrecido por él, sino que cada postor comunica por qué necesita dicho producto, y 
					el subastador elegirá un ganador.</p>
					</div>
				</div>
			</div>
			<div class="separador"></div>
			<div class="row">
				<div class="container-fluid material_card">
					<h4>Lectura del manual <b class="caret pull-right" style="position:relative;top:8px"></b></h4>
					<div class="sliderPanel">
					<p>El proposito de este manual es el de facilitar a los usuarios el uso de Bestnid.<br>
					En cada seccion del manual seran descriptas las herramientas de Bestnid, tanto para usuarios no 
					registrados, usuarios registrados y administradores. Las secciones contienen paso por paso las acciones 
					a realizar para el uso de cada herramienta.</p>
					</div>
				</div>
			</div>
			<div class="separador"></div>
			<div class="row">
				<div class="container-fluid material_card">
					<h4>Requisitos del sistema <b class="caret pull-right" style="position:relative;top:8px"></b></h4>
					<div class="sliderPanel">
					<p>Para poder utilizar Bestnid se debe contar con una computadora con conexión a internet y un navegador. 
					Se recomienda el navegador Google Chrome.</p>
					</div>
				</div>
			</div>
			<div class="separador"></div>
			<div class="row">
				<div class="container-fluid material_card">
					<h4>Área General <b class="caret pull-right" style="position:relative;top:8px"></b></h4>
					<div class="sliderPanel">
					<p>En esta area se procedera con la descripcion de las herramientas y funciones accesibles para todos los 
					tipos de usuarios cubiertos por el sistema (usuarios no registrados, usuarios registrados y administradores).</p>
					</div>
				</div>
			</div>
			<div class="separador"></div>
			<div class="row">
				<div class="container-fluid material_card">
					<h4>Buscar una subasta <b class="caret pull-right" style="position:relative;top:8px"></b></h4>
					<div class="sliderPanel">
					<p>La busqueda de subastas en Bestnid se puede realizar de dos formas: por nombre o por categoria.
						-Busqueda por nombre: para realizar este tipo de busqueda solo se tiene que ingresar el nombre de algun objeto en la barra de busqueda situada a la derecha del boton “Categorias” y el sistema le traera un listado de las subastas que incluyan ese nombre.<br>
						-Busqueda por categoria: para este tipo de busqueda solo debe hacer clic en el boton que dice “Categorias”, a la izquierda de la barra de busqueda de subastas. Al hacer esto se desplegara una lista con todas las categorias registradas en el sistema, al hacer clic en alguna de ellas se mostrara una lista con todas las subastas activas que tengan esa categoria.
						En el listado de subastas podra ver que cada subasta tiene una foto, un nombre, una categoria, y una fecha de vencimiento.
						Al abrir una subasta, lo cual se hace haciendo clic en el nombre del objeto o en el boton “Abrir”, se mostrara tambien una descripcion de la subasta, junto con los comentarios que la misma tenga. Para los usuarios no registrados estan desactivadas las funciones de ofertar y comentar para una subasta.
						Por último, el boton “Ultimas subastas” traera las subastas recientemente creadas.</p>
					</div>
				</div>
			</div>
			<div class="separador"></div>
			<div class="row">
				<div class="container-fluid material_card">
					<h4>Ordenar listado de subastas <b class="caret pull-right" style="position:relative;top:8px"></b></h4>
					<div class="sliderPanel">
					<p>Si usted busco una subasta por nombre o categoria, puede ordenar el listado que el sistema le muestra.
					A la izquierda va a poder observar debajo de “Ultimas subastas” un titulo que dice “Orden del listado”, 
					junto con algunas opciones: “Por Nombre”, “Por Fecha”, y “Por Categoria”.<br>
					“Por Nombre”: las subastas se ordenaran alfabéticamente por nombre.<br>
					“Por Fecha”: las subastas se ordenaran por fecha de creacion desde la mas reciente a la mas antigua.<br>
					“Por Categoria”: las subastas se ordenaran por categoría alfabéticamente.</p>
					</div>
				</div>
			</div>
			<div class="separador"></div>
			<div class="row">
				<div class="container-fluid material_card">
					<h4>Obtener datos de contacto de los administradores <b class="caret pull-right" style="position:relative;top:8px"></b></h4>
					<div class="sliderPanel">
					<p>Para obtener una lista con los mails para contactar a los administradores, solo tiene que acceder a 
					pagina de ayuda y hacer click en el boton que dice "Contacto".<br>
					Al hacer esto aparecera una ventana con una lista de los mails de contacto, la cual puede cerrar haciendo 
					clic en el boton “Cerrar”.</p>
					</div>
				</div>
			</div>
			<div class="separador"></div>
			<div class="row">
				<div class="container-fluid material_card">
					<h4>Área usuario no registrados <b class="caret pull-right" style="position:relative;top:8px"></b></h4>
					<div class="sliderPanel">
					<p>El usuario no registrado puede utilizar cualquiera de las herramientas descriptas en el area general, ademas de poder registrarse en el sistema.
					Para hacer esto tiene que hacer clic en el boton “Registrarse” arriba a la derecha, al lado del boton “Iniciar sesion”.
					Al hacer esto usted debera ingresar la siguiente informacion (los campos que contengan un asterisco(*) en este documento son obligatorios):<br>
					-Nombre*: su primer nombre, debe escribirlo con letras.<br>
					-Apellido*: su apellido, debe escribirlo con letras.<br>
					-Numero de DNI*: el numero de DNI que figura en su documento de identidad, debe escribirlo con numeros.<br>
					-Direccion de mail*: alguna direccion de correo electronico que usted use de forma activa (necesario para avisos como el de recuperacion de contraseña entre otros), debe contener un carácter '@'.<br>
					-Numero de tarjeta de credito*: el numero que figura en su tarjeta de credito, que sera utilizado para las transacciones cuando usted gane una subasta en la que oferto, debe escribirlo con numeros.<br>
					-Contraseña*: aquí debe ingresar su contraseña para luego poder iniciar sesion, la cual debe contener como minimo 6 caracteres entre letras, numeros y caracteres especiales (cualquiera que no sea letra o numero).<br>
					-Confirmar contraseña*: debe volver a ingresar la contraseña que escribio en el campo anterior, respetando mayusculas y minusculas.<br>
					<br>Los campos anteriores se pondran de color rojo si no son validos los datos ingresados (ej: ingresar un numero en un campo de solo letras o viceversa, una contraseña de menos de 6 caracters, la contraseña a confirmar no es la misma que la original, el mail no contiene '@'), en caso de que los datos ingresados sean validos los campos se pondran de color verde y se habilitara el boton “Registro”. Haciendo clic en este ultimo ya lo dejara registrado en el sistema.
					</p>
					</div>
				</div>
			</div>
			<div class="separador"></div>
			<div class="row">
				<div class="container-fluid material_card">
					<h4>Área usuario registrados <b class="caret pull-right" style="position:relative;top:8px"></b></h4>
					<div class="sliderPanel">
					<p>Una vez que usted se haya registrado en el sistema va a poder empezar a subastar, ofertar y comentar en Bestnid, a continuacion se dara 
					una descripcion de las herramientas a las cuales tendra acceso (a su vez, usted tambien podrá realizar cualquier accion ya descripta en el 
					Area General).</p>
					</div>
				</div>
			</div>
			<div class="separador"></div>
			<div class="row">
				<div class="container-fluid material_card">
					<h4>Iniciar/Cerrar sesión <b class="caret pull-right" style="position:relative;top:8px"></b></h4>
					<div class="sliderPanel">
					<p>Para poder iniciar sesion usted ya debe estar registrado en el sistema (ver de Area usuario no registrado para mas informacion sobre 
						como registrarse). Si usted esta registrado va a poder iniciar sesion haciendo clic en el boton “Iniciar sesion” arriba a la derecha de 
						la pagina, donde le va a aparecer una ventana que le pedira que ingrese el mail con el que se registro en el sitio y la contraseña que 
						usted haya elegido. Una vez hecho esto haga clic en el boton rojo “Iniciar sesion” justo debajo de esos campos y su sesion en el sistema 
						ya estara iniciada!<br>
						Para cerrar sesion solo debe hacer clic en el boton “Cerrar Sesion” situado arriba a la derecha de la pagina.</p>
					</div>
				</div>
			</div>
			<div class="separador"></div>
			<div class="row">
				<div class="container-fluid material_card">
					<h4>Perfil de usuario <b class="caret pull-right" style="position:relative;top:8px"></b></h4>
					<div class="sliderPanel">
					<p>Al hacer clic en su nombre de usuario en la esquina superior derecha usted podra ver sus datos de usuario, las subastas que 
						haya iniciado, las subastas donde hizo comentarios, las ofertas que haya recibido para sus subastas, las subastas en donde haya 
						ofertado, y las subastas que gano.</p>
					</div>
				</div>
			</div>
			<div class="separador"></div>
			<div class="row">
				<div class="container-fluid material_card">
					<h4>Crear/Modificar/Cancelar una subasta <b class="caret pull-right" style="position:relative;top:8px"></b></h4>
					<div class="sliderPanel">
					<p>Aqui describiremos como iniciar una subasta, como modificarla una vez ya creada, y como cancelarla.
					Para crear una subasta usted debera haber iniciado sesion previamente. Al hacer esto usted notara un boton abajo a la derecha de color 
					rojo con un signo “+”, al hacer clic en dicho boton le aparecera un cuadro para crear una subasta, en el cual le pedira los siguientes 
					campos obligatorios:<br>
					-Titulo: titulo de la subasta, puede contener numeros y letras.
					-Descripcion: una descripcion acerca del objeto a subastar, puede contener como maximo 200 caracteres incluyendo espacios.<br>
					-Fecha de fin de la subasta: haciendo clic en la flecha se mostrara un calendario donde podra elegir la fecha de finalizacion de la misma 
					(como minimo las subastas tendran una duracion de 2(dos) semanas, por lo tanto podra elegir cualquier dia a partir de ese plazo).<br>
					-Seleccionar categoria: haciendo clic en la flecha usted podra seleccionar una categoria a la que corresponda el objeto a subastar (si usted
					 ve que su objeto no se corresponde con ninguna solo seleccióne la categoria “Otros”).<br>
					-Seleccionar una imagen: si hace clic en el boton “Browse” usted podra buscar en su computadora una foto del objeto a subastar para subir al
					 sistema.<br>
					Una vez completados todos los campos usted puede hacer clic en el boton “crear” para iniciar la subasta. Alternativamente puede salir de esta
					 pagina haciendo clic en el boton “cancelar”.<br>
					Para poder modificar una subasta, usted tendra que ir a su perfil (haciendo clic en su nombre de usuario arriba a la derecha). Una vez dentro
					 de su perfil usted podra ver su informacion, la seccion “Mis subastas” (que muestra todas las subastas que usted haya hecho, en curso, 
					 finalizadas o canceladas), la seccion “Mis comentarios” (que muestra los comentarios que hizo en que subastas y que fechas, con la opcion de 
					 ir a la subasta donde esten esos comentarios), y la seccion “Ofertas recibidas” (que muestra todas las subastas que usted haya creado y que
					  tengan ofertas, con la cantidad de las mismas y la fecha de vencimiento de la subasta). En la seccion “Mis subastas” usted vera que cada 
					  subasta tiene los botones “Modificar” y “cancelar”, por ahora solo nos interesa el primero de estos dos.
					En la pagina para modificar la subasta usted vera que puede cambiar el nombre de la misma, su descripcion, categoria e imagen. Para confirmar 
					las modificaciones haga clic en “Modificar”, caso contrario haga clic en “Cancelar”.
					Cuando usted esta viendo sus subastas, puede ver el boton “Cancelar” en las que estan en curso. Al hacer clic en este boton le aparecera un 
					recuadro que le preguntara si esta seguro que desea cancelar la subasta.
					IMPORTANTE: no puede cancelar subastas que ya posean ofertas.</p>
					</div>
				</div>
			</div>
			<div class="separador"></div>
			<div class="row">
				<div class="container-fluid material_card">
					<h4>Ofertar <b class="caret pull-right" style="position:relative;top:8px"></b></h4>
					<div class="sliderPanel">
					<p>Para poder ofertar usted ya tiene que estar registrado en el sistema y haber iniciado sesion en el mismo.
					Cumpliendo lo anterior, usted podra ver cuando entra en la pagina de una subasta que a su derecha tiene un recuadro que dice “Ofertar”, 
					dentro de este recuadro podra ver lo siguiente:<br>
					-Monto de la subasta en $: monto que usted ofrece para la subasta (minimo 1(un) peso argentino).<br>
					-Agregar un motivo: aca usted debe ingresar el motivo por el cual quiere el objeto de la subasta, puede escribir un motivo de hasta 300 
					caracteres.<br>
					Una vez rellenados ambos campos usted puede enviar su oferta. Si una oferta suya fue elegida como ganadora de una subasta, usted recibira 
					una notificacion de que gano dicha subasta (las notificaciones las podra ver en la campañita que aparece al lado de la barra de busqueda).<br>
					IMPORTANTE: usted solo puede ofertar 1(una) vez por subasta.</p>
					</div>
				</div>
			</div>
			<div class="separador"></div>
			<div class="row">
				<div class="container-fluid material_card">
					<h4>Elegir ganador <b class="caret pull-right" style="position:relative;top:8px"></b></h4>
					<div class="sliderPanel">
					<p>Para poder elegir el ganador de una subasta usted tiene que estar registrado en el sistema, haber iniciado sesion, y tener 
					subastas que hayan recibido ofertas.
					Para ver dichas ofertas vaya a la seccion “Ofertas recibidas” dentro de su perfil de usuario, donde para cada subasta podra ver 
					las ofertas haciendo clic en “Ver ofertas”, y aparecera una ventana mostrando las ofertas de esa subasta con el motivo. Usted puede 
					elegir la oferta con el motivo que mas le guste, y solo debe hacer clic en dicha oferta para elegirla como ganadora.
					Una vez hecho esto el usuario que realizo dicha oferta recibira una notificacion de que gano la subasta, y usted recibira una notificacion
					 de que la subasta ya termino y cuanto fue el monto que recibio de la oferta que gano.
					IMPORTANTE: el monto que USTED reciba de una oferta es el 70% del monto de esa oferta, el 30% restante va para el dueño del sistema.</p>
					</div>
				</div>
			</div>
			<div class="separador"></div>
			<div class="row">
				<div class="container-fluid material_card">
					<h4>Comentar/Responder <b class="caret pull-right" style="position:relative;top:8px"></b></h4>
					<div class="sliderPanel">
					<p>Usted puede comentar en cualquier subasta siempre y cuando este registrado y con sesion iniciada en el sistema.
					Para comentar solo debe ir a la pagina de alguna subasta, y abajo le aparecera un recuadro para poder realizar comentarios en 
					la misma, nada mas debera completar el recuadro y hacer clic en el boton “Publicar comentario”. Los comentarios que se muestran 
					para una subasta son anonimos.
					Para responder comentarios hechos en subastas que usted haya creado, tan solo debe buscar aquellos comentarios que tengan un 
					recuadro para completar y el boton “Responder”. Una vez rellenado el recuadro y hecho clic en dicho boton, se publicara su respuesta 
					al comentario.<br>
					IMPORTANTE: los comentarios pueden tener solo 1(UNA) respuesta de parte suya.</p>
					</div>
				</div>
			</div>
			<div class="separador"></div>
			<div class="row">
				<div class="container-fluid material_card">
					<h4>Eliminar comentarios <b class="caret pull-right" style="position:relative;top:8px"></b></h4>
					<div class="sliderPanel">
					<p>Usted podra eliminar comentarios habiendose registrado e iniciado sesion en el sistema.
					Usted puede eliminar comentarios que haya hecho en otras subastas, y comentarios y respuestas en subastas que usted haya iniciado.
					Para eliminar comentarios nada mas debera hacer clic en el boton “Eliminar” que se encuentra dentro del comentario o respuesta.
					Todos los comentarios eliminados se muestran como “Comentario eliminado”.</p>
					</div>
				</div>
			</div>
			<div class="separador"></div>
			<div class="row">
				<div class="container-fluid material_card">
					<h4>Modificar datos del perfil <b class="caret pull-right" style="position:relative;top:8px"></b></h4>
					<div class="sliderPanel">
					<p>Usted podra modificar sus datos personales desde su pagina personal(Ver inciso "Perfil de usuario").
					Los datos podrán ser editados pasando el mouse sobre cada uno de ellos y haciendo click en el boton "editar" que aparece.<br>
					IMPORTANTE: al cambiar su dirección de  e-mail debera indicar una dirección que no haya sido registrada en el sistema, 
					si la direccion no esta disponble para su uso el sistema emitirá un mensaje de error.</p>
					</div>
				</div>
			</div>
			<div class="separador"></div>
			<div class="row">
				<div class="container-fluid material_card">
					<h4>Recuperar contraseña <b class="caret pull-right" style="position:relative;top:8px"></b></h4>
					<div class="sliderPanel">
					<p>Para hacer esto usted debe estar registrado en el sistema.
					Si usted se olvida su contraseña de inicio de sesion, va a ver un boton “Olvide mi contraseña” en la ventana de inicio de sesion.
					Al hacer clic en dicho boton se abrira una ventana donde usted debera ingresar el mail con el que se registro en el sistema y hacer 
					clic en el boton “Confirmar”. Una vez hecho esto recibira un mail con una contraseña temporal para que pueda iniciar sesion, la cual
					 vencera dentro del plaza de 24 horas de que se le haya enviado el mail.
					Una vez que usted haya iniciado sesion se recomienda que modifique su contraseña</p>
					</div>
				</div>
			</div>
			<div class="separador"></div>
			<div class="row">
				<div class="container-fluid material_card">
					<h4>Modificar contraseña <b class="caret pull-right" style="position:relative;top:8px"></b></h4>
					<div class="sliderPanel">
					<p>La contraseña podra ser modificada de la misma manera que cualquier dato de su perfil (ver el inciso "Modificar datos del perfil").
					Adicionalmente se le solicitará que ingrese su contraseña actual seguido de la nueva contraseña y su correspondiente confirmación(ingresar 
					nuevamente la nueva contraseña ya ingresada).</p>
					</div>
				</div>
			</div>
			<div class="separador"></div>
			<div class="row">
				<div class="container-fluid material_card">
					<h4>Borrar perfil del sistema <b class="caret pull-right" style="position:relative;top:8px"></b></h4>
					<div class="sliderPanel">
					<p>Desde su pagina personal(Ver el inciso "Perfil de usuario"), podra encontrar si coloca el puntero del mouse sobre sus datos 
					personales el boton "Eliminar mi cuenta", si hace click sobre él se visualizara una confirmacion para desactivar su cuenta.<br>
					IMPORTANTE: No es posible desactivar su cuenta si posee subastas activas.</p>
					</div>
				</div>
			</div>
			<div class="separador"></div>
			<?php if(isset($_SESSION['id']) && $_SESSION['admin']==1){ ?>
			<div class="row">
				<div class="container-fluid material_card">
					<h4>Área administrador <b class="caret pull-right" style="position:relative;top:8px"></b></h4>
					<div class="sliderPanel">
					<p>Aqui seran descriptas las herramientas que estan disponibles para los administradores del sistema. 
					Los administradores al ser usuarios registrados contaran con todas las herramientas que dicho tipo de usuario tiene acceso, 
					ademas de las herramientas descriptas en el Area General.
					Como administrador usted podra: realizar reportes de ventas, realizar reportes de usuarios, y manejar las categorias de las subastas.</p>
					</div>
				</div>
			</div>
			<div class="separador"></div>
			<div class="row">
				<div class="container-fluid material_card">
					<h4>Reportes de usuarios/ventas <b class="caret pull-right" style="position:relative;top:8px"></b></h4>
					<div class="sliderPanel">
					<p>A la derecha de la barra de busquedas usted vera un boton que dice “Reportes”, al hacer clic en dicho boton usted podra elegir 
					entre ver un reporte de ventas y uno de usuarios.
					Reporte de ventas: debera elegir una fecha de inicio del reporte y una fecha de “hasta”, para indicar el rango de fechas en las que 
					quiere ver las ventas realizadas. Una vez elegidas las fechas haga clic en “enviar” y vera un listado con las ventas realizadas entre 
					dichas fechas, donde se mostrara el nombre de la subasta, el dueño, la fecha de la venta, el monto con el que se cerro la subasta, y 
					el monto que fue para Bestnid. Ademas podra ver la cantidad de ventas, el rango de fechas, el monto total de ventas en dicho rango, y 
					el monto total que fue para Bestnid en dicho rango.
					Reporte de usuarios: siguiendo el mismo procedimiento que para el reporte de ventas, usted recibira un listado con los nombres y 
					apellidos de los usuarios registrados dentro del rango de fechas ingresado, junto con sus mails, fechas de registro en el sistema, 
					dni y numero de tarjeta de credito. Ademas podra ver el numero total de registros dentro del rango de fechas.</p>
					</div>
				</div>
			</div>
			<div class="separador"></div>
			<div class="row">
				<div class="container-fluid material_card">
					<h4>Manejo de categorías <b class="caret pull-right" style="position:relative;top:8px"></b></h4>
					<div class="sliderPanel">
					<p>Usted podrá crear, modificar y eliminar categorías de subastas en Bestnid en la 
					página para administrar las categorías. usted podrá acceder a esta pagina haciendo clic en el botón 
					“Categorías” que se encuentra a la izquierda del buscador y al final de todas las categorías se encontrara una 
					opción llamada “administrar categorías”.</p>
					<img class="img-thumbnail" src="resources/help/image001.png"><br>
					<p>hace click ahí y lo llevara a la página administrar categorías, apareciéndole en la pagina el listados de las 
					categorias y unos botones, llamados agregar, modificar, eliminar y volver a la pagina principal</p>
					<p>Pagina administrar categoría:</p>
					<img class="img-thumbnail" src="resources/help/image002.png"><br><br>
					<p>Para crear una nueva categoría, usted debe hacer click en el botón “agregar”</p>
					<img class="img-thumbnail" src="resources/help/image003.png"><br>
					<p>y aparecerá una ventana, donde debe escribir el nombre de la categoría y hacer click en el boton “agregar”</p>
					<img class="img-thumbnail" src="resources/help/image004.png"><br>
					<p>con eso la categoría será dada de alta.</p>
					<p>Para modificar una o varias categorias haga click en el botón “Modificar” </p>
					<img class="img-thumbnail" src="resources/help/image005.png"><br>
					<p>y aparecerá una ventana</p>
					<img class="img-thumbnail" src="resources/help/image006.png"><br>
					<p>Edite el o los campos de la categoría o las categorias que desea modificar y haga click en “modificar” y se modificaran las categorias.</p>
					<p>Para eliminar una categoría, debe hacer click en la opción “eliminar”</p>
					<img class="img-thumbnail" src="resources/help/image007.png"><br>
					<p>Y aparecerá la siguiente ventana</p>
					<img class="img-thumbnail" src="resources/help/image008.png"><br>
					<p>Seleccione la o las categorias que desea eliminar y haga click en el boton “borrar”</p>
					<img class="img-thumbnail" src="resources/help/image009.png"><br>
					<p>Con eso las categorías seleccionadas serán borradas.</p>
					</div>
				</div>
			</div>
			<div class="separador"></div>
			<?php } ?>
			<!-- <div class="row">
				<div class="container-fluid material_card">
					<h4> <b class="caret pull-right" style="position:relative;top:8px"></b></h4>
					<div class="sliderPanel">
					<p></p>
					</div>
				</div>
			</div>
			<div class="separador"></div>
			 -->
			
			
		</div>
		<div class="col-lg-2"></div>
	</div>
	<br>
	<br>
</body>
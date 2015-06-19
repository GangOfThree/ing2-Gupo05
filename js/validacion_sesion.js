var okMail=false;
var okPass=false;

function verificarUsuario(){
	var usuarioMail=document.signUser.usuarioMail.value;
	var usuarioPass=document.signUser.usuarioPass.value;
	$.ajax({type:"POST",
			url:"DBquery/crear_sesion.php",
			data:{"email": usuarioMail,"password":usuarioPass},
			success:function(msg){
				if(msg==0){
					// alert("logueado!");
					//Despues del mensaje borrar los input's
					document.signUser.usuarioMail.value='';
					document.signUser.usuarioPass.value='';
					location.href="principal.php";
				}
				else{
					if(msg==1){
						alert("el usuario no existe!");
					}
					else{
						alert("la contraseña no es correcta!");
					}
				}
			}
	})
}
function activarSignBoton(){
	var boton = document.getElementById("signButton");
	if(okMail && okPass){
		boton.disabled=false;
	}
}
function desactivarSignBoton(){
	var boton = document.getElementById("signButton");
	boton.disabled=true;
}
function verificarUserMail(){
	if(document.signUser.usuarioMail.checkValidity()){
		okMail=true;
		activarSignBoton();
	}
	else{
		okMail=false;
		desactivarSignBoton();
	}
}
function verificarUserPass(){
	if(document.signUser.usuarioPass.checkValidity()){
		okPass=true;
		activarSignBoton();
	}
	else{
		okPass=false;
		desactivarSignBoton();
	}
}


$(document).ready(function(){
	$('input[name=usuarioMail]').keyup(
	function(){
		if(this.checkValidity()){
			$('input[name=usuarioMail]').popover('destroy');
		}
		else{
			$('input[name=usuarioMail]').popover('show');
		}
	});
});
$(document).ready(function(){
	$('input[name=usuarioPass]').keyup(
	function(){
		if(this.checkValidity()){
			$('input[name=usuarioPass]').popover('destroy');
		}
		else{
			$('input[name=usuarioPass]').popover('show');
		}
	});
});
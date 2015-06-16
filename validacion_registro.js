var pass;
var okNombre=false;
var okApellido=false;
var okMail=false;
var okPass=false;
var okDni=false;
var okTarjeta=false;
var okPass=false;


function setPassword(f){
	var tilde = document.getElementById("tickPassConf");
	var tildePass = document.getElementById("tickPass");
	var password_confirmation = document.newUser.password_confirmation;
	if(pass != f){
		desactivarBoton();
		tilde.style.display="none";
		pass=f;
	}
	if(document.newUser.password.checkValidity()){
		password_confirmation.disabled=false;
		tildePass.style.display="inline";
	}
	else{
		password_confirmation.value='';
		password_confirmation.disabled=true;
		tildePass.style.display="none";
	}
}
function validatePassword(f) {
	var tilde = document.getElementById("tickPassConf");
	if(f.localeCompare(pass)==0){
		okPass=true;
		if(pass != ''){
			tilde.style.display="inline";
			activarBoton();
		}
	}
	else{
			okPass=false;
			desactivarBoton();
			tilde.style.display="none";
		
	}
}
function activarBoton(){
	var boton = document.getElementById("registerButton");
	if(okNombre && okDni && okTarjeta && okMail && okPass){
		boton.disabled=false;
	}
}
function desactivarBoton(){
	var boton = document.getElementById("registerButton");
	boton.disabled=true;
}
function verificarNombre(){
	var tilde = document.getElementById("tickNombre");
	if(document.newUser.nombre.checkValidity()){
		okNombre=true;
		tilde.style.display="inline";
		activarBoton();
	}
	else{
		okNombre=false;
		desactivarBoton();
		tilde.style.display="none";
	}
}
function verificarApellido(){
	var tilde = document.getElementById("tickApellido");
	if(document.newUser.apellido.checkValidity()){
		okApellido=true;
		tilde.style.display="inline";
		activarBoton();
	}
	else{
		okApellido=false;
		desactivarBoton();
		tilde.style.display="none";
	}
}
function verificarMail(){
	var tilde = document.getElementById("tickMail");
	if(document.newUser.email.checkValidity()){
		okMail=true;
		tilde.style.display="inline";
		activarBoton();
	}
	else{
		okMail=false;
		desactivarBoton();
		tilde.style.display="none";
	}
}
function verificarTarjeta(){
	var tilde = document.getElementById("tickTarjeta");
	if(document.newUser.tarjeta.checkValidity()){
		okTarjeta=true;
		tilde.style.display="inline";
		activarBoton();
	}
	else{
		okTarjeta=false;
		desactivarBoton();
		tilde.style.display="none";
	}
}
function verificarDni(){
	var tilde = document.getElementById("tickDNI");
	if(document.newUser.dni.checkValidity()){
		okDni=true;
		tilde.style.display="inline";
		activarBoton();
	}
	else{
		okDni=false;
		desactivarBoton();
		tilde.style.display="none";
	}
}
function resetFields(){
	document.newUser.nombre.value='';
	document.getElementById("tickNombre").style.display="none";
	document.newUser.apellido.value='';
	document.getElementById("tickApellido").style.display="none";
	document.newUser.dni.value='';
	document.getElementById("tickDNI").style.display="none";
	document.newUser.email.value='';
	document.getElementById("tickMail").style.display="none";
	document.newUser.tarjeta.value='';
	document.getElementById("tickTarjeta").style.display="none";
	document.newUser.password.value='';
	document.getElementById("tickPass").style.display="none";
	document.newUser.password_confirmation.value='';
	document.getElementById("tickPassConf").style.display="none";
	desactivarBoton();

}
function verificar(){
	var nombre=document.newUser.nombre.value;
	var apellido=document.newUser.apellido.value;
	var dni=document.newUser.dni.value;
	var tarjeta=document.newUser.tarjeta.value;
	var password=document.newUser.password.value;
	var email=document.newUser.email.value;
	var password_confirmation=document.newUser.password_confirmation.value;
	$.ajax({type:"POST",
			url:"user_alta.php",
			data:{"email": email,"nombre" : nombre, "apellido" : apellido,"dni": dni,"tarjeta": tarjeta,"password":password},
			success:function(msg){
				if(msg==0){
					alert("nuevo usuario registrado!");
					//Despues del mensaje borrar los input's
					resetFields();

					location.href="autosign.php?email="+email;
				}
				else{
					alert("ya existe otro usuario registrado con este email!!!");
				}
			}
	})
}

// popover warnings

$(document).ready(function(){
	$('input[name=nombre]').keyup(
	function(){
		if(this.checkValidity()){
			$('input[name=nombre]').popover('destroy');
		}
		else{
			$('input[name=nombre]').popover('show');
		}
	});
});
$(document).ready(function(){
	$('input[name=apellido]').keyup(
	function(){
		if(this.checkValidity()){
			$('input[name=apellido]').popover('destroy');
		}
		else{
			$('input[name=apellido]').popover('show');
		}
	});
});
$(document).ready(function(){
	$('input[name=tarjeta]').keyup(
	function(){
		if(this.checkValidity()){
			$('input[name=tarjeta]').popover('destroy');
		}
		else{
			$('input[name=tarjeta]').popover('show');
		}
	});
});
$(document).ready(function(){
	$('input[name=email]').keyup(
	function(){
		if(this.checkValidity()){
			$('input[name=email]').popover('destroy');
		}
		else{
			$('input[name=email]').popover('show');
		}
	});
});
$(document).ready(function(){
	$('input[name=dni]').keyup(
	function(){
		if(this.checkValidity()){
			$('input[name=dni]').popover('destroy');
		}
		else{
			$('input[name=dni]').popover('show');
		}
	});
});
$(document).ready(function(){
	$('input[name=password]').keyup(
	function(){
		if(this.checkValidity()){
			$('input[name=password]').popover('destroy');
		}
		else{
			$('input[name=password]').popover('show');
		}
	});
});
$(document).ready(function(){
	$('input[name=password_confirmation]').keyup(
	function(){
		if(this.checkValidity()){
			$('input[name=password_confirmation]').popover('destroy');
		}
		else{
			$('input[name=password_confirmation]').popover('show');
		}
	});
});
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
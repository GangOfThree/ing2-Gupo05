var pass;
function setPassword(f){
	pass=f;
	var boton = document.getElementById("registerButton");
	var tilde = document.getElementById("tick");
	boton.disabled=true;
	tilde.style.display="none";
}
function validatePassword(f) {
	var boton = document.getElementById("registerButton");
	var tilde = document.getElementById("tick");
	if(f.localeCompare(pass)==0){
		boton.disabled=false;
		tilde.style.display="inline";
	}
	else{
		boton.disabled=true;
		tilde.style.display="none";
	}
}
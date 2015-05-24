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
function verificar(){
	// divresultado= document.getElementById('final');
	var email =document.newUser.email.value;
	//divresultado es un mensaje de espera
	// divresultado.innerHTML="<img src='loading.gif'>";
	$.ajax({type:"POST",
			url:"ver.php",
			data:"email="+email,
			success:function(msg){
				// $("#final").html(msg);
				alert(email);
				//Despues del mensaje borrar los input's
				document.getElementById('email').value = '';
			}
	})
}
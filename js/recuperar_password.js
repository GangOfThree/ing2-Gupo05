$(document).ready(function(){
	$('input[name=recuperarUsuarioMail]').keyup(
	function(){
		if(this.checkValidity()){
			$('input[name=recuperarUsuarioMail]').popover('destroy');
			$("#botonRecuperar")[0].disabled=false;
		}
		else{
			$('input[name=recuperarUsuarioMail]').popover('show');
			$("#botonRecuperar")[0].disabled=true;
		}
	});
});

function verificarMailARecuperar(){
	var mail=document.getElementById("recuperarUsuarioMail").value;
	$.ajax({type:"POST",
			url:"DBquery/verificar_mail.php",
			data:{"usuarioMail": mail},
			success:function(msg){
				if(msg==0){
					alert("Este mail no existe");
				}
				else{
					alert("Se ha enviado una contraseña temporal a su mail que expirará en 24 horas");
				}
			}		
	});
}


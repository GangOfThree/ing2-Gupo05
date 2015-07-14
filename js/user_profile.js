function autofitIframe(id){
	if (!window.opera && document.all && document.getElementById){
		id.style.height=id.contentWindow.document.body.scrollHeight;
	} else if(document.getElementById) {
		id.style.height=id.contentDocument.body.scrollHeight+"px";
	}
}
function mostrar(id){
	var listado=document.getElementById(id);
	if(listado.style.display=="none"){
		listado.style.display="block";
	}
	else{
		listado.style.display="none";
	}
}

var ocultarBotonAceptarMail=true;

$(document).ready(function(){
	$(".data-user").hover(function(){
			var content=$(this).find('#content').text();
			var editButton=$(this).find('#edit');
	    	editButton.fadeToggle(30);
			editButton.click(function(){
			    $(this).css('visibility', 'hidden');
			    $(this).addClass("disabled");
			    $(this).parent().find('#content').toggle();
			    $(this).parent().find('#edit-input').removeClass("hidden");
			});
			$(this).find('#confirm').click(function(){
				if(($(this).attr("name")!="mailConfirm") || ($(this).attr("name")=="mailConfirm" && ocultarBotonAceptarMail)){
					$(this).parent().addClass("hidden");
					editButton.css('visibility', 'visible');
					editButton.removeClass("disabled");
					editButton.parent().find('#content').toggle();
				}
			});
			$(this).find('#cancel').click(function(){
				$(this).parent().find('.edit-input').val(content);
				$(this).parent().find('#confirm').removeClass("disabled");
				$(this).parent().addClass("hidden");
				editButton.css('visibility', 'visible');
				editButton.removeClass("disabled");
				editButton.parent().find('#content').toggle();
				if ($(this).attr("name")=="mailCancel"){
					ocultarBotonAceptarMail=true;
				}
			});
	});

	$('.edit-input').keyup(function(){
		if(this.checkValidity()){
			$(this).parent().find('#confirm').removeClass("disabled");
			$(this).popover('destroy');
		}
		else{
			$(this).parent().find('#confirm').addClass("disabled");
			$(this).popover('show');
		}
	});
	//mostrar el boton para cambiar el password
	$("#showPassword").hover(function(){
		$(this).find('#editPass').toggle();
	});

	$('.passwordCheck').keyup(function(){
		if(this.checkValidity()){
			$(this).popover('destroy');
		}
		else{
			$(this).popover('show');
		}
	});

	$("#cancelPassEdit").click(function(){
		$('.passwordCheck').popover('destroy');
	});
});

function verificarMailIngresado(input){
	var mail=input.value;
	var oldMail=$("span[name=mailFieldContent]").text();

	if(mail.localeCompare(oldMail)==0){
		ocultarBotonAceptarMail=true;
	}
	else{
		$.ajax({type:"POST",
			url:"DBquery/verificar_mail.php",
			data:{"usuarioMail": mail},
			success:function(msg){
				if(msg!=0){
					ocultarBotonAceptarMail=false;
				}
				else{
					ocultarBotonAceptarMail=true;
				}
			}		
		});
	}
}

function modify(button,id){
	if(id=="mail" && !ocultarBotonAceptarMail){
		alert("Este mail ya esta siendo utilizado en otra cuenta!");
		return 1;
	}
	var fieldValue=document.getElementById(id).value;
	// alert(fieldValue);	
	$.ajax({type:"POST",
			url:"DBquery/modificacion_user.php",
			data:{"tipo": id,"valor": fieldValue},
			success:function(msg){
				button.parentNode.parentNode.getElementsByClassName('dataToShow')[0].textContent=fieldValue;
				if(id=="nombre" || id=="apellido"){
					document.getElementById("userNyAp").textContent=msg;
				}
			}		
	});
	return 0;
}

var okOldPass=false;
var okNewPass=true;

function verificarPassAnterior(input){
	if(input.checkValidity()){
		$("#oldPass").addClass("has-success has-feedback");
		okOldPass=true;
	}
	else{
		$("#oldPass").removeClass("has-success has-feedback");
		okOldPass=false;
	}
	activarConfirmacion();
}
function verificarNuevoPass(input){
	$("#confirmNewPassInput")[0].pattern=input.value;
	if(input.checkValidity()){
		$("#newPass").addClass("has-success has-feedback");
		$("#confirmNewPassInput")[0].disabled=false;
		confirmarNuevoPass($("#confirmNewPassInput")[0]);
	}
	else{
		$("#newPass").removeClass("has-success has-feedback");
		$("#confirmNewPassInput")[0].disabled=true;
		$("#confirmNewPass").removeClass("has-success has-feedback");
	}
}
function confirmarNuevoPass(input){
	if(input.checkValidity()){
		$("#confirmNewPass").addClass("has-success has-feedback");
		okNewPass=true;
	}
	else{
		$("#confirmNewPass").removeClass("has-success has-feedback");
		okNewPass=false;
	}
	activarConfirmacion();
}

function resetPassFields(){
	var oldPass=document.getElementById("oldPassInput");
	oldPass.value="";
	var newPass=document.getElementById("newPassInput");
	newPass.value="";
	var confirmNewPass=document.getElementById("confirmNewPassInput");
	confirmNewPass.value="";
	verificarNuevoPass(newPass);
	verificarPassAnterior(oldPass);
}

function modifyPassword(){
	var fieldValue=document.getElementById("newPassInput").value;
	$.ajax({type:"POST",
			url:"DBquery/modificacion_user.php",
			data:{"tipo": "password","valor": fieldValue},
			success:function(msg){
				document.getElementById("oldPassInput").pattern=fieldValue;
				resetPassFields();
				alert("Contraseña modificada!");
			}		
	});
}

function activarConfirmacion(){
	if(okOldPass && okNewPass){
		document.getElementById("newPasswordButton").disabled=false;
	}
	else{
		document.getElementById("newPasswordButton").disabled=true;
	}
}

function querySubastaActiva(){
	$.ajax({type:"POST",
			url:"DBquery/query_subastas_activas.php",
			success:function(msg){
				if(msg!=0){
					$("#controlDelete").show();
					$("#closeDelete").hide();
					document.getElementById("passDeleteInput").pattern=msg;
					verificarPassDelete(document.getElementById("passDeleteInput"));
					$("#mensajeNonDelete").hide();
					$("#passForDelete").show();
				}
				else{
					$("#controlDelete").hide();
					$("#closeDelete").show();
					$("#passForDelete").hide();
					$("#mensajeNonDelete").show();
				}
				$("#closeAccount").modal();
			}		
	});
}

$(document).ready(function(){
	$("#cancelDelete").click(function(){
		$("#passDeleteInput").val("");
		$("#passDeleteInput").popover("destroy");
	});
});

function verificarPassDelete(input){
	if(input.checkValidity()){
		$("#passForDelete").addClass("has-success has-feedback");
		$("#confirmDelete")[0].disabled=false;
	}
	else{
		$("#passForDelete").removeClass("has-success has-feedback");
		$("#confirmDelete")[0].disabled=true;
	}
}
function closeProfile(){
	$.ajax({type:"POST",
			url:"DBquery/user_baja.php",
			success:function(msg){
				$(location).attr('href','DBquery/cerrar_sesion.php');
			}		
	});
}

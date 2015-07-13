$(document).ready(function(){
	updateLeidos();
	setInterval(function(){updateLeidos();}, 5000);
});

function updateLeidos(){
	$.ajax({type:"POST",
			url:"DBquery/notificaciones_no_leidas.php",
			success:function(msg){
					$("#count").text(msg);
					if(msg != ""){
						if(msg == 1){
							$("#notificaciones").tooltip('hide');
		        			$("#notificaciones").attr('data-original-title', '¡Tenes una nueva notificacion!');
		                    $("#notificaciones").tooltip('fixTitle');
						}
						else{
							$("#notificaciones").tooltip('hide');
		        			$("#notificaciones").attr('data-original-title', '¡Tenes '+msg+' nuevas notificaciones!');
		                    $("#notificaciones").tooltip('fixTitle');	
						}                
					}
					else{
						$("#notificaciones").tooltip('hide');
	        			$("#notificaciones").attr('data-original-title', 'Notificaciones');
	                    $("#notificaciones").tooltip('fixTitle');
					}
				}
	})
}
$(document).ready(function(){

	$('tr').click(function(){
		$(this).css("font-weight", "normal");
	});
});

function marcarLeido(id){
	$.ajax({type:"POST",
			url:"DBquery/leer_notificacion.php",
			data:{"idnotificacion": id},
			success:function(msg){
				updateLeidos();
			}
	})
}
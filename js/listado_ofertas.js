var mostrar=true;
var botonVer;

function registrarVenta(id){
	$.ajax({type:"POST",
			url:"alta_venta.php",
			data:{"idoferta": id},
			success:function(msg){
					// alert("venta registrada!");
			}
	})
}

$(document).ready(function(){

$("tr").hover(function(){
	if (mostrar) {
    	$(this).find('#choose').toggle();
    };
});
$("tr").hover(function(){
	var ok=false;
	botonVer=$(this).find('#choose');

	$("div").find('#confirm').click(function(){
		ok=true;
		if(ok){
		    botonVer.addClass("btn-success disabled","easeOutSine");
		    botonVer.html("Venta Registrada");
		    mostrar=false;
		    botonVer.fadeIn(800);
		    botonVer.attr('id')="successButton";
		}
    });
	
});


});


// });
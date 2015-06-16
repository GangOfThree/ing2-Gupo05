function activar(f){
	var lista= document.getElementById("ordenes").getElementsByTagName("li");
	for (var i = 0; i < lista.length; i++) {
		lista[i].className="item";
	};
	
	f.className="active";
}
function autofitIframe(id){
	if (!window.opera && document.all && document.getElementById){
		id.style.height=id.contentWindow.document.body.scrollHeight;
	} else if(document.getElementById) {
		id.style.height=id.contentDocument.body.scrollHeight+"px";
	}
}
function mostrar(id){
	var listado=document.getElementById(id);
	var porNombre=document.getElementById("porNombre");
	var porFecha=document.getElementById("porFecha");
	var porCategoria=document.getElementById("porCategoria");
	if(porNombre.style.display == "block"){
		porNombre.style.display="none";
	}
	else{
		if(porFecha.style.display == "block"){
			porFecha.style.display="none";
		}
		else{
			if(porCategoria.style.display == "block"){
				porCategoria.style.display="none";
			}
		}
	}
	listado.style.display="block";


}
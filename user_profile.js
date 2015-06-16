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

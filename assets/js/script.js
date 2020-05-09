


var valor =  document.getElementById('valor');
var paginas =  document.getElementById('paginas');
var vias =  document.getElementById('vias');
var opcoes =  document.getElementById('opcoes');



opcoes.addEventListener("click", function(){
 	if(opcoes.value=='TDs'){
 		valor.disabled = true;
 		paginas.disabled=false;
 		vias.disabled=false;

 	}
 	if(opcoes.value=='TD'){
 		valor.disabled = false;
 		paginas.disabled=true;
 		vias.disabled=true;
 	}

});



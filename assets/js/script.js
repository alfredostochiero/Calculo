
var valor =  document.getElementById('valor');
var paginas =  document.getElementById('paginas');
var vias =  document.getElementById('vias');
var opcoes =  document.getElementById('opcoes');
var anexa =  document.getElementById('anexa');



opcoes.addEventListener("click", function(){
	
	switch(opcoes.value){
		case 'TDs':
		valor.disabled = true;
 		paginas.disabled=false;
 		vias.disabled=false;
 		break;

 		case 'TD':
 		valor.disabled = false;
 		paginas.disabled=true;
 		vias.disabled=true;
 		anexa.disabled = true;
 		break

 		case 'NOT':
 		valor.disabled = true;
 		paginas.disabled=false;
 		vias.disabled=false;
 		anexa.disabled = false;
 		break;

 		case 'SEL':
 		valor.disabled = false;
 		paginas.disabled=false;
 		vias.disabled=false;
 		anexa.disabled = false;
 		break;

	}


 	


});



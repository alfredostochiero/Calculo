
var valor =  document.getElementById('valor');
var paginas =  document.getElementById('paginas');
var vias =  document.getElementById('vias');
var opcoes =  document.getElementById('opcoes');
var deligencia =  document.getElementById('deligencia');
var nomes =  document.getElementById('nomes');
var TD = document.getElementById('TD');
var TDs = document.getElementById('TDs');
var NOT = document.getElementById('NOT');
var tabelaResposta = document.getElementById('tabelaResposta');

function mostrarLista(){
	tabelaResposta.setAttribute('hidden',true);
}


opcoes.addEventListener("click", function(){
	
	switch(opcoes.value){
		case 'TDs':
		valor.disabled = true;
 		paginas.disabled=false;
 		vias.disabled=false;
 		deligencia.disabled = true;
 		break;

 		case 'TD':
 		valor.disabled = false;
 		paginas.disabled=false;
 		vias.disabled=false;
 		deligencia.disabled = true;
 		break

 		case 'NOT':
 		valor.disabled = true;
 		paginas.disabled=false;
 		vias.disabled=false;
 		deligencia.disabled = false;
 		break;

 		case 'SEL':
 		valor.disabled = false;
 		paginas.disabled=false;
 		vias.disabled=false;
 		deligencia.disabled = false;
 		break;

	}


 	


});



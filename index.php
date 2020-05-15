<!DOCTYPE html>
<html>
<head>
	<title>Calculo de Emonumeno</title>
	<link rel="stylesheet" href="assets/css/bootstrap.css"/>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
</head>
<body>
	<div class="container">
		<form method="POST">
			 <div class="form-group">
			    Opções
			    <select class="form-control" name="opcoes" id="opcoes" onchange="mostrarLista()">
			    	  <option value="SEL" id="SEL" selected>Selecione</option> 	
				      <option value="TD"  id="TD"  >TD com valor</option>
				      <option value="TDs" id="TDs" >TD sem valor</option>
				      <option value="NOT" id="NOT" >Notificação</option>
				      
			     </select>
  			</div>
  			<div class="form-group">
				Qtd Nomes: 
				<input type="text" name="nomes" id="nomes" class="form-control"><br/>
			</div>

			<div class="form-group">
				Valor: 
				<input type="text" name="valor" id="valor" class="form-control"><br/>
			</div>
			<div class="form-group">
				Qtd páginas: 
				<input type="number" name="paginas" id="paginas" class="form-control"><br/>
			</div>
			<div class="form-group">
				Qtd vias: 
				<input type="number" name="vias" id="vias" class="form-control"><br/>
			</div>
			<div class="form-group">
				Qtd diligências: 
				<input type="number" name="anexa" id="deligencia" class="form-control"><br/>
			</div>
			<input type="submit" name="Calcular" value="Calcular" class="btn btn-primary">
			<input type="submit" value="Limpar"   class="btn btn-light" onclick="location.reload(true);">
		</form>
	
	<?php 
		require 'calculos.php';
			$tipo =  filter_input(INPUT_POST,'opcoes');
			$valor =  filter_input(INPUT_POST,'valor');   
			$paginas =  filter_input(INPUT_POST,'paginas');
			$vias =  filter_input(INPUT_POST,'vias');
			$deligencia = filter_input(INPUT_POST,'deligencia');
			$nomes =  filter_input(INPUT_POST, 'nomes');


			$Calculo = new Calculo;
			$valor = $Calculo->converter($valor);

			if($valor && $tipo =="TD")            {$resultado = $Calculo->calcularTD($valor,$paginas,$vias,$nomes);}
			if($paginas && $vias && $tipo =="TDs"){$resultado = $Calculo->calcularTDs($paginas,$vias,$nomes);}
			if($paginas && $tipo =="NOT"){$resultado = $Calculo->calcularNot($paginas,$deligencia,$nomes);}
		

		
	?>

	<?php if(isset($_POST['Calcular']) && $tipo && ($valor || $paginas)): ?>
		  <?php	require_once 'lista.php'; ?> 
	<?php endif; ?>  


	</div>

	<script src="assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>	
	<script src="assets/js/bootstrap.js"        type="text/javascript"></script>
	<script src="assets/js/script.js"           type="text/javascript"></script>
</body>
</html>




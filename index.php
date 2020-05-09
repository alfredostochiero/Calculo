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
			    <label for="exampleFormControlSelect1">Opções</label>
			    <select class="form-control" name="opcoes">
				      <option value="TD">TD com valor</option>
				      <option value="TDs">TD sem valor</option>
				      <option value="NOT">Notificação</option>
				      
			     </select>
  			</div>
			<div class="form-group">
				Valor: 
				<input type="number" name="valor" class="form-control"><br/>
			</div>
			<div class="form-group">
				Qtd Páginas: 
				<input type="number" name="paginas" class="form-control"><br/>
			</div>
			<div class="form-group">
				Qtd vias: 
				<input type="number" name="vias" class="form-control"><br/>
			</div>
			<div class="form-group">
				Qtd Páginas Anexa: 
				<input type="number" name="anexa" class="form-control"><br/>
			</div>
			<input type="submit" value="Calcular" class="btn btn-primary">
			<input type="submit" value="Limpar"   class="btn btn-light">
		</form>
	
	<?php 
		require 'calculos.php';
		if(!empty($_POST['opcoes'])){
			$valor =  $_POST['valor'];
			$tipo =   $_POST['opcoes'];
			$paginas =  $_POST['paginas'];
			$vias =  $_POST['vias'];
			if($tipo =="TD"){$resultado =  Calculo::calcularTD($valor);}
			if($tipo =="TDs"){$resultado = Calculo::calcularTDs($paginas,$vias);}
			
		}

		
	?>
	<?php if(!empty($tipo)):  ?>
		<table class="table table-striped">
			<thead>
		      <tr>
		        <th>Descrição</th>
		        <th><?=$resultado['tipo'];?></th>
		      </tr>
	    	</thead>
		    <tbody>
		      <tr>
		        <td>Valor consultado</td>
		        <td><?='R$ '.number_format($resultado['resultado'],2,",","."); ?></td>
		        
		      </tr>
		      <tr>
		        <td>Total</td>
		        <td><?='R$ '.number_format($resultado['resultado'],2,",","."); ?></td>
		      </tr>
		    </tbody>
		</table>
	<?php endif;?>
	</div>

	<script src="assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>	
	<script src="assets/js/bootstrap.js"        type="text/javascript"></script>
</body>
</html>



<
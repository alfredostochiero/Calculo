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
			    <select class="form-control" name="opcoes" id="opcoes">
			    	  <option value="SEL" selected>Selecione</option> 	
				      <option value="TD">TD com valor</option>
				      <option value="TDs">TD sem valor</option>
				      <option value="NOT">Notificação</option>
				      
			     </select>
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
			<input type="submit" value="Calcular" class="btn btn-primary">
			<input type="submit" value="Limpar"   class="btn btn-light" onclick="location.reload();">
		</form>
	
	<?php 
		require 'calculos.php';
			$tipo =  filter_input(INPUT_POST,'opcoes');
			$valor =  filter_input(INPUT_POST,'valor');   
			$paginas =  filter_input(INPUT_POST,'paginas');
			$vias =  filter_input(INPUT_POST,'vias');
			$deligencia = filter_input(INPUT_POST,'deligencia');


			$Calculo = new Calculo;
			$valor = $Calculo->converter($valor);

			if($valor && $tipo =="TD")            {$resultado = $Calculo->calcularTD($valor);}
			if($paginas && $vias && $tipo =="TDs"){$resultado = $Calculo->calcularTDs($paginas,$vias);}
			if($paginas && $tipo =="NOT"){$resultado = $Calculo->calcularNot($paginas,$deligencia);}
		

		
	?>
	<?php if(!empty($tipo) && $tipo!='SEL'):  ?>
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
		        <td><?=($valor)?'R$ '.number_format($valor,2,",","."):'----' ?></td>
		      </tr>
		      <?php if($resultado['Tabela']): ?>
			      <tr>
			        <td>Tabela</td>
			        <td><?=$resultado['Tabela']; ?></td>
			      </tr>
		  	  <?php endif; ?>
		      <tr>
		        <td>Valor Oficial</td>
		        <td><?='R$ '.number_format($resultado['soma'],2,",",".");  ?> </td>
		      </tr>

		      <tr>
		        <td>ISS</td>
		        <td><?='R$ '.number_format($resultado['ISS'],2,",",".");  ?> </td>
		      </tr>
		      <tr>
		        <td> Fundo Especial do TJ/RJ </td>
		        <td><?='R$ '.number_format($resultado['FunEsp_TJ'],2,",",".");  ?> </td>
		      </tr>
		      <tr>
		        <td> Fundo Especial da Defensoria Pública</td>
		        <td><?='R$ '.number_format($resultado['FunEsp_DefPub'],2,",",".");  ?> </td>
		      </tr>
		      <tr>
		        <td>  Fundo Especial da Procuradoria do Estado do Rio de Janeiro </td>
		        <td><?='R$ '.number_format($resultado['FundEsp_ProRJ'],2,",",".");  ?> </td>
		      </tr>
		       <tr>
		        <td>   Fundo de Apoio aos Registradores das Pessoas Naturais </td>
		        <td><?='R$ '.number_format($resultado['FundAp_PNat'],2,",",".");  ?> </td>
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
	<script src="assets/js/script.js"        type="text/javascript"></script>
</body>
</html>



<
<?php

class Calculo {

	// tabela que armazenárá os valores 
	public $valores=[]; 
	// Aliquota de ISS(Imposto Sobre Serviço) e outras taxas do estado do Rio de Janeiro
	public $iss = 0.0525; 
	public $FunEsp_TJ = 0.2;
	public $FunEsp_DefPub = 0.05;
	public $FundEsp_ProRJ = 0.05;
	public $FundAp_PNat = 0.04;
	public $distribuidor = 21.80;
	public $distribuidorNot = 5.31;
	public $valorTeto =  39340.96;
	public  $PMCMV = 0.02;


	// Tabela com margem de valores
	public $tabela = [
		"A"=>'Valor menor do que R$ 70.000,00',
		"B"=> 'de R$ 70.000,00 a R$ 80.000,00',
		"C"=> 'de R$ 80.000,00 a R$ 90.000,00',
		"D"=> 'de R$ 90.000,00 a R$ 100.000,00',
		"E" =>'de R$ 100.000,00 a R$ 150.000,00',
		"F" =>'de R$ 150.000,00 a R$ 200.000,00',
		"G"=>'Valor maior que $200.000,00'
	];

	public function tributosTipo($soma,$tipo,$distribuidor,$tabela=""){
		$valores['base'] = round($soma,2);
		$valores['distribuidor'] = $distribuidor;
		$valores['soma'] = $valores['base'] + $valores['distribuidor'];
		$valores['FunEsp_TJ'] =     $valores['soma']*$this->FunEsp_TJ;
		$valores['FunEsp_DefPub'] = $valores['soma']*$this->FunEsp_DefPub;
		$valores['FundEsp_ProRJ'] = $valores['soma']*$this->FundEsp_ProRJ;
		$valores['FundAp_PNat'] =   $valores['soma']*$this->FundAp_PNat;
		$valores['soma'] += $valores['soma']*$this->PMCMV; 
		$valores['ISS'] = $valores['soma']*$this->iss;
		$valores['base'] += $valores['base'] * $this->PMCMV;
		$valores['resultado'] = array_sum($valores) - $valores['soma']; // soma os valores de todos os itens do array - $valores[soma] que já é a soma de base e distribuidor;

		$valores['tipo'] = $tipo;
		$valores['Tabela'] = $tabela;
		return $valores;
	}

	public  function calcularTD($valor,$paginas=0,$vias=0,$nomes=0){
		if($valor<=70000){
			$valores['Tabela'] = $this->tabela['A'];
			$valores['soma'] = 85.89;
			
		}
		else if($valor >70000 && $valor<=80000){
			$valores['Tabela'] = $this->tabela['B'];
			$valores['soma'] = 430.23;
			
		}
		else if($valor >80000 && $valor<=90000){
			$valores['Tabela'] = $this->tabela['C'];
			$valores['soma'] = 467.23;
			
		}
		else if($valor >90000 && $valor<=100000){
			$valores['Tabela'] = $this->tabela['D'];;
			$valores['soma'] = 504.20;
			
		}
		else if($valor >100000 && $valor<=150000){
			$valores['Tabela'] = $this->tabela['E'];;
			$valores['soma'] = 578.20;
			
		}
		else if($valor >150000 && $valor<=200000){
			$valores['Tabela'] = $this->tabela['F'];;
			$valores['soma'] = 627.52;
			
		}
		else if($valor>200000){
			$valores['Tabela'] = $this->tabela['G'];
			$valores['soma'] = 627.52;
			$n = floor(($valor - 200000)/100000);
			$valores['soma'] += ($n*98.62 + $n*1.97);
		}
	

	

		// Se a qtd de páginas for maior do que 5, adicionar calculo de custo por página excedente
		if($paginas>5){$valores['soma'] += ($paginas-5)*3.05;}
		if($valores['soma']>$this->valorTeto){
			$valores['soma']=$this->valorTeto;
		 }

		// Se a qtd de nomes for superior a 2, adicionar calculo de custo de nome extra ao valor do distribuidor. 
		if($nomes>2){
			$valores['distribuidor'] = $this->distribuidor + ( ($nomes-2)*1.02 );
		}else{
			$valores['distribuidor'] = $this->distribuidor;
		}

		
		return $this->tributosTipo($valores['soma'],"TD com valor",$valores['distribuidor'],$valores['Tabela']);

	}




	public  function calcularTDs($paginas,$vias=0,$nomes=0){
		
		$valores['soma'] = 139.08+(($vias-1)*14.04);                                    //$valores['soma'] = 139.08+($vias*14.04);
		
		// Se a qtd de páginas for maior do que 5, adicionar calculo de custo por página excedente
		if($paginas>5){$valores['soma'] += ($paginas-5)*3.05;} //3.05

		// Se a qtd de nomes for superior a 2, adicionar calculo de custo de nome extra ao valor do distribuidor. 
		if($nomes>2){
			$valores['distribuidor'] = $this->distribuidor + ( ($nomes-2)*1.02 ); // 1.02
		}else{
			$valores['distribuidor'] = $this->distribuidor;
		}

		


		return $this->tributosTipo($valores['soma'],"TD sem valor",$valores['distribuidor']);
	}

	public function calcularNot($paginas,$deligencia,$nomes=0){

		if($deligencia>3){$deligencia=3;}
		$valores['soma'] = 160.24 + ($deligencia*21.08);

		if($paginas>4){$valores['soma']+=($paginas-4)*3.05;}

		// Se a qtd de nomes for superior a 2, adicionar calculo de custo de nome extra ao valor do distribuidor. 
		if($nomes>2){
			$valores['distribuidor'] = $this->distribuidorNot + ( ($nomes-2)*1.02 );
		}else{
			$valores['distribuidor'] = $this->distribuidorNot;
		}

	


		return $this->tributosTipo($valores['soma'],"Notificação",$valores['distribuidor']);
		    
		} 


	// Função que converte número no padrão brasileiro para o padrão PHP. 	
	public function converter($num){
		
		$numero = str_replace(".", "", $num);
		$numero = str_replace(",", ".", $numero);
		return $numero;

	}	


		
	
}



?>

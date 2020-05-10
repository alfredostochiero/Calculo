<?php

class Calculo {

	// tabela que armazenárá os valores 
	public $valores=[]; 
	// Aliquota de ISS(Imposto Sobre Serviço) do estado do Rio de Janeiro
	public $iss = 0.05; 
	public $FunEsp_TJ = 0.2;
	public $FunEsp_DefPub = 0.05;
	public $FundEsp_ProRJ = 0.05;
	public $FundAp_PNat = 0.04;


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

	public function tributosTipo($soma,$tipo,$tabela){
		$valores['soma'] = $soma;
		$valores['ISS'] = $valores['soma']*$this->iss;
		$valores['FunEsp_TJ'] = $valores['soma']*$this->FunEsp_TJ;
		$valores['FunEsp_DefPub'] = $valores['soma']*$this->FunEsp_DefPub;
		$valores['FundEsp_ProRJ'] = $valores['soma']*$this->FundEsp_ProRJ;
		$valores['FundAp_PNat'] = $valores['soma']*$this->FundAp_PNat;
		$valores['resultado'] = ( 
			$valores['soma']+$valores['ISS']+$valores['FunEsp_TJ']
			+$valores['FunEsp_DefPub']+$valores['FundEsp_ProRJ']+$valores['FundAp_PNat']
		);
		$valores['tipo'] = $tipo;
		$valores['Tabela'] = $tabela;
		return $valores;
	}

	public  function calcularTD($valor){
		if($valor<=70000){
			$valores['Tabela'] = $this->tabela['A'];
			$valores[] = 85.89;
			$valores[] = 1.71;
		}
		else if($valor >70000 && $valor<=80000){
			$valores['Tabela'] = $this->tabela['B'];
			$valores[] = 430.23;
			$valores[] = 8.60;
		}
		else if($valor >80000 && $valor<=90000){
			$valores['Tabela'] = $this->tabela['C'];
			$valores[] = 467.23;
			$valores[]= 9.34;
		}
		else if($valor >90000 && $valor<=100000){
			$valores['Tabela'] = $this->tabela['D'];;
			$valores[] = 504.20;
			$valores[] = 10.08;
		}
		else if($valor >100000 && $valor<=150000){
			$valores['Tabela'] = $this->tabela['E'];;
			$valores[] = 578.20;
			$valores[] = 11.56;
		}
		else if($valor >150000 && $valor<=200000){
			$valores['Tabela'] = $this->tabela['F'];;
			$valores[] = 627.52;
			$valores[] = 12.55;
		}
		else if($valor>200000){
			$valores['Tabela'] = $this->tabela['G'];
			$valores[] = 640.07;
			$n = floor(($valor - 200000)/100000);
			$valores[] = $n*98.62 + $n*1.97;
		}
		$valores['soma'] = $valores[0]+$valores[1];

		return $this->tributosTipo($valores['soma'],"TD",$valores['Tabela']);

	}

	public  function calcularTDs($paginas,$vias=0){
		if($paginas>5){
			$valores['soma'] = 141.86 + (($paginas-5)*3.11)+$vias*14.32;
		}else {
			$valores['soma'] = 141.86+($vias*14.32);
		}
		return $this->tributosTipo($valores['soma'],"TDs","");
			
		
		
	}

	public function calcularNot($paginas,$deligencia){

		if($paginas>5){
			$valores['soma'] = 163.44 + (($paginas-5)*3.11) + ($deligencia*21.50);
		}
		else {
		    $valores['soma'] = 163.44 + ($deligencia*21.50);	
		}

		return $this->tributosTipo($valores['soma'],"NOT","");
		    
		} 

	public function converter($num){
		
		$numero = str_replace(".", "", $num);
		$numero = str_replace(",", ".", $numero);
		return $numero;

	}	


		
	
}



?>
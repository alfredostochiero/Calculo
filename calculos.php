<?php

class Calculo {
	public $valores;
	public $iss = 0.05;

	public  function calcularTD($valor){
			if($valor<=70000){
				$valores['Tabela'] = 'Valores menor do que R$ 70.000,00';
				$valores[] = 85.89;
				$valores[] = 1.71;
			}
			else if($valor >70000 && $valor<=80000){
				$valores['Tabela'] = 'de R$ 70.000,00 a R$ 80.000,00';
				$valores[] = 430.23;
				$valores[] = 8.60;
			}
			else if($valor >80000 && $valor<=90000){
				$valores['Tabela'] = 'de R$ 80.000,00 a R$ 90.000,00';
				$valores[] = 467.23;
				$valores[]= 9.34;
			}
			else if($valor >90000 && $valor<=100000){
				$valores['Tabela'] = 'de R$ 90.000,00 a R$ 100.000,00';
				$valores[] = 504.20;
				$valores[] = 10.08;
			}
			else if($valor >100000 && $valor<=150000){
				$valores['Tabela'] = 'de R$ 100.000,00 a R$ 150.000,00';
				$valores[] = 578.20;
				$valores[] = 11.56;
			}
			else if($valor >150000 && $valor<=200000){
				$valores['Tabela'] = 'de R$ 150.000,00 a R$ 200.000,00';
				$valores[] = 627.52;
				$valores[] = 12.55;
			}
			$valores['soma'] = $valores[0]+$valores[1];
			$valores['ISS'] = $valores['soma']*$this->iss;
			$valores['resultado'] = $valores['soma']+$valores['ISS'];
			$valores['tipo'] = "TD";
			return $valores;
	}

	public  function calcularTDs($paginas,$vias=0){
		if($paginas>5){
			$total['soma'] = 141.86 + (($paginas-5)*3.11)+$vias*14.32;
			$total['ISS'] = $total['soma']*$this->iss;
			$total['resultado'] = $total['soma']+$total['ISS'];
		}else {
			$total['soma'] = 141.86+($vias*14.32);
			$total['ISS'] = $total['soma']*$this->ISS;
			$total['resultado'] = $total['soma']+$total['ISS'];

		}
		$total['tipo'] = "TDs";
		$total['Tabela'] = "";
		return  $total;
		
	}

	public function calcularNot($paginas,$vias){

	}
}



?>
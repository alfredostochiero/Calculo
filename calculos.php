<?php

class Calculo {
	public $valores;

	public static function calcularTD($valor){
			if($valor<=70000){
				$valores[] = 85.89;
				$valores[] = 1.71;
			}
			else if($valor >70000 && $valor<=80000){
				$valores[] = 430.23;
				$valores[] = 8.60;
			}
			else if($valor >80000 && $valor<=90000){
				$valores[] = 467.23;
				$valores[]= 9.34;
			}
			else if($valor >90000 && $valor<=100000){
				$valores[] = 504.20;
				$valores[] = 10.08;
			}
			else if($valor >100000 && $valor<=150000){
				$valores[] = 578.20;
				$valores[] = 11.56;
			}
			else if($valor >150000 && $valor<=200000){
				$valores[] = 627.52;
				$valores[] = 12.55;
			}
			$valores['resultado'] = $valores[0]+$valores[1];
			$valores['tipo'] = "TD";
			return $valores;
	}

	public static function calcularTDs($paginas,$vias=0){
		if($paginas>5){
			$total['resultado'] = 141.86 + (($paginas-5)*3.11)+$vias*14.32;
		}else {
			$total['resultado'] = 141.86+($vias*14.32);
		}
		$total['tipo'] = "TDs";
		return  $total;
		
	}
}



?>
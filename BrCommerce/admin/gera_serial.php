<?php

$mes  = date("m");
$ano  = date("Y");
$cont = 0;
$num_seriais_gerados = 48;  //NUMERO DE SERIAIS A SER GERADOS

for($i=0;$i<1;$i++)
{
	$clienteId = $i+1;
	
	for($j=0;$j<$num_seriais_gerados;$j++)
	{
		$serial = '';
		for($p=0;$p<4;$p++)
		{
			for($m=0;$m<3;$m++)
			{
				$numero = rand(1,26);
				switch($numero)
				{
					case '1':  $letra = 'A';break; 
					case '2':  $letra = 'B';break;
					case '3':  $letra = 'C';break; 
					case '4':  $letra = 'D';break;
					case '5':  $letra = 'E';break; 
					case '6':  $letra = 'F';break;
					case '7':  $letra = 'G';break;
					case '8':  $letra = 'H';break; 
					case '9':  $letra = 'K';break;
					case '10': $letra = 'I';break; 
					case '11': $letra = 'J';break;
					case '12': $letra = 'L';break; 
					case '13': $letra = 'M';break;
					case '14': $letra = 'N';break;
					case '15': $letra = 'O';break; 
					case '16': $letra = 'P';break;
					case '17': $letra = 'Q';break; 
					case '18': $letra = 'R';break;
					case '19': $letra = 'S';break; 
					case '20': $letra = 'T';break;
					case '21': $letra = 'U';break;
					case '22': $letra = 'V';break; 
					case '23': $letra = 'Y';break;
					case '24': $letra = 'X';break; 
					case '25': $letra = 'W';break;
					case '26': $letra = 'Z';break; 
				}
				$serial .= $letra;
			}
			
				$numero = rand(0,9);
				$serial .= $numero;
		}
		
		
		
		if (($mes % 12) == 0){
			$ano = $ano + 1;
			$mes = 1;
		}else{
		$mes = $mes + 1;
		}
		
		if ($mes < 10){
			$mes = '0'.$mes;
		}
		
		$mes_referente = $ano.''.$mes;
		
		$status = 'pendente';
		
		$sql  = 'INSERT INTO serial (SER_SERIAL,SER_MES,SER_STATUS) ';
		$sql .= 'VALUES (?,?,?) ';
	
		try{
			$query = $conecta->prepare($sql);
			$query->bindValue(1,$serial,PDO::PARAM_STR);
			$query->bindValue(2,$mes_referente,PDO::PARAM_STR);
			$query->bindValue(3,$status,PDO::PARAM_STR);
			$query->execute();
			$cont++;
			if ($cont >= $num_seriais_gerados){
				echo '<div id="ok">Seriais Gerados Com Sucesso!</div>';	
			}
		
		}catch(PDOexeption $erro){
			echo 'Erro ao Cadastrar ,'.$erro;
		}		
	}
	
}
	
	


?>
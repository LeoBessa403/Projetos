<?php
	$sql  = 'SELECT * FROM serial';
	
	try{
		$query = $conecta->prepare($sql);
		$query->execute();
		
		$resultados = $query->fetchAll(PDO::FETCH_ASSOC);
		$cont = 0;

		foreach ($resultados as $res){
			$serial        = $res['SER_SERIAL'];
			$mes_referente = $res['SER_MES'];
			
			$sql  = 'UPDATE serial SET SER_SERIAL = ? WHERE SER_MES = ?';
		
			try{
				$query = $conecta->prepare($sql);
				$query->bindValue(1,base64_encode($serial),PDO::PARAM_STR);
				$query->bindValue(2,$mes_referente,PDO::PARAM_STR);
				$query->execute();
				
				$cont++;
			if ($cont >= $num_seriais_gerados){
				echo '<div id="ok">Seriais Criptografados Com Sucesso!</div>';	
			}
			
		}catch(PDOexeption $erro){
			echo '<div id="erro">Erro ao Cadastrar na Criptografia ,'.$erro.'</div>';
		}
	  }
	}catch(PDOexeption $erro){
		echo '<div id="erro">Erro ao Selecionar Serial ,'.$erro.'</div>';
		die();
	}
	
?>
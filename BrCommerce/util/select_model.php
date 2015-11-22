<?php

class select_model
{
	
   function seleciona_todos($pesquisa,$tabela,$campo_pesquisa,$campo_ordem)
   {	
			require("conexao.php");			
			$sql  = 'SELECT * FROM '.$tabela.' WHERE '.$campo_pesquisa.' LIKE ? ORDER BY '.$campo_ordem.' DESC';

			try{
				$query = $conecta->prepare($sql);
				$query->bindValue(1,'%'.$pesquisa.'%',PDO::PARAM_STR);
				$query->execute();
				
				$resultados = $query->fetchAll(PDO::FETCH_ASSOC);
		
				
			}catch(PDOexeption $erro){
				echo '<div id="erro">Erro ao Selecionar Usuários ,'.$erro.'</div>';
				die();
			}	
			
			return $resultados;
	}
	
	 function seleciona_um($id,$tabela,$campo)
	 {
		require("conexao.php");
		$sql  = 'SELECT * FROM '.$tabela.' WHERE '.$campo.' = ?';
		
		try{
			$query = $conecta->prepare($sql);
			$query->bindValue(1,$id,PDO::PARAM_STR);
			$query->execute();
		
			$resultados = $query->fetch(PDO::FETCH_LAZY);	
			
		}catch(PDOexeption $erro){
			echo '<div id="erro">Erro ao Selecionar o Cadastro ,'.$erro.'</div>';
		} 
		
		return $resultados;
	 }
}

?>
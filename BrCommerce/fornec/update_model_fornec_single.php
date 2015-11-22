<?php
class update_model_fornec
{
	
	function update_cadastro($id,$nome,$senha,$email,$cor,$nivel,$login)
	{
		
		include_once("util/carregando.php");
	
		$sql  = 'UPDATE usuario SET USU_NOME = ?, USU_SENHA = ?, USU_EMAIL = ?, USU_NIVEL = ?, USU_COR = ?, USU_LOGIN = ? WHERE USU_ID = ?';
			
		try{
			require("util/conexao.php");
			$query = $conecta->prepare($sql);
			$query->bindValue(1,$nome,PDO::PARAM_STR);
			$query->bindValue(2,$senha,PDO::PARAM_STR);
			$query->bindValue(3,$email,PDO::PARAM_STR);
			$query->bindValue(4,$nivel,PDO::PARAM_STR);
			$query->bindValue(5,$cor,PDO::PARAM_STR);
			$query->bindValue(6,$login,PDO::PARAM_STR);
			$query->bindValue(7,$id,PDO::PARAM_STR);
			$query->execute();
			
			echo '</div></div>';
			include_once('footer.php');
			echo '<meta http-equiv="refresh" content="2, URL=brcommerce.php?pg=fornec/update_control_fornec_single&confirmacao=ok" />';
			die();
		}catch(PDOexeption $erro){
			echo '<div id="erro">Erro ao Cadastrar ,'.$erro.'</div>';
			echo '</div></div>';
			include_once('footer.php');
			die();
		}
	}
		
		
		
		
		
		
}
?>
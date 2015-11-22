<?php

function insert_fornec($nome,$email,$cor,$nivel,$login,$senha)
{
	include_once("util/carregando.php");
	
	$sql  = 'INSERT INTO usuario (USU_NOME, USU_SENHA, USU_EMAIL, USU_NIVEL, USU_COR, USU_LOGIN) ';
	$sql .= 'VALUES (?,?,?,?,?,?) ';
	
	try{
		require_once("util/conexao.php");
		$query = $conecta->prepare($sql);
		$query->bindValue(1,$nome,PDO::PARAM_STR);
		$query->bindValue(2,$senha,PDO::PARAM_STR);
		$query->bindValue(3,$email,PDO::PARAM_STR);
		$query->bindValue(4,$nivel,PDO::PARAM_STR);
		$query->bindValue(5,$cor,PDO::PARAM_STR);
		$query->bindValue(6,$login,PDO::PARAM_STR);
		$query->execute();
		
		echo '</div></div>';
		include_once('footer.php');
		echo '<meta http-equiv="refresh" content="2, URL=brcommerce.php?pg=fornec/create_control_fornec&confirmacao=ok" />';
		die();
	}catch(PDOexeption $erro){
		echo '<div id="erro">Erro ao Cadastrar ,'.$erro.'</div>';
		echo '</div></div>';
		include_once('footer.php');
		die();
	}
}
?>
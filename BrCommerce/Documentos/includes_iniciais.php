<?php

include("util/conexao.php");

	$segundos = date("s");
	$minutos  = date("i");
	$horas    = date("H");
	$dia      = date("d");
	$mes      = date("m");
	$ano      = date("Y");
	
	$tempo_atual = $ano.''.$mes.''.$dia.''.$horas.''.$minutos.''.$segundos;
	
	$sql  = 'INSERT INTO acesso (ULTIMO_ACESSO) ';
	$sql .= 'VALUES (?) ';
	  
		  try{
			  $query = $conecta->prepare($sql);
			  $query->bindValue(1,$tempo_atual,PDO::PARAM_STR);
			  $query->execute();
			  
			  echo '<div id="ok">Cadastro Realizado com Sucesso!</div>';
			  
		  }catch(PDOexeption $erro){
			  echo '<div id="erro">Erro ao Cadastrar ,'.$erro.'</div>';
		  }

?>
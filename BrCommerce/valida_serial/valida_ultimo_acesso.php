<?php

  $tempo_atual = date("YmdHis");

  $sql  = 'SELECT * FROM acesso WHERE ACE_ID = 1';
  
  try{   
	  $query = $conecta->prepare($sql);
	  $query->execute();
	  
	  $res = $query->fetch(PDO::FETCH_LAZY);
		  
		  if ($tempo_atual >= $res['ULTIMO_ACESSO']){		 		  
	  
			  $sql  = 'UPDATE acesso SET ULTIMO_ACESSO = ?';
		
			  try{   

				  $query = $conecta->prepare($sql);
				  $query->bindValue(1,$tempo_atual,PDO::PARAM_STR);
				  $query->execute();
				  
				 $ultimo_acesso = 'ok';

				$tempo_backup = 50000;  // tempo para realizar backup de todo banco de dados. date("YmdHis")
				if (($tempo_atual - $res['ULTIMO_ACESSO']) >= $tempo_backup){
					 require("util/backup.php");
				 }
				  
			  }catch(PDOexeption $erro){
				 msg("erro","Erro ao Atualizar o Ultimo Acesso.");
				 echo '<meta http-equiv="refresh" content="6, URL=index.php" />';
				 die();
			  }
			  
		 }else{
		 	msg("erro","Por Favor Atualize a Data e Hora do seu Sistema.");
			echo '<meta http-equiv="refresh" content="6, URL=index.php" />';
			die();
		 }
		
	}catch(PDOexeption $erro){
		msg("erro","Erro ao Selecionar o Último Acesso.");
		echo '<meta http-equiv="refresh" content="6, URL=index.php" />';
		die();
	}
?>
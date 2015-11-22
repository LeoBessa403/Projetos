<?php 

	 $sql  = 'USE brcommerce';
  
	  try{
		  $query = $conecta->prepare($sql);
		  $query->execute();
			 
		  echo '<div id="ok">BD Selecionado Com Sucesso!</div>';
		  
		  $sql2  = 'CREATE TABLE IF NOT EXISTS `acesso` (
			  `ACE_ID` int(11) NOT NULL AUTO_INCREMENT,
			  `ULTIMO_ACESSO` varchar(200) NOT NULL,
			  PRIMARY KEY (`ACE_ID`)
			  ) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=latin1';
  
		  try{
			  $query = $conecta->prepare($sql2);
			  $query->execute();
				 
			  echo '<div id="ok">Tabela ACESSO Creada Com Sucesso!</div>';
			  
			  $sql3  = 'INSERT INTO acesso (ULTIMO_ACESSO) ';
			  $sql3 .= 'VALUES (?) ';
		  		
			  $tempo_atual = date("YmdHis");	
				
			  try{
				  $query = $conecta->prepare($sql3);
				  $query->bindValue(1,$tempo_atual,PDO::PARAM_STR);
				  $query->execute();
					 
				  echo '<div id="ok">INSERT Tabela ACESSO Com Sucesso!</div>';	
				  
				  $sql4  = 'CREATE TABLE IF NOT EXISTS `serial` (
							`SER_ID` int(11) NOT NULL AUTO_INCREMENT,
							`SER_SERIAL` varchar(255) NOT NULL,
							`SER_MES` varchar(11) NOT NULL,
							`SER_STATUS` varchar(200) NOT NULL,
							PRIMARY KEY (`SER_ID`)
						  ) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=latin1';
		  
				  try{
					  $query = $conecta->prepare($sql4);
					  $query->execute();
				 
				 	 echo '<div id="ok">Tabela SERIAL Creada Com Sucesso!</div>';
					 
					 
						 $sql5  = 'CREATE TABLE IF NOT EXISTS `usuario` (
								`USU_ID` int(11) NOT NULL AUTO_INCREMENT,
								`USU_NOME` varchar(255) NOT NULL,
								`USU_SENHA` varchar(255) NOT NULL,
								`USU_EMAIL` varchar(255) NOT NULL,
								`USU_NIVEL` varchar(50) NOT NULL,
								`USU_COR` varchar(255) NOT NULL,
								`USU_LOGIN` varchar(255) NOT NULL,
								PRIMARY KEY (`USU_ID`)
							  ) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=latin1';
			  
					  try{
						  $query = $conecta->prepare($sql5);
						  $query->execute();
					 
						 echo '<div id="ok">Tabela USUÁRIO Creada Com Sucesso!</div>';
						  
						    $nome  = 'Administrador Master';
							$senha = 'leobessa';
							$senha = base64_encode($senha);
							$email = 'leodjx@hotmail.com';
							$cor   = 'azul';
							$nivel = '5';
							$login = 'leo';
						
							$sql6  = 'INSERT INTO usuario (USU_NOME, USU_SENHA, USU_EMAIL, USU_NIVEL, USU_COR, USU_LOGIN) ';
							$sql6 .= 'VALUES (?,?,?,?,?,?) ';
							
							try{
								$query = $conecta->prepare($sql6);
								$query->bindValue(1,$nome,PDO::PARAM_STR);
								$query->bindValue(2,$senha,PDO::PARAM_STR);
								$query->bindValue(3,$email,PDO::PARAM_STR);
								$query->bindValue(4,$nivel,PDO::PARAM_STR);
								$query->bindValue(5,$cor,PDO::PARAM_STR);
								$query->bindValue(6,$login,PDO::PARAM_STR);
								$query->execute();
					 
								echo '<div id="ok">INSERT Tabela USUÁRIO Com Sucesso!</div>';	
								  
								}catch(PDOexeption $erro){
								  echo 'Erro ao INSERIR na Tabela ,'.$erro;
							   }	
						  						  
						  
						  }catch(PDOexeption $erro){
							echo 'Erro ao Criar Tabela ,'.$erro;
						 }		
					  				  
					  
					  }catch(PDOexeption $erro){
						echo 'Erro ao Criar Tabela ,'.$erro;
					 }		
				  				  
			  
			  }catch(PDOexeption $erro){
				  echo 'Erro ao INSERIR na Tabela ,'.$erro;
			  }		
		  
		  }catch(PDOexeption $erro){
			  echo 'Erro ao Crearr Tabela ,'.$erro;
		  }		
	  
	  }catch(PDOexeption $erro){
		  echo 'Erro ao Selecionar ,'.$erro;
	  }		
?>
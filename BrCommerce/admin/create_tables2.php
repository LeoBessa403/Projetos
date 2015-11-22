<?php 

	  $sql  = 'CREATE TABLE IF NOT EXISTS `acesso` (
			  `ACE_ID` int(11) NOT NULL AUTO_INCREMENT,
			  `ULTIMO_ACESSO` varchar(200) NOT NULL,
			  PRIMARY KEY (`ACE_ID`)
			  ) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=latin1';
  
		  try{
			  $query = $conecta->prepare($sql);
			  $query->execute();
				 
			  echo '<div id="ok">Tabela Fornecedor Creada Com Sucesso!</div>';				
			 
	  
	  }catch(PDOexeption $erro){
		  echo 'Erro ao Selecionar ,'.$erro;
	  }		
?>
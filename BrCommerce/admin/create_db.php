<?php 
		  $conecta = mysql_connect('localhost', 'root', '');
		  $sql_del  = 'DROP DATABASE IF EXISTS brcommerce';
		  $resultado_del = mysql_query($sql_del);
		  $sql  = 'CREATE DATABASE IF NOT EXISTS brcommerce';
		  $resultado = mysql_query($sql);
		  
			  if($resultado){	 
				echo '<div id="ok">Banco de Dados Gerado Com Sucesso!</div>';	
			  }else{
				echo '<div id="erro">Não Foi Possível Gerar o Banco de Dados</div>';	
			  }
?>
<link rel="stylesheet" href="../imagens/azul/stylo_brcommerce.css" type="text/css" media="screen" />
<style>
	body {padding:10px 20px;}
</style>
<?php 
		
		if((isset($_REQUEST['ok'])) && ($_REQUEST['ok'] == "confirma")){	
			 $conecta = mysql_connect('localhost', 'root', '');
		 	 $sql  = 'DROP DATABASE IF EXISTS brcommerce';
		 	 $resultado = mysql_query($sql);
			 
			  if($resultado){
				  echo '<div id="ok">O Sistema foi Desinstalado Com Sucesso!</div>';
				  echo '<meta http-equiv="refresh" content="5, URL=index.php" />';
				  die();
			  } else{
				echo '<div id="erro">Não Foi Possível Desinstalar o Sistema</div>';	
			  }
		}else{				 
			echo '<div class="carregando">
			<img src="../imagens/azul/ajax-loader.gif" />
			<br />Desinstalando Sistema.... Aguarde....</div>';
			echo '<meta http-equiv="refresh" content="4, URL=uninstall.php?ok=confirma" />';
		}
?>
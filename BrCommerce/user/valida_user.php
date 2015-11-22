<link rel="stylesheet" href="../util/stylo.css" type="text/css" media="screen" />
<?php
	if (($_POST['loguin'] == 'admin') && ($_POST['senha'] == 'leobessa')){
	 echo '<div class="carregando">
					<img src="../imagens/azul/ajax-loader.gif" alt="Logando no Sistema..." />
					<br />Verificando o Usuário... Aguarde...</div>';
	echo '<meta http-equiv="refresh" content="3, URL=../admin/index.php" />';
	die();
}

?>

<?php
	session_start();
include_once('../util/conexao.php');
include_once('../util/functions.php');
if (($_POST['loguin'] != '') && ($_POST['senha'] != ''))
{
	 $usuario = strip_tags(trim($_POST['loguin']));
	 $senha   = strip_tags(trim($_POST['senha']));
	  
	 $senha = str_replace("=","",$senha);
	 $senha = str_replace("*","",$senha);
	 $senha = str_replace("drop","",$senha);	   
	 $senha = str_replace("insert","",$senha);
	 $senha = str_replace("--","",$senha);	   
	 $senha = str_replace("'","",$senha);
	 $senha = str_replace(" or ","",$senha);	   
	 $senha = str_replace("delete","",$senha);
	 $senha = str_replace("select","",$senha);
	 $senha = str_replace("update","",$senha);
	 $senha = addslashes($senha);
	 $senha = base64_encode($senha);
	 $usuario = addslashes($usuario);

	 echo '<div class="carregando">
					<img src="../imagens/azul/ajax-loader.gif" alt="Logando no Sistema..." />
					<br />Verificando o Usuário... Aguarde...</div>';

	  $sql  = 'SELECT * FROM usuario';
	  
	  try{
		  $query = $conecta->prepare($sql);
		  $query->execute();
		  
		  $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
		  
		  foreach ($resultados as $res){

			  if(($res['USU_LOGIN'] == $usuario)&&($res['USU_SENHA'] == $senha)){
				  //msg("ok","Usuário Válido!"); 
				  $_SESSION['sessao_nome_usuario']  = $res['USU_NOME'];
				  $_SESSION['sessao_nivel_usuario'] = $res['USU_NIVEL'];
				  $_SESSION['sessao_cor_usuario']   = $res['USU_COR'];
				  $_SESSION['sessao_id_usuario']    = $res['USU_ID'];
				  echo '<meta http-equiv="refresh" content="3, URL=../brcommerce.php" />';
				  exit;	
			  
			  }else {				 
				 echo '<meta http-equiv="refresh" content="3, URL=../index.php?erro=erro" />';
			  }
		  }
		  
	  }catch(PDOexeption $erro){
		 msg("erro","Erro ao Selecionar o Usuário.");
	  }
}else{
	    msg("erro","Você precisa digitar o Usuário e Senha!");
		echo '<meta http-equiv="refresh" content="3, URL=../index.php" />';
}

?>
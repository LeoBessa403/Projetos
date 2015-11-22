<?php 	session_start(); ?>
<div id="form_serial">
	<?php 
	require_once('util/functions.php');	
	//include("util/conexao.php");
	if (!isset($_SESSION['sessao_cor_usuario'])){
		$_SESSION['sessao_cor_usuario'] = 'azul';
		include_once('valida_serial/valida_serial.php');
	}
	  echo '<link rel="stylesheet" href="imagens/'.$_SESSION['sessao_cor_usuario'].'/stylo_brcommerce.css" type="text/css" media="screen" />';
	?>
</div>
<?php

	   if(!isset($_SESSION['sessao_nome_usuario'])  || ($_SESSION['sessao_nome_usuario'] == ""))
	   {
		  msg("erro","Você não tem Permissão para acessar o Sistema!");
		  echo '<meta http-equiv="refresh" content="4, URL=index.php" />';
		  exit;
	   }
	   else
	   {	
	   
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BR Commerce - Sistema de Automoção</title>
<style>
body{ background-image:url(imagens/<?php echo $_SESSION['sessao_cor_usuario']; ?>/bg_topo.jpg); background-repeat:repeat-x; background-position:top;}
</style>
<script type="text/javascript" src="util/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="util/functions.js"></script>
<script type="text/javascript" src="util/jquery_validate.js"></script>
<script type="text/javascript" src="util/validate_func.js"></script>
</head>

<body>
<div id="principal">
	<div id="topo">
    	<img src="imagens/<?php echo $_SESSION['sessao_cor_usuario']; ?>/topo_logo.jpg" height="92" width="293" class="logo" />
    	<?php include_once("menu_permicoes.php"); ?>
        
    </div><!-- topo -->
    
    <div id="conteudo">
    		<?php 
				foreach ($_REQUEST as $___opt => $___val) {
				  $$___opt = $___val;
				}
				if(empty($pg)) {
				include("home.php");
				}
				elseif(substr($pg, 0, 4)=='http' or substr($pg, 
				0, 1)=="/" or substr($pg, 0, 1)==".") 
				{
				echo '<br><font face=arial size=11px><br><b>A página não existe.</b><br>Por favor selecione uma página a partir do Menu Principal.</font>'; 
				}
				else {
				include_once("$pg.php");
				}
				
			?>
    </div><!-- conteudo -->

</div><!-- principal -->
<?php include_once('footer.php'); ?>
</body>
</html>
<?php
	 }
?>
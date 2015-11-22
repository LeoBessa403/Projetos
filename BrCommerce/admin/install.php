<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BR Commerce - Sistema de Automoção</title>
<style>
body {padding:30px 20px;}
#links {margin:50px 0 20px; width:1000px;}
a {margin:50px 30px; text-decoration:none; padding:8px 15px; background-color:#09F; border-radius:5px; box-shadow: 3px 3px 5px #069; color:#FFF;}
a:hover {text-decoration:underline; background-color:#069; box-shadow: 3px 3px 5px #000; color:#CCC;}
</style>
<link rel="stylesheet" href="../imagens/azul/stylo_brcommerce.css" type="text/css" media="screen" />
<script type="text/javascript" src="../util/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="../util/functions.js"></script>
</head>

<body>
<div id="principal">

	<?php
	if((isset($_REQUEST['ok'])) && ($_REQUEST['ok'] == "confirma")){ 
			echo '<div class="carregando">
			<img src="../imagens/azul/ajax-loader.gif" />
			<br />Instalando o Sistema....<br>
            Esse Processo Pode Levar Alguns Minutos...<br>
            Aguarde....</div>';
			echo '<meta http-equiv="refresh" content="8, URL=install.php?ok=ok&cliente='.$_POST['cliente'].'" />';
			die();
	}else{
	 if (isset($_REQUEST['cliente'])){
     require_once('../util/functions.php');
	 echo '<div id="ok">Banco de Dados Gerado.<br>Cliente: '.$_REQUEST['cliente'].'.</div>';	
	 include_once('create_db.php');
	 require_once('../util/conexao.php');
	 include_once('create_tables1.php');
	 include_once('gera_serial.php');
     include_once('export.php'); 
     include_once('criptografa_serial.php'); 
	 } }?>
    <div id="links">
        <a href="../index.php">Voltar ao Sistema</a>
	</div>
</div><!-- principal -->

</body>
</html>

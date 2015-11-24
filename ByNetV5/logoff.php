<?php   
    require("carrinho_manutencao.php");
	require("util/conecta.php");
	
	$oquefazer = new carrinho_manutencao();
	
	session_start();
	$oquefazer->delete_itens_sessao();
	unset($_SESSION['sessao_codigo_usuario']);
	unset($_SESSION['sessao_nome_usuario']);
	unset($_SESSION['sessao_nivel_usuario']);
	session_destroy();
	direciona("login_form.php");
	exit;
?>
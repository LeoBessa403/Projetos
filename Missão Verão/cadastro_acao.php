<?php

     require('cadastro_manutencao.php');
	 
	 $oquefazer = new cadastro_manutencao();
	 
	 $acao = $_REQUEST['acao'];
	 //echo "<br>acao =  $acao";
	 
	if($acao == 'excluir')
	 {
		$oquefazer->excluir();
		$oquefazer->listar_cadastro();
		require('cadastro_listar.php');
	 }
	 
	 if($acao == 'gravar')
	 {
		require('cadastro_form.php');
	 }

	 if($acao == 'gravar_incluir')
	 {
		$oquefazer->gravar_incluir();
		//$oquefazer->listar_cadastrar();
		direciona('index.php?tabela=inscricoes&acao=listar');
	 }
	 
	 if($acao == 'gravar_novo')
	 {
		$oquefazer->gravar_novo();
		//$oquefazer->listar_cadastrar();
		direciona('index.php?tabela=inscricoes&acao=listar');
	 }
	 
	 if($acao == 'incluir')
	 {
		$oquefazer->alterar();
		require('cadastro_form3.php');
	 }
	 
	 if($acao == 'listar')
	 {
		$oquefazer->listar_cadastro();
		require('cadastro_listar.php');
	 }
	 
	  if($acao == 'listar_peso')
	 {
		$oquefazer->listar_peso();
		require('cadastro_listar2.php');
	 }

	 if($acao == 'alterar')
	 {
		$oquefazer->alterar();
		require('cadastro_form2.php');
	 }

	 if($acao == 'gravar_alterar')
	 {
		$oquefazer->gravar_alterar();
		$oquefazer->listar_cadastro();
		require('cadastro_listar.php');
	 }
?>
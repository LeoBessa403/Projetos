<?php

	require("carrinho_manutencao.php");	
	
	$oquefazer = new carrinho_manutencao();
		
   	 $acao = $_REQUEST['acao'];
	 
	 if($acao == 'listar_produtos')
	 {
	 	$filtro = $_REQUEST['pesquisa'];
	     //echo "filtro =  $filtro"; 
        $oquefazer->listar_produtos();
		//$oquefazer->listar_carrinho();
		require('carrinho_lista.php');
	 }
	 
	 if($acao == 'incluir_no_carrinho')
	 {
        $oquefazer->incluir_no_carrinho();
		$oquefazer->listar_produtos();
		require('carrinho_lista.php');
	 }
	 
	 if($acao == 'listar_carrinho')
	 {
        $oquefazer->listar_carrinho();
		require('carrinho_compras.php');
	 }
	 
	 if($acao == 'atualizar_compra')
	 {
        $oquefazer->atualizar_carrinho();
        $oquefazer->listar_carrinho();		
		require('carrinho_compras.php');
	 }
	 
	  if($acao == 'finalizar_compra')
	 {
     	$oquefazer->gravar_venda();
		$oquefazer->listar_venda();
		$oquefazer->listar_itens();
		require('venda.php');
	 }

	 
?>
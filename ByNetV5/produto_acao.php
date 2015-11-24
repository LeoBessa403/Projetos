<?php

     require('produto_manutencao.php');
	 
	 $oquefazer = new produto_manutencao();
	 
	 $acao = $_REQUEST['acao'];
	 //echo "<br>acao =  $acao";
	 
	 if($acao == 'listar')
	 {
    	 $filtro = $_REQUEST['pesquisa'];
	     //echo "filtro =  $filtro"; 
        $oquefazer->listar_produto();
		require('produto_lista.php');
	 }

	 if($acao == 'excluir')
	 {
		$oquefazer->excluir();
		$oquefazer->listar_produto();
		require('produto_lista.php');
	 }
	 
	 if($acao == 'incluir')
	 {
		require('produto_form.php');
	 }

	 if($acao == 'gravar_incluir')
	 {
		$oquefazer->gravar_incluir();
		$oquefazer->listar_produto();
		require('produto_lista.php');
	 }

	 if($acao == 'alterar')
	 {
		$oquefazer->alterar();
		require('produto_form.php');
	 }

	 if($acao == 'gravar_alterar')
	 {
		$oquefazer->gravar_alterar();
		$oquefazer->listar_produto();
		require('produto_lista.php');
	 }

	
?>
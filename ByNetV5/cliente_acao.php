<?php

     require('cliente_manutencao.php');
	 
	 $oquefazer = new cliente_manutencao();
	 
	 $acao = $_REQUEST['acao'];
	 //echo "<br>acao =  $acao";
	 
	 if($acao == 'listar')
	 {
    	 $filtro = $_REQUEST['pesquisa'];
	     //echo "filtro =  $filtro"; 
        $oquefazer->listar_cliente();
		require('cliente_lista.php');
	 }

	 if($acao == 'excluir')
	 {
		$oquefazer->excluir();
		$oquefazer->listar_cliente();
		require('cliente_lista.php');
	 }
	 
	 if($acao == 'incluir')
	 {
		require('cliente_form.php');
	 }

	 if($acao == 'gravar_incluir')
	 {
		$oquefazer->gravar_incluir();
		$oquefazer->listar_cliente();
		require('cliente_lista.php');
	 }

	 if($acao == 'alterar')
	 {
		$oquefazer->alterar();
		require('cliente_form.php');
	 }

	 if($acao == 'gravar_alterar')
	 {
		$oquefazer->gravar_alterar();
		$oquefazer->listar_cliente();
		require('cliente_lista.php');
	 }

	
?>
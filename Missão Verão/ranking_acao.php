<?php

     require('ranking_manutencao.php');
	 	 
	 $oquefazer = new ranking_manutencao();
	 
	 $acao = $_REQUEST['acao'];
	 //echo "<br>acao =  $acao";
	 
	if($acao == 'listar')
	 {
		$oquefazer->listar_peso();
		//$oquefazer->listar_peso();
		require('ranking.php');
	 }
	 
	 if($acao == 'listar_print')
	 {
		$oquefazer->listar_peso();
		//$oquefazer->listar_peso();
		require('ranking2.php');
	 }
	 
?>
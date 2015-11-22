<?php 
include_once("util/select_model.php");

$link = "user/select_control_user";

	$objSelect = new select_model();

if (isset($_REQUEST['confirmacao'])){
	carregando($link);
}
	if (isset($_REQUEST['pesquisa'])){
		if ($pesquisa != ''){
		$pesquisa = strip_tags(trim($_REQUEST['pesquisa']));
	}}else{
			$pesquisa = '';
	}
	
	$resultados = $objSelect->seleciona_todos($pesquisa,"usuario","USU_NOME","USU_ID");
	
	require("select_view_user.php");
	
	$link = "brcommerce.php?pg=user/select_control_user";
	paginacao($cont_cor,$maximo,$pag,$link,$pesquisa);

	?>


<?php 
include_once("util/select_model.php");

$link = "fornec/select_control_fornec";

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
	
	require("select_view_fornec.php");
	
	$link = "brcommerce.php?pg=fornec/select_control_fornec";
	paginacao($cont_cor,$maximo,$pag,$link,$pesquisa);

	?>


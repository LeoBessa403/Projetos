<?php 

include_once("util/select_model.php");
	
$objSelect = new select_model();
$link = "user/update_control_user";

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
	
	require("update_view_user.php");

	$link = "brcommerce.php?pg=user/update_control_user";
	paginacao($cont_cor,$maximo,$pag,$link,$pesquisa);

?>



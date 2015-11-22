<?php 

include_once("util/select_model.php");
	
$objSelect = new select_model();
$link = "fornec/update_control_fornec";

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
	
	require("update_view_fornec.php");

	$link = "brcommerce.php?pg=fornec/update_control_fornec";
	paginacao($cont_cor,$maximo,$pag,$link,$pesquisa);

?>



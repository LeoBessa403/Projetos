<?php 

include_once("util/delete_model.php");
include_once("util/select_model.php");

$link = "fornec/delete_control_fornec";

	$objDelete = new delete_model();
	$objSelect = new select_model();

if (isset($_REQUEST['confirmacao'])){
	carregando($link);
}

if (isset($_REQUEST['usu_id'])){

	 $objDelete->deleta_um($_REQUEST['usu_id'],"usuario","USU_ID","Usuário",$link);
}

if ((isset($_REQUEST['deletar'])) && (isset($_REQUEST['res'])) && ($_REQUEST['res'] != "")){
	
		$objDelete->confirma_delecao_todos($_REQUEST['res'],$link);
}

if ((isset($_REQUEST['del'])) && ($_REQUEST['del'] == "del")){
	
		$objDelete->deleta_todos($_REQUEST['res'],"usuario","USU_ID","Usuário",$link);	
}

	if (isset($_REQUEST['pesquisa'])){
			if ($pesquisa != ''){
				$pesquisa = strip_tags(trim($_REQUEST['pesquisa']));
			}	
	}else{
			$pesquisa = '';
	}
	
	$resultados = $objSelect->seleciona_todos($pesquisa,"usuario","USU_NOME","USU_ID");
			
	script_deleta_todos();

	require("delete_view_fornec.php");

	$link = "brcommerce.php?pg=fornec/delete_control_fornec";
	paginacao($cont_cor,$maximo,$pag,$link,$pesquisa);
?>
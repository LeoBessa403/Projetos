<?php 

include_once("util/select_model.php");
include_once("update_model_user_single.php");

	$objSelect = new select_model();
	$objUpdate = new update_model_user();

if (isset($_REQUEST['confirmacao']) && ($_REQUEST['confirmacao'] == "ok")){
	
	cadastro_alterado("Usuário","user/update_control_user");
}

if (isset($_REQUEST['usu_id'])){

	 $resultados = $objSelect->seleciona_um($_REQUEST['usu_id'],"usuario","USU_ID");
}


if (isset($_POST['executar'])){
	
		
		$id = $_POST['id'];
		$nome  = strip_tags(trim($_POST['nome']));
		$senha = strip_tags(trim($_POST['senha']));
		$senha = base64_encode($senha);
		$email = strip_tags(trim($_POST['email']));
		$cor   = strip_tags(trim($_POST['cor']));
		$nivel = strip_tags(trim($_POST['nivel']));
		$login = strip_tags(trim($_POST['login']));

	$objUpdate->update_cadastro($id,$nome,$senha,$email,$cor,$nivel,$login);
}

	include_once("update_view_user_single.php");
?>

	
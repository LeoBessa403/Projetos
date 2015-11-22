<?php 

include_once("create_model_fornec.php");
if (isset($_REQUEST['confirmacao']) && ($_REQUEST['confirmacao'] == "ok")){
	
	echo '<div id="ok">Cadastro Realizado com Sucesso!</div>';
}
if (isset($_POST['executar'])){
	
	$nome  = strip_tags(trim($_POST['nome']));
	$email = strip_tags(trim($_POST['email']));
	$cor   = strip_tags(trim($_POST['cor']));
	$nivel = strip_tags(trim($_POST['nivel']));
	$login = strip_tags(trim($_POST['login']));
	$senha = strip_tags(trim($_POST['senha']));
	$senha = base64_encode($senha);

	insert_fornec($nome,$email,$cor,$nivel,$login,$senha);

}
	require("create_view_fornec.php");

?>

		
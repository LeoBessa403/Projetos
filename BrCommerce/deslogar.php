<link rel="stylesheet" href="util/stylo.css" type="text/css" media="screen" />
<?php
session_start();
if (!isset($_SESSION['sessao_cor_usuario'])){
$_SESSION['sessao_cor_usuario'] = 'azul';
}
echo '<div class="carregando">
<img src="imagens/'.$_SESSION['sessao_cor_usuario'].'/ajax-loader.gif" alt="Saindo do Sistema..." />
<br />Saindo do Sistema...</div>';
$_SESSION['sessao_nome_usuario'] = NULL;
$_SESSION['sessao_nivel_usuario'] = NULL;
$_SESSION['sessao_cor_usuario'] = NULL;
unset($_SESSION['sessao_nome_usuario']);
unset($_SESSION['sessao_nivel_usuario']);
unset($_SESSION['sessao_cor_usuario']);

echo '<meta http-equiv="refresh" content="2, URL=index.php" />';
exit;

?>
<?php
include("util/conexao.php");
include_once('util/functions.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="util/stylo.css" type="text/css" media="screen" />
<title>BR Commerce - Sistema de Automoção</title>
<style>
	#login input.btn {background-image:url(imagens/azul/btn.png);}
	#login {background-image:url(imagens/azul/loguin.jpg);}
</style>	
</head>
<body>

<?php if (isset($_GET['erro'])){
msg("erro","Usuário ou Senha Inválida!");
echo '<meta http-equiv="refresh" content="3, URL=index.php" />';
}
?>
<div id="form_serial">
<?php include_once('valida_serial/valida_serial.php');?>
</div>
<div id="login">		
	<form action="user/valida_user.php" method="post" enctype="multipart/form-data">
    	<input name="loguin" id="loguin"  type="text" class="campo"/>
        <input name="senha" id="senha"  type="password" class="campo"/>
        <input type="submit" class="btn" id="executar" name="executar" value="LOGAR"  />
    </form>
</div>

</body>
</html>
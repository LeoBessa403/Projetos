<?php

include("util/conexao.php");
include_once('util/functions.php');


	if (isset($_REQUEST['cor'])){
		
		$cor = $_REQUEST['cor'];
		
		if ($cor == 'amarelo'){	
			$fonteColor = '#b8aa2d';
		}elseif ($cor == 'azul'){
			$fonteColor = '#006699';	
		}elseif ($cor == 'vermelho'){
			$fonteColor = '#990000';	
		}elseif ($cor == 'verde'){
			$fonteColor = '#009900';	
		}
	}else {
		$cor = 'azul';
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="util/stylo.css" type="text/css" media="screen" />
<title>BrCommerce</title>
</head>
<style>
#login {background-image:url(imagens/<?php echo $cor;?>/loguin.jpg);}
#login input.campo {color:<?php echo $fonteColor;?>;}
#login input.btn {background-image:url(imagens/<?php echo $cor;?>/btn.png);}
</style>
<body>
<?php include_once('valida_serial/valida_serial.php'); ?>
<div id="login">
		
	<form action="" method="post" enctype="multipart/form-data">
    	<input name="loguin" id="loguin"  type="text" class="campo"/>
        <input name="senha" id="senha"  type="password" class="campo"/>
        <input type="submit" class="btn" id="btnloguin" name="btnloguin" value="LOGAR"  />
        <input type="hidden" value="<?php echo $cor;?>" id="cor" name="cor" />      
    </form>
    <div id="cor">
    <form action="" method="post" enctype="multipart/form-data">
		<select name="cor" id="cor">   
              <option value="<?php echo $_REQUEST['cor']?>">Selecione uma Cor para o Tema </option>
              <option value="amarelo">Amarelo</option>
			  <option value="azul">Azul</option>
              <option value="vermelho">Vermelho</option>
              <option value="verde">Verde</option>
        </select>
         <input type="submit" id="cortema" name="cortema" value="Mudar Cor"  /> 
     </form>
  </div>
</div>

</body>
</html>
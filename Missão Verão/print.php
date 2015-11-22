<?php
                 $tabela = $_REQUEST['tabela'];
                 $acao   = $_REQUEST['acao'];		   
                 require("util/conecta.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Missão Verão - Professora Michelly</title>
<link rel="stylesheet" type="text/css" href="util/stylo.css" media="print"/>
</head>
</head>

<body>
<div id="topo">
 &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;&nbsp;<img src="imagens/logo.png" width="186" height="105" class="logo"/>

 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<img src="imagens/ban1.jpg" width="248" height="106" /></div>
	<div id="conteudo">
      <?php
                				 
              if($tabela == "ranking")
                   require('ranking_acao.php');
              else if($tabela == "inscricoes")
                   require('cadastro_acao.php'); 
                 else
                   require('principal.php');			 
          ?>  

	</div>
</div>
</body>
</html>

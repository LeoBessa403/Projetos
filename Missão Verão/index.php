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
<link rel="stylesheet" type="text/css" href="util/stylo.css" />
<!----------------------------------------------- COMEÇO BANNER ------------------------------------------------->
<script type="text/javascript" src="util/jquery-1.6.2.min.js"></script>
	<link rel="stylesheet" href="util/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="util/themes/pascal/pascal.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="util/themes/orman/orman.css" type="text/css" media="screen" />
    <script type="text/javascript" src="util/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript" src="util/jquery.nivo.slider.js"></script>
    
	<script type="text/javascript">
    $(window).load(function() {
        $('#slider22').nivoSlider();
    });
    </script>
<!---------------------------------------------  FIM BANNER ------------------------------------------------->
</head>
</head>

<body>
<div id="topo">
<img src="imagens/logo.png" width="280" height="170" class="logo"/>

            <!-------------*********************começo nivo slider***********--------------->    
     <div id="wrapper">
        <div class="slider-wrapper theme-default">
            <div class="ribbon"></div>
            <div id="slider22" class="nivoSlider">
                <img src="imagens/ban1.jpg" width="600" height="250" alt="participe de 11/01/2012 a 29/02/2012." title="participe de 11/01/2012 a 29/02/2012." />
                <img src="imagens/ban3.jpg" width="600" height="250" alt="Alimentação saudável!" title="Alimentação saudável!" />
                <img src="imagens/ban2.jpg" width="600" height="250" alt="pise leve" title="pise leve" />
                <img src="imagens/ban4.jpg" width="600" height="250" alt="seu peso saudável ,seu melhor presente!" title="seu peso saudável ,seu melhor presente!
" />
                <img src="imagens/ban5.jpg" width="600" height="250" alt="atividade física uma atitude!" title="atividade física uma atitude!" />
            </div>
        </div>

    </div>
    <!-------------fim nivo slider---------------------->
</div>
 <div id="menu">
        	<ul>
            	<li><a href="index.php?tabela=inscricoes&acao=gravar" title="Realizar as Inscrições de novos participantes">Inscrições</a></li>
                <li><a href="index.php?tabela=inscricoes&acao=listar" title="Visualizar a lista de participantes do programa">Participantes</a></li>
                <li><a href="index.php?tabela=ranking&acao=listar" title="Ver o ranking atual do projeto Missao Verão">Ranking</a></li>
                <li><a href="imagens/PROJETO V...doc" title="Consultar o Regulamento">Regulamento</a></li>
            </ul>
 </div>
<div id="corpo">
	<div id="conteudo">
      <?php
                				 
                 if($tabela == "comentario")
                   require('comentario_acao.php'); 
				 else if($tabela == "foto")
                   require('foto_acao.php');
			     else if($tabela == "ranking")
                   require('ranking_acao.php');
              else if($tabela == "inscricoes")
                   require('cadastro_acao.php'); 
                 else
                   require('principal.php');			 
          ?>  

	 </div>
      <img src="imagens/coq1.png" width="213" height="236" class="coq1"/>
	  <img src="imagens/coq2.png" width="213" height="236" class="coq2"/></p>
</div>
<div id="rodape">
    	<h3 class="wm"><a href="http://www.webmasterti.com.br" title="Desenvolvimento de Sites Inteligentes" target="_blank"><img src="imagens/logo oficial oficial.png" width="25" height="25" class="loguinho"/>&nbsp;&nbsp; Desenvolvido por   Web Master Tecnologia</a></h3>
</div>
</div>
</body>
</html>

 <?php
 if ((isset($_POST['executar'])) && ($_POST['executar'] == "executar")){
	 
	$pagina  = "dir";
	$materia = $_POST['materia'];
	$titulo  = $_POST['titulo'];
	$quant   = $_POST['quant'];
	$caminho = $_POST['caminho'];
	$teste   = 0;
	
for ($i = 0; $i < $quant; $i++){	

	if (($i % 2)==0){
		$pagina  = "dir";
		$texto = $titulo;
	}else{
		$pagina  = "esq";
		$texto = $materia;
	}
	
	if (($i+3) < 10){
		$num_pagina = "0".($i+3);
	}else{
		$num_pagina = ($i+3);	
	}
		
	$conteudo = "<?xml version='1.0' encoding='UTF-8'?>
	<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.1//EN' 'http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd'>
    <html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en'>\n

	<head>
	\t<meta name='viewport' content='width=1125, height=1700' />
	\t<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        \t\t<title>$materia - $titulo</title>
    \t<link href='css/style.css' type='text/css' rel='stylesheet'/>
	</head>

	<body>
   \t <div id='geral'>
		\t\t<p class='titulo-page-$pagina'>$texto</p>
			\t\t<div class='conteudo'>
            \t\t<!--Inicio Conteudo-->\n\n

				   
			\t\t<!--Fim Conteudo-->	
		\t\t</div>
			\t\t\t<p class='rodape-page-$pagina'>$num_pagina</p>
    \t</div><!--Fim Geral-->
	</body>
	</html>";
	
	if ($handle = fopen("$caminho/OEBPS/pg$num_pagina.html","a")){
		$teste += 1;
	}
	fwrite($handle,$conteudo);
	fclose($handle); 
	
	
	} 
include_once 'content.php';	
include_once 'toc.php';	
}
?>


<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.1//EN' 'http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en'>

	<head>
	<meta name='viewport' content='width=1125, height=1700' />
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <title>Programa de Teste</title>
    <link href='css/style.css' type='text/css' rel='stylesheet'/>
	</head>

	<body>
   	<div id='geral'>
			<h1>Programa de Criação de Páginas</h1>
             
            <form name="paginas" id="form_paginas" method="post" action="index.php"  enctype="multipart/form-data">
            	<fieldset>
                	<legend>Criar Páginas - Dados do Livro</legend>
                		<label>Matéria:</label><input type="text" name="materia" class="campo"/>
                        <label>Título do Capítulo:</label><input type="text" name="titulo" class="campo"/>
                        <label>Pasta de Destino:</label><input type="text" name="caminho" class="campo" id="caminho"/>
                		<label>Quantidade de Páginas:</label><input type="text" name="quant" class="campo"/>
						<input type="submit" name="criar_paginas" id="criar_paginas" class="btn" value="Criar Páginas" />
                        <input type="hidden" name="executar" id="executar" value="executar" />
                </fieldset>            
            </form>
            <?php 
			 if (isset($_POST['executar'])){
				if ($teste == $i){
					echo "<div id='msg-ok'>Páginas Criadas com Sucesso!!!</div>";
				}else{
					echo "<div id='msg-erro'>Não foi possivel Criar Todas as Páginas!!!</div>";
				}
			 }?>
             <div id="adicionar"><a href="adicionar.php">Adicionar Páginas</a></div>
    </div><!--Fim Geral-->
	</body>
	</html>

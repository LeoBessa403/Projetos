 <?php

		
	$conteudo = "<package xmlns='http://www.idpf.org/2007/opf' unique-identifier='book-id' version='2.0'>


    <metadata xmlns:dc='http://purl.org/dc/elements/1.1/' xmlns:opf='http://www.idpf.org/2007/opf'>

		<dc:title id='en_title' xml:lang='en-us'>$materia - $titulo</dc:title>		
		<dc:creator id='creator_aut' opf:file-as='LASTNAME, FIRSTNAME' opf:role='aut'>Robert Cunha</dc:creator>
		<dc:identifier id='book-id'>$materia - $titulo</dc:identifier>
		<dc:description id='en_description' xml:lang='en-us'>$materia - $titulo</dc:description>
		<dc:publisher id='en_publisher' xml:lang='en-us'>Inova Livros</dc:publisher>
		<dc:date id='date_1' opf:event='publication'>####-##-##</dc:date>
		<dc:rights id='en_rights' xml:lang='en-us'>STATE COPYRIGHT RESERVATIONS HERE</dc:rights>
		<dc:language id='en_language'>en-us</dc:language>
	    <meta name='cover' content='coverimage' />
	</metadata>
	
	
	<manifest>
	    <item id='toc' href='toc.ncx' media-type='application/x-dtbncx+xml'></item>
<!-- css -->
		<item id='css1' href='css/style.css' media-type='text/css'></item>
		

<!-- html -->
		<item id='item1' media-type='application/html+xml' href='capa.html'></item>
		<item id='item2' media-type='application/html+xml' href='contracapa.html'></item>
		<item id='item3' media-type='application/html+xml' href='sumario.html'></item>
		<item id='item4' media-type='application/html+xml' href='contracapa2.html'></item>\n";
		
	for ($i = 0; $i < ($ultima+$quant); $i++){	
		
		if (($i+3) < 10){
			$num_pagina = '0'.($i+3);
		}else{
			$num_pagina = ($i+3);	
		}
		

		$conteudo .= "\t\t<item id='item".($i+5)."' media-type='application/html+xml' href='pg$num_pagina.html'></item>\n";
		
	}
		
		
		$conteudo .="
<!-- imagens -->
		<item id='coverimage' href='imagens/capa.jpg' media-type='image/jpeg'></item>
		<item id='bookpage' href='imagens/contracapa.jpg' media-type='image/jpeg'></item>
		<item id='bookpage1' href='imagens/contracapa2.jpg' media-type='image/jpeg'></item>
		
		
<!-- fonts -->
		<item id='Storybook' href='fonts/Storybook.ttf' media-type='font/truetype'></item>
	</manifest>

	
	<spine toc='toc'>
		<itemref idref='item1'/>
		<itemref idref='item2'/>
		<itemref idref='item3'/>
		<itemref idref='item4'/>\n";
		
	for ($i = 0; $i < ($ultima+$quant); $i++){			

		$conteudo .= "\t\t<itemref idref='item".($i+5)."'/>\n";
		
	}
		
		$conteudo .="

	</spine>

	
	<guide>
		<reference type='cover' title='Cover Image' href='capa.html'></reference>
		<reference type='text' title='Contracapa' href='contracapa.html'></reference>
		<reference type='text' title='Sumario' href='sumario.html'></reference>
		<reference type='text' title='Contracapa2' href='contracapa2.html'></reference>\n";
	for ($i = 0; $i < ($ultima+$quant); $i++){	
		
		if (($i+3) < 10){
			$num_pagina = '0'.($i+3);
		}else{
			$num_pagina = ($i+3);	
		}
		

		$conteudo .= "\t\t<reference type='text' title='pg$num_pagina' href='pg$num_pagina.html'></reference>\n";
		
	}
		
		
		$conteudo .="
	</guide>

</package>";
	
	$handle = fopen("$caminho/OEBPS/content.opf","w");
	fwrite($handle,$conteudo);
	fclose($handle); 
	

?>

﻿ <?php
	
	$conteudo = "<?xml version='1.0' encoding='UTF-8'?>
<!DOCTYPE ncx PUBLIC '-//NISO//DTD ncx 2005-1//EN' 'http://www.daisy.org/z3986/2005/ncx-2005-1.dtd'>

<ncx xmlns='http://www.daisy.org/z3986/2005/ncx/' version='2005-1' xml:lang='en'>

	<head>
		<meta name='dtb:uid' content='0'/>
		<meta name='dtb:depth' content='1'/>
		<meta name='dtb:totalPageCount' content='0'/>
		<meta name='dtb:maxPageNumber' content='0'/>
	</head>

	
	<docTitle>
		<text>$materia - $titulo</text>
	</docTitle>

	
	<navMap>
		<navPoint id='navPoint-1' playOrder='1'>
			<navLabel><text>capaimage</text></navLabel>
			<content src='capa.html#capa'/>
		</navPoint>
		<navPoint id='navPoint-2' playOrder='2'>
			<navLabel><text>$materia - $titulo</text></navLabel>
			<content src='contracapa2.html#capa'/>
		</navPoint>
	</navMap>
</ncx>";
	
	$handle = fopen("$caminho/OEBPS/toc.ncx","w");
	fwrite($handle,$conteudo);
	fclose($handle); 
	

?>



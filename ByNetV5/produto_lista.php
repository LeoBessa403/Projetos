<link href="util/estilos.css" rel="stylesheet" type="text/css"/>

<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<body onLoad="MM_preloadImages('imagens_site/novo_registro_f2.jpg','imagens_site/alterar_f2.jpg','imagens_site/excluir_f2.jpg')">

<table width="888" border="1px" align="center" cellspacing="1" class="borda_tabela">
  <tr>
    <td colspan="8" align="center" class="titulos_lista_pesquisa"><form action="home.php?tabela=produto&acao=listar" method="post">
      <label>Pesquisa.:
        <input name="pesquisa" type="text" id="pesquisa" size="50" />
        </label>
        <label>
          <input type="submit" name="button" id="button" value="Pesquisar" />
        </label></form>
    </td>
  </tr>
  <tr class="ordenacao_novo_registro">
    <td width="47"><a href="home.php?tabela=produto&acao=listar&ordem=PRO_CODIGO">C&oacute;digo</a></td>
    <td width="299" height="33"><a href="home.php?tabela=produto&acao=listar&ordem=PRO_DESCRICAO">Descri&ccedil;&atilde;o do Produto</a></td>
    <td width="102">Foto Produto</td>
    <td width="114"><a href="home.php?tabela=produto&acao=listar&ordem=PRO_UNID_VENDA">Unid. de Venda</a></td>
    <td width="54"><a href="home.php?tabela=produto&acao=listar&ordem=PRO_ESTOQUE">Estoque</a></td>
    <td width="59"><a href="home.php?tabela=produto&acao=listar&ordem=PRO_VALOR">Valor</a></td>
    <td colspan="2"><a href="home.php?tabela=produto&acao=incluir" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Imagem4','','imagens_site/novo_registro_f2.jpg',1)"><img src="imagens_site/novo_registro.jpg" name="Imagem4" width="130" height="26" border="0" id="Imagem4" /></a></td>
  </tr>
  <?php	
  		$i = 0;
	while($oquefazer->registros = $oquefazer->resultado->FetchNextObject())
	{
		$i++;
    ?>
  <tr onMouseOver="muda_cor_over(this)" onMouseOut="muda_cor_out(this)">
    <td align="left" valign="top" class="itens_tabela_banco"><?php echo $oquefazer->registros->PRO_CODIGO;?></td>
    <td align="left" valign="top"  class="itens_tabela_banco"><?php echo $oquefazer->registros->PRO_DESCRICAO;?></td>
    <td class="itens_tabela_banco"><a title="<?php echo $oquefazer->registros->PRO_DESCRICAO;?>" href="imagens/<?php echo $oquefazer->registros->PRO_FOTO;?>" rel="shadowbox[vocation]">Imagem</a></td>
    <td align="left" valign="top" class="itens_tabela_banco"><?php echo $oquefazer->registros->PRO_UNID_VENDA;?></td>
    <td align="left" valign="top" class="itens_tabela_banco"><?php echo $oquefazer->registros->PRO_ESTOQUE;?></td>
    <td align="left" valign="top" class="itens_tabela_banco"><?php echo $oquefazer->registros->PRO_VALOR;?></td>
    <td class="alterar_excluir" width="85"><a href="home.php?tabela=produto&amp;acao=alterar&codigo=<?php echo $oquefazer->registros->PRO_CODIGO;?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Imagem5[i]','','imagens_site/alterar_f2.jpg',1)"><img src="imagens_site/alterar.jpg" name="Imagem5[i]" width="85" height="26" border="0" id="Imagem5[i]" /></a></td>
    <td class="alterar_excluir" width="85"><a href="javascript:if(confirm('Deseja excluir esse registro ?')) {location='home.php?tabela=produto&acao=excluir&codigo=<?php echo $oquefazer->registros->PRO_CODIGO;?>';}" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Imagem6','','imagens_site/excluir_f2.jpg',1)"><img src="imagens_site/excluir.jpg" name="Imagem6" width="85" height="26" border="0" id="Imagem6" /></a></td>
  </tr>
  <?php 
	} ?>
  <tr class="titulos_lista_pesquisa">
    <td height="23" colspan="8">N&uacute;mero de registros: <?php 
	if ($oquefazer->registros_total->TOTAL == 0)
	{
		echo "Nenhum Registro encontrado!";	
	}else	
	echo $oquefazer->registros_total->TOTAL;?></td>
  </tr>
</table>

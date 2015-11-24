<link href="util/estilos.css" rel="stylesheet" type="text/css"/>

<body>

<form name="form2" method="post" action="">
  <table width="911" border="1px" align="center" cellspacing="1" class="borda_tabela">
    <tr>
      <td colspan="7" align="center" class="titulos_lista_pesquisa"><label>Pesquisa.:
        <input name="pesquisa" type="text" id="pesquisa" size="50" />
      </label>
        <label>
          <input type="submit" name="button" id="button" value="Pesquisar" />
        </label></td>
    </tr>
    <tr class="ordenacao_novo_registro" align="left">
      <td width="55"><a href="home.php?tabela=venda&acao=listar_produtos&ordem=PRO_DESCRICAO">C&oacute;digo</a></td>
      <td width="375" height="33"><a href="home.php?tabela=venda&acao=listar_produtos&ordem=PRO_DESCRICAO">Descri&ccedil;&atilde;o do Produto</a></td>
      <td width="95">Foto Produto</td>
      <td width="121"><a href="home.php?tabela=venda&acao=listar_produtos&ordem=PRO_UNID_VENDA">Unid. de Venda</a></td>
      <td width="86">Quantidade</td>
      <td width="54"><a href="home.php?tabela=venda&acao=listar_produtos&ordem=PRO_ESTOQUE">Estoque</a></td>
      <td width="87"><a href="home.php?tabela=venda&acao=listar_produtos&ordem=PRO_VALOR">Valor</a></td>
    </tr>
    <?php	
	$total_produto = 0;
	while($oquefazer->registros = $oquefazer->resultado->FetchNextObject())
	{
		//alerta("produto = ".$oquefazer->registros->PRO_CODIGO);
		$listar = "listar";
		$oquefazer->listar_comprado();
		  while($oquefazer->registros_car = $oquefazer->resultado_carrinho->FetchNextObject())
		  { 
	  		//alerta("produto = ".$oquefazer->registros->PRO_CODIGO);	
			//alerta("carrinho = ".$oquefazer->registros_car->PRO_CODIGO);
			if ($oquefazer->registros_car->PRO_CODIGO == $oquefazer->registros->PRO_CODIGO)
			{
				$listar = "nao listar";
			}
		  }
		  
		  if ($listar == "listar")
		  {
			  $total_produto++;
	  ?>
    <tr onMouseOver="muda_cor_over(this)" onMouseOut="muda_cor_out(this)">
      <td align="left" valign="top"  class="itens_tabela_banco"><?php echo $oquefazer->registros->PRO_CODIGO;?></td>
      <td align="left" valign="top"  class="itens_tabela_banco"><?php echo $oquefazer->registros->PRO_DESCRICAO;?></td>
      <td class="itens_tabela_banco"><a title="<?php echo $oquefazer->registros->PRO_DESCRICAO;?>" href="imagens/<?php echo $oquefazer->registros->PRO_FOTO;?>" rel="shadowbox[vocation]">Imagem</a></td>
      <td align="left" valign="top" class="itens_tabela_banco"><?php echo $oquefazer->registros->PRO_UNID_VENDA;?></td>
      <td align="left" valign="top" class="itens_tabela_banco">
        <input name="pro_ven_quantidade[]" type="text" value="0" size="10">
        <input type="hidden" name="codigo[]" value="<?php echo $oquefazer->registros->PRO_CODIGO;?>" /></td>
      <td align="left" valign="top" class="itens_tabela_banco"><?php echo $oquefazer->registros->PRO_ESTOQUE;?></td>
      <td align="left" valign="top" class="itens_tabela_banco"><?php echo $oquefazer->registros->PRO_VALOR;?></td>
    </tr>
    <?php 
		  }
	}?>
    <tr>
      <td height="23" colspan="7" bgcolor="#0099FF" align="center"><label>
        <input type="submit" name="button2" id="button2" value="Comprar">
      </label>
        <label>
          &nbsp; 
          <input type="submit" name="button3" id="button3" value="Limpar">
      </label>
        <label>
          &nbsp; 
          
          <input type="submit" name="button4" id="button4" value="Cancelar">
        <input type="hidden" name="acao" id="acao" value="incluir_no_carrinho"/>  
      </label></td>
    </tr>
    <tr class="titulos_lista_pesquisa" align="left">
      <td height="23" colspan="7">N&uacute;mero de registros:
        <?php 
	if ($total_produto == 0)
	{
		echo "Nenhum Registro encontrado!";	
	}else	
	echo $total_produto; ?>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="home.php?tabela=venda&acao=listar_carrinho&clicod=$oquefazer->regcli->CLI_CODIGO"><strong>VER COMPRA</strong></a></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>

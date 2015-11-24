<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="util/estilos.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="FrmCarrinho" name="FrmCarrinho" method="post" action="index.php">
  <table width="774" border="1px" align="center" cellspacing="1" class="borda_tabela">
    <tr>
      <td colspan="5" align="center" class="titulos_lista_pesquisa"><font size="+3">Cupom Fiscal</font></td>
    </tr>
    <tr>
       <td colspan="5" align="center" class="titulos_lista_pesquisa"><font size="+2">Dados do Cliente</font></td>
    </tr>
    <?php
	    
		$oquefazer->registros_venda = $oquefazer->res_venda->FetchNextObject();
		$_SESSION['sessao_codigo_venda'] = $oquefazer->registros_venda->VEN_CODIGO;
		
		if ($oquefazer->registros_venda->CLI_CODIGO == 0)
		{  
		?>
			<tr>
      <td colspan="4" align="left"  class="ordenacao_novo_registro">Cliente:&nbsp; Nenhum Cliente Selecionado Na Compra</td>
    </tr>
	<?php
    	} else {
	?>
    <tr>
      <td colspan="4" align="left"  class="ordenacao_novo_registro">Nome:&nbsp; <?php echo $oquefazer->registros_venda->CLI_NOME;?></td>
    </tr>
    <tr>
      <td colspan="4" align="left"  class="ordenacao_novo_registro">Endereço:&nbsp; <?php echo $oquefazer->registros_venda->CLI_ENDERECO;?></td>
    </tr>
    <tr>
      <td colspan="4" align="left"  class="ordenacao_novo_registro">E-mail:&nbsp; <?php echo $oquefazer->registros_venda->CLI_EMAIL;?></td>
    </tr>
    <tr>
      <td colspan="4" align="left"  class="ordenacao_novo_registro">Telefone:&nbsp; <?php echo $oquefazer->registros_venda->CLI_TELEFONE;?></td>
    </tr>
    <?php } ?>
    <tr>
     <td colspan="5" align="center" class="titulos_lista_pesquisa"><font size="+1">Produtos Adqueridos</font></td>
    </tr>
    <tr align="left" class="ordenacao_novo_registro"> 
      <td width="383">Descrição do Produto</td>
      <td width="134">Quantidade</td>
      <td width="111">Preço Unitário</td>
      <td width="123">Preço Total</td>
    </tr>
    
       	<?php
		  $total_carrinho = 0;
     	 // $codcategoria =  $_REQUEST['codcategoria']; 
		  
          while($oquefazer->reg_itens = $oquefazer->res_itens->FetchNextObject())
		  { 
		        $total_carrinho += $oquefazer->reg_itens->PRO_VEN_VALOR * $oquefazer->reg_itens->PRO_VEN_QUANTIDADE;
		  ?>
    
                    <tr  onmouseover="muda_cor_over(this)" onmouseout="muda_cor_out(this)">
                      <td><?php echo $oquefazer->reg_itens->PRO_DESCRICAO;?></td>
                      <td><?php echo $oquefazer->reg_itens->PRO_VEN_QUANTIDADE;?></td>
                      <td><?php echo $oquefazer->reg_itens->PRO_VEN_VALOR;?></td>
                      <td><?php echo formata_money($oquefazer->reg_itens->PRO_VEN_QUANTIDADE * $oquefazer->reg_itens->PRO_VEN_VALOR);?></td>
                      
    <?php } ?>
                      
                      
    </tr>
    <tr>
      <td height="31" colspan="3" align="right"  class="ordenacao_novo_registro">Total da Compra.:</td>
      <td class="campo_total" align="center"><?php echo formata_money($total_carrinho);?></td>
    </tr>
    <tr class="borda_tabela">
    <?php
			alerta($oquefazer->registros_venda->VEN_PAGAMENTO);
			if ($oquefazer->registros_venda->VEN_PAGAMENTO == "Boleto Bancario")
			{
				?>
      <td colspan="4" align="center" class="titulos_lista_pesquisa"><a href="gera_boleto/boleto_cef.php" class="titulos_lista_pesquisa">Gerar o boleto</a></td>
	  <?php
			}else if($oquefazer->registros_venda->VEN_PAGAMENTO == "A vista - Dinheiro")
			 	{				
				 ?><td colspan="4" align="center" class="titulos_lista_pesquisa"><font size="+1">Valor Total.: <?php echo formata_money($total_carrinho); ?> >>>> Valor Com Desconto.: <?php echo formata_money($total_carrinho*0.95); ?></font></td>

			  <?php
			}else if(($oquefazer->registros_venda->VEN_PAGAMENTO == "Cartao de Credito") || ($oquefazer->registros_venda->VEN_PAGAMENTO == "Cartao de Debito"))
			 	{				
				 ?><td colspan="4" align="center" class="titulos_lista_pesquisa"><font size="+1">Pagamento.: <?php echo $oquefazer->registros_venda->VEN_PAGAMENTO; ?> >>>> Valor Total.: <?php echo formata_money($total_carrinho); ?></font></td>
			<?php
			}else if($oquefazer->registros_venda->VEN_PAGAMENTO == "Cheque")
			 	{				
				 ?><td colspan="4" align="center" class="titulos_lista_pesquisa"><font size="+1">Valor Total.: <?php echo formata_money($total_carrinho); ?> >>>> Valor Com Desconto.: <?php echo formata_money($total_carrinho*0.95); ?></font></td>
				
				<?php
			}
	  ?>
    </tr>
  </table>
</form>

<form action="home.php" method="get">
  <p align="center"><input type="submit" name="button" id="button" value="Voltar Para a Venda" /></p>
      <input type="hidden" name="tabela" id="tabela" value="venda">
    <input type="hidden" name="acao" id="acao" value="listar_produtos">
</form>
</body>
</html>
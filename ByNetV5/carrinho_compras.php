<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="util/estilos.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="util/funcoes.js"></script>
</head>

<body>
<form id="FrmCarrinho" name="FrmCarrinho" method="post" action="home.php?tabela=venda">
  <table width="888" border="1px" align="center" cellspacing="1" class="borda_tabela">
    <tr>
      <td colspan="6" align="center" class="titulos_lista_pesquisa"><font size="+3">Compras</font></td>
    </tr>
    <tr align="left" class="ordenacao_novo_registro">
      <td width="269" >Descrição do Produto</td>
      <td width="103" >Foto Produto</td>
      <td width="189">Quantidade</td>
      <td width="80">Estoque</td>
      <td width="109">Preço Unitário</td>
      <td width="138">Total</td>
    </tr>
    <?php
		  $total_carrinho = 0;
		  
          while($oquefazer->registros = $oquefazer->resultado_carrinho->FetchNextObject())
		  { 
		        $total_carrinho += $oquefazer->registros->PRO_VEN_VALOR * $oquefazer->registros->PRO_VEN_QUANTIDADE;
		  ?>
    <tr  onmouseover="muda_cor_over(this)" onmouseout="muda_cor_out(this)" align="left">
      <td><?php echo $oquefazer->registros->PRO_DESCRICAO;?></td>
      <td><a title="<?php echo $oquefazer->registros->PRO_DESCRICAO;?>" href="imagens/<?php echo $oquefazer->registros->PRO_FOTO;?>" rel="shadowbox[vocation]">Imagem</a></td>
      <td><input type="text" name="qtd[]" size"8" value="<?php echo $oquefazer->registros->PRO_VEN_QUANTIDADE;?>" />
        <input type="hidden" name="codigo[]" value="<?php echo $oquefazer->registros->PRO_CODIGO;?>" /></td>
      <td><?php echo $oquefazer->registros->PRO_ESTOQUE;?></td>
      <td><?php echo $oquefazer->registros->PRO_VEN_VALOR;?></td>
      <td><?php echo formata_money($oquefazer->registros->PRO_VEN_VALOR * $oquefazer->registros->PRO_VEN_QUANTIDADE);?></td>
      <?php } ?>
    </tr>
    <tr>
      <td height="29" colspan="5" align="right"  class="ordenacao_novo_registro">Total da Compra.:</td>
      <td class="campo_total" align="center"><?php echo formata_money($total_carrinho);?></td>
    </tr>
    <tr class="borda_tabela">
  
      <td height="41" colspan="6" align="center" class="titulos_lista_pesquisa"><input type="button" name="botao_continuar_comprando" id="botao_continuar_comprando" value="Continuar Comprando"
        onclick="document.location='home.php?tabela=venda&acao=listar_produtos'" />
      --         
        <input type="submit" name="botao_atualizar" id="botao_atualizar" value="Atualizar Compra"/>
      <input type="hidden" name="acao" id="acao" value="atualizar_compra" /></td>
    </tr>
  </table>
</form>
					<form id="finalizar" name="finalizar" method="post" action="home.php?tabela=venda" onSubmit="return verifica_cliente(this)">
  <table width="888" border="1px" align="center" cellspacing="1" class="borda_tabela">
    <tr>
      <td height="40" align="center" class="titulos_lista_pesquisa">Forma de Pagamento.:
          <label>
            <select name="ven_pagamento" id="ven_pagamento">
              <option>Selecione a Forma de Pagamento</option>
              <option value="A vista - Dinheiro">A vista - Dinheiro</option>
              <option value="Cartao de Debito">Cartão de Débito</option>
              <option value="Cartao de Credito">Cartão de Crédito</option>
              <option value="Cheque">Cheque</option>
              <option value="Boleto Bancario">Boleto Bancário</option>
            </select>
          </label>
      &nbsp;Cliente da Compra.:
      <select name="cli_nome" id="cli_nome">
        <option value="0">Selecione um Cliente........</option>
        <?php echo $oquefazer->listar_clientes();?>
      </select>
     </td>
    </tr>
    <tr>
      <td height="34" align="center" class="titulos_lista_pesquisa">
        <input type="submit" name="finalizar_compra" id="finalizar_compra" value="FINALIZAR COMPRA"/>
        <input type="hidden" name="acao" id="acao" value="finalizar_compra" />
         <input type="hidden" name="total" id="total" value="<?php echo formata_money($total_carrinho);?>" />
	  </td>
    </tr>
  </table>
</form>
</body>
</html>
<body>
<p>&nbsp;</p>
<form action="home.php" method="post" enctype="multipart/form-data"  name="form_cadastro">
  <div align="center">
    <table width="631" border="1" cellpadding="5" cellspacing="5" class="borda_tabela">
      <tr>
        <td colspan="2"><div align="center">
          <h1 class="titulos_lista_pesquisa">Manuten&ccedil;&atilde;o de Produto</h1>
        </div></td>
      </tr>
      <tr>
        <td>Descri&ccedil;&atilde;o.:</td>
        <td><input name="pro_descricao" type="text" id="pro_descricao" value="<?php echo $oquefazer->registros->PRO_DESCRICAO;?>" size="50" maxlength="50"></td>
      </tr>
      <tr>
        <td>Foto do Produto.:</td>
        <td><input name="pro_foto" type="file" id="pro_foto" size="45"></td>
      </tr>
      <tr>
        <td>Unidade de Venda.:</td>
        <td><input name="pro_unid_venda" type="text" id="pro_unid_venda" value="<?php echo $oquefazer->registros->PRO_UNID_VENDA;?>" size="30" maxlength="30"></td>
      </tr>
      <tr>
        <td>Estoque.:</td>
        <td><input name="pro_estoque" type="text" id="pro_estoque" value="<?php echo $oquefazer->registros->PRO_ESTOQUE;?>" size="15" maxlength="15"></td>
      </tr>
      <tr>
        <td width="156">Valor.:</td>
        <td width="391"><label>
          <input name="pro_valor" type="text" id="pro_valor" value="<?php echo $oquefazer->registros->PRO_VALOR;?>" size="15" maxlength="15">
        </label></td>
      </tr>
      <tr>
        <td colspan="2" align="center" class="titulos_lista_pesquisa"><label>
          <input type="submit" name="button" id="button" value="Salvar" />
          <input type="reset" name="button2" id="button2" value="Limpar" />
          <input type="button" name="button3" id="button3" value="Cancelar" />
        </label>
        <input type="hidden" name="tabela" value="produto" />
        <input type="hidden" name="acao" value="<?php echo 'gravar_'.$acao?>"/>        
        <input type="hidden" name="codigo" value="<?php echo $oquefazer->registros->PRO_CODIGO;?>" />                
        </td>
      </tr>
      <tr>
        <td colspan="2" class="titulos_lista_pesquisa" align="center">ByNet - Sistema Gerenciador de Armarinho e Papelaria</td>
      </tr>
    </table>
  </div>
</form>
</body>
<body>
<p>&nbsp;</p>
<form action="home.php" method="post" enctype="multipart/form-data"  name="form_cadastro">
  <div align="center">
    <table width="588" border="1" cellpadding="5" cellspacing="5" class="borda_tabela">
      <tr>
        <td colspan="2"><div align="center">
          <h1 class="titulos_lista_pesquisa">Manuten&ccedil;&atilde;o de Cliente</h1>
        </div></td>
      </tr>
      <tr>
        <td>Nome.:</td>
        <td><input name="cli_nome" type="text" id="cli_nome" value="<?php echo $oquefazer->registros->CLI_NOME;?>" size="50" maxlength="50"></td>
      </tr>
      <tr>
        <td>Endere&ccedil;o.:</td>
        <td><input name="cli_endereco" type="text" id="cli_endereco" value="<?php echo $oquefazer->registros->CLI_ENDERECO;?>" size="50" maxlength="50"></td>
      </tr>
      <tr>
        <td>Telefone.:</td>
        <td><input name="cli_telefone" type="text" id="cli_telefone" value="<?php echo $oquefazer->registros->CLI_TELEFONE;?>" size="15" maxlength="15"></td>
      </tr>
      <tr>
        <td width="102">E-mail.:</td>
        <td width="445"><label>
          <input name="cli_email" type="text" id="cli_email" value="<?php echo $oquefazer->registros->CLI_EMAIL;?>" size="50" maxlength="50">
        </label></td>
      </tr>
      <tr>
        <td colspan="2" align="center" class="titulos_lista_pesquisa"><label>
          <input type="submit" name="button" id="button" value="Salvar" />
          <input type="reset" name="button2" id="button2" value="Limpar" />
          <input type="button" name="button3" id="button3" value="Cancelar" />
        </label>
        <input type="hidden" name="tabela" value="cliente" />
        <input type="hidden" name="acao" value="<?php echo 'gravar_'.$acao?>"/>        
        <input type="hidden" name="codigo" value="<?php echo $oquefazer->registros->CLI_CODIGO;?>" />                
        </td>
      </tr>
      <tr>
        <td colspan="2" class="titulos_lista_pesquisa" align="center">ByNet - Sistema Gerenciador de Armarinho e Papelaria</td>
      </tr>
    </table>
  </div>
</form>
</body>
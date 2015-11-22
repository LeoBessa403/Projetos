<link href="util/cadastro.css" rel="stylesheet" type="text/css"/>

<table width="1200" class="borda_tabela" cellspacing="2">
  <tr class="titulos_lista_pesquisa">
    <td colspan="9" align="center" class="ordenacao"> <form id="form_pesquisa" name="form_pesquisa" method="post" action="index.php?tabela=inscricoes&acao=listar">
        <label>
          Pesquisa.:
          <input name="pesquisa" type="text" id="pesquisa" size="50" />
        </label>
        <label>
          <input type="submit" name="button" id="button" value="Pesquisar" />
        </label>
      </form></td>
  </tr>
  <tr class="ordenacao">
    <td width="225">Nome</td>
    <td width="134">Professor Resp.</td>
    <td width="199">Email</td>
    <td width="103">Telefone</td>
    <td width="130">Nascimento</td>
    <td width="70">Pesos</td>
    <td colspan="3">Administrativo</td>
  </tr>
  <?php
  $cont_cor =1;
	while($oquefazer->registros = $oquefazer->resultado->FetchNextObject())
	{
		if(($cont_cor%2)==0)
		{
			$cor="#D4DF9D";
		}
		else
			$cor="#BFE0CF";
    ?>
            <tr bgcolor="<?php echo $cor; ?>" >
              <td align="left" valign="top"  class="itens_tabela_banco"><?php echo $oquefazer->registros->CAD_NOME;?></td>
              <td align="left" valign="top"  class="itens_tabela_banco"><?php echo $oquefazer->registros->CAD_PROF_RESP;?></td>
              <td align="left" valign="top"  class="itens_tabela_banco"><?php echo $oquefazer->registros->CAD_EMAIL;?></td>
              <td height="32" align="left" valign="top"  class="itens_tabela_banco"><?php echo $oquefazer->registros->CAD_TELEFONE;?></td>
              <td  class="itens_tabela_banco"><?php echo $oquefazer->registros->CAD_DATA;?></td>
                <td  class="alterar_excluir"><span class="alterar_excluir">&nbsp;<a href="index.php?tabela=inscricoes&acao=listar_peso&codigo=<?php echo $oquefazer->registros->CAD_CODIGO;?>">Visualizar</a></span></td>
                <td class="alterar_excluir" width="135">&nbsp;<a href="index.php?tabela=inscricoes&acao=incluir&codigo=<?php echo $oquefazer->registros->CAD_CODIGO;?>"><img src="imagens/novo.png" alt="" width="16" height="16" />&nbsp;Nova Pesagem</a></td>
                <td class="alterar_excluir" width="72">&nbsp;<a href="index.php?tabela=inscricoes&acao=alterar&codigo=<?php echo $oquefazer->registros->CAD_CODIGO;?>"><img src="imagens/edit.png" width="16" height="16">&nbsp;Alterar</a></td>
               <td class="alterar_excluir" width="74">&nbsp;<a href="javascript:if(confirm('Deseja excluir esse registro ?')) {location='index.php?tabela=inscricoes&acao=excluir&codigo=<?php echo $oquefazer->registros->CAD_CODIGO;?>';}"><img src="imagens/delete.png" width="16" height="16">&nbsp;Excluir</a></td>
  </tr>
<?php
	$cont_cor++;
	} ?>         
   <tr  class="ordenacao">
    <td colspan="9"><p>N&uacute;mero de Inscritos: <font color="#000"><?php 
	if ($oquefazer->registros_ultimo->TOTAL > 0)
	echo $oquefazer->registros_ultimo->TOTAL;
	else
	echo "Nenhum Inscrito Encontrado";?></font></p></td>
  </tr>
</table>

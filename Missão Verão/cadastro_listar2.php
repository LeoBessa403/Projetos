<link href="util/cadastro.css" rel="stylesheet" type="text/css"/>

<table width="1200"  class="borda_tabela" cellspacing="2">
  <tr class="titulos_lista_pesquisa">
    <td colspan="2" align="center" class="ordenacao"> <form id="form_pesquisa" name="form_pesquisa" method="post" action="index.php?tabela=inscricoes&acao=listar">
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
    <td height="32" colspan="2"><span class="itens_tabela_banco">PARTICIPANTE.:&nbsp; <?php echo $oquefazer->registros3->CAD_NOME;?></span></td>
  </tr>
  <tr class="ordenacao">
    <td width="246">Data</td>
    <td width="938">Pesos</td>
  </tr>
  <?php
  $cont_cor =1;
	while($oquefazer->registros = $oquefazer->resultado2->FetchNextObject())
	{
		if(($cont_cor%2)==0)
			$cor="#D4DF9D";	
		else
			$cor="#BFE0CF";
    ?>
            <tr bgcolor="<?php echo $cor; ?>" >
              <td height="32" align="left" valign="top"  class="itens_tabela_banco"><dt><?php echo $oquefazer->registros->PES_DATA;?></dt></td>
              <td  class="itens_tabela_banco"><span class="alterar_excluir">
              <dl>
                      <dt><?php echo $oquefazer->registros->PES_VALOR;?>KG</dt>
                <dd>
                                <span><em style="left:<?php echo ($oquefazer->registros->PES_VALOR*2);?>px"><?php echo ($oquefazer->registros->PES_VALOR * 3);?>%</em></span>
                </dd>
                    			
			</dl>
              
              
              </span></td>
  </tr>
<?php
	$cont_cor++;
	} ?>         
   <tr  class="ordenacao">
    <td colspan="2"><p>Perca Total.: <font color="#000">
      <?php 
	 	if ($oquefazer->registros_total->total_perca < 0)
		echo "Aumentou ".($oquefazer->registros_total->total_perca*-1);
		else
		echo "Diminuiu ".$oquefazer->registros_total->total_perca; ?>
    </font>(KG)</p></td>
  </tr>
</table>

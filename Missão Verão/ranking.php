<link href="util/cadastro.css" rel="stylesheet" type="text/css"/>

<table width="1250" border="1px" class="borda_tabela" cellspacing="2">
<tr class="titulos_lista_pesquisa">
    <td colspan="11" align="center" class="ordenacao"> <form id="form_pesquisa" name="form_pesquisa" method="post" action="index.php?tabela=ranking&acao=listar">
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
    <td width="266" height="31">Nome do Participante</td>
    <td width="529">Última Pesagem</td>
    <td width="151">Data da Pesagem</td>
    <td width="181">Perca Total</td>
    <td width="89">Colocação</td>
  </tr>
    <?php
  $cont=0;
	while($oquefazer->registros = $oquefazer->resultado_cli2->FetchNextObject())
	{
		//alerta($oquefazer->registros->CAD_CODIGO);
		$oquefazer->listar_peso2($oquefazer->registros->CAD_CODIGO);
		//alerta($oquefazer->registros_ultimo->TOTAL);
			
		$ranking[$cont] = $oquefazer->registros_total->total_perca;
		$cod_cli[$cont] = $oquefazer->registros->CAD_CODIGO;
		
		$cont++;
	
	}	
	
	 for ($i = 0; $i < ($cont-1); $i++) {
        for ($j = ($i+1); $j < $cont; $j++) {
        	if  ($ranking[$i] < $ranking[$j])
			{
				$aux = $ranking[$i];
				$aux1 = $cod_cli[$i];
                $ranking[$i] = $ranking[$j];
				$cod_cli[$i] = $cod_cli[$j];
				$ranking[$j] = $aux;
				$cod_cli[$j] = $aux1;
			}
        }
	 }

	$oquefazer->ranking_tru();
	for ($j = 0; $j < $cont; $j++) {
			$oquefazer->ranking($cod_cli[$j]);
	}
	
	//alerta($ranking[0]);
  
	$cont_cor =1;
	$oquefazer->listar_peso();
	while($oquefazer->registros = $oquefazer->resultado_cli->FetchNextObject())
	{
		//alerta($oquefazer->registros->CAD_CODIGO);
		
		$oquefazer->listar_peso2($oquefazer->registros->CAD_CODIGO);
		//alerta($oquefazer->registros_ultimo->TOTAL);
				
		if(($cont_cor%2)==0)
		{
			$cor="#D4DF9D";
		}
		else
			$cor="#BFE0CF";
    ?>
            
            <tr bgcolor="<?php echo $cor; ?>" >
              <td height="32" align="left" valign="top"  class="itens_tabela_banco"> <dt><?php echo $oquefazer->registros->CAD_NOME;?></dt></td>
              <td  class="itens_tabela_banco">  
              <dl>
                      <dt><?php echo $oquefazer->registros_peso1->PES_VALOR;?> KG</dt>
                <dd>
                                <span><em style="left:<?php echo ($oquefazer->registros_peso1->PES_VALOR*2);?>px"><?php echo ($oquefazer->registros_peso1->PES_VALOR * 3);?>%</em></span>
                </dd>
                    			
			</dl>
              
              
              </span></td>
              <td class="itens_tabela_banco"><dt><?php echo $oquefazer->registros_peso1->PES_DATA;?></dt></td>
              <td class="itens_tabela_banco"><dt>
              <?php 
	 	if ($oquefazer->registros_total->total_perca < 0)
		echo "Aumentou ".($oquefazer->registros_total->total_perca*-1);
		else
		echo "Diminuiu ".$oquefazer->registros_total->total_perca; ?>
              (KG)</dt></td>
                <td class="itens_tabela_banco">
                  <p> <dt> <?php echo $oquefazer->registros->RAN_CODIGO;?>º</dt></p>
                </td>
  </tr>
<?php
	$cont_cor++;
	} ?>         
   <tr  class="ordenacao">
     <td height="29" colspan="5">N&uacute;mero de Participantes: <font color="#000">
       <?php 
	if ($oquefazer->registros_ultimo->TOTAL > 0)
		if($oquefazer->registros_ultimo->TOTAL < 10)
		echo "0".$oquefazer->registros_ultimo->TOTAL;
		else
		echo $oquefazer->registros_ultimo->TOTAL;
	else
	echo "Nenhum Participante Encontrado";?>
     </font>&nbsp;</td>
   </tr>
   <tr  class="ordenacao">
    <td height="29" colspan="5"><p><a href="print.php?tabela=ranking&acao=listar_print" target="_blank">Imprimir Ranking</a></p></td>
  </tr>
</table>
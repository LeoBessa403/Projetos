<link href="util/cadastro.css" rel="stylesheet" type="text/css"/>

<table width="700" cellpadding="3px">
  <tr class="ordenacao">
    <td width="244" height="57">Nome do Participante</td>
    <td width="100">Última Pesagem</td>
    <td width="91">Data da Pesagem</td>
    <td width="133">Perca Total</td>
    <td width="88">Colocação</td>
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
            
            <tr bgcolor="<?php echo $cor; ?>">
              <td  class="nome" height="32"><?php echo $oquefazer->registros->CAD_NOME;?></td>
              <td  class="print">
                <?php echo $oquefazer->registros_peso1->PES_VALOR;?> KG
              </td>
              <td class="print"><?php echo $oquefazer->registros_peso1->PES_DATA;?></td>
              <td class="print">
              <?php 
	 	if ($oquefazer->registros_total->total_perca < 0)
		echo "Aumentou ".abs($oquefazer->registros_total->total_perca);
		else
		echo "Diminuiu ".$oquefazer->registros_total->total_perca; ?>
              (KG)</td>
                <td class="print">
                 <?php echo $oquefazer->registros->RAN_CODIGO;?>º</td>
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
</table>
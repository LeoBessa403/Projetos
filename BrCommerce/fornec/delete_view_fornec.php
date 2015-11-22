 <form action="brcommerce.php?pg=fornec/delete_control_fornec" method="post" enctype="multipart/form-data">
    			<fieldset>
                <legend>Campo de Pesquisa</legend>
                <span class="campo_pesquisa">Por Nome</span>
                <input name="pesquisa" id="pesquisa"  type="text" class="campo_pesquisa" value="<?php echo $pesquisa;?>"/>
				<input type="submit" class="btn_pesquisa" id="executar" name="executar" value="Pesquisar"  />
                </fieldset>
   </form>
   			
          <form action="brcommerce.php?pg=fornec/delete_control_fornec" method="post" name="check_form">

<table width="100%">
		  <tr class="titulo">
			<td colspan="7" align="center"><h1>Exclusão de Usuários</h1></td>
		  </tr>
		  <tr class="titulo_info">
          	<td width="6%" align="center"><input type="checkbox" name="check_all" id="check_all" onClick="Check(document.check_form)"/> 
          	Tudo</td>
            <td width="7%" align="center">Ação</td>
			<td width="32%" align="center">Nome</td>
            <td width="12%" align="center">Login</td>
			<td width="24%" align="center">E-mail</td>
			<td width="10%" align="center">Nível</td>
			<td width="9%" align="center">Cor Padrão</td>
  		  </tr>
	
	<?php
	
	 if (isset($_GET['pag'])){
		  $pag = $_GET['pag'];
		  if($pag >= '1'){
			  $pag = $pag;
		  }
	  }else{
	   $pag = '1';
	  }
	  
	  $maximo = '15'; //RESULTADOS POR PÁGINA
	  $inicio = ($pag * $maximo) - $maximo;

	$cont_cor = '0';

	if (isset($resultados)){
	foreach ($resultados as $res){
	  
	  if ($res['USU_NIVEL'] != 5){
		 if (($_SESSION['sessao_nivel_usuario'] == 3) && ($res['USU_NIVEL'] == 4)) {
			$_SESSION['sessao_nivel_usuario'] = 3;
		 }else{	
		 	$cont_cor++;
		 if (($cont_cor > $inicio) && ($cont_cor <= ($maximo * $pag))){
			
			$cor = cor_sn($cont_cor);
		
	?>
		  <tr bgcolor="<?php echo $cor; ?>" class="resultados" id="rest<?php echo $cont_cor; ?>">
			<td><input type="checkbox" name="res[]" id="res<?php echo $cont_cor; ?>" value="<?php echo $res['USU_ID'];?>"/></td>
            <td><img src="imagens/delete.png" width="15" height="12"/><a href="javascript:if(confirm('Deseja excluir esse registro ?')) {location='brcommerce.php?pg=fornec/delete_control_fornec&usu_id=<?php echo $res['USU_ID']; ?>';}" title="Excluir Usuário" class="link_edit">Excluir</a></td>
            <td><?php echo $res['USU_NOME']; ?></td>
            <td><?php echo $res['USU_LOGIN']; ?></td>
			<td><?php echo $res['USU_EMAIL']; ?></td>
			<td><?php 
			if ($res['USU_NIVEL'] == '4'){
				$nivel = 'Administrador';
			}elseif($res['USU_NIVEL'] == '3'){
				$nivel = 'Gerente';
			}elseif($res['USU_NIVEL'] == '2'){
				$nivel = 'Operador';
			}elseif($res['USU_NIVEL'] == '1'){
				$nivel = 'Vendedor';
			}	
			echo $nivel; ?></td>
			<td><?php echo $res['USU_COR']; ?></td>
		  </tr>
          
         <?php
         
         seleciona_delecao($cont_cor);

	} } } } } ?>
	
    
		</table>
		<input type="submit" class="btn_deleta" id="deletar" name="deletar" value="Deletar Registros Selecionados"  />
        </form>
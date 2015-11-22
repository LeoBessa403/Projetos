 <form action="brcommerce.php?pg=user/update_control_user" method="post" enctype="multipart/form-data">
    			<fieldset>
                <legend>Campo de Pesquisa</legend>
                <span class="campo_pesquisa">Por Nome</span>
                <input name="pesquisa" id="pesquisa"  type="text" class="campo_pesquisa"/>
				<input type="submit" class="btn_pesquisa" id="executar" name="executar" value="Pesquisar"  />
                </fieldset>
   </form>

<table width="100%">
		  <tr class="titulo">
			<td colspan="6" align="center"><h1>Edição de Usuários</h1></td>
		  </tr>
		  <tr class="titulo_info">
            <td width="8%" align="center">Ação</td>
			<td width="26%" align="center">Nome</td>
            <td width="19%" align="center">Login</td>
			<td width="23%" align="center">E-mail</td>
			<td width="12%" align="center">Nível</td>
			<td width="12%" align="center">Cor Padrão</td>
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
		 
		 	if  ($_SESSION['sessao_nivel_usuario'] <= 2){
		 	 		if ($_SESSION['sessao_id_usuario'] == $res['USU_ID']){
					$cont_cor++;
						  if (($cont_cor > $inicio) && ($cont_cor <= ($maximo * $pag))){
					  
					  $cor = cor_sn($cont_cor);
				  
			  ?>
					<tr bgcolor="<?php echo $cor; ?>" class="resultados">
					<td><a href="brcommerce.php?pg=user/update_control_user_single&usu_id=<?php echo $res['USU_ID']; ?>" class="link_edit"><img src="imagens/editar.png" width="15" height="12"/> Editar</a></td>
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
		<?php } } }else{
					$cont_cor++;
				if (($cont_cor > $inicio) && ($cont_cor <= ($maximo * $pag))){
			
			$cor = cor_sn($cont_cor);
		
	?>
		  <tr bgcolor="<?php echo $cor; ?>" class="resultados">
          <td><a href="brcommerce.php?pg=user/update_control_user_single&usu_id=<?php echo $res['USU_ID']; ?>" class="link_edit"><img src="imagens/editar.png" width="15" height="12"/> Editar</a></td>
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
	} } } } } }?> 

		</table>
	

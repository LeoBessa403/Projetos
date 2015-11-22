	<form action="brcommerce.php" method="post" name="create_user" id="create_user" enctype="multipart/form-data">
    			<fieldset>
                <?php
				if ($_SESSION['sessao_nivel_usuario'] <= 2)
				{
					if (!isset($_REQUEST['usu_id']) || ($_REQUEST['usu_id'] != $_SESSION['sessao_id_usuario']) ){
						
					}else{
						?>
                <legend>Alteração de Usuário</legend>
                <span class="campo">Nome<span class="obs">(Completo)*</span></span>
                  <input name="nome" id="nome"  type="text" class="campo"  value="<?php echo $resultados['USU_NOME'];?>"/>
                <span class="campo">Login do Sistema<span class="obs">(Mínimo de 6 Caracteres)*</span></span>
                  <input name="login" id="login"  type="text" class="campo"  value="<?php echo $resultados['USU_LOGIN'];?>"/>
                <span class="campo">Senha<span class="obs">(Mínimo de 6 Caracteres)*</span></span>
                  <input name="senha" id="senha"  type="password" class="campo"  value="<?php echo base64_decode($resultados['USU_SENHA']);?>"/>
                <span class="campo">E-mail<span class="obs">(exemplo@seuemail.com.br)</span></span>
                  <input name="email" id="email"  type="text" class="campo"  value="<?php echo $resultados['USU_EMAIL'];?>"/>
                  <span class="select">Cor Padrão</span>
                  <select name="cor" id="cor">
                   <?php
		     	  $cor1 = '';
		     	  $cor2 = '';
				  $cor3 = '';
				  $cor4 = '';
			 	  switch($resultados['USU_COR'])
			 	  {
				   case 'amarelo': $cor1 = 'selected';break; 
				   case 'azul': $cor2 = 'selected';break;
				   case 'verde': $cor3 = 'selected';break; 
				   case 'vermelho': $cor4 = 'selected';break;
			  	 }
		 		 ?>   
                    <option value="azul">Selecione uma Cor Padrão</option>
                    <option value="amarelo" <?php echo $cor1;?>>Amarelo</option>
                    <option value="azul" <?php echo $cor2;?>>Azul</option>
                    <option value="verde" <?php echo $cor3;?>>Verde</option>
                    <option value="vermelho" <?php echo $cor4;?>>Vermelho</option>
        		</select><br>
                  <span class="select">Nível do Usuário</span>
                  <select name="nivel" id="nivel">  
                   <?php
		     	  $niv1 = '';
		     	  $niv2 = '';
				  $niv3 = '';
				  $niv4 = '';
			 	  switch($resultados['USU_NIVEL'])
			 	  {
				   case '1': $niv1 = 'selected';break; 
				   case '2': $niv2 = 'selected';break;
				   case '3': $niv3 = 'selected';break; 
				   case '4': $niv4 = 'selected';break;
			  	 }
		 		 ?>    
                    <option value="1" <?php echo $niv1;?>>Vendedor</option>
                    <option value="2" <?php echo $niv2;?>>Operador</option>
                    <option value="3" <?php echo $niv3;?>>Gerente</option>
                    <option value="4" <?php echo $niv4;?>>Administrador</option>
        		</select><br>
               <input type="hidden" id="id" name="id" value="<?php echo $_REQUEST['usu_id'];?>" />  
               <input type="hidden" name="pg" value="user/update_control_user_single" />
				<?php
					if (isset($_REQUEST['usu_id']) && ($_REQUEST['usu_id'] == $_SESSION['sessao_id_usuario']) ){
				?>
               <input type="submit" class="btn" id="executar" name="executar" value="Executar"  />
               <?php
				} } } else {
				?>
                <legend>Alteração de Usuário</legend>
                <span class="campo">Nome<span class="obs">(Completo)*</span></span>
                  <input name="nome" id="nome"  type="text" class="campo"  value="<?php echo $resultados['USU_NOME'];?>"/>
                <span class="campo">Login do Sistema<span class="obs">(Mínimo de 6 Caracteres)*</span></span>
                  <input name="login" id="login"  type="text" class="campo"  value="<?php echo $resultados['USU_LOGIN'];?>"/>
                <span class="campo">Senha<span class="obs">(Mínimo de 6 Caracteres)*</span></span>
                  <input name="senha" id="senha"  type="password" class="campo"  value="<?php echo base64_decode($resultados['USU_SENHA']);?>"/>
                <span class="campo">E-mail<span class="obs">(exemplo@seuemail.com.br)</span></span>
                  <input name="email" id="email"  type="text" class="campo"  value="<?php echo $resultados['USU_EMAIL'];?>"/>
                  <span class="select">Cor Padrão</span>
                  <select name="cor" id="cor">
                   <?php
		     	  $cor1 = '';
		     	  $cor2 = '';
				  $cor3 = '';
				  $cor4 = '';
			 	  switch($resultados['USU_COR'])
			 	  {
				   case 'amarelo': $cor1 = 'selected';break; 
				   case 'azul': $cor2 = 'selected';break;
				   case 'verde': $cor3 = 'selected';break; 
				   case 'vermelho': $cor4 = 'selected';break;
			  	 }
		 		 ?>   
                    <option value="azul">Selecione uma Cor Padrão</option>
                    <option value="amarelo" <?php echo $cor1;?>>Amarelo</option>
                    <option value="azul" <?php echo $cor2;?>>Azul</option>
                    <option value="verde" <?php echo $cor3;?>>Verde</option>
                    <option value="vermelho" <?php echo $cor4;?>>Vermelho</option>
        		</select><br>
                  <span class="select">Nível do Usuário</span>
                  <select name="nivel" id="nivel">  
                   <?php
		     	  $niv1 = '';
		     	  $niv2 = '';
				  $niv3 = '';
				  $niv4 = '';
			 	  switch($resultados['USU_NIVEL'])
			 	  {
				   case '1': $niv1 = 'selected';break; 
				   case '2': $niv2 = 'selected';break;
				   case '3': $niv3 = 'selected';break; 
				   case '4': $niv4 = 'selected';break;
			  	 }
		 		 ?>    
                    <option value="1" <?php echo $niv1;?>>Vendedor</option>
                    <option value="2" <?php echo $niv2;?>>Operador</option>
                    <option value="3" <?php echo $niv3;?>>Gerente</option>
                    <option value="4" <?php echo $niv4;?>>Administrador</option>
        		</select><br>
               <input type="hidden" id="id" name="id" value="<?php echo $_REQUEST['usu_id'];?>" />  
               <input type="hidden" name="pg" value="user/update_control_user_single" />
				<?php
				if ($_SESSION['sessao_nivel_usuario'] > 2)
				{
					if (!isset($_REQUEST['usu_id']) || ($_REQUEST['usu_id'] != $_SESSION['sessao_id_usuario']) ){
				?>
               <input type="submit" class="btn" id="executar" name="executar" value="Executar"  />
               <?php } } } ?>
                </fieldset>
    		</form>
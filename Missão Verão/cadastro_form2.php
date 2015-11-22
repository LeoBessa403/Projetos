<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="util/cadastro.css">
<script type="text/javascript" src="util/funcoes.js"></script>
<div id="conteudo2">
<form action="index.php" method="post" enctype="multipart/form-data"  name="form_cadastro2"  onSubmit="return verifica_inscricao2(this)">
	<fieldset>
    	<legend>Dados Pessoais</legend>           
          <label>Nome Completo.: <span class="legenda">(Campo Obrigatório *)</span><input type="text" name="cad_nome" class="dados" id="cad_nome" value="<?php echo $oquefazer->registros->CAD_NOME;?>"/></label>
          <label>Data do Nascimento.: <span class="legenda">(10/10/2000)</span><input type="text" name="cad_data" class="dados" id="cad_data" value="<?php echo $oquefazer->registros->CAD_DATA;?>"/></label>
          <label>Telefone.: <span class="legenda"> (99) 9999-9999</span><input type="text" name="cad_telefone" class="dados" id="cad_telefone" value="<?php echo $oquefazer->registros->CAD_TELEFONE;?>"/></label>
          <label>E-mail.: <span class="legenda"> (exemplo@domínio.com.br)</span><input type="text" name="cad_email" class="dados" id="cad_email" value="<?php echo $oquefazer->registros->CAD_EMAIL;?>"/></label>
          <label>Professor Responsável.:<br><select name="cad_prof_resp" id="cad_prof_resp" class="uf">
              <option value=""> Selecione um Professor </option>
               <?php
		       $status1 = '';
		       $status2 = '';
			   $status3 = '';
			   $status4 = '';
			   $status5 = '';
			   $status6 = '';
			   $status7 = '';
		       switch($oquefazer->registros->CAD_PROF_RESP)
			   {
				   case 'Michelly': $status1 = 'selected';break; 
				   case 'Jackeline': $status2 = 'selected';break;
				   case 'Aristocles': $status3 = 'selected';break; 
				   case 'Thiago': $status4 = 'selected';break;
				   case 'Anderson': $status5 = 'selected';break; 
				   case 'Eric': $status6 = 'selected';break;
				   case 'Musculacao': $status7 = 'selected';break;
			   }
		  ?>
              <option value="Michelly"<?php echo $status1;?>>Michelly</option>
              <option value="Jackeline"<?php echo $status2;?>>Jackeline</option>
              <option value="Aristocles"<?php echo $status3;?>>Aristocles</option>
              <option value="Thiago"<?php echo $status4;?>>Thiago</option>
              <option value="Anderson"<?php echo $status5;?>>Anderson</option>
              <option value="Eric"<?php echo $status6;?>>Eric</option>
              <option value="Musculacao"<?php echo $status6;?>>Musculação</option>
              </select></label> 
           <label>Última Pesagem.: <span class="legenda">(Campo Obrigatório *) (60.0)</span><input type="text" name="pes_valor" class="dados" id="pes_valor" value="<?php echo $oquefazer->registros2->PES_VALOR;?>"/></label>
           <input type="submit" name="Salvar" id="Salvar" value="ALTERAR" class="btdados" />
           <input type="reset" name="Limpar" id="Limpar" value="LIMPAR" class="btdados">
           <input type="hidden" name="tabela" value="inscricoes" />
           <input type="hidden" name="acao" value="gravar_alterar"/>  
           <input type="hidden" name="codigo" value="<?php echo $oquefazer->registros->CAD_CODIGO;?>" /> 
           <input type="hidden" name="codigo2" value="<?php echo $oquefazer->registros2->PES_CODIGO;?>" /> 
    </fieldset>	
   
            </form>    	      
</div>
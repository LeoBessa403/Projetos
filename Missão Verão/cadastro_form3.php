<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="util/cadastro.css">
<script type="text/javascript" src="util/funcoes.js"></script>
<script src="util/jquery.maskedinput-1.3.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
jQuery(function($){   
				$("#pes_valor").mask("99.9");
			});
}
)
</script>
<div id="conteudo2">
<form action="index.php" method="post" enctype="multipart/form-data"  name="form_cadastro3"  onSubmit="return verifica_inscricao3(this)">
	<fieldset>
    	<legend>Dados Pessoais</legend>           
          <label>Nome Completo.: <?php echo $oquefazer->registros->CAD_NOME;?></label><br /><br />
          <label>Data do Nascimento.: <?php echo $oquefazer->registros->CAD_DATA;?></label><br /><br />
          <label>Telefone.: <?php echo $oquefazer->registros->CAD_TELEFONE;?></label><br /><br />
          <label>E-mail.: <?php echo $oquefazer->registros->CAD_EMAIL;?></label><br /><br />
          <label>Professor Responsável.:<?php echo$oquefazer->registros->CAD_PROF_RESP; ?> </label><br /> <br />
           <label>Novo Peso.: <span class="legenda">(Campo Obrigatório *) (60.0)</span><input type="text" name="pes_valor" class="dados" id="pes_valor" /></label>
           <input type="submit" name="Salvar" id="Salvar" value="INCLUIR" class="btdados" />
           <input type="reset" name="Limpar" id="Limpar" value="LIMPAR" class="btdados">
           <input type="hidden" name="tabela" value="inscricoes" />
           <input type="hidden" name="acao" value="gravar_novo"/>  
           <input type="hidden" name="codigo" value="<?php echo $oquefazer->registros2->PES_COD_CADASTRO;?>" /> 
    </fieldset>	
   
            </form>    	      
</div>
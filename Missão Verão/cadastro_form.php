<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="util/cadastro.css">
<script type="text/javascript" src="util/funcoes.js"></script>
<script src="util/jquery.maskedinput-1.3.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
jQuery(function($){   
				$("#cad_data").mask("99/99/9999");   
				$("#cad_telefone").mask("(99)9999-9999");  
				$("#pes_valor").mask("99.9");
			});
}
)
</script>
<div id="conteudo2">
<form action="index.php" method="post" enctype="multipart/form-data"  name="form_cadastro"  onSubmit="return verifica_inscricao(this)">
	<fieldset>
    	<legend>Dados Pessoais</legend>           
          <label>Nome Completo.: <span class="legenda">(Campo Obrigatório *)</span><input type="text" name="cad_nome" class="dados" id="cad_nome" /></label>
          <label>Data do Nascimento.: <span class="legenda">(10/10/2000)</span><input type="text" name="cad_data" class="dados" id="cad_data" /></label>
          <label>Telefone.: <span class="legenda"> (99) 9999-9999</span><input type="text" name="cad_telefone" class="dados" id="cad_telefone" /></label>
          <label>E-mail.: <span class="legenda"> (exemplo@domínio.com.br)</span><input type="text" name="cad_email" class="dados" id="cad_email" /></label>
          <label>Professor Responsável.:<br><select name="cad_prof_resp" id="cad_prof_resp" class="uf">
              <option value=""> Selecione um Professor </option>
              <option value="Michelly">Michelly</option>
              <option value="Jackeline">Jackeline</option>
              <option value="Aristocles">Aristocles</option>
              <option value="Thiago">Thiago</option>
              <option value="Anderson">Anderson</option>
              <option value="Eric">Eric</option>
              <option value="Musculacao">Musculação</option>
              </select></label> 
           <label>Peso Inicial.: <span class="legenda">(Campo Obrigatório *) (60.0)</span><input type="text" name="pes_valor" class="dados" id="pes_valor" /></label>
           <input type="submit" name="Salvar" id="Salvar" value="SALVAR" class="btdados" />
            <input type="reset" name="Limpar" id="Limpar" value="LIMPAR" class="btdados">
            <input type="hidden" name="tabela" value="inscricoes" />
            <input type="hidden" name="acao" value="gravar_incluir"/>  
    </fieldset>	
   
            </form>    	      
</div>
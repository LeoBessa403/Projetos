<script type="text/javascript">
  $(function(){
	  $("#executar").click(function(){
		  
		 beforeSend:$(".carregando").fadeIn("hidden").sleep(3); 
		  
	});
  })
</script>


<div class="carregando">
<img src="imagens/<?php echo $_SESSION['sessao_cor_usuario']; ?>/ajax-loader.gif" alt="Carregando Aguarde..." />
<br />Carregando Aguarde...</div>
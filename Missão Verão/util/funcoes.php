<?php
	 function alerta($mensagem)
	 {
		echo '<script>alert("'.$mensagem.'");</script>'; 
	 }
	 
	 function voltar()
	 {
		 echo "<script>history.back();</script>"; 
	 }
	 
	 function direciona($para_url)
	 {
		 echo '<script>window.location="'.$para_url.'"</script>';
	 }
?>
<?php
	
   function msg($class,$msg){
	   echo '<div id="'.$class.'">'.$msg.'</div>';	
   }
	
   function voltar()
   {
	   echo "<script>history.back();</script>"; 
   }
   
   function direciona($para_url)
   {
	   echo '<script>window.location="'.$para_url.'"</script>';
   }
   
   function carregando($link)
   {
		include_once("util/carregando.php");
		echo '</div></div>';
		include_once('footer.php');
		echo '<meta http-equiv="refresh" content="2, URL=brcommerce.php?pg='.$link.'" />';
		die();   
   }
   
   function paginacao($total,$maximo,$pag,$link,$pesquisa)
   {
		$inicio = (($pag*$maximo)-$maximo)+1;
		$fim    = $pag*$maximo;
		if ($fim > $total){
			$fim = $total;
		}
		$paginas = ceil($total/$maximo);
		if ($total == 0){
			echo "<div id=\"registros\">Nenhum Registro Encontrado!</div>";
		}elseif (($total > 0)&&($total < 10)){
			echo "<div id=\"registros\">Registros de $inicio a $fim Registros Encontrados: <strong>0$total </strong></div>";
		}else {
			echo "<div id=\"registros\">Registros de $inicio a $fim Registros Encontrados: <strong>$total </strong></div>";
		}
		
		if ($paginas > 1){
			$links = '5'; //QUANTIDADE DE LINKS NO PAGINATOR
			echo '<div id="paginacao">';
			if ($pag == 1){
				echo "<span class=\"ativo\">Primeira Página</span>";
			}else{
			echo "<a href=\"$link&amp;pag=1&amp;pesquisa=$pesquisa\">Primeira Página</a>";
			}
			
			for ($i = $pag-$links; $i <= $pag-1; $i++){
			if ($i <= 0){
			}else{
			echo"<a href=\"$link&amp;pag=$i&amp;pesquisa=$pesquisa\">$i</a>";
			}
			}echo "<span class=\"ativo\">$pag</span>";
			
			for($i = $pag +1; $i <= $pag+$links; $i++){
			if($i > $paginas){
			}else{
			echo "<a href=\"$link&amp;pag=$i&amp;pesquisa=$pesquisa\">$i</a>";
			}
			}
			if ($pag == $paginas){
				echo "<span class=\"ativo\">Última página</span>";
			}else{
			echo "<a href=\"$link&amp;pag=$paginas&amp;pesquisa=$pesquisa\">Última página</a>";
			}
			echo '</div>'; 
	 	}   
   }
   
   function seleciona_delecao($cont_cor)
   {
		$script_del = '<script type="text/javascript">
				$("#conteudo table tr#rest'.$cont_cor.'").click(function(){
				if(res'.$cont_cor.'.checked == true){
					res'.$cont_cor.'.checked = false;
				}else
					res'.$cont_cor.'.checked = true;													 
				});
				</script>';
		echo $script_del;
			$script_del2 = '<script type="text/javascript">
				$("#conteudo table tr input#res'.$cont_cor.'").click(function(){
				if(res'.$cont_cor.'.checked == true){
					res'.$cont_cor.'.checked = false;
				}else
					res'.$cont_cor.'.checked = true;													 
				});
				</script>';
		echo $script_del2;   
   }
   
   function script_deleta_todos()
   {
	   echo '<script type="text/javascript">
				function Check(chk) {
					if(document.check_form.check_all.checked==true){
						for(i=0; i<chk.length;i++){
							chk[i].checked = true;
						}
					}else {
						for(i=0; i<chk.length;i++){
							chk[i].checked = false;
						}	
					}
				}
			</script>';
   }
   
   function cor_sn($cont_cor)
   {
		if (($cont_cor % 2)==0){
				$cor = '#CFCFCF';
			}else{
				$cor = '#B5B5B5';
			}  
			
		return $cor;
   }
   
   function cadastro_alterado($msg,$link)
   {
		echo '<div id="ok">'.$msg.' Alterado com Sucesso!</div>';
		echo '</div></div>';
		include_once('footer.php');
		echo '<meta http-equiv="refresh" content="3, URL=brcommerce.php?pg='.$link.'" />';
		die();   
   }
   
   
?>
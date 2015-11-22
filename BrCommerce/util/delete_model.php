<?php

class delete_model
{
	function deleta_um($id,$tabela,$campo,$msn,$link)
	{
		require("conexao.php");
		$sql  = 'DELETE FROM '.$tabela.' WHERE '.$campo.' = ?';
			  
			  try{
				  $query = $conecta->prepare($sql);
				  $query->bindValue(1,$id,PDO::PARAM_STR);
				  $query->execute();
				  
				  echo '<div id="ok">'.$msn.' Excluido com Sucesso!</div>';
				  echo '<meta http-equiv="refresh" content="2, URL=brcommerce.php?pg='.$link.'" />';
				  die();
				  
			  }catch(PDOexeption $erro){
				  echo '<div id="erro">Erro ao Deletar ,'.$erro.'</div>';
			  }
	}
	
	function confirma_delecao_todos($id,$link)
	{
		$array_delecao = "";
		$vez = 0;
			  
		 foreach ($id as $res){
			if ($vez != 0){
			  $array_delecao .= "/".$res;
			}else{
			  $array_delecao .= $res;
			  $vez = 1;
			}
		 }
		  
		  echo "<script type='text/javascript'>
		  if(confirm('Deseja excluir esse(s) Registro(s) ?')) {location='brcommerce.php?pg=$link&del=del&res=$array_delecao';}
		  </script>";	
		
	}
	
	function deleta_todos($id,$tabela,$campo,$msg,$link)
	{
		require("conexao.php");
		$ids = explode('/',$id);

		foreach ($ids as $res){
		
			$sql  = 'DELETE FROM '.$tabela.' WHERE '.$campo.' = ?';
			
				  try{
					  $query = $conecta->prepare($sql);
					  $query->bindValue(1,$res,PDO::PARAM_STR);
					  $query->execute();
				
						$exclusao = "ok";	
					  
				  }catch(PDOexeption $erro){
						$exclusao = "erro";	
				  }
			}
			if ($exclusao == "ok"){
				  echo '<div id="ok">'.$msg.'(s) Excluido(s) com Sucesso!</div>';
				  echo '<meta http-equiv="refresh" content="2, URL=brcommerce.php?pg='.$link.'" />';
				  die();
			}elseif ($exclusao == "erro"){
				 echo '<div id="erro">Erro ao Deletar ,'.$erro.'</div>';  
			}		
	}	

}

?>
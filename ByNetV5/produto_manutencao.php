<?php
     //echo "produto_manutencao<br>";
   class produto_manutencao
   {
       var $resultado;
	   var $registros;
	   var $resultado_total;
	   var $registros_total;
	   
	   function produto_manutencao() //metodo construtor
	   {
             $this->con = new conexao();
	   }  
	   
	   function listar_produto()
	   {
		    $ordenacao = $_REQUEST['ordem'];
			if ($ordenacao == '')
			   $ordenacao = "PRO_CODIGO";

		    $filtro = $_REQUEST['pesquisa'];
			if ($filtro == '')
			    $filtrar_por == '';
	 		else
			   $filtrar_por = $filtro;

			$sql = "select * from tb_produto where PRO_DESCRICAO like '".$filtrar_por."%' order by ".$ordenacao;
            $this->resultado = $this->con->banco->Execute($sql); 
			
			$sql = "select count(*) as TOTAL from tb_produto where PRO_DESCRICAO like '".$filtrar_por."%' order by ".$ordenacao;
					$this->resultado_total = $this->con->banco->Execute($sql); 
					$this->registros_total = $this->resultado_total->FetchNextObject(); //se posiciona no registro
					return $this->registros_total->TOTAL;
	   }
	   
	   function excluir()	   
	   {

		   	$sql = "delete from tb_produto where PRO_CODIGO = ".$_REQUEST['codigo'];
        	if($this->resultado = $this->con->banco->Execute($sql))
			{
			     alerta("O registro foi excluido com sucesso")	;
				 return true;
			}
			else
			{
			     alerta("Nao foi possivel exluir")	;
				 return false;
			}	   
	   }
	   
   	   function gravar_incluir()
	   {
			$capa = "capa.gif";
			
				//define os tipos de arquivos que será aceito
		   $tipos_arquivos = array(".jpg",".JPG",".gif",".GIF",".png",".PNG",".BMP","bmp");
		   //pega o nome do arquivo escolhido
		   $nome_arquivo = $_FILES['pro_foto']['name'];
           //pega a extensao (tipo do arquivo que deverá ser jpg gif png)
		   $tipo = strrchr($nome_arquivo,".");
		   $capa = "capa.gif";
		   $preco = str_replace(",",".",$_POST['pro_valor']);
		   if ($_FILES['pro_foto']['name'] != "")
		   {
		   $capa = $nome_arquivo;
		   	 
		   if (in_array($tipo,$tipos_arquivos))
		   {
			     if (move_uploaded_file($_FILES['pro_foto']['tmp_name'],"imagens/".$nome_arquivo))	
				 {
					 				
					$sql = "insert into tb_produto (PRO_DESCRICAO, PRO_FOTO, PRO_UNID_VENDA, PRO_ESTOQUE, PRO_VALOR) values ('".$_POST['pro_descricao']."','".$capa."','".$_POST['pro_unid_venda']."',".$_POST['pro_estoque'].",".$preco.")";
        	if($this->resultado = $this->con->banco->Execute($sql))
			{
			     alerta("O registro foi incluido com sucesso")	;
				 return true;
			}
			else
			{
			     alerta("Nao foi possivel gravar")	;
				 return false;
			}
		 }
		   }
	   }else
	   {
						$sql = "insert into tb_produto (PRO_DESCRICAO, PRO_FOTO, PRO_UNID_VENDA, PRO_ESTOQUE, PRO_VALOR) values ('".$_POST['pro_descricao']."','".$capa."','".$_POST['pro_unid_venda']."',".$_POST['pro_estoque'].",".$_POST['pro_valor'].")";
        	if($this->resultado = $this->con->banco->Execute($sql))
			{
			     alerta("O registro foi incluido com sucesso")	;
				 return true;
			}
			else
			{
			     alerta("Nao foi possivel gravar")	;
				 return false;
			}
	   }
	   
	}
	   
   	   function alterar()
	   {
		   	$sql = "select * from tb_produto where PRO_CODIGO = ".$_REQUEST['codigo'];
            $this->resultado = $this->con->banco->Execute($sql); 
			$this->registros = $this->resultado->FetchNextObject(); //se posiciona no registro
	   }
	   
   	   function gravar_alterar()
	   {
		   	//define os tipos de arquivos que será aceito
		   $tipos_arquivos = array(".jpg",".JPG",".gif",".GIF",".png",".PNG",".BMP","bmp");
		   //pega o nome do arquivo escolhido
		   $nome_arquivo = $_FILES['pro_foto']['name'];
           //pega a extensao (tipo do arquivo que deverá ser jpg gif png)
		   $tipo = strrchr($nome_arquivo,".");
		   $capa = "capa.gif";
		   $preco = str_replace(",",".",$_POST['pro_valor']);
		   if ($_FILES['pro_foto']['name'] != "")
		   {
		   $capa = $nome_arquivo;
		   	 
		   if (in_array($tipo,$tipos_arquivos))
		   {
			     if (move_uploaded_file($_FILES['pro_foto']['tmp_name'],"imagens/".$nome_arquivo))	
				 {
					$sql = "update tb_produto  set  PRO_DESCRICAO ='".$_POST['pro_descricao']."', PRO_UNID_VENDA = '".$_POST['pro_unid_venda']."', PRO_ESTOQUE ='".$_POST['pro_estoque']."', PRO_VALOR ='".$preco."', PRO_FOTO ='".$capa."' where PRO_CODIGO = ".$_POST['codigo'];	
        	//alerta($sql);
			if($this->resultado = $this->con->banco->Execute($sql))
			{
			     alerta("O registro foi alterado com sucesso")	;
				 return true;
			}
			else
			{
			     alerta("Nao foi possivel alterar")	;
				 return false;
			}	   
	  			 }
	   
		  	 }
	   
   		}

   		else
		{
		$sql = "update tb_produto  set  PRO_DESCRICAO ='".$_POST['pro_descricao']."', PRO_UNID_VENDA = '".$_POST['pro_unid_venda']."', PRO_ESTOQUE ='".$_POST['pro_estoque']."', PRO_VALOR ='".$preco."' where PRO_CODIGO = ".$_POST['codigo'];
        	
			//alerta($sql);
			if($this->resultado = $this->con->banco->Execute($sql))
			{
			     alerta("O registro foi alterado com sucesso")	;
				 return true;
			}
			else
			{
			     alerta("Nao foi possivel alterar")	;
				 return false;
			}	   
	  	}
}
	   
	}
?>
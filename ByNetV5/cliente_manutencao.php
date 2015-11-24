<?php
     //echo "cliente_manutencao<br>";
   class cliente_manutencao
   {
       var $resultado;
	   var $registros;
	   var $resultado_total;
	   var $registros_total;
	   
	   function cliente_manutencao() //metodo construtor
	   {
             $this->con = new conexao();		   
	   }  
	   
	   function listar_cliente()
	   {
		    $ordenacao = $_REQUEST['ordem'];
			if ($ordenacao == '')
			   $ordenacao = "CLI_CODIGO";

		    $filtro = $_REQUEST['pesquisa'];
			if ($filtro == '')
			    $filtrar_por == '';
	 		else
			   $filtrar_por = $filtro;

			$sql = "select * from tb_cliente where CLI_NOME like '".$filtrar_por."%' order by ".$ordenacao;
            $this->resultado = $this->con->banco->Execute($sql); 
			
			$sql = "select count(*) as TOTAL from tb_cliente where CLI_NOME like '".$filtrar_por."%' order by ".$ordenacao;
					$this->resultado_total = $this->con->banco->Execute($sql); 
					$this->registros_total = $this->resultado_total->FetchNextObject(); //se posiciona no registro
					return $this->registros_total->TOTAL;
	   }
	   
	   function excluir()	   
	   {

		   	$sql = "delete from tb_cliente where CLI_CODIGO = ".$_REQUEST['codigo'];
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
			$sql = "insert into tb_cliente (CLI_NOME, CLI_ENDERECO, CLI_TELEFONE, CLI_EMAIL) values ('".$_POST['cli_nome']."','".$_POST['cli_endereco']."','".$_POST['cli_telefone']."','".$_POST['cli_email']."')";
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
		  
	   
   	   function alterar()
	   {
		   	$sql = "select * from tb_cliente where CLI_CODIGO = ".$_REQUEST['codigo'];
            $this->resultado = $this->con->banco->Execute($sql); 
			$this->registros = $this->resultado->FetchNextObject(); //se posiciona no registro
	   }
	   
   	   function gravar_alterar()
	   {
		   	$sql = "update tb_cliente  set  CLI_NOME ='".$_POST['cli_nome']."', CLI_ENDERECO = '".$_POST['cli_endereco']."', CLI_TELEFONE ='".$_POST['cli_telefone']."', CLI_EMAIL ='".$_POST['cli_email']."' where CLI_CODIGO = ".$_POST['codigo'];	
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
?>
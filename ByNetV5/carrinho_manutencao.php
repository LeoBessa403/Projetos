<?php
     //echo "carrinho_manutencao<br>";
   class carrinho_manutencao
   {
       var $resultado;
	   var $registros;
	   var $resultado_produto;
	   var $resultado_compra;
	   var $registros_produto;
	   var $registros_car;
	   var $resultado_carrinho;
	   var $registros_conta;
	   var $resultado_conta;
	   var $res_venda;
	   var $res_itens;
	    	  
	   function carrinho_manutencao() //metodo construtor
	   {
             $this->con = new conexao();		   
	   }       
	  
	   function listar_produtos()
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
			
	   }
	   
  	   function incluir_no_carrinho()
	   {
		   $qtd     = $_POST['pro_ven_quantidade'];
           $codigo  = $_POST['codigo'];
		   $tamanho = count($qtd);
		   $aviso = "";
		   for($i = 0; $i < $tamanho;$i++)
		   {
			   if ($qtd[$i] > 0)
			   {
		   		//alerta($codigo[$i]);
				//alerta(session_id());
				$sql_produto = "select * from tb_produto where PRO_CODIGO = ".$codigo[$i];
           		$this->resultado_produto = $this->con->banco->Execute($sql_produto);
            	$this->registros_produto  = $this->resultado_produto->FetchNextObject();
				if($qtd[$i] > $this->registros_produto->PRO_ESTOQUE)
				    {
				   alerta("Quantidade Solicitada, Maior que a Quantidade do Estoque!!!!!!!!!! Produto: ".$this->registros_produto->PRO_DESCRICAO);
					}else
					{
				$sql_carrinho = "insert into tb_carrinho (PRO_CODIGO, VEN_SESSAO, PRO_VEN_QUANTIDADE, PRO_VEN_VALOR) values (".$codigo[$i].",'".session_id()."',".$qtd[$i].",".$this->registros_produto->PRO_VALOR.")";
            			if($this->resultado_car = $this->con->banco->Execute($sql_carrinho))
						{
							$aviso = "Produtos Incluso na Compra com Sucesso!";
						}
					}
			   }
		   }
		   if ($aviso != "")
		   {
				alerta($aviso);   
		   }
			
	   }
	   
  		function delete_itens_sessao()
		{
				 $sql = "delete from tb_carrinho where VEN_SESSAO = '".session_id()."'";
				 $this->con->banco->Execute($sql);
		}
	  
	  function listar_comprado()
	  {
	 $sql_car = "select * from tb_carrinho where VEN_SESSAO = '".session_id()."'";
            $this->resultado_carrinho = $this->con->banco->Execute($sql_car);
	  }
	 
	 
	   function listar_carrinho()
	   {
			$sql = "select * from tb_carrinho c, tb_produto p where VEN_SESSAO = '".session_id()."' and c.PRO_CODIGO = p.PRO_CODIGO order by PRO_DESCRICAO";
            $this->resultado_carrinho = $this->con->banco->Execute($sql);
	   }
	   
	   function listar_clientes()
	   {
		      $retorna = '';   
			  $sql = "select * from tb_cliente order by CLI_NOME";
			  $resultado = $this->con->banco->Execute($sql); 	
			  while($regcli = $resultado->FetchNextObject())
			  {
				 $retorna = $retorna . '<option value="'.$regcli->CLI_CODIGO.'"'.$selecionado.'>'.$regcli->CLI_NOME.'</option>'; 
			  
			  }
		return $retorna;
	   }
	     
  	   function atualizar_carrinho()
	   {
		   $qtd     = $_POST['qtd'];
           $codigo  = $_POST['codigo'];
		   $tamanho = count($qtd);
		   $aviso = "";  
		   for($i = 0; $i < $tamanho;$i++)
		   {
			    $sql_produto = "select * from tb_produto where PRO_CODIGO = ".$codigo[$i];
           	  	$this->resultado_produto = $this->con->banco->Execute($sql_produto);
              	$this->registros_produto = $this->resultado_produto->FetchNextObject();
			   if($qtd[$i] > 0)
			   {
				 	if($qtd[$i] > $this->registros_produto->PRO_ESTOQUE)
				    {
				   alerta("Quantidade Solicitada, Maior que a Quantidade do Estoque!!!!!!!!!! Produto: ".$this->registros_produto->PRO_DESCRICAO);
				  	}
				   else  {
				   $sql = "update tb_carrinho set PRO_VEN_QUANTIDADE = ".$qtd[$i]." where PRO_CODIGO = ".$codigo[$i]." and VEN_SESSAO = '".session_id()."'";
				  		}
			   }
			   else
			   {
  				   $sql = "delete from tb_carrinho where PRO_CODIGO = ".$codigo[$i]." and VEN_SESSAO = '".session_id()."'";
			   }
			   		if($this->con->banco->Execute($sql))
			  		{
						$aviso = "Produtos Alterados na Compra com Sucesso!";
			   		}
		   }
		    if ($aviso != "")
		   {
				alerta($aviso);   
		   }
		   
		   
	   } 
	   
	   function gravar_venda()
	   {
			$sql = "select count(*) as TOTAL from tb_carrinho where VEN_SESSAO = '".session_id()."'";
            $this->resultado_conta = $this->con->banco->Execute($sql);
            $this->registros_conta  = $this->resultado_conta->FetchNextObject();
			if ($this->registros_conta->TOTAL > 0)
			{
			        $sql = "insert into tb_venda (CLI_CODIGO, VEN_TOTAL, VEN_DATA, VEN_PAGAMENTO)  values (".$_POST['cli_nome'].", '".$_POST['total']."', current_date, '".$_POST['ven_pagamento']."')";	
					$this->resultado_venda = $this->con->banco->Execute($sql);
					//----locallizar ultima venda
					$sql_ult = "select max(VEN_CODIGO) as ULTIMO from tb_venda";
					$this->resultado_ultimo = $this->con->banco->Execute($sql_ult);
                    $this->registros_ultimo  = $this->resultado_ultimo->FetchNextObject();
										
					//----selecionar os produtos da venda
					$sql_carrinho = "select * from tb_carrinho where VEN_SESSAO = '".session_id()."'";
					$this->resultado_carrinho = $this->con->banco->Execute($sql_carrinho);
					while($this->registro_carrinho = $this->resultado_carrinho->FetchNextObject())
					{
						$sql_insert_itens = "insert into tb_produto_venda (PRO_CODIGO, VEN_CODIGO, PRO_VEN_QUANTIDADE, PRO_VEN_VALOR) values (".$this->registro_carrinho->PRO_CODIGO.",".$this->registros_ultimo->ULTIMO.",".$this->registro_carrinho->PRO_VEN_QUANTIDADE.",".$this->registro_carrinho->PRO_VEN_VALOR.")";
						$this->resultado_itens = $this->con->banco->Execute($sql_insert_itens);
						
					//----selecionar os produtos da venda para atualizar estoque
					$sql_produto = "select * from tb_produto p, tb_produto_venda v where p.PRO_CODIGO = v.PRO_CODIGO and v.VEN_CODIGO = ".$this->registros_ultimo->ULTIMO;
					$this->resultado_estoque = $this->con->banco->Execute($sql_produto);
					while($this->registros_estoque  = $this->resultado_estoque->FetchNextObject())
						{
						$estoque_novo = $this->registros_estoque->PRO_ESTOQUE - $this->registro_carrinho->PRO_VEN_QUANTIDADE;
						$sql_estoque = "update tb_produto  set  PRO_ESTOQUE = ".$estoque_novo." where PRO_CODIGO = ".$this->registro_carrinho->PRO_CODIGO;
						$this->resultado_produto = $this->con->banco->Execute($sql_estoque);
						}
						$sql_deletar = "delete from tb_carrinho where VEN_SESSAO = '".session_id()."' and PRO_CODIGO = ".$this->registro_carrinho->PRO_CODIGO;
						$this->resultado_deletar = $this->con->banco->Execute($sql_deletar);
					}
					       			
            		
			}
	   }
	   
	   function listar_venda()
	   {
					$sql_ult_cod_venda = "select max(VEN_CODIGO) as ULTIMO from tb_venda";
					$this->resultado_ultimo_venda = $this->con->banco->Execute($sql_ult_cod_venda);
                    $this->registros_ultimo_venda  = $this->resultado_ultimo_venda->FetchNextObject();
					
					$sql_ult_cod_cli = "select max(CLI_CODIGO) as ULTIMO_CLI from tb_venda";
					$this->resultado_ultimo_cli = $this->con->banco->Execute($sql_ult_cod_cli);
                    $this->registros_ultimo_cli  = $this->resultado_ultimo_cli->FetchNextObject();
					
					alerta($this->registros_ultimo_cli->ULTIMO_CLI);
					
					if ($this->registros_ultimo_cli->ULTIMO_CLI == 0)
					{
						$sql_venda = "select * from tb_venda v where VEN_CODIGO = ".$this->registros_ultimo_venda->ULTIMO." and v.CLI_CODIGO = ".$this->registros_ultimo_cli->ULTIMO_CLI;
					$this->res_venda = $this->con->banco->Execute($sql_venda);
					}
					else{
							$sql_venda = "select * from tb_venda v, tb_cliente c where VEN_CODIGO = ".$this->registros_ultimo_venda->ULTIMO." and v.CLI_CODIGO = c.CLI_CODIGO";
					$this->res_venda = $this->con->banco->Execute($sql_venda);						
					}
					
	   }	
	   
	   
	   function listar_itens()
	   {
		   					$sql_itens = "select * from tb_produto_venda i, tb_produto p where VEN_CODIGO = ".$this->registros_ultimo_venda->ULTIMO." and i.PRO_CODIGO = p.PRO_CODIGO order by p.PRO_DESCRICAO";
					$this->res_itens = $this->con->banco->Execute($sql_itens);
	   }
	  
	   
	   
   }
?>
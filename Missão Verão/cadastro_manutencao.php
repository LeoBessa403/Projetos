<?php
	
	//echo "cadastrar_manutencao<br>";
	require("util/redimenciona.php");
	
   class cadastro_manutencao
   {
       var $resultado;
	   var $registros;
	   var $resultado2;
	   var $registros2;
	   var $resultado3;
	   var $registros3;
	   var $resultado_peso1;
	   var $registros_peso1;
	   var $total_perca;
	   var $registros_total;
	   
	   function cadastro_manutencao() //metodo construtor
	   {
             $this->con = new conexao();		   
	   }  
	   
	  function listar_cadastro()
	   {
		     $ordenacao = $_REQUEST['ordem'];
			if ($ordenacao == '')
			   $ordenacao = "CAD_NOME";

		    $filtro = $_REQUEST['pesquisa'];
			if ($filtro == '')
			    $filtrar_por == '';
	 		else
			   $filtrar_por = $filtro;
			   
			   
			$sql = "select * from tb_cadastro where CAD_NOME like '".$filtrar_por."%' order by ".$ordenacao;
            $this->resultado = $this->con->banco->Execute($sql);
			
			$sql_total = "select count(*) as TOTAL from tb_cadastro where CAD_NOME like '".$filtrar_por."%'";
            $this->resultado_ultimo = $this->con->banco->Execute($sql_total); 
			$this->registros_ultimo = $this->resultado_ultimo->FetchNextObject(); //se posiciona no registro
		    return $this->registros_ultimo->TOTAL;
	   }
	   
   	   function gravar_incluir()
	   {
		   	$dia = date("d");
			$mes = date("m");
			$ano = date("Y");
				
			$data = $dia."/".$mes."/".$ano;
			$peso = str_replace(",",".",$_POST['pes_valor']);
					  
		$sql = "insert into tb_cadastro (CAD_NOME, CAD_DATA, CAD_TELEFONE, CAD_EMAIL, CAD_PROF_RESP) values ('".$_POST['cad_nome']."','".$_POST['cad_data']."','".$_POST['cad_telefone']."','".$_POST['cad_email']."','".$_POST['cad_prof_resp']."')";
        	if($this->resultado = $this->con->banco->Execute($sql))
			{
			     $sql_ult_cod_venda = "select max(CAD_CODIGO) as ULTIMO from tb_cadastro";
				 $this->resultado_ultimo = $this->con->banco->Execute($sql_ult_cod_venda);
                 $this->registros_ultimo = $this->resultado_ultimo->FetchNextObject();
				 $sql_peso = "insert into tb_peso (PES_VALOR, PES_COD_CADASTRO, PES_DATA) values ('".$peso."','".$this->registros_ultimo->ULTIMO."','".$data."')";
				if($this->resultado = $this->con->banco->Execute($sql_peso))
				{ 
				 
				 alerta("Seu Cadastro Foi efetuado com sucesso");
				 return true;
				}
				else
				{
			     alerta("Nao foi possivel Gravar");
				 return false;
				}
			}
			else
			{
			 alerta("Nao foi possivel Gravar");
			 return false;
			}
	 }
	 
	 function gravar_novo()
	   {
		   	$dia = date("d");
			$mes = date("m");
			$ano = date("Y");
				
			$data = $dia."/".$mes."/".$ano;
			$peso = str_replace(",",".",$_POST['pes_valor']);
					  
			 $sql_peso = "insert into tb_peso (PES_VALOR, PES_COD_CADASTRO, PES_DATA) values ('".$peso."','".$_REQUEST['codigo']."','".$data."')";
				if($this->resultado = $this->con->banco->Execute($sql_peso))
				{ 
				 
				 alerta("O Peso Foi Cadastrado com Sucesso");
				 return true;
				}
				else
				{
			     alerta("Nao foi possivel Gravar");
				 return false;
				}
			
	 }
		   
	  function excluir()	   
	   {

		   	$sql = "delete from tb_cadastro where CAD_CODIGO = ".$_REQUEST['codigo'];
        	if($this->resultado = $this->con->banco->Execute($sql))
			{
				$sql2 = "delete from tb_peso where PES_COD_CADASTRO = ".$_REQUEST['codigo'];
				if($this->resultado = $this->con->banco->Execute($sql2))
				{
			     alerta("O cadastro foi excluido com sucesso")	;
				 return true;
				}
				else
				{
			     	alerta("Nao foi possivel exluir")	;
				 	return false;
				}	
			}
			else
			{
			     alerta("Nao foi possivel exluir")	;
				 return false;
			}	   
	   }
	   
	    function alterar()
	   {
		   	$sql = "select * from tb_cadastro where CAD_CODIGO = ".$_REQUEST['codigo'];
            $this->resultado = $this->con->banco->Execute($sql); 
			$this->registros = $this->resultado->FetchNextObject(); //se posiciona no registro
			
			 $sql2 = "select * from tb_peso where PES_COD_CADASTRO = ".$_REQUEST['codigo']." order by PES_CODIGO DESC";
			 $this->resultado2 = $this->con->banco->Execute($sql2);
             $this->registros2 = $this->resultado2->FetchNextObject();
			
	   }
   	   	   
   	   function gravar_alterar()
	   {
			$sql = "update tb_cadastro set  CAD_NOME ='".$_POST['cad_nome']."', CAD_DATA ='".$_POST['cad_data']."', CAD_TELEFONE ='".$_POST['cad_telefone']."', CAD_EMAIL = '".$_POST['cad_email']."' , CAD_PROF_RESP = '".$_POST['cad_prof_resp']."' where CAD_CODIGO = ".$_POST['codigo'];
			$sql2 = "update tb_peso set  PES_VALOR ='".$_POST['pes_valor']."' where PES_COD_CADASTRO = ".$_POST['codigo']." and PES_CODIGO = ".$_POST['codigo2']."";
        			if($this->resultado = $this->con->banco->Execute($sql))
					{
			     		if($this->resultado = $this->con->banco->Execute($sql2))
						{
						  alerta("O PESO foi alterado com sucesso");
						  return true;
						}
					}
					else
					{
			    		 alerta("Nao foi possivel alterar");
				 		return false;
					}	   
			
	 
		}
		
	  function listar_peso()
	  {
		   			   
			$sql = "select max(PES_CODIGO) as ULTIMO from tb_cadastro c, tb_peso p where ".$_REQUEST['codigo']." = p.PES_COD_CADASTRO";
            $this->resultado = $this->con->banco->Execute($sql);
			$this->registros = $this->resultado->FetchNextObject(); //se posiciona no registro
			
			$sql2 = "select * from tb_peso where PES_COD_CADASTRO = ".$_REQUEST['codigo'];
            $this->resultado2 = $this->con->banco->Execute($sql2);
				
			$sql3 = "select * from tb_cadastro where CAD_CODIGO = ".$_REQUEST['codigo'];
            $this->resultado3 = $this->con->banco->Execute($sql3);
			$this->registros3 = $this->resultado3->FetchNextObject(); //se posiciona no registro
			
			$sql4 = "select * from tb_peso where PES_COD_CADASTRO = ".$_REQUEST['codigo'];
            $this->resultado4 = $this->con->banco->Execute($sql4);
			$this->registros4 = $this->resultado4->FetchNextObject(); //se posiciona no registro
				
			$peso1 = "select * from tb_peso where PES_CODIGO = ".$this->registros->ULTIMO;
            $this->resultado_peso1 = $this->con->banco->Execute($peso1);
			$this->registros_peso1 = $this->resultado_peso1->FetchNextObject(); //se posiciona no registro
			
			$this->registros_total->total_perca = ($this->registros4->PES_VALOR - $this->registros_peso1->PES_VALOR);
			//$this->registros_total->total_perca = 1.699999;
			if (strstr($this->registros_total->total_perca, "99999"))
			{
				$this->registros_total->total_perca = round($this->registros_total->total_perca,1);
				//$this->registros_total->total_perca = ($this->registros_total->total_perca+0.1);
			}
			elseif (strstr($this->registros_total->total_perca, "00000"))
			{
				$this->registros_total->total_perca = round($this->registros_total->total_perca,1);
			}
			alerta($this->registros_total->total_perca);
	  }
   }
?>
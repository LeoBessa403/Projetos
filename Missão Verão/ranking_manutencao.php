<?php
	
	//echo "cadastrar_manutencao<br>";
	require("util/redimenciona.php");
	
   class ranking_manutencao
   {
       var $resultado;
	   var $resultado_cli;
	   var $resultado_cli2;
	   var $registros;
	   var $registros0;
	   var $resultado2;
	   var $registros2;
	  	   
	   function ranking_manutencao() //metodo construtor
	   {
             $this->con = new conexao();		   
	   }  
	   
	  function listar_peso()
	  {
		   	$ordenacao = $_REQUEST['ordem'];
			if ($ordenacao == '')
			   $ordenacao = "RAN_CODIGO";

		    $filtro = $_REQUEST['pesquisa'];
			if ($filtro == '')
			    $filtrar_por == '';
	 		else
			   $filtrar_por = $filtro;
			
			$sql = "select * from tb_cadastro, tb_ranking where CAD_NOME like '".$filtrar_por."%' and CAD_CODIGO = CODIGO_CLI order by ".$ordenacao;
            $this->resultado_cli = $this->con->banco->Execute($sql);
			
			$sql2 = "select * from tb_cadastro";
            $this->resultado_cli2 = $this->con->banco->Execute($sql2);
			
			$sql_total = "select count(*) as TOTAL from tb_cadastro where CAD_NOME like '".$filtrar_por."%'";
            $this->resultado_ultimo = $this->con->banco->Execute($sql_total); 
			$this->registros_ultimo = $this->resultado_ultimo->FetchNextObject(); //se posiciona no registro
		    return $this->registros_ultimo->TOTAL;
			
	  }
	  
	   function listar_peso2($cliente)
	  {
		   	//alerta($cliente);
			//$cliente=2;
			$sql = "select max(PES_CODIGO) as ULTIMO from tb_cadastro c, tb_peso p where ".$cliente." = p.PES_COD_CADASTRO";
            $this->resultado = $this->con->banco->Execute($sql);
			$this->registros0 = $this->resultado->FetchNextObject(); //se posiciona no registro		   
			
			$sql2 = "select * from tb_peso where PES_COD_CADASTRO = ".$cliente;
            $this->resultado2 = $this->con->banco->Execute($sql2);
				
			$sql3 = "select * from tb_cadastro where CAD_CODIGO = ".$cliente;
            $this->resultado3 = $this->con->banco->Execute($sql3);
			$this->registros3 = $this->resultado3->FetchNextObject(); //se posiciona no registro
			
			$sql4 = "select * from tb_peso where PES_COD_CADASTRO = ".$cliente;
            $this->resultado4 = $this->con->banco->Execute($sql4);
			$this->registros4 = $this->resultado4->FetchNextObject(); //se posiciona no registro
				
			$peso1 = "select * from tb_peso where PES_CODIGO = ".$this->registros0->ULTIMO;
            $this->resultado_peso1 = $this->con->banco->Execute($peso1);
			$this->registros_peso1 = $this->resultado_peso1->FetchNextObject(); //se posiciona no registro
			
			//alerta($this->registros_peso1->PES_VALOR);
			//alerta($this->registros0->ULTIMO);
			//alerta($this->registros4->PES_VALOR);
			
			$this->registros_total->total_perca = ($this->registros4->PES_VALOR - $this->registros_peso1->PES_VALOR);
			
			//alerta($this->registros_total->total_perca);
					
	  }
	  
	  function ranking_tru()
	  {
	  			$sql_tru = "TRUNCATE tb_ranking";
				$this->resultado = $this->con->banco->Execute($sql_tru);
	  }
	  
	  
	  function ranking($cliente)
	  {
				$sql = "insert into tb_ranking (CODIGO_CLI) values ('".$cliente."')";
				if($this->resultado = $this->con->banco->Execute($sql))
				{ 				 
				 //alerta("Deu Certinho");
				 return true;
				}
				else
				{
			     alerta("Nao foi possivel Gerar o RANKING");
				 return false;
				}
	  }
			
   }
?>
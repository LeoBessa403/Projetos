<?php
     //echo "categoria_manutencao<br>";
   class gera_boleto
   {
       var $resultado;
	   var $registros;
	   var $res_soma;
	   var $reg_soma;
	   
	   function gera_boleto() //metodo construtor
	   {
             $this->con = new conexao();		   
	   }   
       
	   function busca_dados()
	   {
		     $sql = "select * from tb_venda v, tb_cliente c where v.VEN_CODIGO = ".$_SESSION['sessao_codigo_venda']." and c.CLI_CODIGO = v.CLI_CODIGO" ;
			 $this->resultado = $this->con->banco->Execute($sql);
										
		     $sql_soma = "select VEN_TOTAL from tb_venda where VEN_CODIGO = ".$_SESSION['sessao_codigo_venda'] ;
			 $this->res_soma = $this->con->banco->Execute($sql_soma);
			 $this->reg_soma  = $this->res_soma->FetchNextObject();
					
	   }
	   
   }
	   
   
?>
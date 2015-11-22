<?php

    require('adodb/adodb.inc.php'); 
	require('funcoes.php');
		
	class conexao
	{
		 
	      var $tipo_banco    = "mysql";
		  var $servidor      = "localhost";
		  var $usuario       = "root";
		  var $senha         = "";
   
	      function conexao() 
		  {
                $this->banco = NewADOConnection($this->tipo_banco);
				$this->banco->dialect = 3;
				$this->banco->debug = FALSE;
				$this->banco->Connect($this->servidor,$this->usuario,$this->senha,"missao");
		  }
	}

    $con = new conexao();	
?>
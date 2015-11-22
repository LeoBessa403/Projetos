<?php
	  

	if(isset($_POST['executa'])){
		$mes_referente = $_POST['mes_referente'];
				
		$sql  = 'SELECT * FROM serial WHERE SER_MES = ?';
		
		$serial = strip_tags(trim($_POST['serial']));
		$serial = base64_encode($serial);

		try{ 
			  $query = $conecta->prepare($sql);
			  $query->bindValue(1,$mes_referente,PDO::PARAM_STR);
			  $query->execute();
			  
			  $res = $query->fetch(PDO::FETCH_LAZY);
			  
			  if ($res['SER_SERIAL'] == $serial){
			 	
			  $status = 'ativo';
			  
			  $sql  = 'UPDATE serial SET SER_STATUS = ? WHERE SER_MES = ?';
		
				  try{
					  $query = $conecta->prepare($sql);
					  $query->bindValue(1,$status,PDO::PARAM_STR);
					  $query->bindValue(2,$mes_referente,PDO::PARAM_STR);
					  $query->execute();
					  
					  msg("ok","Seu Sistema Foi Liberado Com Sucesso!");
					  
				  }catch(PDOexeption $erro){
					 msg("erro","Erro ao alterar o Status do Serial.");
					 echo '<meta http-equiv="refresh" content="6, URL=index.php" />';
					 die();
				  }
			  }else{
					msg("erro","O Serial informado Não Esta Correto.");
					echo '<meta http-equiv="refresh" content="6, URL=index.php" />';
					die();
			  }
			
		}catch(PDOexeption $erro){
			msg("erro","Erro ao Selecionar Serial.");
			echo '<meta http-equiv="refresh" content="6, URL=index.php" />';
			die();
		}
	}

?>
<?php

if (isset($ultimo_acesso)){
$dia  = date("d");
$mes  = date("m");
$ano  = date("Y");

	
if (strlen($mes) == 1){ 
	$mes = '0'.$mes;
}
$mes_referente = $ano.''.$mes;

if ($mes == '01'){
	$mes_anterior  = ((int)$ano - 1).'12';
}else {
	$mes = ((int)$mes - 1);
	if (strlen($mes) == 1){
		$mes = '0'.$mes;
	}
	$mes_anterior  = $ano.''.$mes;
}
$dia_limite = 11 - $dia; // dia limite para pagamento 11

	if (($dia > 4) && ($dia < 11)){ 
	
	
	
	$sql  = 'SELECT * FROM serial WHERE SER_MES = ?';
	
	try{ 
		$query = $conecta->prepare($sql);
		$query->bindValue(1,$mes_referente,PDO::PARAM_STR);
		$query->execute();
		
		$res = $query->fetch(PDO::FETCH_LAZY);

			if ($res['SER_STATUS'] == 'pendente'){
				
				$sql  = 'SELECT * FROM serial WHERE SER_MES = ?';
	
				try{ 
					$query = $conecta->prepare($sql);
					$query->bindValue(1,$mes_anterior,PDO::PARAM_STR);
					$query->execute();
					
					$res = $query->fetch(PDO::FETCH_LAZY);
			
						if ($res['SER_STATUS'] == 'pendente'){ 
						msg("erro","O Sistema Está Bloqueado.<br>Por Favor entre em Contato com o Desenvolvedor do Sistema.<br>Ou Digite o Serial Válido, para Liberação do Programa.");
						?>
						  <form enctype="multipart/form-data" action="" method="post">
							<fieldset>
								<legend>Liberação do Sistema</legend>
									<label>Digite o Serial de Liberação</label>
									<input type="text" name="serial" id="serial" class="campo">
									<input type="hidden" name="mes_referente" value="<?php echo $mes_referente;?>"/>
									<input type="submit" name="executa" id="executa" class="btn" value="Liberar Sistema">
							</fieldset>	
						</form>
						<?php
						die();
					  } else{							
							msg("erro",'Seu Sistema Ainda Não Foi Liberado.<br>Por Favor entre em Contato com o Desenvolvedor do Sistema.<br>Seu Sistema irá Bloquear em '.$dia_limite.' Dia(s).');
						
						?>
						 <form enctype="multipart/form-data" action="" method="post">
							<fieldset>
								<legend>Liberação do Sistema</legend>
									<label>Digite o Serial de Liberação</label>
									<input type="text" name="serial" id="serial" class="campo">
									<input type="hidden" name="mes_referente" value="<?php echo $mes_referente;?>"/>
									<input type="submit" name="executa" id="executa" class="btn" value="Liberar Sistema">
							</fieldset>	
						</form>
						<?php	
						} 
				}catch(PDOexeption $erro){ 
					  msg("erro","Erro ao Selecionar Serial.");
					  echo '<meta http-equiv="refresh" content="6, URL=index.php" />';
					  die();
				}		
			} 
	}catch(PDOexeption $erro){  
	  msg("erro","Erro ao Selecionar Serial.");
	  echo '<meta http-equiv="refresh" content="6, URL=index.php" />';
	  die();
	  }
} 
	
	
	
	if ($dia > 10){
		  $sql  = 'SELECT * FROM serial WHERE SER_MES = ?';
	  
		  try{ 
		  $query = $conecta->prepare($sql);
		  $query->bindValue(1,$mes_referente,PDO::PARAM_STR);
		  $query->execute();
		  
		  $res = $query->fetch(PDO::FETCH_LAZY);
		  
		  if ($res['SER_STATUS'] == 'pendente'){
			msg("erro","O Sistema Está Bloqueado.<br>Por Favor entre em Contato com o Desenvolvedor do Sistema.<br>Ou Digite o Serial Válido, para Liberação do Programa.");
			?>
			  <form enctype="multipart/form-data" action="" method="post">
            	<fieldset>
                	<legend>Liberação do Sistema</legend>
                    	<label>Digite o Serial de Liberação</label>
                        <input type="text" name="serial" id="serial" class="campo">
                        <input type="hidden" name="mes_referente" value="<?php echo $mes_referente;?>"/>
                        <input type="submit" name="executa" id="executa" class="btn" value="Liberar Sistema">
                </fieldset>	
            </form>
            <?php
			die();
		  }
		  
		  }catch(PDOexeption $erro){
			  msg("erro","Erro ao Selecionar Serial.");
			  echo '<meta http-equiv="refresh" content="6, URL=index.php" />';
			  die();
		  }
	}
	
	
	if ($dia < 5){
		  $sql  = 'SELECT * FROM serial WHERE SER_MES = ?';
	  
		  try{ 
		  $query = $conecta->prepare($sql);
		  $query->bindValue(1,$mes_anterior,PDO::PARAM_STR);
		  $query->execute();
		  
		  $res = $query->fetch(PDO::FETCH_LAZY);

		  if ($res['SER_STATUS'] == 'pendente'){
			msg("erro","O Sistema Está Bloqueado.<br>Por Favor entre em Contato com o Desenvolvedor do Sistema.<br>Ou Digite o Serial Válido, para Liberação do Programa Referente ao Mês Anterior.");
			?>
			  <form enctype="multipart/form-data" action="" method="post">
            	<fieldset>
                	<legend>Liberação do Sistema</legend>
                    	<label>Digite o Serial de Liberação</label>
                        <input type="text" name="serial" id="serial" class="campo">
                        <input type="hidden" name="mes_referente" value="<?php echo $mes_anterior;?>"/>
                        <input type="submit" name="executa" id="executa" class="btn" value="Liberar Sistema">
                </fieldset>	
            </form>
            <?php
			die();
		  }
		  
		  }catch(PDOexeption $erro){
			  msg("erro","Erro ao Selecionar Serial.");
			  echo '<meta http-equiv="refresh" content="6, URL=index.php" />';
			  die();
		  }
	}
		
}
?>
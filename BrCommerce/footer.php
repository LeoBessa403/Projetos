<div id="rodape">
	<div id="info-rodape">
    	<span id="operador">OPERADOR: <?php 
			echo $_SESSION['sessao_nome_usuario'];
			echo " (";
			if($_SESSION['sessao_nivel_usuario'] == '5'){
				$nivel = 'Administrador Master';
			}elseif ($_SESSION['sessao_nivel_usuario'] == '4'){
				$nivel = 'Administrador';
			}elseif($_SESSION['sessao_nivel_usuario'] == '3'){
				$nivel = 'Gerente';
			}elseif($_SESSION['sessao_nivel_usuario'] == '2'){
				$nivel = 'Operador';
			}elseif($_SESSION['sessao_nivel_usuario'] == '1'){
				$nivel = 'Vendedor';
			}
			echo $nivel.")";?></span>
            
        <span id="data"><?php 
		$mes = date("m");
		if($mes == 1){
			$mes = 'Janeiro';
		}elseif($mes == 2){
			$mes = 'Fevereiro';
		}elseif($mes == 3){
			$mes = 'Março';
		}elseif($mes == 4){
			$mes = 'Abril';
		}elseif($mes == 5){
			$mes = 'Maio';
		}elseif($mes == 6){
			$mes = 'Junho';
		}elseif($mes == 7){
			$mes = 'Julho';
		}elseif($mes == 8){
			$mes = 'Agosto';
		}elseif($mes == 9){
			$mes = 'Setembro';
		}elseif($mes == 10){
			$mes = 'Outubro';
		}elseif($mes == 11){
			$mes = 'Novembro';
		}elseif($mes == 12){
			$mes = 'Dezembro';
		}
		
		echo date("d").' de '.$mes.' de '.date("Y") ;?></span>
    </div><!-- informações do rodape -->
</div><!-- rodape -->
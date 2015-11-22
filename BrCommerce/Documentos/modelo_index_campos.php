<?php 	session_start();
if (!isset($_SESSION['sessao_cor_usuario'])){
$_SESSION['sessao_cor_usuario'] = 'azul';
}
	  echo '<link rel="stylesheet" href="imagens/'.$_SESSION['sessao_cor_usuario'].'/stylo_brcommerce.css" type="text/css" media="screen" />';

	  include_once('util/carregando.php');
	  require_once('util/functions.php');	  			
	  
	   if(!isset($_SESSION['sessao_nome_usuario']))
	   {
		  msg("erro","Você não tem Permissão para acessar o Sistema!");
		  echo '<meta http-equiv="refresh" content="4, URL=index.php" />';
		  exit;
	   }
	   else
	   {	
	   require_once('util/conexao.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BR Commerce - Sistema de Automoção</title>
<style>
body{ background-image:url(imagens/<?php echo $_SESSION['sessao_cor_usuario']; ?>/bg_topo.jpg); background-repeat:repeat-x; background-position:top;}
</style>
<script type="text/javascript" src="util/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="util/functions.js"></script>
</head>

<body>
<div id="principal">
	<div id="topo">
    
    	<div id="menu1">
        <ul>
        	  <li><a href="#">Usuários</a>
              	<ul>
                	<li><a href="#">&raquo; Novo Usuário</a></li>
              		<li><a href="#">&raquo; Editar Usuário</a></li>
              		<li><a href="#">&raquo; Consultar Usuário</a></li>
              		<li><a href="#">&raquo; Excluir Usuário</a></li>
                </ul>              
              </li>
              <li><a href="#">Financeiro</a>
              	<ul>
                	<li><a href="#">&raquo; Contas Á Pagar</a></li>
              		<li><a href="#">&raquo; Contas Pagas</a></li>
              		<li><a href="#">&raquo; Contas Á Receber</a></li>
              		<li><a href="#">&raquo; Contas Recebidas</a></li>
                </ul>  
              </li>
              <li><a href="#">Perdas e Furtos</a>
              	<ul>
                	<li><a href="#">&raquo; Cadastrar Perda</a></li>
              		<li><a href="#">&raquo; Consultar Perda</a></li>
                </ul>  
              </li>
              <li><a href="#">Lembretes</a>
              	<ul>
                	<li><a href="#">&raquo; Novo Lembrete</a></li>
              		<li><a href="#">&raquo; Editar Lembrete</a></li>
              		<li><a href="#">&raquo; Consultar Lembrete</a></li>
              		<li><a href="#">&raquo; Excluir Lembrete</a></li>
                </ul>  
              </li>
              <li><a href="#">Área Administrativa</a>
              	<ul>
                	<li><a href="#">&raquo; Permissões de Acesso</a></li>
              		<li><a href="#">&raquo; Cor Padrão</a></li>
              		<li><a href="#">&raquo; Produto Padrão</a></li>
              		<li><a href="#">&raquo; Lançar Preço</a></li>
                    <li><a href="#">&raquo; Arredondamento da Margem de Lucro</a></li>
              		<li><a href="#">&raquo; Desconto por Nível</a></li>
                </ul>  
              </li>
              <li><a href="deslogar.php" class="deslogar">SAIR<img src="imagens/deslogar.png" /></a></li>
        </ul>
        </div><!-- menu1 -->
        <div id="menu2">
        	<ul>
        	  <li><a href="#"><img src="imagens/btn_vendas.jpg" />VENDAS</a></li>
              <li><a href="#"><img src="imagens/btn_compras.jpg" />COMPRAS</a>
              	<ul>
                	<li><a href="#">&raquo; Nova Compra</a></li>
              		<li><a href="#">&raquo; Editar Compra</a></li>
              		<li><a href="#">&raquo; Consultar Compra</a></li>
              		<li><a href="#">&raquo; Excluir Compra</a></li>
                </ul>  
              </li>
              <li><a href="#"><img src="imagens/btn_produtos.jpg" />PRODUTOS</a>
              	<ul>
                	<li><a href="#">&raquo; Novo Produto</a></li>
              		<li><a href="#">&raquo; Editar Produto</a></li>
              		<li><a href="#">&raquo; Consultar Produto</a></li>
              		<li><a href="#">&raquo; Excluir Produto</a></li>
                </ul>  
              </li>
              <li><a href="#"><img src="imagens/btn_clientes.jpg" />CLIENTES</a>
              	<ul>
                	<li><a href="#">&raquo; Novo Cliente</a></li>
              		<li><a href="#">&raquo; Editar Cliente</a></li>
              		<li><a href="#">&raquo; Consultar Cliente</a></li>
              		<li><a href="#">&raquo; Excluir Cliente</a></li>
                </ul>  
              </li>
              <li><a href="#"><img src="imagens/btn_fornecedores.jpg" />FORNECEDORES</a>
              	<ul>
                	<li><a href="#">&raquo; Novo Fornecedor</a></li>
              		<li><a href="#">&raquo; Editar Fornecedor</a></li>
              		<li><a href="#">&raquo; Consultar Fornecedor</a></li>
              		<li><a href="#">&raquo; Excluir Fornecedor</a></li>
                </ul>  
              </li>
            </ul>
        </div><!-- menu2 -->
        
    </div><!-- topo -->
    
    <div id="conteudo">
    		<h1>Texto Demostrativo H1</h1>
            <h2>Texto Demostrativo H2</h2>
            <h3>Texto Demostrativo H3</h3>
            <p>aqui vai so mais um texto demostrativo TAG P </p>
            <form action="" method="post" enctype="multipart/form-data">
    			<fieldset>
                <legend>Texto demostrativo do LEGEND</legend>
                <span class="campo">Endereço</span>
                  <input name="loguin" id="loguin"  type="text" class="campo"/>
                <span class="campo">Campo Nome</span>
                  <input name="loguin" id="loguin"  type="text" class="campo"/>
                  <span class="campo">Campo Nome</span>
                  <input name="senha" id="senha"  type="password" class="campo"/>
                  <span class="select">Selecione uma cor</span>
                  <select name="combobox" id="combobox">   
                    <option value="">Selecione uma Cor para o Tema </option>
                    <option value="amarelo">Amarelo</option>
                    <option value="azul">Azul</option>
                    <option value="vermelho">Vermelho</option>
                    <option value="verde">Verde</option>
        		</select>
                <span class="radiopergunta">Aqui vai a Pergunta para o Radio?</span>
                <input type="radio" name="radio" id="radio" class="radio"/><span class="radiooption">Radio 01</span>
                <input type="radio" name="radio" id="radio" class="radio"/><span class="radiooption">Radio 02</span>
                <input type="radio" name="radio" id="radio" class="radio"/><span class="radiooption">Radio 03</span><br />
                <span class="checkboxpergunta">Aqui vai a Pergunta para o Check?</span>
                <input type="checkbox" name="checkbox" id="checkbox" class="checkbox"/><span class="checkboxoption">CheckBox 01</span>
                <input type="checkbox" name="checkbox" id="checkbox" class="checkbox"/><span class="checkboxoption">CheckBox 02</span>
                <input type="checkbox" name="checkbox" id="checkbox" class="checkbox"/><span class="checkboxoption">CheckBox 03</span><br />
                <span class="textarea">Textearea Mensagem</span>
                <textarea name="textearea" id="textearea" >Textearea Texto Demostrativo</textarea>
                  <input type="submit" class="btn" id="btnloguin" name="btnloguin" value="Execultar"  />
                  
                </fieldset>
    		</form>
      <table width="200">
              <tr bgcolor="#B5B5B5" class="teste">
                <td><input type="checkbox" name="teste[]" id="teste1"/></td>
                <td>fgegeg</td>
                <td class="center">fgh</td>
              </tr>
              <tr bgcolor="#CFCFCF">
                <td><input type="checkbox" name="teste[]" id="teste2"/></td>
                <td>fg</td>
                <td class="center">fg</td>
              </tr>
              <tr bgcolor="#B5B5B5">
                <td><input type="checkbox" name="teste[]" id="teste" /></td>
                <td>fg</td>
                <td class="center">fdg</td>
              </tr>
               <tr bgcolor="#CFCFCF">
                <td><input type="checkbox" name="teste[]" id="teste" /></td>
                <td>fg</td>
                <td class="center">fg</td>
              </tr>
              <tr bgcolor="#B5B5B5">
                <td><input type="checkbox" name="teste[]" id="teste" /></td>
                <td>fg</td>
                <td class="center">fdg</td>
              </tr>
               <tr bgcolor="#CFCFCF">
                <td><input type="checkbox" name="teste[]" id="teste" /></td>
                <td>fg</td>
                <td class="center">fg</td>
              </tr>
              <tr bgcolor="#B5B5B5">
                <td><input type="checkbox" name="teste[]" id="teste" /></td>
                <td>fg</td>
                <td class="center">fdg</td>
              </tr>
      </table>
    </div><!-- conteudo -->

</div><!-- principal -->
<?php include_once('footer.php'); ?>
</body>
</html>
<?php
	 }
?>
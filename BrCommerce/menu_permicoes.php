<div id="menu">
<div id="menu1">
        <ul>
        	  <li><a href="#">Usuários</a>
			  	<ul>
			  <?php 
                  if ($_SESSION['sessao_nivel_usuario'] >= 3){
              ?>
               	
                	<li><a href="brcommerce.php?pg=user/create_control_user">&raquo; Novo Usuário</a></li>
              		<li><a href="brcommerce.php?pg=user/select_control_user&confirmacao=ok">&raquo; Consultar Usuário</a></li>
              		<li><a href="brcommerce.php?pg=user/delete_control_user&confirmacao=ok">&raquo; Excluir Usuário</a></li>
             <?php 
                  }					
              ?>
              		<li><a href="brcommerce.php?pg=user/update_control_user&confirmacao=ok">&raquo; Editar Usuário</a></li>
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
              <li><a href="#"><img src="imagens/btn_fornecedores.jpg" />FORNECEDORES</a>
              	<ul>
                	<li><a href="brcommerce.php?pg=fornec/create_control_fornec">&raquo; Novo Fornecedor</a></li>
              		<li><a href="brcommerce.php?pg=fornec/select_control_fornec&confirmacao=ok">&raquo; Editar Fornecedor</a></li>
              		<li><a href="brcommerce.php?pg=fornec/delete_control_fornec&confirmacao=ok">&raquo; Consultar Fornecedor</a></li>
              		<li><a href="brcommerce.php?pg=fornec/update_control_fornec&confirmacao=ok">&raquo; Excluir Fornecedor</a></li>
                </ul>  
              </li>
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
        	  <li><a href="#"><img src="imagens/btn_vendas.jpg" />VENDAS</a></li>
            </ul>
        </div><!-- menu2 -->
      </div>
<form action="brcommerce.php" method="post" name="create_user" id="create_user">
    			<fieldset>
                <legend>Cadastro de Usuário</legend>
                <span class="campo">Nome<span class="obs">(Completo)*</span></span>
                  <input name="nome" id="nome"  type="text" class="campo"/>
                <span class="campo">Login do Sistema<span class="obs">(Mínimo de 6 Caracteres)*</span></span>
                  <input name="login" id="login"  type="text" class="campo"/>
                <span class="campo">Senha<span class="obs">(Mínimo de 6 Caracteres)*</span></span>
                  <input name="senha" id="senha"  type="password" class="campo"/>
                <span class="campo">E-mail<span class="obs">(exemplo@seuemail.com.br)*</span></span>
                  <input name="email" id="email"  type="text" class="campo" placeholder="exemplo@seuemail.com.br"/>
                  <span class="select">Cor Padrão</span>
                  <select name="cor" id="cor" class="campo">   
                    <option value="azul">Selecione uma Cor Padrão</option>
                    <option value="amarelo">Amarelo</option>
                    <option value="azul">Azul</option>
                    <option value="verde">Verde</option>
                    <option value="vermelho">Vermelho</option>
        		</select><br>
                  <span class="select">Nível do Usuário</span>
                  <select name="nivel" id="nivel" class="campo">   
                    <option value="1">Vendedor</option>
                    <option value="2">Operador</option>
                    <option value="3">Gerente</option>
                    <option value="4">Administrador</option>
        		</select><br>
                  
               <input type="hidden" name="pg" value="user/create_control_user" />
                  <input type="submit" class="btn" id="executar" name="executar" value="Executar"  />
                  
           </fieldset>
  </form>
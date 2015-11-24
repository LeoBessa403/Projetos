<?php

class compra{ 
    
    public $form;
    public $fornecedor;
    public $result;
    public $resultPro;
    public $resultProAtu;
    public $resultado;
    public $valor_total;
    public $produtos_compra;
    public $negociacao;
    
    function iniciarCompra(){    
        
        $ativa = NegociacaoModel::pesquisaComprasAtivas();
        $fornecedor = EntidadeModel::pesquisaUmaEntidadeRazao($ativa['id_entidade']);
        
        if(count($ativa) > 0 ):
          $this->form =  '<form action="index.php?url=admin/compra/compraItens" method="post">
                            <h3>Existe uma compra em Aberto!<br/></h3>
                            <h4 style="margin: 0;">Fornecedor:</h4><h3>
                            <p class="text-primary" style="margin: 0; font-weight: bolder;">
                                '.$fornecedor["nome_razao"].'
                            </p></h3>
                            <input id="compra_ativa" name="compra_ativa" value="'.$ativa['id_negociacao'].'" type="hidden" />
                            <button data-style="zoom-out" class="btn btn-success ladda-button" type="submit" value="compra_ativada" name="compra_ativada" style="margin-top: 10px;">
                                <span class="ladda-label"> Continuar a Compra </span>
                                <i class="clip-arrow-right-2"></i>
                                <span class="ladda-spinner"></span>
                            </button>
                            <button data-style="expand-right" class="btn btn-danger ladda-button" type="reset" style="margin-top: 10px;">
                                <span class="ladda-label"> Excluir compra e Começar uma nova! (Fazer a Função) </span>
                                <i class="fa fa-trash-o"></i>
                                <span class="ladda-spinner"></span>
                            </button>
	    </form>';
        else:
             $id = "iniciarCompra";
        
            $fornecedores = FornecedorModel::pesquisaFornecedorSelect();

            $formulario = new Form($id, "index.php?url=admin/compra/compraItens");

            $options = '<option value="" selected> Selecione o Fornecedor </option>';
            foreach ($fornecedores as $value) {
               $options .= '<option value="'.$value['id_entidade'].'">';
                        if($value['nome_fantasia'] == ""):
                           $options .= $value['nome_razao'] ;
                        else:
                           $options .= $value['nome_fantasia'] ;   
                        endif;
               $options .= '</option>';
            }

            $formulario
                    ->setType("select")
                    ->setLabel("Fornecedor")
                    ->setId("id_entidade")
                    ->setClasses("ob")
                    ->setOptions($options)
                    ->CriaInpunt();

            $this->form = $formulario->finalizaForm(); 
        endif;
               
    }
    
    function itensPedido(){
        $produtos = ProdutoModel::pesquisaProdutoAdicionados(Session::getSession("compra","id_negociacao"));
        $valor_total = 0;
        foreach ($produtos as $pro) {
            $valor_total += ($pro["valor"] * $pro["quantidade"]);           
        }         
        
        $this->valor_total = Valida::formataMoeda($valor_total);
        $this->result = ProdutoModel::pesquisaProdutoAdicionados(Session::getSession("compra","id_negociacao"));

    }
    
    function compraItens(){    
        
        $id = "Itens";
        
        if(!empty($_POST["iniciarCompra"])):
             $dados = $_POST;
             $dados['id_entidade'] = $dados['id_entidade'][0];
             $dados['cadastro'] = Valida::DataDB(Valida::DataAtual());
             $dados['tipo_negociacao'] = "CP";
             $dados['situacao'] = "A";
             unset($dados["iniciarCompra"]);
            
             $compra = NegociacaoModel::cadastraCompra($dados);
             if($compra):
               $this->resultado = true;
             endif;
        endif;
        
        if(!empty($_POST["adicionarProduto"])):
             $dados = $_POST;  
             $dados['valor'] = Valida::formataMoedaBanco($dados['valor']);
             $dados['id_negociacao'] = Session::getSession("compra","id_negociacao");
             unset($dados["adicionarProduto"]);
             $addPro = ProdutoModel::cadastraProdutoNegociacao($dados);
             if($addPro == 0):
                $this->resultPro = true;
             endif;
        endif;
        
        if(!empty($_POST["atualizarProduto"])):
             $dados = $_POST;  
             $dados['valor'] = Valida::formataMoedaBanco($dados['valor']);
             $id_neg = Session::getSession("compra","id_negociacao");
             $id_pro = $dados['id_produto'];
             unset($dados["atualizarProduto"],$dados['id_produto']);
            
             $addPro = ProdutoModel::atualizaProdutoNegociacao($dados,$id_pro,$id_neg);
             if($addPro):
                $this->resultProAtu = true;
             endif;
        endif;
        
        if(!Session::CheckSession("compra")):
            $ativa = NegociacaoModel::pesquisaComprasAtivas();
            $fornecedor = EntidadeModel::pesquisaUmaEntidadeRazao($ativa['id_entidade']);           
            $negociacao['id_entidade'] = $ativa['id_entidade'];
            $negociacao['id_negociacao'] = $ativa['id_negociacao'];
            $negociacao['nome_razao'] = $fornecedor["nome_razao"];
            Session::setSession("compra", $negociacao); 
        endif;
        
        $produtos = ProdutoModel::pesquisaProdutoAdicionados(Session::getSession("compra","id_negociacao"));
        $valor_total = 0;
        foreach ($produtos as $pro) {
            $valor_total += ($pro["valor"] * $pro["quantidade"]);           
        }         
        
        $this->valor_total = Valida::formataMoeda($valor_total);
        $this->produtos_compra = array();
        $i = 0;
        $produtos_compra = NegociacaoModel::pesquisaProdutosNegociacao(Session::getSession("compra","id_negociacao"));
        foreach ($produtos_compra as $key => $value) {
            $this->produtos_compra[$i] = $value['id_produto'];
            $i++;
        }         
        $this->result = ProdutoModel::pesquisaProduto();
    }
    
    function finalizaCompra(){    
        
        $id = "Itens";
        
        if(!empty($_POST["pagamentoCompra"])):
             $dados = $_POST;
             $dados['valor_total'] = Valida::formataMoedaBanco($dados['valor_total']);
             
             $dados["tipo_pagamento"] = $dados["tipo_pagamento"][0];
             $dados["id_negociacao"]  = Session::getSession("compra","id_negociacao");
             $produtos = ProdutoModel::pesquisaProdutoAdicionados(Session::getSession("compra","id_negociacao"));
             
             foreach ($produtos as $pro) {
                 $pro_atualizado['estoque'] = $pro['estoque'] + $pro['quantidade'];
                 $pro_preco = $pro["valor"] + (($pro["valor"] * $pro["lucro_total"]) / 100);
                 $pro_atualizado['valor_venda'] = round($pro_preco + (($pro_preco * $pro['comissao']) / 100) ,2); // 10 É A COMISSÃO FIXA DOS VENDEDORES DA TB_DADOS_FINANCEIROS
                 $pro_novo = ProdutoModel::atualizaProduto($pro_atualizado, $pro['id_produto']);
             }         
             
             $val = true;
             if($dados["numero_parcelas"] == 1):
                 
                 $parcelamento['vencimento'] = Valida::DataDB($dados["vencimento"]);
                 $parcelamento['parcela'] = 1;
                 $parcelamento['valor_parcela'] = $dados['valor_total'];
                 
                 if(strtotime(Valida::DataDB($dados["vencimento"])) <= strtotime(Valida::DataDB(Valida::DataAtual('d/m/Y')))):
                      $dados["situacao"]       = "F";
                      $dados["valor_pago"]     = $dados['valor_total'];                      
                      $parcelamento['valor_parcela_pago'] = $dados['valor_total'];
                      $parcelamento['vencimento_pago'] = Valida::DataDB($dados["vencimento"]);
                      $parcelamento['observacao_parcela'] = $dados["observacao"];                    
                 else:
                      $dados["situacao"]       = "A";
                      $dados["valor_pago"]     = null;
                 endif;
             else:
                 $dados["situacao"]       = "A";
                 $dados["valor_pago"]     = null;
             endif;                       
        
             $pagamento = Valida::RecebiVariavel(PagamentoModel::campos, $dados);
             $id_pag = PagamentoModel::cadastraPagamento($pagamento);
             $parcelamento['id_pagamento'] = $id_pag;
             
             if($dados["numero_parcelas"] > 1):
                $vlr_parcela =  ($dados['valor_total'] / $dados["numero_parcelas"]);
                $parcelamento['valor_parcela'] = round($vlr_parcela,2);
                for($i=1;$i<=$dados["numero_parcelas"];$i++):       
                    $parcelamento['parcela'] = $i;                    
                    $parcelamento['observacao_parcela'] = "";
                    if($parcelamento['parcela'] > 1):
                        $parcelamento['vencimento'] = Valida::DataDB(Valida::CalculaData($dados["vencimento"],$dados["diferenca"]*($i-1),"+"));
                    else:
                        $parcelamento['vencimento'] = Valida::DataDB($dados["vencimento"]);
                    endif;
                
                    if(($parcelamento['parcela'] == $dados["numero_parcelas"]) && (($parcelamento['valor_parcela'] * $dados["numero_parcelas"]) < $dados['valor_total'])):                       
                        $parcelamento['valor_parcela'] = $parcelamento['valor_parcela'] + ($valor_total - ($parcelamento['valor_parcela'] * $dados["numero_parcelas"]));     
                    endif;
                    $val = false;
                    ParcelamentoModel::cadastraParcelamento($parcelamento);
                endfor;
             endif;
             
             if($val):
                 ParcelamentoModel::cadastraParcelamento($parcelamento);
             endif;
             
             $negociacao['situacao'] = "F";
             $negociacao['cadastro'] = Valida::DataDB($dados['cadastro']);
             //Valida::debug($negociacao);
             $compra = NegociacaoModel::atualizaNegociacao($negociacao, Session::getSession("compra","id_negociacao"));
             if($compra){
                 $this->result = true;
                 Session::FinalizaSession("compra");
             }             
        endif;
    }
    
    function adicionarProduto(){      
        
        $id_pro = UrlAmigavel::PegaParametro("pro");
        $this->produtos_compra = ProdutoModel::pesquisaUmProdutoCompra($id_pro);
       
        $res = ProdutoModel::pesquisaUmProdutoInclusoCompra($id_pro, Session::getSession("compra","id_negociacao"));
        
        if(!empty($res)):
             $id = "atualizarProduto";
        else:
             $id = "adicionarProduto";
        endif;
        
        $formulario = new Form($id, "index.php?url=admin/compra/compraItens");
        $formulario->setValor($res);
             
        $formulario
                ->setId("valor")
                ->setLabel("Valor do Produto")
                ->setTamanhoInput(6)
                ->setClasses("ob moeda")
                ->CriaInpunt();
        
        $formulario
                ->setId("quantidade")
                ->setLabel("QTD. comprada")
                ->setTamanhoInput(6)
                ->setClasses("ob numero")
                ->CriaInpunt();          
        
        $formulario
                ->setType("textarea") 
                ->setId("observacao")
                ->setLabel("Observação")
                ->CriaInpunt();
        
          
        $formulario
                ->setType("hidden")
                ->setId("id_produto")
                ->setValues($id_pro)
                ->CriaInpunt();
         
        
        $this->form = $formulario->finalizaForm(); 
    }
    
    function pagamentoCompra(){
        
        $id = "pagamentoCompra";
        
        $res = PagamentoModel::pesquisaPagamentoAtivo(Session::getSession("compra","id_negociacao")); 
        
        if(empty($res)):
            $res['numero_parcelas'] = 1;
            $res["observacao"] = "";
            $res["vencimento"] = Valida::DataAtual();
            $res["cadastro"] = Valida::DataAtual();
            $produtos = ProdutoModel::pesquisaProdutoAdicionados(Session::getSession("compra","id_negociacao"));
            $valor_total = 0;
            foreach ($produtos as $pro) {
                $valor_total += ($pro["valor"] * $pro["quantidade"]);           
            }  
            $res['valor_total'] = Valida::formataMoeda($valor_total);
        endif;
        
        $formulario = new Form($id, "index.php?url=admin/compra/finalizaCompra");
        $formulario->setValor($res);
             
        $options = array("DI" => "Dinheiro","DB" => "Débito","CH" => "Cheque","CR" => "Crédito","BT" => "Boleto");
        $formulario
                ->setId("tipo_pagamento")
                ->setType("select")
                ->setOptions($options)
                ->setLabel("Tipo Pagamento")
                ->setTamanhoInput(4)
                ->setClasses("ob")
                ->CriaInpunt();
        
        $formulario
                ->setId("numero_parcelas")
                ->setLabel("QTD. Parcelas") 
                ->setTamanhoInput(4)
                ->setClasses("ob numero")
                ->CriaInpunt(); 
        
        $formulario
                ->setId("valor_total")
                ->setLabel("Total") 
                ->setTamanhoInput(4)
                ->setClasses("ob moeda")
                ->setInfo("Total do Pedido")
                ->CriaInpunt(); 
        
        $formulario
                ->setId("vencimento")
                ->setLabel("Inicio do Pagamento")
                ->setTamanhoInput(4)
                ->setInfo("Data de início de Pagamento")
                ->setClasses("ob data")
                ->CriaInpunt();
        
        $formulario
                ->setId("cadastro")
                ->setLabel("Data da Compra")
                ->setTamanhoInput(4)
                ->setClasses("ob data")
                ->CriaInpunt();
        
        $formulario
                ->setId("diferenca")
                ->setLabel("Diferença de Dias")
                ->setTamanhoInput(4)
                ->setInfo("Diferença de Dias entre as Parcelas")
                ->setClasses("numero")
                ->CriaInpunt();
        
        $formulario
                ->setType("textarea") 
                ->setId("observacao")
                ->setLabel("Observação")
                ->CriaInpunt();
//         
        
        $this->form = $formulario->finalizaForm(); 
    }
    
    function listarCompra(){
        $this->result = NegociacaoModel::pesquisaNegociacoesCompras();
    }
    
    function detalheCompra(){
        $id_neg = UrlAmigavel::PegaParametro("neg");
       
        $this->negociacao = NegociacaoModel::pesquisaUmaNegociacao($id_neg,"CP");
        $this->negociacao = $this->negociacao[0];
        $this->produtos_compra = ProdutoModel::pesquisaProdutoAdicionados($id_neg); 
    }
    
}
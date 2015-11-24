<?php

class venda{ 
    
    public $form;
    public $fornecedor;
    public $result;
    public $resultPro;
    public $resultProAtu;
    public $resultado;
    public $valor_total;
    public $produtos_venda;
    public $negociacao;
    public $parcelamento;
    
    function iniciarVenda(){    
        
        $ativa = NegociacaoModel::pesquisaVendasAtivas();
        $cliente = EntidadeModel::pesquisaUmaEntidadeRazao($ativa['id_entidade']);
        
        if(count($ativa) > 0 ):
          $this->form =  '<form action="index.php?url=admin/venda/vendaItens" method="post">
                            <h3>Existe uma venda em Aberto!<br/></h3>
                            <h4 style="margin: 0;">Cliente:</h4><h3>
                            <p class="text-primary" style="margin: 0; font-weight: bolder;">
                                '.$cliente["nome_razao"].'
                            </p></h3>
                            <input id="venda_ativa" name="venda_ativa" value="'.$ativa['id_negociacao'].'" type="hidden" />
                            <button data-style="zoom-out" class="btn btn-success ladda-button" type="submit" value="venda_ativada" name="venda_ativada" style="margin-top: 10px;">
                                <span class="ladda-label"> Continuar a Venda </span>
                                <i class="clip-arrow-right-2"></i>
                                <span class="ladda-spinner"></span>
                            </button>
                            <button data-style="expand-right" class="btn btn-danger ladda-button" type="reset" style="margin-top: 10px;">
                                <span class="ladda-label"> Excluir venda e ComeÃ§ar uma nova! (Fazer a FunÃ§Ã£o) </span>
                                <i class="fa fa-trash-o"></i>
                                <span class="ladda-spinner"></span>
                            </button>
	    </form>';
        else:
            $id = "iniciarVenda";
        
            $clientes = ClienteModel::pesquisaClienteSelect();

            $formulario = new Form($id, "index.php?url=admin/venda/vendaItens");

            $options = '<option value="" selected> Selecione o Fornecedor </option>';
            foreach ($clientes as $value) {
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
                    ->setLabel("Cliente")
                    ->setId("id_entidade")
                    ->setClasses("ob")
                    ->setOptions($options)
                    ->CriaInpunt();

            $this->form = $formulario->finalizaForm(); 
        endif;
               
    }
    
    function itensPedidoVenda(){
        $produtos = ProdutoModel::pesquisaProdutoAdicionados(Session::getSession("venda","id_negociacao"));
        $valor_total = 0;
        foreach ($produtos as $pro) {
            $valor_total += ($pro["valor"] * $pro["quantidade"]);           
        }         
        
        $this->valor_total = Valida::formataMoeda($valor_total);
        $this->result = ProdutoModel::pesquisaProdutoAdicionados(Session::getSession("venda","id_negociacao"));

    }
    
    function vendaItens(){    
        
        $id = "Itens";
        
        if(!empty($_POST["iniciarVenda"])):
             $dados = $_POST;
             $dados['id_entidade'] = $dados['id_entidade'][0];
             $dados['cadastro'] = Valida::DataDB(Valida::DataAtual());
             $dados['tipo_negociacao'] = "VD";
             $dados['situacao'] = "A";
             unset($dados["iniciarVenda"]);
            
             $venda = NegociacaoModel::cadastraVenda($dados);
             if($venda):
               $this->resultado = true;
             endif;
        endif;
        
        if(!empty($_POST["adicionarProdutoVenda"])):
             $dados = $_POST;  
             $dados['valor'] = Valida::formataMoedaBanco($dados['valor']);
             $dados['id_negociacao'] = Session::getSession("venda","id_negociacao");
             unset($dados["adicionarProdutoVenda"]);
             $addPro = ProdutoModel::cadastraProdutoNegociacao($dados);
             if($addPro == 0):
                $this->resultPro = true;
             endif;
        endif;
        
        if(!empty($_POST["atualizarProdutoVenda"])):
             $dados = $_POST;  
             $dados['valor'] = Valida::formataMoedaBanco($dados['valor']);
             $id_neg = Session::getSession("venda","id_negociacao");
             $id_pro = $dados['id_produto'];
             unset($dados["atualizarProdutoVenda"],$dados['id_produto']);
             $addPro = ProdutoModel::atualizaProdutoNegociacao($dados,$id_pro,$id_neg);
             if($addPro):
                $this->resultProAtu = true;
             endif;
        endif;
        
        if(!Session::CheckSession("venda")):
            $ativa = NegociacaoModel::pesquisaVendasAtivas();
            $fornecedor = EntidadeModel::pesquisaUmaEntidadeRazao($ativa['id_entidade']);           
            $negociacao['id_entidade'] = $ativa['id_entidade'];
            $negociacao['id_negociacao'] = $ativa['id_negociacao'];
            $negociacao['nome_razao'] = $fornecedor["nome_razao"];
            Session::setSession("venda", $negociacao); 
        endif;
        
        $produtos = ProdutoModel::pesquisaProdutoAdicionados(Session::getSession("venda","id_negociacao"));
        
        $valor_total = 0;
        foreach ($produtos as $pro) {
            $valor_total += ($pro["valor"] * $pro["quantidade"]);           
        }         
        
        $this->valor_total = Valida::formataMoeda($valor_total);
        $this->produtos_venda = array();
        $i = 0;
        $produtos_venda = NegociacaoModel::pesquisaProdutosNegociacao(Session::getSession("venda","id_negociacao"));
        foreach ($produtos_venda as $key => $value) {
            $this->produtos_venda[$value['id_produto']] = $value['valor'];
            $i++;
        }    
        $this->result = ProdutoModel::pesquisaProduto();
    }
    
    function finalizaVenda(){    
        
        $id = "Itens";
        
        if(!empty($_POST["pagamentoVenda"])):
             $dados = $_POST;
             $dados['valor_total'] = Valida::formataMoedaBanco($dados['valor_total']);
             
             $dados["tipo_pagamento"] = $dados["tipo_pagamento"][0];
             $dados["id_negociacao"]  = Session::getSession("venda","id_negociacao");
             $produtos = ProdutoModel::pesquisaProdutoAdicionados(Session::getSession("venda","id_negociacao"));
             
             foreach ($produtos as $pro) {
                 $pro_atualizado['estoque'] = $pro['estoque'] - $pro['quantidade'];
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
             $venda = NegociacaoModel::atualizaNegociacao($negociacao, Session::getSession("venda","id_negociacao"));
             if($venda){
                 $this->result = true;
                 Session::FinalizaSession("venda");
             }             
        endif;
    }
    
    function adicionarProdutoVenda(){      
        
        $id_pro = UrlAmigavel::PegaParametro("pro");
        $this->produtos_venda = ProdutoModel::pesquisaUmProdutoCompra($id_pro);
       
        $res = ProdutoModel::pesquisaUmProdutoInclusoCompra($id_pro, Session::getSession("venda","id_negociacao"));
       
        if(!empty($res)):
             $id = "atualizarProdutoVenda";
        else:
             $id = "adicionarProdutoVenda";
             $res['observacao'] = "";
             $res['valor'] = Valida::formataMoeda($this->produtos_venda['valor_venda']);
        endif;
        
        $formulario = new Form($id, "index.php?url=admin/venda/vendaItens");
        $formulario->setValor($res);
             
        $formulario
                ->setId("valor")
                ->setLabel("Valor de Venda")
                ->setTamanhoInput(6)
                ->setClasses("ob moeda")
                ->CriaInpunt();
        
        $formulario
                ->setId("quantidade")
                ->setLabel("QTD. vendida")
                ->setTamanhoInput(6)
                ->setClasses("ob numero")
                ->CriaInpunt();          
        
        $formulario
                ->setType("textarea") 
                ->setId("observacao")
                ->setLabel("ObservaÃ§Ã£o")
                ->CriaInpunt();
        
          
        $formulario
                ->setType("hidden")
                ->setId("id_produto")
                ->setValues($id_pro)
                ->CriaInpunt();
         
        
        $this->form = $formulario->finalizaForm(); 
    }
    
    function pagamentoVenda(){
        
        $id = "pagamentoVenda";
        
        $res = PagamentoModel::pesquisaPagamentoAtivo(Session::getSession("venda","id_negociacao")); 
        
        if(empty($res)):
            $res['numero_parcelas'] = 1;
            $res["observacao"] = "";
            $res["vencimento"] = Valida::DataAtual();
            $res["cadastro"] = Valida::DataAtual();
            $produtos = ProdutoModel::pesquisaProdutoAdicionados(Session::getSession("venda","id_negociacao"));
            $valor_total = 0;
            foreach ($produtos as $pro) {
                $valor_total += ($pro["valor"] * $pro["quantidade"]);           
            }  
            $res['valor_total'] = Valida::formataMoeda($valor_total);
        endif;
        
        $formulario = new Form($id, "index.php?url=admin/venda/finalizaVenda");
        $formulario->setValor($res);
             
        $options = array("DI" => "Dinheiro","DB" => "DÃ©bito","CH" => "Cheque","CR" => "CrÃ©dito","BT" => "Boleto");
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
                ->setInfo("Data de inÃ­cio de Pagamento")
                ->setClasses("ob data")
                ->CriaInpunt();
        
        $formulario
                ->setId("cadastro")
                ->setLabel("Data da Venda")
                ->setTamanhoInput(4)
                ->setClasses("ob data")
                ->CriaInpunt();
        
        $formulario
                ->setId("diferenca")
                ->setLabel("DiferenÃ§a de Dias")
                ->setTamanhoInput(4)
                ->setInfo("DiferenÃ§a de Dias entre as Parcelas")
                ->setClasses("numero")
                ->CriaInpunt();
        
        $formulario
                ->setType("textarea") 
                ->setId("observacao")
                ->setLabel("ObservaÃ§Ã£o")
                ->CriaInpunt();
//         
        
        $this->form = $formulario->finalizaForm(); 
    }
    
    function listarVenda(){
        $this->result = NegociacaoModel::pesquisaNegociacoesVendas();
       
        foreach ($this->result as $res) {
            $parcelas = NegociacaoModel::pesquisaParcelasVendasListar($res['id_negociacao']);
            $parcelamento[$res['id_negociacao']] = "";
            if($res['numero_parcelas'] == 1):               
                if($res['situacao'] == "F"):
                    $parcelamento[$res['id_negociacao']] .= '<div class="alert alert-success" style="padding: 2px; margin: 0; width: 100%;">
                                                            <h5 class="alert-heading pago" style="padding: 2px; margin: 0;"><i class="fa fa-check-circle"></i> '.Valida::DataShow($parcelas[0]['vencimento_pago'],"d/m/Y").'</h5>
                                                          </div>';
                else:                                                                                               
                    if(strtotime(Valida::DataDB(Valida::DataAtual('d/m/Y'))) > strtotime($parcelas[0]['vencimento'])):
                        if($parcelas[0]['vencimento_pago'] == null):
                             if(Valida::DataAtual('Y-m-d') == $parcelas[0]['vencimento']):                                 
                                  $parcelamento[$res['id_negociacao']] .=  '<div class="alert alert-warning" style="padding: 2px; margin: 0 0 2px; width: 100%;">
                                                                    <h5 class="alert-heading devendo" style="padding: 2px; margin: 0;"><i class="fa fa-exclamation-triangle"></i> '.Valida::DataShow($parcelas[0]['vencimento'],"d/m/Y").'</h5>
                                                                  </div>';
                             else:
                                  $parcelamento[$res['id_negociacao']] .=  '<div class="alert alert-danger" style="padding: 2px; margin: 0 0 2px; width: 100%;">
                                                                        <h5 class="alert-heading devendo" style="padding: 2px; margin: 0;"><i class="fa fa-times-circle"></i> '.Valida::DataShow($parcelas[0]['vencimento'],"d/m/Y").'</h5>
                                                                      </div>';
                             endif;                                                                                            
                        else:
                             $parcelamento[$res['id_negociacao']] .=  '<div class="alert alert-success" style="padding: 2px; margin: 0 0 2px; width: 100%;">
                                                                        <h5 class="alert-heading pago" style="padding: 2px; margin: 0;"><i class="fa fa-check-circle"></i> '.Valida::DataShow($parcelas[0]['vencimento_pago'],"d/m/Y").'</h5>
                                                                      </div>';
                        endif;                                                                                                   
                    else:
                        $parcelamento[$res['id_negociacao']] .=  '<div class="alert alert-info" style="padding: 2px; margin: 0 0 2px; width: 100%;">
                                                                        <h5 class="alert-heading areceber" style="padding: 2px; margin: 0;"><i class="clip-info"></i> '.Valida::DataShow($parcelas[0]['vencimento'],"d/m/Y").'</h5>
                                                                      </div>';
                    endif;
               endif;
            else:
                foreach ($parcelas as $par) {                
                
                        if($res['situacao'] == "F"):
                            $parcelamento[$res['id_negociacao']] .= '<div class="alert alert-success" style="padding: 2px; margin: 0; width: 100%;">
                                                                    <h5 class="alert-heading pago" style="padding: 2px; margin: 0;"><i class="fa fa-check-circle"></i> '.Valida::DataShow($par['vencimento_pago'],"d/m/Y").'</h5>
                                                                  </div>';
                        else:                                                                                               
                            if(strtotime(Valida::DataDB(Valida::DataAtual('d/m/Y'))) > strtotime($par['vencimento'])):
                                if($par['vencimento_pago'] == ""):
                                    if(Valida::DataAtual('Y-m-d') == $par['vencimento']):                                         
                                         $parcelamento[$res['id_negociacao']] .=  '<div class="alert alert-warning" style="padding: 2px; margin: 0 0 2px; width: 100%;">
                                                                            <h5 class="alert-heading devendo" style="padding: 2px; margin: 0;"><i class="fa fa-exclamation-triangle"></i> '.Valida::DataShow($par['vencimento'],"d/m/Y").'</h5>
                                                                          </div>';
                                     else:
                                         $parcelamento[$res['id_negociacao']] .=  '<div class="alert alert-danger" style="padding: 2px; margin: 0 0 2px; width: 100%;">
                                                                                <h5 class="alert-heading devendo" style="padding: 2px; margin: 0;"><i class="fa fa-times-circle"></i> '.Valida::DataShow($par['vencimento'],"d/m/Y").'</h5>
                                                                              </div>'; 
                                     endif;                                                                                              
                                else:
                                     $parcelamento[$res['id_negociacao']] .=  '<div class="alert alert-success" style="padding: 2px; margin: 0 0 2px; width: 100%;">
                                                                                <h5 class="alert-heading pago" style="padding: 2px; margin: 0;"><i class="fa fa-check-circle"></i> '.Valida::DataShow($par['vencimento_pago'],"d/m/Y").'</h5>
                                                                              </div>';
                                endif;                                                                                                   
                            else:
                                 $parcelamento[$res['id_negociacao']] .=  '<div class="alert alert-info" style="padding: 2px; margin: 0 0 2px; width: 100%;">
                                                                                <h5 class="alert-heading areceber" style="padding: 2px; margin: 0;"><i class="clip-info"></i> '.Valida::DataShow($par['vencimento'],"d/m/Y").'</h5>
                                                                              </div>';
                            endif;
                       endif;
                }
            endif;         
        }
        $this->parcelamento = $parcelamento;
    }
    
    function detalheVenda(){
        $id_neg = UrlAmigavel::PegaParametro("neg");
       
        $this->negociacao = NegociacaoModel::pesquisaUmaNegociacao($id_neg,"VD");
        $this->negociacao = $this->negociacao[0];
        $this->produtos_venda = ProdutoModel::pesquisaProdutoAdicionados($id_neg); 
    }
    
}
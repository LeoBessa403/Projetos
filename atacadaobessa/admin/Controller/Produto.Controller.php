<?php

class produto{ 
    
    public $result;
    public $resultAlt;
    public $form;
    
    function cadastroProduto(){    
        
        $id = "cadastroProduto";
        
        if(!empty($_POST[$id])):
            $dados = $_POST; 
            $foto = null;
            if(!empty($_FILES['fotos']['name'][0])):
                $foto = Valida::Redimenciona($_FILES['fotos']['tmp_name'][0], $_FILES['fotos']['name'][0],$dados['desc_produto'],TAMANHO);
            endif;
           
            $dados['id_unidade_venda'] = $dados['id_unidade_venda'][0];
            $dados['id_dado_financeiro'] = $dados['id_dado_financeiro'][0];
            unset($dados[$id]); 
        
            if(!empty($_POST['id_produto'])):
                if(!empty($_POST['valor_venda'])):
                    $dados['valor_venda'] = Valida::formataMoedaBanco($_POST['valor_venda']);
                else:
                    $dados['valor_venda'] = "";
                endif;
                $produto  = Valida::RecebiVariavel(ProdutoModel::campos, $dados);                
                $prod     = ProdutoModel::atualizaProduto($produto, $_POST['id_produto']);
                
                if($foto):
                    $foto_apagar = FotosProdutosModel::pesquisaUmaFoto($_POST['id_produto']);
                    if(file_exists("uploads/".$foto_apagar['caminho'])):
                        unlink("uploads/".$foto_apagar['caminho']);
                    endif;                    
                    $fot['caminho']    = $foto;
                    $idFoto = FotosProdutosModel::atualizaFotosProduto($fot, $_POST['id_produto']);
                    if($prod && $idFoto):                        
                        $this->resultAlt = true;
                    endif;
                else:
                     if($prod):
                        $this->resultAlt = true;
                    endif;
                endif;
                
            else:                    
                $idProduto = ProdutoModel::cadastraProduto($dados);
                $fot['id_produto'] = $idProduto;
                $fot['caminho']    = $foto;
                $idFoto = FotosProdutosModel::cadastraFotosProduto($fot);
                if($idProduto && $idFoto):
                    $this->result = $idProduto;
                endif;
                   
            endif;
        endif;
        
        $id_pro = UrlAmigavel::PegaParametro("pro");
        $res = array();
        if($id_pro):
            $res = ProdutoModel::pesquisaUmProduto($id_pro);
            $res['valor_venda'] = Valida::formataMoeda($res['valor_venda']);
        else:
            $res["estoque"] = 0;
            $res["quantidade_unidade_venda"] = 1;
            $res["observacao"] = "";
            $res['valor_venda'] = "";
        endif;
        
        
        $formulario = new Form($id, "index.php?url=admin/produto/cadastroProduto");
        $formulario->setValor($res);
             
        $formulario
                ->setId("desc_produto")
                ->setLabel("Descrição do Produto")
                ->setClasses("ob")
                ->CriaInpunt();
        
        $formulario
                ->setId("estoque")
                ->setLabel("Estoque do Produto")
                ->setTamanhoInput(3)
                ->setInfo("Estoque no momento")
                ->setClasses("ob numero")
                ->CriaInpunt();        
        
        $formulario
                ->setId("id_dado_financeiro")
                ->setAutocomplete("tb_dados_financeiros", "tipo_dado","id_dado_financeiro")
                ->setType("select")
                ->setLabel("Tipo de Produto")
                ->setTamanhoInput(3)
                ->setClasses("ob")
                ->CriaInpunt();
        
        $formulario
                ->setId("id_unidade_venda")
                ->setAutocomplete("tb_unidade_venda", "descricao","id_unidade_venda")
                ->setType("select")
                ->setLabel("Unidade de Venda")
                ->setTamanhoInput(4)
                ->setClasses("ob")
                ->CriaInpunt();
        
        $formulario
                ->setId("quantidade_unidade_venda")
                ->setLabel("Quantidade")
                ->setClasses("numero")
                ->setTamanhoInput(2)
                ->setInfo("Quantidade na Unidade de Venda")
                ->CriaInpunt();
        
        if($res['valor_venda'] != ""):
            $formulario
                ->setId("valor_venda")
                ->setLabel("Valor de Venda")
                ->setClasses("moeda")
                ->CriaInpunt();
        endif;
        
        
        $formulario
                ->setId("fotos")
                ->setLabel("Fotos")
                ->setType("file")
                ->setInfo("Colocar apenas 1 imagem do Produto")
                ->CriaInpunt();
        
         $formulario
                ->setId("observacao")
                ->setType("textarea")                 
                ->setInfo("Complementação da Descrição do Produto")
                ->setLabel("Observação")
                ->CriaInpunt();
        
          if($id_pro):
                $formulario
                        ->setType("hidden")
                        ->setId("id_produto")
                        ->setValues($id_pro)
                        ->CriaInpunt();
          endif;
        
        $this->form = $formulario->finalizaForm(); 
    }
    
    function listarProduto(){
        
        $this->result = ProdutoModel::pesquisaProduto();
    }
    
    function detalheProduto(){
        $id_pro = UrlAmigavel::PegaParametro("pro");
       
        $this->produtos_compra = ProdutoModel::pesquisaUmProduto($id_pro);
        $this->compras_produto = ProdutoModel::pesquisaUmProdutoCompras($id_pro);
    }
}
<?php

class ProdutoModel{
      
    const tabela = "tb_produto";
    const campos = "desc_produto,estoque,id_unidade_venda,id_dado_financeiro,quantidade_unidade_venda,valor_venda";
    const chave_primaria = "id_produto";
    
    public static function cadastraProduto(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(self::tabela, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
    public static function cadastraProdutoNegociacao(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar("tb_negociacao_produto", $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
    public static function pesquisaProduto(){   
        $tabela = self::tabela." pro".
                " inner join tb_unidade_venda unv".
                " on unv.id_unidade_venda = pro.id_unidade_venda".
                " inner join ".FotosProdutosModel::tabela." fot".
                " on fot.".self::chave_primaria." = pro.".self::chave_primaria.
                " inner join tb_dados_financeiros fin".
                " on fin.id_dado_financeiro = pro.id_dado_financeiro";
        
        $campos = "pro.*, unv.descricao unidade, fot.caminho, fin.tipo_dado, fin.lucro_total";
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where pro.inativo != 'S'",NULL,$campos);
        return $pesquisa->getResult();
    }
    
    public static function pesquisaProdutoAdicionados($id_neg){   
        $tabela = self::tabela." pro".
                " inner join tb_negociacao_produto tnp".
                " on tnp.id_produto = pro.id_produto".
                " inner join tb_unidade_venda unv".
                " on unv.id_unidade_venda = pro.id_unidade_venda".
                " inner join ".FotosProdutosModel::tabela." fot".
                " on fot.".self::chave_primaria." = pro.".self::chave_primaria.
                " inner join tb_dados_financeiros fin".
                " on fin.id_dado_financeiro = pro.id_dado_financeiro";
        
        $campos = "pro.*, unv.descricao unidade, fot.caminho, fin.tipo_dado, fin.lucro_total, fin.comissao, tnp.valor, tnp.quantidade";
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where id_negociacao = :id_neg","id_neg={$id_neg}",$campos);
        return $pesquisa->getResult();
    }
    
    public static function pesquisaUmProduto($id){ 
        $tabela = self::tabela." pro".
                " inner join tb_unidade_venda unv".
                " on unv.id_unidade_venda = pro.id_unidade_venda".
                " inner join ".FotosProdutosModel::tabela." fot".
                " on fot.".self::chave_primaria." = pro.".self::chave_primaria.
                " inner join tb_dados_financeiros fin".
                " on fin.id_dado_financeiro = pro.id_dado_financeiro";
        
        $campos = "pro.*, unv.descricao unidade, fot.caminho, fin.tipo_dado, fin.lucro_total, fin.comissao";
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where pro.".self::chave_primaria." = :id","id={$id}",$campos);
        $result   = $pesquisa->getResult();
        return $result[0];
    }
    
    public static function pesquisaUmProdutoCompra($id){ 
        $tabela = self::tabela." pro".         
                " inner join tb_unidade_venda unv".
                " on unv.id_unidade_venda = pro.id_unidade_venda".
                " inner join ".FotosProdutosModel::tabela." fot".
                " on fot.".self::chave_primaria." = pro.".self::chave_primaria.
                " inner join tb_dados_financeiros fin".
                " on fin.id_dado_financeiro = pro.id_dado_financeiro";
        
        $campos = "pro.id_produto, pro.desc_produto, pro.estoque, pro.valor_venda, pro.observacao, fot.caminho, fin.tipo_dado, unv.descricao unidade, pro.quantidade_unidade_venda";
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where pro.".self::chave_primaria." = :id","id={$id}",$campos);
        $result   = $pesquisa->getResult();
        return $result[0];
    }

    public static function pesquisaUmProdutoDetalhe($id){ 
        $tabela = self::tabela." pro".   
                " inner join tb_unidade_venda unv".
                " on unv.id_unidade_venda = pro.id_unidade_venda".
                " inner join ".FotosProdutosModel::tabela." fot".
                " on fot.".self::chave_primaria." = pro.".self::chave_primaria.
                " inner join tb_dados_financeiros fin".
                " on fin.id_dado_financeiro = pro.id_dado_financeiro";
        
        $campos = "pro.*, fot.caminho, fin.tipo_dado, unv.descricao";
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where pro.".self::chave_primaria." = :id","id={$id}",$campos);
        $result   = $pesquisa->getResult();
        return $result[0];
    }
    
    public static function pesquisaUmProdutoCompras($id){ 
        $tabela = " tb_negociacao_produto negpro".               
                  " inner join tb_negociacao neg".
                  " on neg.id_negociacao = negpro.id_negociacao". 
                  " inner join tb_pessoa pes".
                  " on pes.id_entidade = neg.id_entidade"; 
        
        $campos = "negpro.valor, negpro.observacao, negpro.quantidade, neg.cadastro, pes.nome_razao, pes.nome_fantasia";
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where negpro.".self::chave_primaria." = :id and neg.situacao = 'F' and neg.tipo_negociacao = 'CP'","id={$id}",$campos);
        $result   = $pesquisa->getResult();
        return $result;
    }
    
    public static function pesquisaUmProdutoInclusoCompra($id_pro,$id_neg){         
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar("tb_negociacao_produto","where ".self::chave_primaria." = :id_pro and id_negociacao = :id_neg","id_pro={$id_pro}&id_neg={$id_neg}");
        $result   = $pesquisa->getResult();
        if(!empty($result[0])):
            return $result[0];
        else:
            return $result;
        endif;        
    }
    
    public static function deletaProduto($id){
        // SE JA FEZ PARTE DE ALGUMA NEGOCIAÇÃO SO INATIVA O PRODUTO
        $pro = NegociacaoModel::pesquisaProdutoEmNegociacao($id);
        
        if(count($pro) > 0):
            // INATIVA PRODUTO
            $dados["inativo"] = "S";
            ProdutoModel::atualizaProduto($dados, $id);
            return true;        
        else:
            // DELETA A FOTO DO PRODUTO
            $del_foto = FotosProdutosModel::deletaFoto($id);
            $foto = FotosProdutosModel::pesquisaUmaFoto($id);
            if(file_exists("uploads/".$foto['caminho'])):
                unlink("uploads/".$foto['caminho']);                    
            endif; 

             // DELETA O PRODUTO
            $deleta = new Deleta();       
            $deleta->Deletar(self::tabela, "where ".self::chave_primaria." = :id","id={$id}");         
            return $deleta->getResult();  
        endif; 
    }
    
    public static function atualizaProduto(array $dados,$id){
        $atualiza = new Atualiza();
        $atualiza->Atualizar(self::tabela, $dados, "where ".self::chave_primaria." = :id", "id={$id}");
        return $atualiza->getResult();
    }
    
    public static function atualizaProdutoNegociacao(array $dados,$id_pro,$id_neg){
        $atualiza = new Atualiza();
        $atualiza->Atualizar("tb_negociacao_produto", $dados,"where ".self::chave_primaria." = :id_pro and id_negociacao = :id_neg","id_pro={$id_pro}&id_neg={$id_neg}");
        return $atualiza->getResult();
    }
    
}
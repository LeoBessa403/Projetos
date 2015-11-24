<?php

class NegociacaoModel{
      
    const tabela = "tb_negociacao";
    const campos = "id_entidade,cadastro,tipo_negociacao ,situacao";
    const chave_primaria = "id_negociacao";
    
    public static function cadastraCompra(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(self::tabela, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
    public static function cadastraVenda(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(self::tabela, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
    public static function atualizaNegociacao(array $dados,$id){
        $atualiza = new Atualiza();
        $atualiza->Atualizar(self::tabela, $dados, "where ".self::chave_primaria." = :id", "id={$id}");
        return $atualiza->getResult();
    }
    
    public static function pesquisaProdutosNegociacao($id){                  
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar("tb_negociacao_produto","where ".self::chave_primaria." = :id","id={$id}","id_produto, valor");
        return $pesquisa->getResult();
    }
    
    public static function pesquisaProdutoEmNegociacao($id){                  
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar("tb_negociacao_produto","where id_produto = :id","id={$id}");
        return $pesquisa->getResult();
    }
    
    public static function pesquisaComprasAtivas(){
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar(self::tabela,"where situacao = 'A' and tipo_negociacao = 'CP'",null,self::chave_primaria.', '. EntidadeModel::chave_primaria);
        $result   = $pesquisa->getResult();
        if($result):
            return $result[0];
        esle:
            return $result;
        endif;
        
    }
    
    public static function pesquisaVendasAtivas(){
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar(self::tabela,"where situacao = 'A' and tipo_negociacao = 'VD'",null,self::chave_primaria.', '. EntidadeModel::chave_primaria);
        $result   = $pesquisa->getResult();
        if($result):
            return $result[0];
        esle:
            return $result;
        endif;
        
    }
    
    public static function pesquisaNegociacoesCompras(){
        
        $tabela = self::tabela." neg".
                   " inner join tb_pessoa pes".
                   " on neg.id_entidade = pes.id_entidade".
                   " inner join tb_pagamento pag".
                   " on neg.id_negociacao = pag.id_negociacao";
        
        $campos = "pag.numero_parcelas, pag.situacao, neg.id_negociacao, neg.cadastro, pag.tipo_pagamento, pag.valor_total, pes.nome_fantasia, pes.nome_razao";
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where neg.situacao = 'F' and neg.tipo_negociacao = 'CP'",null,$campos);
        return $pesquisa->getResult();
        
    }
    
    public static function pesquisaNegociacoesVendas(){
        
         $tabela = self::tabela." neg".
                   " inner join tb_pessoa pes".
                   " on neg.id_entidade = pes.id_entidade".
                   " inner join tb_pagamento pag".
                   " on neg.id_negociacao = pag.id_negociacao";
        
        $campos = "pag.numero_parcelas, pag.situacao, neg.id_negociacao, neg.cadastro, pag.tipo_pagamento, pag.valor_total, pes.nome_fantasia, pes.nome_razao";
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where neg.situacao = 'F' and neg.tipo_negociacao = 'VD'",null,$campos);
        return $pesquisa->getResult();
        
    }
    
     public static function pesquisaParcelasVendasListar($id_neg){
        
         $tabela = " tb_pagamento pag".                 
                   " inner join tb_parcelamento parc".
                   " on parc.id_pagamento = pag.id_pagamento";
        
        $campos = "pag.situacao, parc.vencimento, parc.vencimento_pago, parc.parcela";
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where pag.id_negociacao = :id_neg","id_neg={$id_neg}",$campos);
        return $pesquisa->getResult();
        
    }
    
    public static function pesquisaUmaNegociacao($id_neg,$tipo){
        
         $tabela = self::tabela." neg".
                   " inner join tb_pessoa pes".
                   " on neg.id_entidade = pes.id_entidade".
                   " inner join tb_pagamento pag".
                   " on neg.id_negociacao = pag.id_negociacao";
        
        $campos = "pag.numero_parcelas, pag.situacao, neg.id_negociacao, neg.cadastro, pag.tipo_pagamento, pag.valor_total, pes.nome_fantasia, pes.nome_razao";
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where neg.situacao = 'F' and neg.tipo_negociacao = '$tipo' and neg.id_negociacao = :id","id={$id_neg}",$campos);
        return $pesquisa->getResult();
        
    }
    
}
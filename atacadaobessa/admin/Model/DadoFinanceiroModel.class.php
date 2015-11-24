<?php

class DadoFinanceiroModel{
      
    const tabela = "tb_dados_financeiros";
    const chave_primaria = "id_dado_financeiro";
    
    public static function pesquisaDadoFinanceiro($id){ 
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar(self::tabela,"where '".self::chave_primaria."' = :id","id={$id}");
        $result   = $pesquisa->getResult();
        return $result[0];
    }
    
    
}
<?php

class ParcelamentoModel{
      
    const tabela = "tb_parcelamento";
    const campos = "id_pagamento,parcela,valor_parcela,valor_parcela_pago,vencimento,vencimento_pago,observacao_parcela";
    const chave_primaria = "id_parcelamento";
    
    public static function cadastraParcelamento(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(self::tabela, $dados);
        return $cadastro->getUltimoIdInserido();
    }    
  
    
}
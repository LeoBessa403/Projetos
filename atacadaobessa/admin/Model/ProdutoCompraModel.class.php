<?php

class ProdutoCompraModel{
          
    public static function deletaProdutoCompra($id_pro,$id_neg){
        $deleta = new Deleta();       
        $deleta->Deletar("tb_negociacao_produto", "where id_produto = :id_pro and id_negociacao = :id_neg","id_pro={$id_pro}&id_neg={$id_neg}");         
        return $deleta->getResult();        
    }
    
}
<?php

class FotosProdutosModel{
      
    const tabela = "tb_foto";
    const campos = "caminho,id_produto";
    const chave_primaria = "id_foto";
    
    public static function cadastraFotosProduto(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(self::tabela, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
    public static function atualizaFotosProduto(array $dados,$id){
        $atualiza = new Atualiza();
        $atualiza->Atualizar(self::tabela, $dados, "where ". ProdutoModel::chave_primaria." = :id", "id={$id}");
        return $atualiza->getResult();
    }
    
    public static function pesquisaUmaFoto($id){ 
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar(self::tabela,"where id_produto = :id","id={$id}","caminho");
        $result   = $pesquisa->getResult();
        return $result[0];
    }
    
    public static function deletaFoto($id){
//        $deleta = new Deleta();       
//        $deleta->Deletar(self::tabela, "where ".ProdutoModel::chave_primaria." = :id","id={$id}");         
//        return $deleta->getResult();        
    }
    
}
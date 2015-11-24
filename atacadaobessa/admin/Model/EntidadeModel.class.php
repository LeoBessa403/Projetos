<?php

class EntidadeModel{
    
    const tabela = "tb_entidade";
    const campos = "observacao,tipo_entidade,responsavel";
    const chave_primaria = "id_entidade";

    public static function cadastraEntidade(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(self::tabela, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
    public static function atualizaEntidade(array $dados,$id){
        $atualiza = new Atualiza();
        $atualiza->Atualizar(self::tabela, $dados, "where ".self::chave_primaria." = :id", "id={$id}");
        return $atualiza->getResult();
    }
    
    public static function pesquisaUmaEntidadeRazao($id){
       $tabela = self::tabela." ent"
                . " inner join ".PessoaModel::tabela." pes"
                . " on pes.".self::chave_primaria." = ent.".self::chave_primaria;
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where ent.".self::chave_primaria." = :id","id={$id}","nome_razao");
        $result   = $pesquisa->getResult();
         if($result):
            return $result[0];
        else:
            return $result;
        endif;
    }
    
}
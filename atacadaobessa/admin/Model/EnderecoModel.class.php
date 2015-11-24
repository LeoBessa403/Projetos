<?php

class EnderecoModel{
    
    const tabela = "tb_endereco";
    const campos = "endereco,complemento,cep,bairro,cidade,id_pessoa";
    const chave_primaria = "id_endereco";

    public static function cadastraEndereco(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(self::tabela, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
    public static function atualizaEndereco(array $dados,$id){
        $atualiza = new Atualiza();
        $atualiza->Atualizar(self::tabela, $dados, "where ".self::chave_primaria." = :id", "id={$id}");
        return $atualiza->getResult();
    }
    
    
    
}
<?php

class ClienteModel{
      
    public static function pesquisaCliente(){
        $tabela = EntidadeModel::tabela." ent"
                . " inner join ".PessoaModel::tabela." pes"
                . " on pes.".EntidadeModel::chave_primaria." = ent.".EntidadeModel::chave_primaria
                . " inner join ".DadosModel::tabela." dad"
                . " on dad.".PessoaModel::chave_primaria." = pes.".PessoaModel::chave_primaria
                . " inner join ".EnderecoModel::tabela." end"
                . " on end.".PessoaModel::chave_primaria." = pes.".PessoaModel::chave_primaria;
        
        $campos = "ent.id_entidade, pes.nome_razao, pes.nome_fantasia, dad.tel1, dad.tel2, end.cidade, end.estado, ent.responsavel";
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where ent.tipo_entidade = 'C'",null,$campos);
        return $pesquisa->getResult();
    }
    
    public static function pesquisaClienteSelect(){
        $tabela = EntidadeModel::tabela." ent"
                . " inner join ".PessoaModel::tabela." pes"
                . " on pes.".EntidadeModel::chave_primaria." = ent.".EntidadeModel::chave_primaria;
        
        $campos = "ent.id_entidade, pes.nome_razao, pes.nome_fantasia";
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where ent.tipo_entidade = 'C'",null,$campos);
        return $pesquisa->getResult();
    }
    
    public static function pesquisaUmCliente($id){
       $tabela = EntidadeModel::tabela." ent"
                . " inner join ".PessoaModel::tabela." pes"
                . " on pes.".EntidadeModel::chave_primaria." = ent.".EntidadeModel::chave_primaria
                . " inner join ".DadosModel::tabela." dad"
                . " on dad.".PessoaModel::chave_primaria." = pes.".PessoaModel::chave_primaria
                . " inner join ".EnderecoModel::tabela." end"
                . " on end.".PessoaModel::chave_primaria." = pes.".PessoaModel::chave_primaria;
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where ent.".EntidadeModel::chave_primaria." = :id","id={$id}");
        $result   = $pesquisa->getResult();
        return $result[0];
    }
    
    public static function deletaCliente($id){
        $tabela = EntidadeModel::tabela." ent"
                . " inner join ".PessoaModel::tabela." pes"
                . " on pes.".EntidadeModel::chave_primaria." = ent.".EntidadeModel::chave_primaria
                . " inner join ".DadosModel::tabela." dad"
                . " on dad.".PessoaModel::chave_primaria." = pes.".PessoaModel::chave_primaria
                . " inner join ".EnderecoModel::tabela." end"
                . " on end.".PessoaModel::chave_primaria." = pes.".PessoaModel::chave_primaria;
        
        $campos = "ent.id_entidade, pes.id_pessoa, dad.id_dados, end.id_endereco";
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where ent.".EntidadeModel::chave_primaria." = :id","id={$id}",$campos);
        $deleta = new Deleta();
        foreach ($pesquisa->getResult() as $res):
            $deleta->Deletar(DadosModel::tabela, "where ".DadosModel::chave_primaria." = :res", "res={$res['id_dados']}");
            $deleta->Deletar(EnderecoModel::tabela, "where ".EnderecoModel::chave_primaria." = :res", "res={$res['id_dados']}");
            $deleta->Deletar(PessoaModel::tabela, "where ".PessoaModel::chave_primaria." = :res", "res={$res['id_pessoa']}");
            $deleta->Deletar(EntidadeModel::tabela, "where ".EntidadeModel::chave_primaria." = :res", "res={$res['id_entidade']}");
            return $deleta->getResult();
        endforeach;
    }   
    
    
}
<?php

class cliente{ 
    
    public $result;
    public $resultAlt;
    public $form;
    
    function cadastroCliente(){ 
        
        $id = "cadastroCliente";
        
        if(!empty($_POST[$id])):
            
            $dados = $_POST;            
            $dados["tipo_entidade"] = "C";
            if(isset($dados["tipo"]) && $dados["tipo"] != ""):
                $dados["tipo_pessoa"] = "F";
                $dados["cpf_cnpj"] = $dados["cpf"];
            else:
                $dados["tipo_pessoa"] = "J";
                $dados["cpf_cnpj"] = $dados["cnpj"];
            endif;

            unset($dados[$id],$dados["cpf"],$dados["cnpj"]); 
        
            if(!empty($_POST['id_entidade'])):
                
                    $client = ClienteModel::pesquisaUmCliente($_POST['id_entidade']);
                    $dados[PessoaModel::chave_primaria] = $client[PessoaModel::chave_primaria];
                    $entidade = Valida::RecebiVariavel(EntidadeModel::campos, $dados);
                    $pessoa   = Valida::RecebiVariavel(PessoaModel::campos, $dados);
                    $dado     = Valida::RecebiVariavel(DadosModel::campos, $dados);
                    $endereco = Valida::RecebiVariavel(EnderecoModel::campos, $dados);
                    $endereco['estado'] = $dados['estado'][0];
                    
                    $entid = EntidadeModel::atualizaEntidade($entidade, $client['id_entidade']);
                    $pess  = PessoaModel::atualizaPessoa($pessoa, $client['id_pessoa']);
                    $dad   = DadosModel::atualizaDados($dado, $client['id_dados']);
                    $end   = EnderecoModel::atualizaEndereco($endereco, $client['id_endereco']);
                    
                    if($entid && $pess && $dad && $end):
                        $this->resultAlt = true;
                    endif;
            else:
                    
                    $entidade = Valida::RecebiVariavel(EntidadeModel::campos, $dados);
                    $entidade["cadastro"] = Valida::DataDB(Valida::DataAtual());
                    
                    $idEntidade = EntidadeModel::cadastraEntidade($entidade);

                    if($idEntidade):
                        $pessoa = Valida::RecebiVariavel(PessoaModel::campos, $dados);
                        $pessoa['id_entidade'] = $idEntidade;

                        $idPessoa = PessoaModel::cadastraPessoa($pessoa);
                        $dados[PessoaModel::chave_primaria] = $idPessoa;
                         
                        if($idPessoa):
                                $dado = Valida::RecebiVariavel(DadosModel::campos, $dados);
                                $idDados = DadosModel::cadastraDados($dado); 
                                $endereco = Valida::RecebiVariavel(EnderecoModel::campos, $dados);
                                $endereco['estado'] = $dados['estado'][0];

                                $idEndereco = EnderecoModel::cadastraEndereco($endereco);

                                if($idEndereco && $idDados):
                                    $this->result = $idEndereco;
                                endif;

                        endif;

                    endif;
            endif;
        endif;
        
        $id_ent = UrlAmigavel::PegaParametro("ent");
        $res = array();
        if($id_ent):
            $res = ClienteModel::pesquisaUmCliente($id_ent);
        endif;
        
        $checked = "";
        if(!empty($res)):
            if($res['tipo_pessoa'] == "F"):
                $checked = "checked";
                $res['cpf'] = $res['cpf_cnpj'];
                $res['cnpj'] = "";
            else:
                $checked = "";
                $res['cnpj'] = $res['cpf_cnpj'];
                $res['cpf'] = "";
            endif;
        endif;
        
        
       $formulario = new Form($id, "index.php?url=admin/cliente/cadastroCliente");
       $formulario->setValor($res);
             
        
        $label_options = array("Física","Jurídica","azul","verde");
        $formulario
                ->setClasses($checked)
                ->setId("tipo")
                ->setType("checkbox")
                ->setLabel("Tipo de Pessoa")
                ->setOptions($label_options)
                ->CriaInpunt();        

        $formulario
                ->setId("nome_razao")
                ->setLabel("Nome / Razão")
                ->setIcon("clip-user-3")
                ->setClasses("ob")
                ->setInfo("Nome da pessoa ou Razão social da empresa")
                ->CriaInpunt();
        
        $formulario
                ->setId("nome_fantasia")
                ->setLabel("Nome Fantasia")
                ->setInfo("Nome Fantasia do estabelecimento")
                ->CriaInpunt();

        $formulario
                ->setId("cpf")
                ->setLabel("CPF") 
                ->setTamanhoInput(6)
                ->setClasses("cpf")
                ->setInfo("Caso seja Pessoa Física")
                ->CriaInpunt();

         $formulario
                ->setId("cnpj")
                ->setLabel("CNPJ")  
                ->setTamanhoInput(6)
                ->setClasses("cnpj")
                ->setInfo("Caso seja Pessoa Jurídica")
                ->CriaInpunt();

         $formulario
                ->setId("endereco")  
                ->setIcon("fa-envelope-o fa") 
                ->setLabel("Endereço")
                ->CriaInpunt();

         $formulario
                ->setId("complemento")
                ->setLabel("Complemento") 
                ->CriaInpunt();

         $formulario
                ->setId("bairro")  
                ->setLabel("Bairro")
                ->CriaInpunt();

         $formulario
                ->setId("cidade")   
                ->setLabel("Cidade")
                ->CriaInpunt();

         $formulario
                ->setId("cep")
                ->setLabel("CEP")  
                ->setTamanhoInput(4)
                ->setClasses("cep")
                ->CriaInpunt();

         $options = array("DF"=>"Distrito Federal","AC"=>"Acre", "AL"=>"Alagoas", "AM"=>"Amazonas", 
             "AP"=>"Amapá","BA"=>"Bahia","CE"=>"Ceará","ES"=>"Espírito Santo","GO"=>"Goiás","MA"=>"Maranhão",
             "MT"=>"Mato Grosso","MS"=>"Mato Grosso do Sul","MG"=>"Minas Gerais","PA"=>"Pará","PB"=>"Paraíba",
             "PR"=>"Paraná","PE"=>"Pernambuco","PI"=>"Piauí","RJ"=>"Rio de Janeiro","RN"=>"Rio Grande do Norte",
             "RO"=>"Rondônia","RS"=>"Rio Grande do Sul","RR"=>"Roraima","SC"=>"Santa Catarina","SE"=>"Sergipe",
             "SP"=>"São Paulo","TO"=>"Tocantins");
         $formulario
                ->setTamanhoInput(8)
                 ->setId("estado")
                ->setType("select")  
                ->setLabel("Estado")
                ->setOptions($options)
                ->CriaInpunt();

         $formulario
                ->setId("responsavel")
                ->setTamanhoInput(6)   
                ->setIcon("clip-user-3")
                ->setLabel("Responsável")
                ->CriaInpunt();

         $formulario
                ->setId("tel1")
                ->setTamanhoInput(6)   
                ->setIcon("fa fa-phone")
                ->setLabel("Telefone do Responsável")
                ->setClasses("tel ob")
                ->CriaInpunt();

         $formulario
                ->setId("tel2")
                 ->setTamanhoInput(6) 
                 ->setIcon("fa fa-mobile-phone")
                ->setLabel("Telefone Celular")
                ->setClasses("tel")
                ->CriaInpunt();

         $formulario
                ->setId("tel3")
                 ->setTamanhoInput(6) 
                 ->setIcon("fa fa-phone")
                ->setLabel("Telefone da Empresa")
                ->setClasses("tel")
                ->CriaInpunt();

         $formulario
                ->setId("tel0800")
                ->setTamanhoInput(4)
                ->setIcon("fa fa-phone")
                ->setLabel("0800 da Empresa")
                ->setClasses("tel0800")
                ->CriaInpunt();

         $formulario
                ->setId("site")
                ->setTamanhoInput(8) 
                 ->setIcon("clip-earth-2")
                ->setLabel("Site")
                ->CriaInpunt();

         $formulario
                ->setId("email")  
                ->setIcon("clip-archive")
                ->setLabel("E-mail")
                ->setClasses("email")
                ->CriaInpunt();

          $formulario
                ->setType("textarea") 
                ->setId("observacao")
                ->setLabel("Observação")
                ->CriaInpunt();
        
          if($id_ent):
                $formulario
                        ->setType("hidden")
                        ->setId("id_entidade")
                        ->setValues($id_ent)
                        ->CriaInpunt();
          endif;
        
        $this->form = $formulario->finalizaForm(); 
    }
    
    function listarCliente(){
        
        $this->result = ClienteModel::pesquisaCliente();
    }
}
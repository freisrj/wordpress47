<?php

    class ControleFuncionario {

        public function validaFuncionario() {

            $nome        = isset($_POST['txtNome']) ? $_POST['txtNome'] : false;
            $apelido     = isset($_POST['txtApelido']) ? $_POST['txtApelido'] : false;
            $telefone    = isset($_POST['txtTelefone']) ? $_POST['txtTelefone'] : false;
            $celular     = isset($_POST['txtCelular']) ? $_POST['txtCelular'] : false;
            $funcao      = isset($_POST['txtFuncao']) ? $_POST['txtFuncao'] : false;
            $endereco    = isset($_POST['txtEndereco']) ? $_POST['txtEndereco'] : false;
            $bairro      = isset($_POST['txtBairro']) ? $_POST['txtBairro'] : false;
            $cidade      = isset($_POST['txtCidade']) ? $_POST['txtCidade'] : false;
            $cep         = isset($_POST['txtCep']) ? $_POST['txtCep'] : false;
            $uf          = isset($_POST['txtUf']) ? $_POST['txtUf'] : false;
            $imagem      = isset($_POST['txtImagem']) ? $_POST['txtImagem'] : false;
            $imagem_path = isset($_POST['txtImagemPath']) ? $_POST['txtImagemPath'] : false;

            //Validar o preenchimento 
            if (!$nome || trim($nome) == "") {
                throw new Exception ("O campo Nome é obrigatório");
            }
            // if (!$apelido || trim($apelido) == "") {
            //     throw new Exception ("O campo apelido é obrigatório");
            // }
            
            //Setar valores para pesquisar no banco de dados
            $f = new Funcionario();
            $f->setNome($nome);
            // $f->setApelido($apelido);
            // $f->setTelefone($telefone);
            // $f->setCelular($celular);
            // $f->setFuncao($funcao);
            // $f->setEndereco($endereco);
            // $f->setBairro($bairro);
            // $f->setCidade($cidade);
            // $f->setCep($cep);
            // $f->setUf($uf);
            // $f->setImagem($imagem);
            // $f->setImagemPath($imagem_path);

            //echo 'ControleFuncionario.validaFuncionario.funcionario = '. $fogin . '<br />';
            //echo 'ControleFuncionario.validaFuncionario.senha = '. $senha . '<br />';
            
            $dao = new DaoFuncionario();
            // Lista o registro de usuário
            $funcionarios = $dao->listar($f);
            // Instancia a Gui de usuário
            $view = new TGui ("validaFuncionario.php");
            //echo 'ControleFuncionario.validaFuncionario - '. print_r($view) . '<br />';
            //echo 'tamanho do funcionarios = '.count($funcionarios);
            $view->addDados ("funcionarios",$funcionarios);
            $view->renderizar();
        }
        
        public function listaDeFuncionario() {
            //echo 'Entrei no listaDeFuncionario<br />';
            // cria objeto de dados de usuário
            $dao = new DaoFuncionario();
            // Lista todos os registros de usuário
            $funcionarios = $dao->listarTodos();
            $view = new TGui ("listaDeFuncionarios.php");
            //echo 'ControleFuncionario.listaDeFuncionario - '. print_r($view) . '<br />';
            $view->addDados ("funcionarios",$funcionarios);
            $view->renderizar();
        }
    
        public function editar($id) {
            //echo 'editar usuário = '. $id;
            // recupera somente o id, já que recebe um array
            $p1 = $id[2];
            // cria objeto de dados de usuário
            $dao = new DaoFuncionario();
            // Lista o registro de usuário
            $f = $dao->listar($p1);
            // Instancia a Gui de usuário
            $view = new TGui ("formularioFuncionario.php");
            //echo 'ControleFuncionario.editar - '. print_r($view) . '<br />';
            $view->addDados ("funcionario",$f);
            $view->renderizar();
        }

        public function novo() {
            //echo 'novo usuário';
            // recupera somente o id, já que recebe um array
            //$p1 = $id[2];
            // cria objeto de dados de usuário
            $f = new Funcionario();
            // Lista todos os registros de usuário
            //$u = $du->listar($p1);
            // Instancia a Gui de usuário
            $view = new TGui ("formularioFuncionario.php");
            //echo 'ControleFuncionario.editar - '. print_r($view) . '<br />';
            $view->addDados ("funcionario",$f);
            $view->renderizar();
        }

        public function salvar() {
            //echo 'salvar';
            //print_r($_POST);
            
            $f = new Funcionario();
            $id_fun      = isset($_POST['txtIdFun']) ? $_POST['txtIdFun'] : false;
            $nome        = isset($_POST['txtNome']) ? $_POST['txtNome'] : false;
            $apelido     = isset($_POST['txtApelido']) ? $_POST['txtApelido'] : false;
            $telefone    = isset($_POST['txtTelefone']) ? $_POST['txtTelefone'] : false;
            $celular     = isset($_POST['txtCelular']) ? $_POST['txtCelular'] : false;
            $funcao      = isset($_POST['txtFuncao']) ? $_POST['txtFuncao'] : false;
            $endereco    = isset($_POST['txtEndereco']) ? $_POST['txtEndereco'] : false;
            $bairro      = isset($_POST['txtBairro']) ? $_POST['txtBairro'] : false;
            $cidade      = isset($_POST['txtCidade']) ? $_POST['txtCidade'] : false;
            $cep         = isset($_POST['txtCep']) ? $_POST['txtCep'] : false;
            $uf          = isset($_POST['txtUf']) ? $_POST['txtUf'] : false;
            $imagem      = isset($_POST['txtImagem']) ? $_POST['txtImagem'] : false;
            $imagem_path = isset($_POST['txtImagemPath']) ? $_POST['txtImagemPath'] : false;

            //Validar o preenchimento 
            if (!$nome || trim($nome) == "") {
                throw new Exception ("O campo Nome é obrigatório");
            }

            //validar o preenchimento 
            if (trim($id_fun!="")) {
                $f->setIdFuncionario($id_fun);
            }
            
            //gravar no banco de dados
            $f->setNome($nome);
            $f->setApelido($apelido);
            $f->setTelefone($telefone);
            $f->setCelular($celular);
            $f->setFuncao($funcao);
            $f->setEndereco($endereco);
            $f->setBairro($bairro);
            $f->setCidade($cidade);
            $f->setCep($cep);
            $f->setUf($uf);
            $f->setImagem($imagem);
            $f->setImagemPath($imagem_path);
            
            $dao = new DaoFuncionario();
            $fun = $dao->salvar($f);
            if ($fun instanceof Funcionario) {
                header("location: ".MAINURL."controle-funcionario/lista-de-funcionario");
            } else {
                echo "Não foi possível salvar o funcionario do usuário";
            }
        }

        public function excluir($id) {
            echo 'excluir funcionario = '. $id;
        }

        public function confirmaExclusao() {
            echo 'confirmaExclusao';
        }
}

?>
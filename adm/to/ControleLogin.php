<?php

    class ControleLogin {

        public function validaLogin() {

            $login = isset($_POST['txtLogin']) ? $_POST['txtLogin'] : false;
            $senha = isset($_POST['txtSenha']) ? $_POST['txtSenha'] : false;

            //Validar o preenchimento 
            if (!$login || trim($login) == "") {
                throw new Exception ("O campo login é obrigatório");
            }
            if (!$senha || trim($senha) == "") {
                throw new Exception ("O campo senha é obrigatório");
            }
            
            //Setar valores para pesquisar no banco de dados
            $l = new Login();
            $l->setLogin($login);
            $l->setSenha($senha);
            //echo 'ControleLogin.validaLogin.login = '. $login . '<br />';
            //echo 'ControleLogin.validaLogin.senha = '. $senha . '<br />';
            
            $du = new DaoLogin();
            // Lista o registro de usuário
            $logins = $du->listar($l);
            // Instancia a Gui de usuário
            $view = new TGui ("validaLogin.php");
            //echo 'ControleLogin.validaLogin - '. print_r($view) . '<br />';
            //echo 'tamanho do logins = '.count($logins);
            $view->addDados ("logins",$logins);
            $view->renderizar();
        }
        
        public function listaDeLogin() {
            //echo 'Entrei no listaDeLogin<br />';
            // cria objeto de dados de usuário
            $du = new DaoLogin();
            // Lista todos os registros de usuário
            $logins = $du->listarTodos();
            $view = new TGui ("listaDeLogins.php");
            //echo 'ControleLogin.listaDeLogin - '. print_r($view) . '<br />';
            $view->addDados ("logins",$logins);
            $view->renderizar();
        }
    
        public function editar($id) {
            //echo 'editar usuário = '. $id;
            // recupera somente o id, já que recebe um array
            $p1 = $id[2];
            // cria objeto de dados de usuário
            $du = new DaoLogin();
            // Lista o registro de usuário
            $l = $du->listar($p1);
            // Instancia a Gui de usuário
            $view = new TGui ("formularioLogin.php");
            //echo 'ControleLogin.editar - '. print_r($view) . '<br />';
            $view->addDados ("login",$l);
            $view->renderizar();
        }

        public function novo() {
            //echo 'novo usuário';
            // recupera somente o id, já que recebe um array
            //$p1 = $id[2];
            // cria objeto de dados de usuário
            $l = new Login();
            // Lista todos os registros de usuário
            //$u = $du->listar($p1);
            // Instancia a Gui de usuário
            $view = new TGui ("formularioLogin.php");
            //echo 'ControleLogin.editar - '. print_r($view) . '<br />';
            $view->addDados ("login",$l);
            $view->renderizar();
        }

        public function salvar() {
            //echo 'salvar';
            //print_r($_POST);
            
            $l = new Login();
            $id = isset($_POST['txtIdLogin']) ? $_POST['txtIdLogin'] : false;
            //$nome = isset($_POST['txtNomeLogin']) ? $_POST['txtNomeLogin'] : false;
            //$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : false;
            $login = isset($_POST['txtLogin']) ? $_POST['txtLogin'] : false;
            $senha = isset($_POST['txtSenha']) ? $_POST['txtSenha'] : false;
            $acesso = isset($_POST['txtAcesso']) ? $_POST['txtAcesso'] : false;
            $unidade = isset($_POST['txtUnidade']) ? $_POST['txtUnidade'] : false;
            $imagem = isset($_POST['txtImagem']) ? $_POST['txtImagem'] : false;
            $imagem_path = isset($_POST['txtImagemPath']) ? $_POST['txtImagemPath'] : false;

            //validar o preenchimento 
            if (trim($id!="")) {
                $l->setIdLogin($id);
            }
            if (!$login || trim($login) == "") {
                throw new Exception ("O campo login é obrigatório");
            }
            if (!$senha || trim($senha) == "") {
                throw new Exception ("O campo senha é obrigatório");
            }
            if (!$acesso || trim($acesso) == "") {
                throw new Exception ("O campo acesso é obrigatório");
            }
            if (!$unidade || trim($unidade) == "") {
                throw new Exception ("O campo unidade é obrigatório");
            }
            
            //gravar no banco de dados
            $l->setLogin($login);
            $l->setSenha($senha);
            $l->setFilePath($imagem_path);
            $l->setAcesso($acesso);
            $l->setUnidade($unidade);
            
            $du = new DaoLogin();
            $usu = $du->salvar($l);
            if ($usu instanceof Login) {
                header("location: ".MAINURL."controle-login/lista-de-login");
            } else {
                echo "Não foi possível salvar o login do usuário";
            }
        }

        public function excluir($id) {
            echo 'excluir login = '. $id;
        }

        public function confirmaExclusao() {
            echo 'confirmaExclusao';
        }
}

?>
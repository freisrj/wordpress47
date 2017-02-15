<?php

namespace App\To;

class ControleUsuario {

    public function validaUsuario() {

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
        $u = new Usuario();
        $u->setLogin($login);
        $u->setSenha($senha);
        //echo 'ControleUsuario.validaUsuario.login = '. $login . '<br />';
        //echo 'ControleUsuario.validaUsuario.senha = '. $senha . '<br />';
        
        $du = new DaoUsuario();
        // Lista o registro de usuário
        $usuarios = $du->listar($u);
        // Instancia a Gui de usuário
        $view = new TGui ("validaUsuario.php");
        //echo 'ControleUsuario.validaUsuario - '. print_r($view) . '<br />';
        //echo 'tamanho do usuarios = '.count($usuarios);
        $view->addDados ("usuarios",$usuarios);
        $view->renderizar();
    }
    
    public function listaDeUsuario() {
        //echo 'Entrei no listaDeUsuario<br />';
        // cria objeto de dados de usuário
        $du = new DaoUsuario();
        // Lista todos os registros de usuário
        $usuarios = $du->listarTodos();
        $view = new TGui ("listaDeUsuarios.php");
        //echo 'ControleUsuario.listaDeUsuario - '. print_r($view) . '<br />';
        $view->addDados ("usuarios",$usuarios);
        $view->renderizar();
    }

    public function editar($id) {
        //echo 'editar usuário = '. $id;
        // recupera somente o id, já que recebe um array
        $p1 = $id[2];
        // cria objeto de dados de usuário
        $du = new DaoUsuario();
        // Lista o registro de usuário
        $u = $du->listar($p1);
        // Instancia a Gui de usuário
        $view = new TGui ("formularioUsuario.php");
        //echo 'ControleUsuario.editar - '. print_r($view) . '<br />';
        $view->addDados ("usuario",$u);
        $view->renderizar();
    }

    public function novo() {
        //echo 'novo usuário';
        // recupera somente o id, já que recebe um array
        //$p1 = $id[2];
        // cria objeto de dados de usuário
        $u = new Usuario();
        // Lista todos os registros de usuário
        //$u = $du->listar($p1);
        // Instancia a Gui de usuário
        $view = new TGui ("formularioUsuario.php");
        //echo 'ControleUsuario.editar - '. print_r($view) . '<br />';
        $view->addDados ("usuario",$u);
        $view->renderizar();
    }

    public function salvar() {
        //echo 'salvar';
        //print_r($_POST);
        
        $u = new Usuario();
        $id = isset($_POST['txtIdUsuario']) ? $_POST['txtIdUsuario'] : false;
        $nome = isset($_POST['txtNomeUsuario']) ? $_POST['txtNomeUsuario'] : false;
        $email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : false;
        $login = isset($_POST['txtLogin']) ? $_POST['txtLogin'] : false;
        $senha = isset($_POST['txtSenha']) ? $_POST['txtSenha'] : false;
        $status = isset($_POST['txtStatus']) ? $_POST['txtStatus'] : false;
        $imagem = isset($_POST['txtImagem']) ? $_POST['txtImagem'] : false;
        //$created = isset($_POST['txtIdUsuario']) ? $_POST['txtIdUsuario'] : false;
        //$modified = isset($_POST['txtIdUsuario']) ? $_POST['txtIdUsuario'] : false;

        //validar o preenchimento 
        if (trim($id!="")) {
            $u->setIdUsuario($id);
        }
        if (!$nome || trim($nome) == "") {
            throw new Exception ("O campo nome é obrigatório");
        }
        if (!$email || trim($email) == "") {
            throw new Exception ("O campo e-mail é obrigatório");
        }
        if (!$login || trim($login) == "") {
            throw new Exception ("O campo login é obrigatório");
        }
        if (!$senha || trim($senha) == "") {
            throw new Exception ("O campo senha é obrigatório");
        }
        
        //gravar no banco de dados
        $u->setNomeUsuario($nome);
        $u->setEmail($email);
        $u->setLogin($login);
        $u->setSenha($senha);
        $u->setFilePath($imagem);
        $u->setStatus($status);
        
        $du = new DaoUsuario();
        $usu = $du->salvar($u);
        if ($usu instanceof Usuario) {
            header("location: ".MAINURL."controle-usuario/lista-de-usuario");
        } else {
            echo "Não foi possível salvar o usuário";
        }
    }

    public function excluir($id) {
        echo 'excluir usuário = '. $id;
    }

    public function confirmaExclusao() {
        echo 'confirmaExclusao';
    }
}

?>
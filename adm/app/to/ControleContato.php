<?php

//namespace To;

class ControleContato {

    public function listaDeContato() {
        //echo 'Entrei no listaDeContato<br />';
        // cria objeto de dados de usuário
        $dc = new DaoContato();
        // Lista todos os registros de usuário
        $contatos = $dc->listarTodos();
        $view = new TGui ("listaDeContatos.php");
        //echo 'ControleContato.listaDeContato - '. print_r($view) . '<br />';
        $view->addDados ("contatos",$contatos);
        $view->renderizar();
    }

    public function editar($id) {
        //echo 'editar usuário = '. $id;
        // cria objeto de dados de usuário
        $contato = new Contato();
        $dc = new DaoContato();

        // recupera somente o id, já que recebe um array
        $contato->setIdContato($id[2]);

        // Lista o registro de usuário
        $contatos = $dc->listar($contato);
        // Instancia a Gui de usuário
        $view = new TGui ("formularioContato.php");
        //echo 'ControleContato.editar - '. print_r($view) . '<br />';
        $view->addDados ("contato",$contatos);
        $view->renderizar();
    }

    public function novo() {
        //echo 'novo usuário';
        // recupera somente o id, já que recebe um array
        //$p1 = $id[2];
        // cria objeto de dados de usuário
        $contato = new Contato();
        // Lista todos os registros de usuário
        //$u = $dc->listar($p1);
        // Instancia a Gui de usuário
        $view = new TGui ("formularioContato.php");
        //echo 'ControleContato.editar - '. print_r($view) . '<br />';
        $view->addDados ("contato",$contato);
        $view->renderizar();
    }

    public function salvar() {
        //echo 'salvar';
        //print_r($_POST);
        
        $id = isset($_POST['txtIdContato']) ? $_POST['txtIdContato'] : false;
        $nome = isset($_POST['txtNomeContato']) ? $_POST['txtNomeContato'] : false;
        $email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : false;
        $webmail = isset($_POST['txtWebmail']) ? $_POST['txtWebmail'] : false;
        $mensagem = isset($_POST['txtMensagem']) ? $_POST['txtMensagem'] : false;
        $data = isset($_POST['txtData']) ? $_POST['txtData'] : false;
        $resposta = isset($_POST['txtResposta']) ? $_POST['txtResposta'] : false;
        $dataResposta = isset($_POST['txtDataResposta']) ? $_POST['txtDataResposta'] : false;

        //validar o preenchimento 
        if (trim($id!="")) {
            $contato->setIdContato($id);
        }
        if (!$nome || trim($nome) == "") {
            throw new Exception ("O campo nome é obrigatório");
        }
        if (!$email || trim($email) == "") {
            throw new Exception ("O campo e-mail é obrigatório");
        }
        if (!$webmail || trim($webmail) == "") {
            throw new Exception ("O campo webmail é obrigatório");
        }
        if (!$mensagem || trim($mensagem) == "") {
            throw new Exception ("O campo mensagem é obrigatória");
        }
        
        //gravar no banco de dados
        $contato = new Contato();
        $contato->setNome($nome);
        $contato->setEmail($email);
        $contato->setWebmail($webmail);
        $contato->setMensagem($mensagem);
        $contato->setData($data);
        $contato->setResposta($resposta);
        $contato->setDataResposta($dataResposta);
        
        $dc = new DaoContato();
        $cont = $dc->salvar($contato);
        if ($cont instanceof Contato) {
            header("location: ".MAINURL."controle-contato/lista-de-contato");
        } else {
            echo "Não foi possível salvar o contato";
        }
    }

    public function excluir($id) {
        $contato = new Contato();
        
        // recupera somente o id, já que recebe um array
        $contato->setIdContato($id[2]);

        // Lista o registro de usuário
        $dc = new DaoContato();
        $contatos = $dc->excluir($contato);
        
        // Instancia a Gui de usuário
        $view = new TGui ("formularioContato.php");
        
        //echo 'ControleContato.editar - '. print_r($view) . '<br />';
        //$view->addDados ("contato",$contatos);
        //$view->renderizar();
  }

    public function confirmaExclusao() {
        echo 'confirmaExclusao';
    }
}

?>
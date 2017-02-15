<?php

namespace App;

Class TGui{

    private $nome;
    private $dados;
    
    public function __construct($nome) {
        $this->nome = $nome;
        $this->dados = array();
    }
    
    public function setNome($nome) {
        $this->nome = $nome;
        $this->dados = array();
    }
    
    public function renderizar() {
        //echo 'TGui.renderizar - '. $this->nome . '<br />';
        if (file_exists("./gui/" . $this->nome)) {
            include_once "./gui/" . $this->nome;
        } else {
            // erro
        }
    }
    
    public function getDados($objeto = false) {
        if (!$objeto) {
            return $this->dados;    
        } else {
            return isset($this->dados[$objeto]) ? $this->dados[$objeto] : false;
        }
    }

    public function addDados($nome, $dado) {
        $this->dados[$nome] = $dado;
    }
}

?>
<?php

//namespace Interfaces;

interface IDaoContato {
    public function listar(Contato $c);
    public function listarTodos();
    public function salvar(Contato $c);
    public function excluir(Contato $c);
}

?>
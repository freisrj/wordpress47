<?php

//namespace Interfaces;

interface IDaoLogin {
    public function listar(Login $l);
    public function listarTodos();
    public function salvar(Login $l);
    public function excluir(Login $l);
}

?>
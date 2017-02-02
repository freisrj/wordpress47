<?php

interface IDao {
    //public function listar($pId);
    public function listar(Usuario $u);
    public function listarTodos();
    public function salvar(Usuario $u);
    public function excluir(Usuario $u);
}

?>
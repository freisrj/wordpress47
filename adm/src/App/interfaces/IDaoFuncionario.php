<?php

namespace App\Interfaces;

interface IDaoFuncionario {
    public function listar(Funcionario $f);
    public function listarTodos();
    public function salvar(Funcionario $f);
    public function excluir(Funcionario $f);
}

?>
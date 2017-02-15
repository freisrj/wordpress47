<?php

//namespace Dao;

class DaoFuncionario implements IDaoFuncionario{

    public function listar(Funcionario $f) {

        $id_fun = $f->getIdFun();
        $nome = $f->getNome();
        $apelido = $f->getApelido();
        $telefone = $f->getTelefone();
        $celular = $f->getCelular();
        $funcao = $f->getFuncao();
        $endereco = $f->getEndereco();
        $bairro = $f->getBairro();
        $cidade = $f->getCidade();
        $cep = $f->getCep();
        $uf = $f->getUf();
        $imagem = $f->getImagem();
        $imagem_path = $f->getImagemPath();

        $sql = "SELECT id_fun, apelido, nome, telefone, celular, endereco, bairro, funcao, cidade, cep, uf, imagem, imagem_path
                FROM funcionarios 
                WHERE 1=1 ";
        
        //echo '1. DaoFuncionario.listar.sql = '. $sql . '<br />';

        if ($id_fun !== null) { $sql .= "AND id_fun = :ID_FUN ";}
        if ($apelido !== null) { $sql .= "AND apelido = :APELIDO ";}
        if ($nome !== null) { $sql .= "AND nome = :NOME ";}
        if ($telefone !== null) { $sql .= "AND telefone = :TELEFONE ";}
        if ($celular !== null) { $sql .= "AND celular = :CELULAR ";}
        if ($endereco !== null) { $sql .= "AND endereco = :ENDERECO ";}
        if ($bairro !== null) { $sql .= "AND bairro = :BAIRRO ";}
        if ($funcao !== null) { $sql .= "AND funcao = :FUNCAO ";}
        if ($cidade !== null) { $sql .= "AND cidade = :CIDADE ";}
        if ($cep !== null) { $sql .= "AND cep = :CEP ";}
        if ($uf !== null) { $sql .= "AND uf = :UF ";}
        if ($imagem !== null) { $sql .= "AND imagem = :IMAGEM ";}
        if ($imagem_path !== null) { $sql .= "AND imagem_path = :IMAGEM_PATH ";}
        
        //echo '2. DaoFuncionario.listar.sql = '. $sql . '<br />';
        //echo '2. DaoFuncionario.listar.id_fun = '. $id_fun . '<br />';
        
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);

        if ($id_fun !== null) { $sth->bindParam("ID_FUN",$id_fun);}
        if ($apelido !== null) { $sth->bindParam("APELIDO",$apelido);}
        if ($nome !== null) { $sth->bindParam("NOME",$nome);}
        if ($telefone !== null) { $sth->bindParam("TELEFONE",$telefone);}
        if ($celular !== null) { $sth->bindParam("CELULAR",$celular);}
        if ($endereco !== null) { $sth->bindParam("ENDERECO",$endereco);}
        if ($bairro !== null) { $sth->bindParam("BAIRRO",$bairro);}
        if ($cidade !== null) { $sth->bindParam("CIDADE",$cidade);}
        if ($funcao !== null) { $sth->bindParam("FUNCAO",$funcao);}
        if ($cep !== null) { $sth->bindParam("CEP",$cep);}
        if ($uf !== null) { $sth->bindParam("UF",$uf);}
        if ($imagem !== null) { $sth->bindParam("IMAGEM",$imagem);}
        if ($imagem_path !== null) { $sth->bindParam("IMAGEM_PATH",$imagem_path);}

        try {
            $sth->execute();
        } catch(Exception $e) {
            echo $e->getMessage();
        }
        $arFuncionarios = array();
        while ($fun = $sth->fetchObject("Funcionario")) {
            $arFuncionarios[] = $fun; 
            //echo 'tamanho do logins = '.count($fun);
            //echo '$arFuncionarios [0]->getIdFun() = '.$arFuncionarios[0]->getIdFun().'<br />';
            //echo '$arFuncionarios [0]->getNome() = '.$arFuncionarios[0]->getNome().'<br />';
        }
        return $arFuncionarios;
    }

    public function listarTodos() {
        
        $sql = "SELECT id_fun, apelido, nome, telefone, celular, endereco, bairro, funcao, cidade, cep, uf, imagem, imagem_path
                FROM funcionarios ";

        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        try {
            $sth->execute();
        } catch(Exception $e) {
            echo $e->getMessage();
        }
        $arFuncionarios = array();
        while ($fun = $sth->fetchObject("Funcionario")) {
            $arFuncionarios[] = $fun; 
        }
        return $arFuncionarios;
    }
    
    public function salvar(Funcionario $f) {

        $id_fun = $f->getIdFun();
        $nome = $f->getNome();
        $apelido = $f->getApelido();
        $telefone = $f->getTelefone();
        $celular = $f->getCelular();
        $funcao = $f->getFuncao();
        $endereco = $f->getEndereco();
        $bairro = $f->getBairro();
        $cidade = $f->getCidade();
        $cep = $f->getCep();
        $uf = $f->getUf();
        $imagem = $f->getImagem();
        $imagem_path = $f->getImagemPath();
        
        if ($Id === null) {
            $sql = "INSERT INTO funcionarios
                    ( apelido, nome, telefone, celular, endereco, bairro, funcao, cidade, cep, uf, imagem, imagem_path )
                    VALUES
                    ( :APELIDO, :NOME, :TELEFONE, :CELULAR, :ENDERECO, :BAIRRO, :FUNCAO, :CIDADE, :CEP, :UF, :IMAGEM, :IMAGEM_PATH )";

        } else {
            $sql = "UPDATE funcionarios 
                    SET apelido  = :APELIDO
                      , nome     = :NOME
                      , telefone = :TELEFONE
                      , celular  = :CELULAR
                      , endereco = :ENDERECO
                      , bairro   = :BAIRRO
                      , funcao   = :FUNCAO
                      , cidade   = :CIDADE
                      , cep      = :CEP
                      , uf       = :UF
                      , imagem   = :IMAGEM
                      , imagem_path = :IMAGEM_PATH
                    WHERE id_fun = :ID_FUN ";
        }
        
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $sth->bindParam("APELIDO",$apelido);
        $sth->bindParam("NOME",$nome);
        $sth->bindParam("TELEFONE",$telefone);
        $sth->bindParam("CELULAR",$celular);
        $sth->bindParam("ENDERECO",$endereco);
        $sth->bindParam("BAIRRO",$bairro);
        $sth->bindParam("FUNCAO",$funcao);
        $sth->bindParam("CIDADE",$cidade);
        $sth->bindParam("CEP",$cep);
        $sth->bindParam("UF",$uf);
        $sth->bindParam("IMAGEM",$imagem);
        $sth->bindParam("IMAGEM_PATH",$imagem_path);

        if (strpos($sql,"UPDATE")) {
            $sth->bindParam("ID_FUN",$id_fun);

        }

        try {
            $sth->execute();
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function excluir(Funcionario $f) {
        $sql = "DELETE FROM funcionarios WHERE id_fun = :ID_FUN";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $pId = $f->getIdFun();
        $sth->bindParam("ID_FUN",$pId);
        try {
            $sth->execute();
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }

}

?>
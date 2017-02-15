<?php

//namespace Dao;

class DaoLogin implements IDaoLogin{

    public function listar(Login $l) {

        $id = $l->getId();
        $id_fun = $l->getIdFun();
        $login = $l->getLogin();
        $senha = $l->getSenha();
        $acesso = $l->getAcesso();
        $unidade = $l->getUnidade();

        $sql = "SELECT id, id_fun, login, senha, acesso, unidade 
                FROM s_login 
                WHERE 1=1 ";
        
        //echo '1. DaoLogin.listar.sql = '. $sql . '<br />';

        if ($id !== null) { $sql .= "AND id = :ID ";}
        if ($id_fun !== null) { $sql .= "AND id_fun = :ID_FUN ";}
        if ($login !== null) { $sql .= "AND login = :LOGIN ";}
        if ($senha !== null) { $sql .= "AND senha = :SENHA ";}
        if ($acesso !== null) { $sql .= "AND acesso = :ACESSO ";}
        if ($unidade !== null) { $sql .= "AND unidade = :UNIDADE ";}
        
        //echo '2. DaoLogin.listar.sql = '. $sql . '<br />';
        //echo '2. login = '. $login . '<br />';
        //echo '2. senha = '. $senha . '<br />';
        
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);

        if ($id !== null) { $sth->bindParam("ID",$id);}
        if ($id_fun !== null) { $sth->bindParam("ID_FUN",$id_fun);}
        if ($login !== null) { $sth->bindParam("LOGIN",$login);}
        if ($senha !== null) { $sth->bindParam("SENHA",$senha);}
        if ($acesso !== null) { $sth->bindParam("ACESSO",$acesso);}
        if ($unidade !== null) { $sth->bindParam("UNIDADE",$unidade);}

        try {
            $sth->execute();
        } catch(Exception $e) {
            echo $e->getMessage();
        }
        $arLogins = array();
        while ($log = $sth->fetchObject("Login")) {
            $arLogins[] = $log; 

            //echo 'tamanho do logins = '.count($log);
            //echo '$arLogins [0]->getIdFun() = '.$arLogins[0]->getIdFun().'<br />';

        }
        //echo var_dump($arLogins);
        return $arLogins;
    }

    public function listarTodos() {
        $sql = "SELECT id, id_fun, login, senha, acesso, unidade FROM s_login";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        try {
            $sth->execute();
        } catch(Exception $e) {
            echo $e->getMessage();
        }
        $arLogins = array();
        while ($log = $sth->fetchObject("Login")) {
            $arLogins[] = $log; 
        }
        return $arLogins;
    }
    
    public function salvar(Login $l) {

        //$id = $l->getId();
        $id_fun = $l->getIdFun();
        $login = $l->getLogin();
        $senha = $l->getSenha();
        $acesso = $l->getAcesso();
        $unidade = $l->getUnidade();
        
        if ($Id === null) {
            $sql = "INSERT INTO s_login 
                    ( id_fun, login, senha, acesso, unidade )
                    VALUES
                    ( :ID_FUN, :LOGIN, :SENHA, :ACESSO, :UNIDADE )";

        } else {
            $sql = "UPDATE S_login 
                    SET ID_FUN  = :ID_FUN
                      , login   = :LOGIN
                      , senha   = :SENHA
                      , acesso  = :ACESSO
                      , unidade = :UNIDADE
                    WHERE id = :ID";
        }
        
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $sth->bindParam("ID_FUN",$id_fun);
        $sth->bindParam("LOGIN",$login);
        $sth->bindParam("SENHA",$senha);
        $sth->bindParam("ACESSO",$acesso);
        $sth->bindParam("UNIDADE",$unidade);

        if (strpos($sql,"UPDATE")) {
            $sth->bindParam("ID",$id);

        }

        try {
            $sth->execute();
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function excluir(Login $l) {
        $sql = "DELETE FROM s_login WHERE id = :ID";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $pId = $l->getId();
        $sth->bindParam("ID",$pId);
        try {
            $sth->execute();
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }

}

?>
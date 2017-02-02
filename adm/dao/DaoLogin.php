<?php

class DaoLogin implements IDao{

    public function listar(Login $u) {

        $id = $u->getId();
        $id_fun = $u->getIdFun();
        $login = $u->getLogin();
        $senha = $u->getSenha();
        $acesso = $u->getAcesso();
        $unidade = $u->getUnidade();

        $sql = "SELECT id, id_fun, login, senha, acesso, unidade 
                FROM adm_login 
                WHERE 1=1 ";
        
        //echo '1. DaoLogin.listar.sql = '. $sql . '<br />';

        if ($id !== null) { $sql .= "AND id = :ID ";}
        if ($id_fun !== null) { $sql .= "AND id_fun = :ID_FUN ";}
        if ($login !== null) { $sql .= "AND login = :LOGIN ";}
        if ($senha !== null) { $sql .= "AND senha = :SENHA ";}
        if ($acesso !== null) { $sql .= "AND acesso = :ACESSO ";}
        if ($unidade !== null) { $sql .= "AND unidade = :UNIDADE ";}
        
        //echo '2. DaoLogin.listar.sql = '. $sql . '<br />';
        
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);

        if ($id !== null) { $sth->bindParam("ID",$id);}
        if ($nome !== null) { $sth->bindParam("ID_FUN",$id_fun);}
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
        while ($usu = $sth->fetchObject("Login")) {
            $arLogins[] = $usu; 
            //echo '$aUsu [0] = '.$arLogins[0].'<br />';
            //echo '$aUsu [1] = '.$arLogins[1].'<br />';
            //echo '$aUsu [2] = '.$arLogins[2].'<br />';
        }
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
        while ($usu = $sth->fetchObject("Login")) {
            $arLogins[] = $usu; 
        }
        return $arLogins;
    }
    
    public function salvar(Login $u) {

        //$id = $u->getId();
        $id_fun = $u->getIdFun();
        $login = $u->getLogin();
        $senha = $u->getSenha();
        $acesso = $u->getAcesso();
        $unidade = $u->getUnidade();
        
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
<?php

//namespace Dao;

class DaoContato implements IDaoContato{

    private $order = "id_cot DESC, data DESC";

    public function setOrder($ord){
        $this->order = $ord;
    }

    public function listar(Contato $c) {

        $idCot = $c->getIdCot();
        $webmail = $c->getWebmail();
        $nome = $c->getNome();
        $email = $c->getEmail();
        $mensagem = $c->getMensagem();
        $data = $c->getData();
        $resposta = $c->getResposta();
        $dataResposta = $c->getDataResposta();
        
        $sql = "SELECT id_cot, webmail, nome, email, mensagem, data, resposta, data_resposta
                from wd_contato 
                WHERE 1=1 ".;
        
        //echo '1. DaoContato.listar.sql = '. $sql . '<br />';

        if ($idCot !== null) { $sql .= "AND id_cot = :ID ";}
        if ($nome !== null) { $sql .= "AND nome_usuario = :NOME ";}
        if ($webmail !== null) { $sql .= "AND webmail = :WEBMAIL ";}
        if ($email !== null) { $sql .= "AND email = :EMAIL ";}
        if ($mensagem !== null) { $sql .= "AND mensagem = :MENSAGEM ";}
        if ($data !== null) { $sql .= "AND data = :DATA ";}
        if ($resposta !== null) { $sql .= "AND resposta = :RESPOSTA ";}
        if ($dataResposta !== null) { $sql .= "AND data_resposta = :DATARESPOSTA ";}
        
        $sql .= "ORDER BY ".$this->order;

        //echo '2. DaoContato.listar.sql = '. $sql . '<br />';
        
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);

        if ($idCot !== null) { $sth->bindParam("ID",$idCot);}
        if ($nome !== null) { $sth->bindParam("NOME",$nome);}
        if ($webmail !== null) { $sth->bindParam("WEBMAIL",$webmail);}
        if ($email !== null) { $sth->bindParam("EMAIL",$email);}
        if ($mensagem !== null) { $sth->bindParam("MENSAGEM",$mensagem);}
        if ($data !== null) { $sth->bindParam("DATA",$data);}
        if ($resposta !== null) { $sth->bindParam("RESPOSTA",$resposta);}
        if ($dataResposta !== null) { $sth->bindParam("DATARESPOSTA",$dataResposta);}

        try {
            $sth->execute();
        } catch(Exception $e) {
            echo $e->getMessage();
        }
        $arContatos = array();
        while ($cont = $sth->fetchObject("Contato")) {
            $arContatos[] = $cont; 
            //echo '$aUsu [0] = '.$arContatos[0].'<br />';
            //echo '$aUsu [1] = '.$arContatos[1].'<br />';
            //echo '$aUsu [2] = '.$arContatos[2].'<br />';
        }
        return $arContatos;
    }

    public function listarTodos() {
        $sql = "SELECT id_cot, webmail, nome, email, mensagem, data, resposta, data_resposta
                from wd_contato ";
        $sql .= "ORDER BY ".$this->order;

        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        try {
            $sth->execute();
        } catch(Exception $e) {
            echo $e->getMessage();
        }
        $arContatos = array();
        while ($cont = $sth->fetchObject("Contato")) {
            $arContatos[] = $cont; 
        }
        return $arContatos;
    }
    
    public function salvar(Contato $c) {

        $idCot = $c->getIdCot();
        $webmail = $c->getWebmail();
        $nome = $c->getNome();
        $email = $c->getEmail();
        $mensagem = $c->getMensagem();
        //$data = $c->getData();
        $resposta = $c->getResposta();
        $dataResposta = $c->getDataResposta();
        
        if ($idCot === null) {
            $sql = "INSERT INTO wd_contato 
                    ( nome, webmail, email, mensagem, data, resposta, data_resposta ) 
                    VALUES
                    ( :NOME
                    , :WEBMAIL
                    , :EMAIL
                    , :MENSAGEM
                    , :RESPOSTA
                    , :DATARESPOSTA";

        } else {
            $sql = "UPDATE wd_contato 
                    SET nome     = :NOME
                      , webmail  = :WEBMAIL
                      , email    = :EMAIL
                      , mensagem = :MENSAGEM
                      , resposta = :RESPOSTA
                      , dataresposta = :DATARESPOSTA
                    WHERE id_cot = :ID";
        }
        
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        if ($nome !== null) { $sth->bindParam("NOME",$nome);}
        if ($webmail !== null) { $sth->bindParam("WEBMAIL",$webmail);}
        if ($email !== null) { $sth->bindParam("EMAIL",$email);}
        if ($mensagem !== null) { $sth->bindParam("MENSAGEM",$mensagem);}
        //if ($data !== null) { $sth->bindParam("DATA",$data);}
        if ($resposta !== null) { $sth->bindParam("RESPOSTA",$resposta);}
        if ($dataResposta !== null) { $sth->bindParam("DATARESPOSTA",$dataResposta);}

        if (strpos($sql,"UPDATE")) {
            $sth->bindParam("ID",$id);

        }

        try {
            $sth->execute();
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function excluir(Contato $c) {
        $sql = "DELETE FROM wd_contato WHERE id_cot = :ID";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);

        $pId = $c->getIdCot();
        $sth->bindParam("ID",$pId);

        try {
            $sth->execute();
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }

}

?>
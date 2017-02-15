<?php
//require_once "libs/Conexao.php";
//require_once "model/Funcionario.php";

namespace App\Model;

//class Contato extends Conexao{
class Contato {
    
    /** @var int */
    private $idCot;

    /** @var int */
    private $webmail;

    /** @var string */
    private $nome;

    /** @var string */
    private $email;

    /** @var longtext */
    private $mensagem;

    /** @var date */
    private $data;

    /** @var longtext */
    private $resposta;

    /** @var date */
    private $dataResposta;    

    // Padrao camelCase
    public function __construct() {
        //$this->id = null;
        //$this->funcionario = new Funcionario();
    }
        
    public function setIdCot($idCot){
        $this->idCot = $idCot;
    }
    public function setWebmail($webmail){
        $this->webmail = $webmail;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setMensagem($mensagem){
        $this->mensagem = $mensagem;
    }
    public function setData($data){
        $this->data = $data;
    }
    public function setResposta($resposta){
        $this->resposta = $resposta;
    }
    public function setDataResposta($dataResposta){
        $this->dataResposta = $dataResposta;
    }
    
    
    public function getIdCot(){
        return $this->idCot;
    }
    public function getWebmail(){
        return $this->webmail;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getMensagem(){
        return $this->mensagem;
    }
    public function getData(){
        return $this->data;
    }
    public function getResposta(){
        return $this->resposta;
    }
    public function getDataResposta(){
        return $this->dataResposta;
    }
}
    
<?php
//require_once "libs/Conexao.php";
//require_once "model/Funcionario.php";

namespace App\Model;

//class Login extends Conexao{

class Login {

    private $id;
	private $id_fun;
    private $login;
    private $senha;
    private $acesso;
	private $unidade;
    private $funcionario;
    
    // Padrao camelCase
    public function __construct() {
        //$this->id = null;
        //$this->funcionario = new Funcionario();
    }
        
    public function setId($id){
        $this->id = $id;
    }
    public function setIdFun($id_fun){
        $this->id_fun = $id_fun;
    }
    public function setLogin($login){
        $this->login = $login;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function setAcesso($acesso){
        $this->acesso = $acesso;
    }
    public function setUnidade($unidade){
        $this->unidade = $unidade;
    }
    public function setFuncionario($funcionario){
        $this->funcionario = $funcionario;
    }
    
    
    public function getId(){
        return $this->id;
    }
    public function getIdFun(){
        return $this->id_fun;
    }
    public function getLogin(){
        return $this->login;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getAcesso(){
        return $this->acesso;
    }
    public function getUnidade(){
        return $this->unidade;
    }
    public function getFuncionario(){
        return $this->funcionario;
    }
}
    
<?php
//require_once "libs/Conexao.php";

class Usuario { //extends Conexao{
    
    private $id_usuario;
	private $nome_usuario;
    private $email;
    private $login;
    private $senha;
    private $imagem_path;
	private $status;
	private $created; 
	private $modified;
    
    // Padrao camelCase
    public function __construct() {
        //$this->id_usuario = null;
    }
        
    public function setIdUsuario($id){
        $this->id_usuario = $id;
    }
    public function setNomeUsuario($nome){
        $this->nome_usuario = $nome;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setLogin($login){
        $this->login = $login;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function setImagemPath($imagem_path){
        $this->imagem_path = $imagem_path;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    public function setCreated($dataBR){
        //$this->created = $this->dteToUS($dataBR);
        $this->created = $dataBR;
    }
    public function setModified($dataBR){
        //$this->modified = $this->dteToUS($dataBR);
        $this->modified = $dataBR;
    }
    
    
    public function getIdUsuario(){
        return $this->id_usuario;
    }
    public function getNomeUsuario(){
        return $this->nome_usuario;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getLogin(){
        return $this->login;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getImagemPath(){
        return $this->imagem_path;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getCreated(){
        return $this->created;
    }
    public function getModified(){
        return $this->modified;
    }
/*
    public function getCreated($us=false){
        if ($us){
            return $this->created;
        }else {
            return $this->dateToBR(created);
        }
    }
    public function getModified($us=false){
        if ($us){
            return $this->modified;
        }else {
            return $this->dateToBR(modified);
        }
    }
*/
}
    
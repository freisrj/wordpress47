<?php
//namespace Model;

//class Funcionario extends Conexao{
class Funcionario {
    
    private $id_fun;
	private $nome;
    private $apelido;
    private $telefone;
    private $celular;
	private $funcao;
	private $endereco; 
	private $bairro;
    private $cidade;
    private $cep;
    private $uf;
    private $imagem;
    private $imagem_path;
    
    // Padrao camelCase
    public function __construct() {
        //$this->id_usuario = null;
    }
        
    public function setIdFun($idf){
        $this->id_fun = $idf;
    }
    public function setNome($nome){
        $this->nome_usuario = $nome;
    }
    public function setApelido($apelido){
        $this->apelido = $apelido;
    }
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    public function setCelular($celular){
        $this->celular = $celular;
    }
    public function setFuncao($funcao){
        $this->funcao = $funcao;
    }
    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
    public function setBairro($bairro){
        $this->bairro = $bairro;
    }
    public function setCidade($cidade){
        $this->cidade = $cidade;
    }
    public function setCep($cep){
        $this->cep = $cep;
    }
    public function setUf($uf){
        $this->uf = $uf;
    }
    public function setImagem($imagem){
        $this->imagem = $imagem;
    }
    public function setImagemPath($imagem_path){
        $this->imagem_path = $imagem_path;
    }
    
    
    public function getIdFun(){
        return $this->id_fun;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getApelido(){
        return $this->apelido;
    }
    public function getTelefone(){
        return $this->telefone;
    }
    public function getCelular(){
        return $this->celular;
    }
    public function getFuncao(){
        return $this->funcao;
    }
    public function getEndereco(){
        return $this->endereco;
    }
    public function getBairro(){
        return $this->bairro;
    }
    public function getCidade(){
        return $this->cidade;
    }
    public function getCep(){
        return $this->cep;
    }
    public function getUf(){
        return $this->uf;
    }
    public function getImagem(){
        return $this->imagem;
    }
    public function getImagemPath(){
        return $this->imagem_path;
    }
}
    
<?php

$id_usuario = "";
$nome_usuario = "";
$email = "";
$login = "";
$senha = "";
$imagem_path = "";
$status = "";
$created = "";
$modified = "";


$usuario = $this->getDados("usuario");
//echo print_r($usuario);

if ($usuario){
    $usuario instanceof Usuario;
    $id_usuario     = $usuario->getIdUsuario();
    $nome_usuario   = $usuario->getNomeUsuario();
    $email          = $usuario->getEmail();
    $login          = $usuario->getLogin();
    $senha          = $usuario->getSenha();
    $imagem_path    = $usuario->getImagemPath();
    $status         = $usuario->getStatus();
    //$created        = $usuario->getCreated();
    //$modified       = $usuario->getModified();
}
?> 

<form method"post" action="<?php echo MAINURL;?>controle-usuario/salvar">
    <label>Id</label>
    <input type="text" readonly="true" name="txtIdUsuario" value="<?php echo $id_usuario;?>"><br /> 
    <label>Nome</label>
    <input type="text" readonly="false" name="txtNomeUsuario" value="<?php echo $nome_usuario;?>"><br /> 
    <label>Email</label>
    <input type="text" readonly="false" name="txtEmail" value="<?php echo $email;?>"><br /> 
    <label>Login</label>
    <input type="text" readonly="false" name="txtLogin" value="<?php echo $login;?>"><br /> 
    <label>Senha</label>
    <input type="password" readonly="false" name="txtSenha" value="<?php echo $senha;?>"><br /> 
    <label>Imagem</label>
    <input type="text" readonly="false" name="txtImagem" value="<?php echo $imagem_path;?>"><br /> 
    <label>Status</label>
    <input type="text" readonly="true" name="txtStatus" value="<?php echo $status;?>"><br /> 
    <label>Criado em</label>
    <input type="text" readonly="true" name="txtCreated" value="<?php echo $created;?>"><br /> 
    <label>Última modificação em</label>
    <input type="text" readonly="true" name="txtModified" value="<?php echo $modified;?>"><br /> 
    
    <input type="submit" value="Salvar">
    <a href="<?php echo MAINURL;?>controle-usuario/lista-de-usuario/">Voltar</a>

</form>
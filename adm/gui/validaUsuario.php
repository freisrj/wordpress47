<?php
session_start();

// como o método listar(usuário) já foi chamado basta pegar o resultado da lista e colocar em um objeto
$aUsu = $this->getDados("usuarios");
//echo print_r($aUsu);
    
if ($aUsu) {

    foreach($aUsu as $usuario) {

        $usuario instanceof Usuario;

        if ($usuario){
            //Alimenta as informações na variável de sessão
            $_SESSION ['Usuario']			= $usuario->getLogin();
            $_SESSION ['Nome']				= $usuario->getNomeUsuario();
            $_SESSION ['Email']				= $usuario->getEmail();
            $_SESSION ['Id_usuario']		= $usuario->getIdUsuario();
            $_SESSION ['Status']			= $usuario->getStatus();
            $_SESSION ['Imagem_path']		= $usuario->getImagemPath();
            $_SESSION ['Created']			= $usuario->getCreated();
            $_SESSION ['Modified']			= $usuario->getModified();

            //echo $_SESSION ['Nome'].' - '.$_SESSION ['Email'].' - '.$_SESSION ['Id_usuario'].' - '.$_SESSION ['Created'].' - '.$_SESSION ['Imagem_path'].'<br />';
            //echo $_SESSION ['Id_nivel_acesso'].' - '.$_SESSION ['Nome_nivel_acesso'].'<br />';

            // Manda para a área administrativa
            Header ("Location: ".MAINURL."index.php");
            
        } 
    }
} else {

	//Variável de sessão - Erro de Login
	$_SESSION ['loginErro'] = "Usuário ou senha inválido.";

//	echo $_SESSION ['loginErro'];
	
	// Manda de volta para a área de login
	Header ("Location: ".MAINURL."login.php");
}

?>


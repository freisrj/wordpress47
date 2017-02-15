<?php
session_start();
echo 'Id_usuario = '. $_SESSION ['Id_usuario']. '<br />';
    
// Avalia se a PK de usuário foi carregada na validacao do login
if (empty("$_SESSION ['Id']") || $_SESSION ['Id'] == "") {

	//Variável de sessão - Erro de Login
	$_SESSION ['loginErro'] = "Área restrita para usuários cadastrados.";
	//session_commit();

	// Limpa todas as variaveis de login por segurança
    unset($_SESSION ['Id']);
    unset($_SESSION ['Id_fun']);
    unset($_SESSION ['Login']);
    unset($_SESSION ['Senha']);
    unset($_SESSION ['Acesso']);
    unset($_SESSION ['Unidade']);

    unset($_SESSION ['Nome']);
    unset($_SESSION ['Funcao']);
    unset($_SESSION ['Imagem_path']);


	// Manda de volta para a área de login
	Header ("Location: ".MAINURL."controle-login/login");
	//echo '<script> location.replace("'.MAINURL.'controle-login/login)"; </script>';

}
?>

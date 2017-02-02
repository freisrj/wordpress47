<?php
session_start();
//echo 'Id_usuario = '. $_SESSION ['Id_usuario']. '<br />';
    
// Avalia se a PK de usuário foi carregada na validacao do login
if (empty("$_SESSION ['Id']") || $_SESSION ['Id'] == "") {

	//Variável de sessão - Erro de Login
	$_SESSION ['loginErro'] = "Área restrita para usuários cadastrados.";
	//session_commit();

	// Limpa todas as variaveis de login por segurança
	unset($_SESSION ['id']); // login
	unset($_SESSION ['Nome']);
	unset($_SESSION ['Email']);
	unset($_SESSION ['Id_fun']);
	unset($_SESSION ['acesso']);
	unset($_SESSION ['Imagem_path']);

	// Manda de volta para a área de login
	Header ("Location: ./index.php");
}
?>

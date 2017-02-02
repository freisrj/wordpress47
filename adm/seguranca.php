<?php
session_start();
	
// Avalia se a PK de usuário foi carregada na validacao do login
if (empty("$_SESSION ['Id']") || $_SESSION ['Id'] == "") {

	//Variável de sessão - Erro de Login
	$_SESSION ['loginErro'] = "Área restrita para usuários cadastrados.";
	//session_commit();

	// Limpa todas as variaveis de login por segurança
	unset($_SESSION ['Unidade']);
	unset($_SESSION ['Usuario']);
	unset($_SESSION ['Nome']);
	unset($_SESSION ['Funcao']);
	unset($_SESSION ['Apelido']);
	unset($_SESSION ['Id_nivel_acesso']);
	unset($_SESSION ['Id']);
	unset($_SESSION ['Imagem_path']);

	// Manda de volta para a área de login
	Header ("Location: index.php");
}
?>

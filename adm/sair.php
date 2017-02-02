<?php

session_start();
	
//Variável de sessão - Erro de Login
unset($_SESSION ['loginErro']);

// Limpa todas as variaveis de login por segurança
unset($_SESSION ['Usuario']);
unset($_SESSION ['Nome']);
unset($_SESSION ['Email']);
unset($_SESSION ['Id_usuario']);
unset($_SESSION ['Id_nivel_acesso']);
unset($_SESSION ['Nome_nivel_acesso']);
unset($_SESSION ['Created']);
unset($_SESSION ['Imagem_path']);

// Manda de volta para a área de login
Header ("Location: \Admin\index.php");

?>

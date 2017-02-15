<?php

unset($_SESSION ['Id']);
unset($_SESSION ['Id_fun']);
unset($_SESSION ['Login']);
unset($_SESSION ['Senha']);
unset($_SESSION ['Acesso']);
unset($_SESSION ['Unidade']);

unset($_SESSION ['Nome']);
unset($_SESSION ['Funcao']);
unset($_SESSION ['Imagem_path']);

unset($_SESSION ['loginErro']);

// Manda de volta para a área de login
Header ("Location: ".MAINURL."controle-login/login");
//echo '<script> location.replace("'.MAINURL.'controle-login/login)"; </script>';

?>
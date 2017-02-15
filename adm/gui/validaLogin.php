<?php
$_SESSION ['loginErro'] = "";

// como o método listar(login) já foi chamado basta pegar o resultado da lista e colocar em um objeto
$aLogin = $this->getDados("logins");
//echo print_r($aLogin[0]);
//var_dump($aLogin);
    
if (count($aLogin)>0) {

    //echo 'entrei no if (count($aLogin)>0) <br/>';

    foreach($aLogin as $login) {

        $login instanceof Login;

        if ($login){
            //Alimenta as informações na variável de sessão
            $_SESSION ['Id']         = $login->getId();
            $_SESSION ['Id_fun']     = $login->getIdFun();
            $_SESSION ['Login']		 = $login->getLogin();
            $_SESSION ['Senha']		 = $login->getSenha();
            $_SESSION ['Acesso']	 = $login->getAcesso();
            $_SESSION ['Unidade']	 = $login->getUnidade();

            $_SESSION ['Nome']       = $login->getFuncionario()->getNome();
            $_SESSION ['Funcao']     = $login->getFuncionario()->getFuncao();
            $_SESSION ['Imagem_path']= $login->getFuncionario()->getImagemPath();

            //echo $_SESSION ['Nome'].' - '.$_SESSION ['Email'].' - '.$_SESSION ['Login'].' - '.$_SESSION ['Senha'].' - '.$_SESSION ['Acesso'].'<br />';
            //echo $_SESSION ['Id'].' - '.$_SESSION ['Id_fun'].'<br />';

            // Manda para a área administrativa
            //Header ("Location: ".MAINURL."controle-login/principal");
            //echo '"'.MAINURL.'controle-login/principal"';
            echo '<script> location.replace("'.MAINURL.'controle-login/principal"); </script>';
            
        } 
    }
} else {

	//Variável de sessão - Erro de Login
	$_SESSION ['loginErro'] = "Usuário ou senha inválido.";

//	echo $_SESSION ['loginErro'];
	
	// Manda de volta para a área de login
	//Header ("Location: ".MAINURL."controle-login/login");
    echo '<script> location.replace("'.MAINURL.'controle-login/login)"; </script>';
}

?>


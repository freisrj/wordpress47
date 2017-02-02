<?php
session_start();

define( 'MAINURL', dirname( __FILE__ ) );
define( 'DS', DIRECTORY_SEPARATOR );

//echo MAINURL . DS. 'libs/Conexao.php';

require_once ( MAINURL . DS. 'libs/Conexao.php');
$Usuario = $_POST["usuario"];
$Senha = $_POST["senha"];

use Libs\Conexao;
$conn = new Conexao();
//$conn->getConexao(); 

echo $Usuario.' - '.$Senha.'<br>';

	// Forma BIND de chamada SELECT
	//$sql1 = "SELECT  l.id_fun, l.unidade, l.acesso, f.nome
 //                FROM s_login as l
 //                INNER JOIN funcionarios f WHERE f.id_fun= l.id_fun
 //                WHERE l.login=:pLogin AND l.senha=:pSenha  LIMIT 1";
	// $query = $conn->prepare($sql1);
	// $query->execute(array(':pLogin'	=> $Usuario,
	// 					  ':pSenha'	=> $Senha));
	// //
	
	//echo $query->rowCount();
	//echo '<pre>', print_r($query->fetch(PDO::FETCH_ASSOC)), '</pre>';
	//while ($resultado = $query->fetch(PDO::FETCH_ASSOC)) {
/*
try {


	
	if ($query->rowCount()) {

		$resultado = $query->fetch(PDO::FETCH_ASSOC);

		//Variável de sessão
		$_SESSION ['Unidade']			= $resultado['unidade'];
		$_SESSION ['Usuario']			= $Usuario;
		$_SESSION ['Nome']				= $resultado['nome'];
		$_SESSION ['Funcao']			= $resultado['funcao'];
		$_SESSION ['Apelido']			= $resultado['apelido']
		$_SESSION ['Id']				= $resultado['id_fun'];
		$_SESSION ['Id_nivel_acesso']	= $resultado['acesso'];
		$_SESSION ['Imagem_path']		= $resultado['imagem_path'];
		
		//echo $_SESSION ['Nome'].' - '.$_SESSION ['Email'].' - '.$_SESSION ['Id_usuario'].' - '.$_SESSION ['Created'].' - '.$_SESSION ['Imagem_path'].'<br />';
		//echo $_SESSION ['Id_nivel_acesso'].' - '.$_SESSION ['Nome_nivel_acesso'].'<br />';

		
		// Recuperar a imagem do usuário
		//$user_select2 = "SELECT imagem FROM adm_usuario WHERE id_usuario = ".$_SESSION ['Id_usuario']." LIMIT 1";
		//$result2 = mysql_query ($user_select2, GetMyConnection());
		//$resultado2 = mysql_fetch_object($result2);
		//$_SESSION ['Imagem'] = $resultado2->imagem;
		
		
		// Manda para a área administrativa
		Header ("Location: .\index2.php");
		
	}
	else {

		//Variável de sessão - Erro de Login
		$_SESSION ['loginErro'] = "Usuário ou senha inválido.";
		
		// Manda de volta para a área de login
		Header ("Location: .\index.php");
	}


}
catch (PDOException $e) {
	//Variável de sessão - Erro de Login
	$_SESSION ['loginErro'] = "Erro na validação do usuário.";
	
	// Manda de volta para a área de login
	Header ("Location: .\index.php");
}
*/


// Nao está validando ainda e remete direto
Header ("Location: .\index2.php");


?>


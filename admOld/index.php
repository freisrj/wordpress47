<?php session_start();
session_destroy();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adminstrador WDinfo</title>
<link rel="stylesheet" type="text/css" href="css/index.css" />
</head>
<body>
	<div align="center">
		<form action="index1.php" method="post" onsubmit="valAcesso()">
		<div class="acesso">
        	<img src="images/nlogocomp.png" width="450" >
            <br />
			<h3>Acesso ao Adminstrador</h3>
			Login:&nbsp;&nbsp;<input type="text" name="login" size="20" maxlength="10" /><br />
			Senha:&nbsp;&nbsp;<input type="password" name="senha" size="20" maxlength="8" /><br />
            <br \> 
            <button><img src="images/botao_entrar.png" /></button>
			<a href="index.php"></a>
		</div>
		</form>
</div>
</body>
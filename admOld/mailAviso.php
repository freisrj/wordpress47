<?
//header('Content-Type: text/html; charset=utf-8', true);

$imagem_nome="../imgs/emailAuto.jpg"; // aqui vai o enderço da imagem no computaque envia
$arquivo=fopen($imagem_nome,'r');
$contents = fread($arquivo, filesize($imagem_nome));
$encoded_attach = chunk_split(base64_encode($contents));
fclose($arquivo);
$limitador = "_=======". date('YmdHms'). time() . "=======_";

$mailheaders = "From: wandall@wdinfo.com.br\r\n";
$mailheaders .= "MIME-version: 1.0\r\n";
$mailheaders .= "Content-type: multipart/related; boundary=\"$limitador\"\r\n";
$cid = date('YmdHms').'.'.time();

$assunto = "Boleto de Pagamento";
$texto="
<html>
<body>
<font size=3><br/>
$nome,<br/><br/>
* Caso já tenha efetuado o pagamento, ignore este e-mail.
<br/><br/>
A WDinfo, vem informar que o boleto ainda n&atilde;o est&aacute; dispon&iacute;vel, logo o pagamento deve ser feito no pr&oacute;prio curso ou por deposito banc&aacute;rio na conta de:<br/><br/>
Titular: WBE Informatica LTDA [ CNPJ: 74.090.648/0001-32 ]<br/>
Banco: ITAU<br/>
Agencia: 0301<br/>
Conta: 81279-8<br/><br/>
Vencimento: <b>$venc</b><br/>
Valor: R$ <big>$valor</big>
<br/>
Ap&oacute;s 5 dias do vencimento, multa de 10%.
<br/>Juros de mora 0.074% dia.<br/><br/>
OBS: Ao fazer o deposito, favor Identificar com seu nome e/ou enviar o recibo de dep&oacute;sito ou o n&uacute;mero do recibo como resposta e esse e-mail.
<br/><br/>
Obrigado.
<br/><br/>
Att,
<br/>
<img src=\"cid:$cid\">
<br/>
<br/>
Av. Marechal Floriano, 03 - 2&ordm; andar - Centro - Rio de Janeiro.<br/>
Tel.: (21) 2253-0864<br/>

wandall@wdinfo.com.br
<br/></font>
</body>
</html>
";
 
$msg_body = "--$limitador\r\n";
$msg_body .= "Content-type: text/html; charset=utf-8\r\n";
$msg_body .= "$texto";
$msg_body .= "--$limitador\r\n";
$msg_body .= "Content-type: image/jpeg; name=\"$imagem_nome\"\r\n";
$msg_body .= "Content-Transfer-Encoding: base64\r\n";
$msg_body .= "Content-ID: <$cid>\r\n";
$msg_body .= "\n$encoded_attach\r\n";
$msg_body .= "--$limitador--\r\n";
//$te = nl2br( str_replace( "&", "&amp;", htmlentities("Confirmação de matrícula")) )
if(mail($emai,$assunto,$msg_body, $mailheaders)){
	echo '3 - enviado com sucesso.';
}else{
	echo '3 - Erro no envio.';
}
?>
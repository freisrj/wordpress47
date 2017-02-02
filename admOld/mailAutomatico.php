<?
//header('Content-Type: text/html; charset=utf-8', true);

$imagem_nome="imgs/emailAuto.jpg"; // aqui vai o enderço da imagem no computaque envia
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
A WDinfo, vem informar que o boleto ainda não está disponivel, logo o pagamento deve ser feito no proprio curso ou por deposito bancario na conta de:<br/><br/>
Titular: José Wan-Dall Splitter<br/>
Banco: ITAU<br/>
Agencia: 0301<br/>
Conta: 06942-3<br/><br/>
Valor: R$ $valor
<br/><br/>
Obrigado.
<br/><br/>
Att,
<br/>
<img src=\"cid:$cid\">
<br/>
<br/>
Rua: Visconde de Inha&uacute;ma, 50 - 12&ordm; andar - Sala 1214 - Centro - Rio de Janeiro.<br/>
Tel.: (21) 3553-5647<br/>
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
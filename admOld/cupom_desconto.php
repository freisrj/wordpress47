<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDinfo (Recibo de Pagamento)</title>
<style media="print">
#imgP{display:none;}
*{
}
</style>
<script language="Javascript">
function doprint() {
var h = factory.printing.header;
var f = factory.printing.footer;
factory.printing.header = "";
factory.printing.footer = "";
factory.DoPrint(false);
factory.printing.header = h;
factory.printing.footer = f;
imprimir();
}
</script>
<script>
function imprimir(){
	window.print();
}
</script>
<script src="Scripts/AC_ActiveX.js" type="text/javascript"></script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script type="text/javascript">
AC_AX_RunContent( 'id','factory','style','display:none','classid','clsid:1663ed61-23eb-11d2-b92f-008048fdd814','viewastext','viewastext','codebase','ScriptX.cab#Version=5,0,4,185' ); //end AC code
</script>
<noscript>
	<object id="factory" style="display:none"
	classid="clsid:1663ed61-23eb-11d2-b92f-008048fdd814" viewastext codebase="ScriptX.cab#Version=5,0,4,185">
</object>
</noscript>
<script type="text/javascript">
AC_AX_RunContent( 'id','scoreboard','style','display:none','viewastext','viewastext','classid','clsid:1663ed61-23eb-11d2-b92f-008048fdd814','codebase','ScriptX.cab#Version=6,1,429,14' ); //end AC code
</script>
<noscript>
	<object id="scoreboard" style="display:none" viewastext classid="clsid:1663ed61-23eb-11d2-b92f-008048fdd814"
	codebase="ScriptX.cab#Version=6,1,429,14">
	</object>
</noscript>
</head>
<?php require('../conect.php'); ?>
<body>
<div id="imgP" class="dont-print">
<a href="#" onclick="imprimir()"><img src="images/imprimirG.png" /></a>
<p><b>Matrículas disponíveis:</b><span style="font-size:24px;"><?php echo '100';?></span></p>
</div>
<hr />
<div style="width:100%; height:100px;">
<img src="images/recibo_titulo.jpg" align="left"/><div align="right"><big></big></div>
</div>
<div id="pagImp">
<?
$totV 	= 0; //$_GET['totV'];
//$par		= $_GET['par'];
$sqlp="SELECT a.nome, c.curso FROM alunos a 
			INNER JOIN wd_turmas t USING(id_tur) 
			INNER JOIN wd_cursos c USING(id_cur) 
			WHERE a.id_alu=".$_GET['idalu'];
//echo $sqlp;
$sqlp=mysql_query($sqlp) or die (mysql_error('query 1'));
$resp=mysql_fetch_assoc($sqlp);
$sqls="SELECT * FROM  pagamentos
			WHERE id_alu=".$_GET['idalu']." ORDER BY vencimento";
//echo $sqlp;
$par = 0;
$sqls=mysql_query($sqls) or die (mysql_error('query 2'));
while( $ress=mysql_fetch_array($sqls)){
	$par++;
	switch($ress['especie']){
		case 'Bo':
			$esp[$par] = 'Boleto';
			break;
		case 'Ch':
			$esp[$par] = 'Ch';
			break;
		case 'Ca':
			$esp[$par] = 'Cartão';
			break;
		case 'Di':
			$esp[$par] = 'Dinheiro';
			break;
	}
	$ban[$par]  = $ress['banco'];
	$che[$par] = $ress['cheque'];
	$da = explode('-',$ress['vencimento']);
	$dat[$par] = $da[2] . '/' . $da[1] . '/' . $da[0];
	$val[$par] = $ress['valor'];
	$totV = ( $ress['apagar']>0 ? $ress['apagar'] : $totV + $ress['valor']); 
}
?>
<hr />
<br/><br/><br/>
<div style="text-align:center; margin:40px 0; display:block;"><span style="font-size:24px;">CUPOM DE DESCONTO</span></div>
<p><b>Matrícula de Numero: </b><span style="font-size:24px;"><?php echo '89';?></span></p>

<hr />
<blockquote style="font-size:24px;">
<p>R$ 660,00 - AutoCAD Total ou 3 X 250,00 ou 6 X 140,00</p>
<p>R$ 390,00 - Excel Completo ou 3 X 160,00 ou 6 X 95,00</p>
<p>R$ 490,00 - Web Design Prof. I ou 3 X 210,00 ou 6 X 120,00</p>
</blockquote>
<hr />
<b>Regras:</b><br />
Valido apenas para alunos novos;<br />
Apresente este no ato da matrícula;<br />
Cupom individual ( para 1 aluno );<br />
Desconto não acumulativo;


		<br/>
		<br/>
		<hr />
		<br/>
        Este cupom e <b>válido por 2 dias</b> a partir da data de impressão.
		<br/>
		<?php $ano = date('Y');
		$mes = number_format(date('m'))-1;
		$dia = date('d');
		$em=array('Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');
		?>
		<b style=" float:right;">Data da Impressão, <?=$dia?> de <?=$em[$mes]?> de <?=$ano?>.</b><br/>
		<br/>
		<br/>
		<br/>
		<br/>
<hr />		

<!--<br /><br />
<div style="font:8pt Arial, Helvetica, sans-serif; text-align:center">
________________________________________<br />
<b>DFelix Assessoria em Com&eacute;rcio Exterior</b><br />
Rua: Visconde de Inha&uacute;ma, n&ordm; 50<br />
Cep: 20091-007<br />
TelFax: (21) 3553-3647<br />
-->
</div>

</div>
</body>
</html>

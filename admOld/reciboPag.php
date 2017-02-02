<?php session_start();?>
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
			$esp[$par] = 'Cheque';
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
<div style="text-align:center; margin:40px 0; display:block;"><span style="font-size:24px;">RECIBO DE PAGAMENTO <?php echo (isset($_GET['2via'])?$_GET['2via']:'')?></span><br/><br/></div>
<hr />
<blockquote>&nbsp;&nbsp;&nbsp;&nbsp;
Recebi de <b><?php echo $resp['nome'];?></b>  a importância de R$ <b><?php echo number_format($totV,2,',','.'); ?></b> ( <?php echo $_GET['extenV']; ?> ), referente ao curso de <b><?php echo $resp['curso']; ?></b> dividido em <b>0<?php echo $par; ?></b> Parcelas de acordo como abaixo:
</blockquote>
<hr />
<br/>
<br/>
<br/>
		<table border="1" cellpadding="0" cellspacing="0" width="100%" style="font:11pt Arial, Helvetica, sans-serif; margin-bottom:5px;">
			<tr>
				<td width="400" valign="top" align="left">
					<table border="1" cellpadding="0" cellspacing="0" align="center">
						<tr align="center" bgcolor="#999999">
							<th width="120">Nº</th>
							<th width="50">BANCO</th>
							<th width="100">CHEQUE</th>
							<th width="80">VENCIMENTO</th>
							<th width="150">VALOR</th>
						</tr>
						<?php
						$vl = $totV / $par;
						for( $tn  = 1; $tn <= $par; $tn++){
						?>
						<tr align="center">
							<td nowrap="nowrap">&nbsp;<b><?=$tn?>&nbsp;</b></td>
							<td nowrap="nowrap">&nbsp;<b><?=($esp[$tn]=='Cheque'?$ban[$tn]:$esp[$tn]);?>&nbsp;</b></td>
							<td nowrap="nowrap">&nbsp;<b><?=$che[$tn];?>&nbsp;</b></td>
							<td nowrap="nowrap">&nbsp;<b><?=$dat[$tn];?>&nbsp;</b></td>
							<td nowrap="nowrap">&nbsp;<b><?=number_format($val[$tn],2,',','.')?>&nbsp;</b></td>
						<?php
						} ?>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<br/>
		<br/>
		<hr />
		<br/>
		<br/>
		<?php $ano = date('Y');
		$mes = number_format(date('m'))-1;
		$dia = date('d');
		$em=array('Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');
		?>
		<b style=" float:right;">Rio de Janeiro, <?=$dia?> de <?=$em[$mes]?> de <?=$ano?>.</b><br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<center>
		_______________________________________________________<br/>
		<?php
		
		$sqlf="SELECT * FROM  funcionarios WHERE id_fun=".$_SESSION['idfun'];
//echo $sqlf;
		$sqlf=mysql_query($sqlf) or die (mysql_error('nao acho funcion'));
		$resf=mysql_fetch_array($sqlf);
		echo $resf['nome'].'<br/>';
		echo $resf['funcao'];
//		if( $_GET['assin']==1){
//			echo "José Wan-Dall Splitter<br/>";
//			echo "Gerente<br/>";
//		}elseif($_GET['assin']==2){
//			echo "Rosa Oliveira<br/>";
//			echo "Secretária<br/>";
//		}elseif($_GET['assin']==3){
//			echo "Raísa Salles Roza da Silva<br/>";
//			echo "Secretária<br/>";
//		}else{
//			echo "Munick de carvalho Tadashi<br/>";
//			echo "Secretária<br/>";
//		}
		?>
		<br/>
		<br/>
		<br/>
		<br/>
		_______________________________________________________<br/>
		<?php echo $resp['nome'];?><br/>
		Contratante<br/>
		</center>
		

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

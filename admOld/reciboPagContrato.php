<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDinfo (Recibo de Pagamento)</title>
<style media="print">
#imgP{display:none;}
*{
}
@page {
content: "";
}
@top-left{
content: "";
}
@bottom-center {
content: "";
}
p{margin:7px 0 3px 0;}
</style>
<style type="text/css">
#contrato{font:10px Arial, Helvetica, sans-serif;}
#contrato p{margin-bottom:0px;
	text-align:justify;
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
<div id="pagImp">
<?
$totV 	= $_GET['totV'];
$par		= $_GET['par'];
$sqlp="SELECT * FROM alunos a
			INNER JOIN wd_turmas t USING(id_tur) 
			INNER JOIN wd_cursos c USING(id_cur) 
			WHERE a.id_alu=".$_GET['idalu'];
//echo $sqlp;
$sqlp=mysql_query($sqlp) or die (mysql_error('query 1'));
$resp=mysql_fetch_assoc($sqlp);
$sqlr="SELECT r.* FROM responsavel r
			INNER JOIN alunos a USING(id_alu) 
			INNER JOIN wd_turmas t USING(id_tur) 
			INNER JOIN wd_cursos c USING(id_cur) 
			WHERE a.id_alu=".$_GET['idalu'];
//echo $sqlp;
$sqlr=mysql_query($sqlr) or die (mysql_error('query 2'));
$resr=mysql_fetch_assoc($sqlr);

switch($resr['nacionalidade']){
	case 1:
		$naci = 'Brasileiro';
		break;
	case 2:
		$naci = 'Sul Americano';
		break;
	case 3:
		$naci = 'Norte Americano';
		break;
	case 4:
		$naci = 'Europeu';
		break;
	case 5:
		$naci = 'Asiatico';
		break;
	case 6:
		$naci = 'Africano';
		break;
}
switch($resr['estado_civil']){
	case 1:
		$civil = 'Solteiro(a)';
		break;
	case 2:
		$civil = 'Casado(a)';
		break;
	case 3:
		$civil = 'Separado(a)';
		break;
	case 4:
		$civil = 'Divorciado(a)';
		break;
	case 5:
		$civil = 'Viuvo(a)';
		break;
}
switch($resr['profissao']){
	case 1:
		$prof = 'Area Comercial';
		break;
	case 2:
		$prof = 'Area Indústrial';
		break;
	case 3:
		$prof = 'Area Pública';
		break;
	case 4:
		$prof = 'Area Militar';
		break;
	case 5:
		$prof = 'Vendedor';
		break;
	case 6:
		$prof = 'Economista';
		break;
	case 7:
		$prof = 'Engenheiro';
		break;
	case 8:
		$prof = 'Arquiteto';
		break;
	case 9:
		$prof = 'Design';
		break;
}
?>
<hr />
<div style="text-align:center; display:block;font-size:16px; font-weight:bold;">CONTRATO DE PRESTAÇÃO DE SERVIÇOS DE ENSINO DE INFORMÁTICA <?php echo (isset($_GET['2via'])?$_GET['2via']:'')?></div>
<hr />
<div id="contrato">
<p>RESPONSÁVEL LEGAL: <b><?php echo $resr['nome'];?></b>, <b><?php echo $naci;?></b>, <b><?php echo $civil;?></b>, <b><?php echo $prof;?></b>, Carteira de Identidade nº <b><?php echo $resr['identidade'];?>-<?php echo $resr['orgao'];?></b>, C.P.F./CNPJ nº <b><?php echo $resr['cpf'];?></b>, residente e domiciliado na <b><?php echo $resr['endereco'];?></b>, bairro (<b><?php echo $resr['bairro'];?></b>), Cep (<b><?php echo $resr['cep'];?></b>), Cidade (<b><?php echo $resr['cidade'];?></b>), no Estado (<b><?php echo $resr['estado'];?></b>);
</p>
<p>               
CONTRATADO: WDPC Consultoria e Treinamento de Informática EIRELI ME (WDinfo Escola de Informática), com sede no Brasil, na Avenida Marechal Floriano, 03 - 2º andar - bairro Centro, Cep 20080-003, no Estado Rio de Janeiro, inscrita no C.N.P.J. sob o nº 00.459.407/0001-81, neste ato representada pelo seu diretor vigente.</p>
<p>             
CONTRATANTE:   <b><?php echo $resp['nome'];?></b>, Carteira de Identidade nº <b><?php echo $resp['identidade'];?>-<?php echo $resp['orgao'];?></b>, C.P.F./CNPJ nº <b><?php echo $resp['cpf'];?></b>, residente e domiciliado na <b><?php echo $resp['endereco'];?></b>, bairro (<b><?php echo $resp['bairro'];?></b>), Cep (<b><?php echo $resp['cep'];?></b>), Cidade (<b><?php echo $resp['cidade'];?></b>), no Estado (<b><?php echo $resp['estado'];?></b>).
<br /><br/>
<?php include('contrato.php'); ?>
</div>
</body>
</html>

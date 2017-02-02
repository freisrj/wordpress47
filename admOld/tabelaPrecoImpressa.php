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
<a href="#" onclick="imprimir()"><img src="images/imprimirG.png" alt="" /></a>
</div>
<hr />
<div style="width:100%; height:100px;">
<img src="../imgs/WD10.png" align="left"/><div align="right"><big></big></div>
</div>
<div id="pagImp">
<div style="text-align:center; margin:5px 0; display:block;"><span style="font-size:24px;">TABELA DE PREÇOS</span></div>
<?php
$idcur = array();
$idcur[1] = $_GET['c1'];$idcur[2] = $_GET['c2'];$idcur[3] = $_GET['c3'];
$f = 1;
for($f=1; $f<=3; $f++){
$sql=("SELECT * FROM wd_cursos cu INNER JOIN wd_valorCursos vc USING(id_cur) WHERE cu.id_cur=".$idcur[$f]);
$query = mysql_query($sql);
$res=mysql_fetch_assoc($query);?>
<input type="hidden" id="idcurso" value="<?php echo $res['id_cur'];?>" />
<fieldset id="tabCal">
    <table border="0">
    	<tr>
        	<th nowrap="nowrap" width="250"><h3 style="margin:0; padding:0;"><?php echo $res['curso'];?></h3></th>
            <th><img src="../imgs/bol_cheque.png" width="187" height="35" /></th>
            <th><img src="../imgs/cartao_pg.png" width="223" height="35" /></th>
        </tr>
    	<tr>
        	<td rowspan="4">
        	VALOR: R$<b><?php echo number_format($res['valor'],2,',','.');?></b><br />
        	Desconto: <?php echo $res['desconto'];?>%<br />
        	Valor C/ Desc: <?php $valparc =  $res['valor']-($res['valor']*$res['desconto']/100); ?>
            <b id="valDesc"><?php echo number_format($valparc,2,',','.'); ?></b><br /><br />
            <img src="../imgs/avista.png" width="208" height="35" /><br />
            <b style="font:15pt arial">À Vista :  R$ 
           <!-- <?php //echo $res['avista1'] ?>
            <?php //$visVal1 = (int)round($valparc-($valparc*$res['avista1']/100));?>
            <b><?php //echo number_format($visVal1,2,',','.'); ?></b>
          Tabela 02: R$-->
            <?php //echo $res['avista2'] ?>
            <?php $visVal2 = (int)round($valparc-($valparc*$res['avista2']/100));?>
            <b><?php echo number_format($visVal2,2,',','.'); ?></b></b><br /></td>
        </tr>
            <td>
            	<table border="1">
                    <tr align="center">
                        <th>Parc</th>
                        <th nowrap="nowrap">Val. Parcela</th>
                        <th>Total</th>
                    </tr>
                    <?php for($x=1; $x <=6 ; $x++){?>
                    <tr>
                        <td align="center"><?php echo $x ?></td>
						<?php $vpar1 = (int)round(($valparc-($valparc*$res['desc1'.$x]/100))/$x);?>
                        <td align="right" ><?php echo number_format($vpar1,2,',','.'); ?></td>
                        <?php $totv1 = $vpar1 * $x;?>
                        <td align="right" width="100" ><?php echo number_format($totv1,2,',','.'); ?></td>
                    </tr>
                    <?php }?>
                </table>
            </td>
            <td>
            	<table border="1">
                    <tr align="center">
                        <th>Parc</th>
                        <th nowrap="nowrap">Val. Parcela</th>
                        <th>Total</th>
                    </tr>
                    <?php for($x=1; $x <=6 ; $x++){?>
                    <tr>
                        <td align="center"><?php echo $x ?></td>
						<?php $vpar2 = (int)round(($valparc-($valparc*$res['desc2'.$x]/100))/$x);?>
                        <td align="right" ><?php echo number_format($vpar2,2,',','.'); ?></td>
                        <?php $totv2 = $vpar2 * $x;?>
                        <td align="right" width="100" ><?php echo number_format($totv2,2,',','.'); ?></td>
                    </tr>
                    <?php }?>
                </table>
            </td>
        </tr>
    </table>
</fieldset>
<?php }?>

<hr />
<blockquote><br/>
		<br/>
		<?php $ano = date('Y');
		$mes = number_format(date('m'))-1;
		$dia = date('d');
		$em=array('Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');
		?>
		<b style=" float:right;">Rio de Janeiro, 
		<?=$dia?> de <?=$em[$mes]?> de <?=$ano?>.</b><br/>
  </blockquote>
</div>

</body>
</html>

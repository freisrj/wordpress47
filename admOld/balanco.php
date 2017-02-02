<?php require('../conect.php'); ?>
<h3>Balanço</h3>
<table border="1">
	<tr>
		<th>CONTA</th>
		<th>DESCRIÇÃO</th>
		<th>VALOR</th>
		<th>DESCONTO</th>
		<th>RECEBIDO</th>
		<th>DESPESAS</th>
		<th>Wan-Dall</th>
		<th>Junior</th>
		<th>LUCRO</th>
		<th>ACUMULADO</th>
		<th>Aulas Wan-Dall (não remuneradas)</th>
	</tr>
<?php 
$sql = "SELECT distinct(MONTH(vencimento)) mes, YEAR(vencimento) ano 
			FROM pagamentos 
			WHERE id_alu<>'' ORDER BY vencimento";
$query = mysql_query($sql);
$cont=0;$sova=0;$sode=0;$sopg=0;$matual=2; $totbruto=0; $totgeral=0; $totgeralpg=0; $acumulado = 0; $aulasWD = 0;
while($res=mysql_fetch_array($query)){
	$matual = $res['mes'];
	$aatual = $res['ano'];
	echo "<tr class='totpg'>";
	echo "<td colspan='11'>Mês: $matual</td>";
	echo "</tr>";
	$sqlP = "SELECT sum(valor) sova, sum(apagar) sopg, sum(desconto) sode
				  FROM pagamentos 
				  WHERE id_alu<>'' AND 
				  MONTH(vencimento)=$matual AND
				  YEAR(vencimento)=$aatual";
//	echo $sqlP;
	$resP = mysql_fetch_assoc(mysql_query($sqlP));
	$sova = $resP['sova'];
	$sode = $resP['sode'];
	$sopg = $resP['sopg']-$sode;
		echo "<tr class='totpg'>";
		echo "<td colspan='2'>Totais.................</td>";
		echo "<td align='right'>".number_format($sova,2,',','.')."</td>";
		echo "<td align='right'>".number_format($sode,2,',','.')."</td>";
		echo "<td align='right'>".number_format($sopg,2,',','.')."</td>";
		$sqlDes= "SELECT sum(valor) totD, sum(aulas_wandall) aulas
						 FROM despesas 
						 WHERE MONTH(vencimento)=$matual AND
				  		 YEAR(vencimento)=$aatual";
	//	echo $sqlDes;
		$resDes=mysql_fetch_assoc(mysql_query($sqlDes));
		$aulasWD = $resDes['aulas'];
		echo "<td align='right'>".number_format($resDes['totD'],2,',','.')."</td>";
		echo "<td align='right'>".number_format(0,2,',','.')."</td>";
		echo "<td align='right'>".number_format(0,2,',','.')."</td>";
		$lucro = $sopg - $resDes['totD'];
		echo "<td align='right'>".number_format($lucro,2,',','.')."</td>";
		$acumulado += $lucro;
		echo "<td align='right'><font color='#0000FF' size='4'>".number_format($acumulado,2,',','.')."</font></td>";
		echo "<td align='right'><font color='#FF0000'>".number_format($aulasWD,2,',','.')."</font></td>";
		echo  '</tr>';
		$totbruto += $sova;
		$totgeralpg += $sopg;
		$cont=0;$sova=0;$sode=0;$sopg=0;
		echo "<tr class=''>";
		echo "<td colspan='11'><hr></td>";
		$cont++;
}
//-----------------------------ultimos calculos
		$matual = $mes;
		echo "<tr class='totpg'>";
		echo "<td colspan='2'>Totais.................</td>";
		echo "<td align='right'>".number_format($sova,2,',','.')."</td>";
		echo "<td></td>";
		echo "<td align='right'>".number_format($sopg,2,',','.')."</td>";
		echo "<td></td>";
		echo  '</tr>';
		$totbruto += $sova;
		$totgeralpg += $sopg;
//$cont=0;$sova=0;$sode=0;$sopg=0;
echo "<tr class='totgeral'>";
echo "<td colspan='2'>Total Geral............</td>";
echo "<td align='right'>".number_format($totbruto,2,',','.')."</td>";
echo "<td></td>";
echo "<td align='right'>".number_format($totgeralpg,2,',','.')."</td>";
echo "<td></td>";
echo "<td></td>";
echo  '</tr>';
?>
</table>
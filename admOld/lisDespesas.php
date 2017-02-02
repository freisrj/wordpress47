<?php
require('../conect.php');

$matual = ( isset($_GET['mesI']) ? $_GET['mesI'] : date('m'));
//echo '----->'.$matual.'<----';
?>
<table border="1">
	<tr>
		<th>CONTA</th>
		<th>DESCRIÇÃO</th>
		<th>VALOR</th>
		<th>VENC. DIA</th>
		<th>PAGO</th>
		<th>DATA PG</th>
	</tr>
<?php 
$cont=0;$sova=0;$sode=0;$sopg=0; $totbruto=0; $totgeral=0; $totgeralpg=0;
$sql = "SELECT * FROM despesas WHERE MONTH(vencimento) = '$matual' AND YEAR(vencimento) = ".date('Y')." ORDER BY vencimento";
//echo $sql;
$query = mysql_query($sql);

//		echo "<tr class='totpg'>";
//		echo "<td colspan='6'>Mês: $matual</td>";
//		echo "</tr>";
while($res=mysql_fetch_array($query)){
	$dt = explode('-',$res['datapg']);
	$dia   = $dt[2];
	$mes = $dt[1];
	$ano = $dt[0];
	$pago = $dia.'/'.$mes.'/'.$ano;
	$dt = explode('-',$res['vencimento']);
	$dia   = $dt[2];
	$mes = $dt[1];
	$ano = $dt[0];
	$venc = $dia;
	if($mes==$matual){
	}else{
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
		$cont=0;$sova=0;$sode=0;$sopg=0;
//----------------------------mudança de mes
		echo "<tr class=''>";
		echo "<td colspan='6'><hr></td>";
		echo "</tr>";
		echo "<tr class='totpg'>";
		echo "<td colspan='6'>Mês: $matual</td>";
		echo "</tr>";
	}
		$cont++;
		$sova = $sova + $res['valor'];
		$sopg = $sopg + $res['pago'];
		echo "<tr>";
		echo "<td>".$res['conta']."</td>";
		echo "<td>".$res['descricao']."</td>";
		echo "<td align='right'>".number_format($res['valor'],2,',','.')."</td>";
		echo "<td>$venc</td>";
		echo "<td align='right'>".($res['pago']<1?'':number_format($res['pago'],2,',','.') )."</td>";
		echo "<td>".($pago<1?'':$pago)."</td>";
		echo "<td>";
		if( $venc<=date('Y-m-d') && $res['pago']<1 ){
		//	echo "<button>Enviar E-Mail (boleto)</button>";
		}
		echo "</td>";
		echo  '</tr>';
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
echo  '</tr>';
?>
</table>
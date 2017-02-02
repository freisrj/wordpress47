<?php require('../conect.php'); ?>
<table border="1">
	<tr>
		<th>PARCELA</th>
		<th>ESPECIE</th>
		<th>VENCIMENTO</th>
		<th>VALOR</th>
		<th>DESCONTO</th>
		<th>A PAGAR</th>
		<th>DATA PG</th>
		<th>PAGO</th>
	</tr>
<?php 
$sql = "SELECT * FROM pagamentos ORDER BY vencimento";
$query = mysql_query($sql);
$cont=0;$sova=0;$sode=0;$soap=0;$sopg=0;$matual=2;
while($res=mysql_fetch_array($query)){
	$dt = explode('-',$res['vencimento']);
	$mes = $dt[1];
	if($mes==$matual){
		$cont++;
		echo "<tr>";
		echo "<td>".$res['parcela']."</td>";
		echo "<td>".$res['especie']."</td>";
		echo "<td>".$res['vencimento']."</td>";
		echo "<td align='left'>".number_format($res['valor'],2,',','.')."</td>";
		echo "<td>".number_format($res['desconto'],2,',','.')."</td>";
		echo "<td>".number_format($res['apagar'],2,',','.')."</td>";
		echo "<td>".$res['pago']."</td>";
		echo "<td>".number_format($res['apagar'],2,',','.')."</td>";
		echo  '</tr>';
		$sova = $sova + $res['valor'];
		$sode = $sode + $res['desconto'];
		$soap = $soap + $res['apagar'];
		$sopg = $sopg + $res['apagar'];
	}else{
		$matual = $mes;
		echo "<tr class='totpg'>";
		echo "<td colspan='3'>".$cont."</td>";
		echo "<td>".number_format($sova,2,',','.')."</td>";
		echo "<td>".number_format($sode,2,',','.')."</td>";
		echo "<td>".number_format($soap,2,',','.')."</td>";
		echo "<td>.................</td>";
		echo "<td>".number_format($sopg,2,',','.')."</td>";
		echo  '</tr>';
		$cont=0;$sova=0;$sode=0;$soap=0;$sopg=0;
	}
}
//-----------------------------ultimos calculos
$matual = $mes;
echo "<tr>";
echo "<td colspan='3'>".$cont."</td>";
echo "<td>".$sova."</td>";
echo "<td>".$sode."</td>";
echo "<td>".$soap."</td>";
echo "<td colspan='2'>".$sopg."</td>";
echo  '</tr>';
$cont=0;$sova=0;$sode=0;$soap=0;$sopg=0;
?>
</table>
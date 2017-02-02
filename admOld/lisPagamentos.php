<?php require('../conect.php'); ?>
<table border="1">
	<tr>
		<th>PARCELA</th>
		<th>ALUNO</th>
		<th>ESPECIE</th>
		<th>VENCIMENTO</th>
		<th>VALOR</th>
		<th>DESCONTO</th>
		<th>PAGO</th>
		<th>DATA PG</th>
		<th>ENVIO DE BOLETO</th>
	</tr>
<?php 
$sql = "SELECT DISTINCT * 
			FROM alunos INNER JOIN pagamentos USING(id_alu) 
			WHERE situacao = 0
			ORDER BY vencimento";
$query = mysql_query($sql);
$cont=0;$sova=0;$sode=0;$sopg=0;$matual=2; $totbruto=0; $totgeral=0; $totgeralpg=0;
while($res=mysql_fetch_array($query)){
	$dt = explode('-',$res['pago']);
	$dia   = $dt[2];
	$mes = $dt[1];
	$ano = $dt[0];
	$pago = $dia.'/'.$mes.'/'.$ano;
	$dt = explode('-',$res['vencimento']);
	$dia   = $dt[2];
	$mes = $dt[1];
	$ano = $dt[0];
	$venc = $dia.'/'.$mes.'/'.$ano;
	if($mes==$matual){
	}else{
		$matual = $mes;
		echo "<tr class='totpg'>";
		echo "<td colspan='4'>".$cont."</td>";
		echo "<td>".number_format($sova,2,',','.')."</td>";
		echo "<td>".number_format($sode,2,',','.')."</td>";
		echo "<td>".number_format($sopg,2,',','.')."</td>";
		echo "<td>.................</td>";
		echo "<td>.................</td>";
		echo  '</tr>';
		$totbruto += $sova;
		$totgeralpg += $sopg;
		$cont=0;$sova=0;$sode=0;$sopg=0;
	}
		$cont++;
		$sova = $sova + $res['valor'];
		$sode = $sode + $res['desconto'];
		$sopg = $sopg + $res['apagar'];
		echo "<tr>";
		echo "<td>".$res['parcela']."</td>";
		echo "<td>".$res['nome']."</td>";
		echo "<td>".$res['especie']."</td>";
		echo "<td>$venc</td>";
		echo "<td align='left'>".number_format($res['valor'],2,',','.')."</td>";
		echo "<td>".($res['desconto']<1?'':number_format($res['desconto'],2,',','.') )."</td>";
		echo "<td>".($res['apagar']<1?'':number_format($res['apagar'],2,',','.') )."</td>";
		echo "<td>".($pago<1?'':$pago)."</td>";
		echo "<td>";
		if( $res['vencimento']<=date('Y-m-d') && $res['apagar']<1 && $res['especie']!='Ch' ){
			$no = $res['nome']; $em = $res['email'];
				$dt = explode('-',$res['envio_boleto']);
				$dia   = $dt[2];
				$mes = $dt[1];
				$ano = $dt[0];
				$bole = $dia.'/'.$mes.'/'.$ano;
			?>
			<button onclick="envMens('<?php echo $no ?>','<?php echo $em ?>','<?php echo $res['valor'] ?>','<?php echo $res['id_pag'] ?>','<?php echo $venc ?>')">Enviado (<?php echo $bole ?>)</button>
		<?php }
		echo "</td>";
		echo  '</tr>';
}
//-----------------------------ultimos calculos
$matual = $mes;
echo "<tr class='totpg'>";
echo "<td colspan='4'>".$cont."</td>";
echo "<td>".number_format($sova,2,',','.')."</td>";
echo "<td>".number_format($sode,2,',','.')."</td>";
echo "<td>".number_format($sopg,2,',','.')."</td>";
echo "<td>.................</td>";
echo  '</tr>';
$cont=0;$sova=0;$sode=0;$sopg=0;
echo "<tr class='totgeral'>";
echo "<td colspan='4'>Total Geral............</td>";
echo "<td>".number_format($totbruto,2,',','.')."</td>";
echo "<td></td>";
echo "<td>".number_format($totgeralpg,2,',','.')."</td>";
echo "<td>.................</td>";
echo "<td>.................</td>";
echo  '</tr>';
?>
</table>
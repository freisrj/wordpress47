<?php require('../conect.php'); ?>
<table border="1">
	<tr>
		<th>PARCELA</th>
		<th>ESPECIE</th>
		<th>VENCIMENTO</th>
		<th>VALOR</th>
		<th>DESCONTO</th>
		<th>PAGO</th>
		<th>DATA PG</th>
		<th></th>
	</tr>
<?php 
$idalu = $_GET['idalu'];
$sql = "SELECT * FROM pagamentos WHERE id_alu=$idalu ORDER BY vencimento";
$query = mysql_query($sql);
$sova=0;$sode=0;$soap=0;$sopg=0; $ja = true;
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
	echo "<tr>";
	echo "<td>".$res['parcela']."</td>";
	echo "<td>".$res['especie']."</td>";
	echo "<td>$venc</td>";
	echo "<td align='left'>".number_format($res['valor'],2,',','.')."</td>";
	echo "<input type='hidden' id='valor' value='".$res['valor']."' /></td>";
	$pg = ($pago<1?false:true);
	if(!$pg && $ja){
		$data = date('d/m/Y');
		echo "<td><input type='text' id='desc' size='10'/></td>";
		echo "<td id='paga'>".number_format($res['valor'],2,',','.')."</td>";
		echo "<td><input type='text' id='data' size='10' value='$data' /></td>";
		echo "<button onclick='efetuarVis(".$res['parcela'].",$idalu)' >Pg</button></td>";
		$ja = false;
		echo "<td>";
	}else{
		echo "<td>".($res['desconto']<1?'':number_format($res['desconto'],2,',','.') )."</td>";
		echo "<td>".($res['apagar']<1?'':number_format($res['apagar'],2,',','.') )."</td>";
		echo "<td>".($pago<1?'':$pago)."</td>";
	}
	echo  '</tr>';
	$sova = $sova + $res['valor'];
	$sode = $sode + $res['desconto'];
	$sopg = $sopg + $res['apagar'];
}?>
</table>
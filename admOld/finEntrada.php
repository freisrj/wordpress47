<?php session_start();
require('../conect.php'); ?>
<table class="tabM" border="1">
<tr><td>
<tr>
	<th colspan="6">Matrículas efetuadas no mes atual</th>
</tr>
<tr>
	<th>Data</th>
    <th>Unidade</th>
    <th>Aluno</th>
    <th>Parcela(s)</th>
    <th>Especie</th>
    <th>Valor</th>
</tr>
<?php //echo $idalu;
if( $_SESSION['acesso'] == 8 ){
	$sql ="SELECT * FROM alunos a 
				INNER JOIN pagamentos p USING(id_alu) 
				WHERE month(data_matricula) = month(CURDATE()) 
				AND year(data_matricula) = year(CURDATE()) 
				AND matr_unidade = 2
				ORDER BY id_alu, id_pag";
}else{
	$sql ="SELECT * FROM alunos a 
				INNER JOIN pagamentos p USING(id_alu) 
				WHERE month(data_matricula) = month(CURDATE())
				AND year(data_matricula) = year(CURDATE()) 
				ORDER BY id_alu, id_pag";
}
//echo $sql;
$sql = mysql_query($sql);
$somaR=0; $somaN=0;
while($res=mysql_fetch_array($sql) ){
	$dt = explode('-',$res['data_matricula']);
	$di = $dt[2].'/'.$dt[1].'/'.$dt[0];
	?>
	<tr>
    	<td><?php echo $di ?></td>
    	<td><?php echo ($res['matr_unidade']==1?'Rio':'Niterói')?></td>
    	<td nowrap><?php echo $res['nome']?></td>
    	<td><?php echo $res['parcela']?></td>
    	<td><?php echo ($res['especie']=='Di'?'Dinheiro':($res['especie']=='Ch'?'Cheque':($res['especie']=='Bo'?'Boleto':'Cartão')))?></td>
    	<td><?php echo number_format($res['valor'], 2, ',', '.');?></td>
    </tr>
<?php if($res['matr_unidade']==1){
			$somaR += $res['valor'];
	}else{
			$somaN += $res['valor'];
	}
	}?>
<tr>
<th>Rio:</th><th colspan="5"><?php echo number_format($somaR, 2, ',', '.'); ?></th>
<tr>
<th>Niterói:</th><th colspan="5"><?php echo number_format($somaN, 2, ',', '.'); ?></th>
</tr><tr>
<th>Total:</th><th colspan="5"><?php echo number_format($somaN+$somaR, 2, ',', '.'); ?></th>
</tr>
</table>

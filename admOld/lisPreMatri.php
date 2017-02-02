<?php require('../conect.php'); ?>
<table border="1">
<?php $sqlx="SELECT curso FROM wd_cursos WHERE id_cur=".$_GET['op'];
$queryx = mysql_query($sqlx);
$resx=mysql_fetch_assoc($queryx);?>

<tr>
	<td colspan="10"><h3><?php echo $resx['curso']; ?></h3></td>
</tr>
<tr>
	<th>TURMA</th>
	<th>UNIDADE</th>
	<th>DATA</th>
	<th>NOME</th>
	<th>TELEFONE</th>
	<th>CELULAR</th>
	<th>TURNO</th>
	<th>DIAS</th>
	<th>&and;</th>
	<th>RESPOSTA</th>
</tr>
<?php 
$sqlb = "SELECT * FROM wd_cursos c INNER JOIN wd_turmas t USING(id_cur) 
			INNER JOIN ca_preMatricula USING(id_tur) WHERE c.id_cur = " . $_GET['op'] . " and year(data) = '2013'
			ORDER BY data DESC";
$queryb = mysql_query($sqlb); $lin = 1;
$tot = mysql_num_rows($queryb);
while( $resb=mysql_fetch_array($queryb) ){
	echo '<tr>';
	echo "<td>" . $resb['id_tur'] . '</td>';
	echo "<td>" . ($resb['id_uni']==1?'Rio':'Niterói') . '</td>';
	$dat = explode('-',$resb['data']);
	$data = $dat[2].'/'.$dat[1].'/'.$dat[0];
	echo "<td>" . $data . '</td>';
	echo "<td>" . $resb['nome'] . '</td>';
	echo "<td>" . $resb['telefone'] . '</td>';
	echo "<td>" . $resb['celular'] . '</td>';
	echo "<td>" . $resb['turno'] . '</td>';
	echo "<td>" . $resb['dias'] . '</td>';?>
	<td>
		<button id="bteR<?php echo $lin ?>" onclick="editarResp(<?php echo $resb['id_pre'] ?>,<?php echo $lin ?>,<?php echo $tot ?>)">&OElig;</button>
		<button id="btgR<?php echo $lin ?>" onclick="gravResp(<?php echo $resb['id_pre'] ?>,<?php echo $lin ?>,<?php echo $resb['id_cur'] ?>)" style="display:none;">&crarr;</button>
		</td>
	<td>
		<input type="hidden" size="70" id="editR<?php echo $lin ?>" value="<?php echo $resb['resposta'] ?>" />
		<label id="exibR<?php echo $lin ?>"><?php echo $resb['resposta'] ?></label>
	</td>
	<?php echo '</tr>';
	$lin++;
}
?>
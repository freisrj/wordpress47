<?php require('../conect.php'); ?>
<table border="1">
<tr>
	<th>ID</th>
	<th>DATA</th>
	<th>NOME</th>
	<th>E-MAIL</th>
	<th>MENSAGEM</th>
</tr>
<?php 
$sqlb = "SELECT * FROM wd_contato
			ORDER BY id_cot DESC, data DESC";
$queryb = mysql_query($sqlb); $lin = 1;
$tot = mysql_num_rows($queryb);
while( $resb=mysql_fetch_array($queryb) ){
	echo '<tr>';
	echo "<td>" . $resb['id_cot'] . '</td>';
	$dat = explode('-',$resb['data']);
	$data = $dat[2].'/'.$dat[1].'/'.$dat[0];
	echo "<td>" . $data . '</td>';
	echo "<td>" . $resb['nome'] . '</td>';
	echo "<td>" . $resb['email'] . '</td>';
	echo "<td>" . $resb['mensagem'] . '</td>';
	echo '</tr>';
	$lin++;
}
?>
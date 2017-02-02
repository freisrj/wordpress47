<?php require('../conect.php'); ?>
<?php $idalu = $_GET['idalu'];?>
<table class="tabM">
<tr><td><button onclick="gE('mostTur').style.display = 'none';">[FECHAR]</button></td></tr>
<tr>
	<th colspan="6">Turmas em Andamento</th>
</tr>
<?php //echo $idalu;
$sql = "SELECT curso,t.id_tur,turno, dias, inicio FROM wd_cursos c 
								INNER JOIN wd_turmas t USING(id_cur) 
								WHERE termino >= curdate()
								ORDER BY t.id_tur";
//echo $sql;
$sql = mysql_query($sql);
while($res=mysql_fetch_array($sql) ){
	$dt = explode('-',$res['inicio']);
	$di = $dt[2].'/'.$dt[1].'/'.$dt[0];
	echo "<tr class='asa' onclick='mudarTurma(".$idalu . ',' . $res['id_tur'].")' >";
	echo "<td width='20'>" . $res['id_tur'] . ' </td><td> ' . substr($res['curso'],0,8)  . ' </td><td> '. ' </td><td> ' . $di . ' </td><td> ' . $res['dias'] . ' </td><td> ' . $res['turno'] ."</td>";
	echo "</tr>";
}
?>
</table>
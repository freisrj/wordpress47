<?php require('../conect.php'); ?>
<table border="1">
<tr>
	<td colspan="8"><h1>Resultado da pesquisa</h1></td>
</tr>
<tr>
	<th style="width:40px">Recep</th>
	<th style="width:60px">HORA</th>
	<th style="width:250px">NOME</th>
	<th style="width:250px">E-MAIL</th>
	<th style="width:250px">CURSO</th>
	<th style="width:60px">TEL1</th>
	<th style="width:60px">TEL2</th>
	<th style="width:60px">Soube</th>
	<th style="width:300px">OBS</th>
	</tr>
<?php 
		$unid = (isset($_GET['unid'])?$_GET['unid']:0);
		$dia = (isset($_GET['dia'])?$_GET['dia']:0);
		$mes = (isset($_GET['mes'])?$_GET['mes']:0);
		$ano = (isset($_GET['ano'])?$_GET['ano']:0);
$sqlb = "SELECT * FROM atendimento INNER JOIN wd_cursos USING(id_cur)
			WHERE dia=$dia AND mes=$mes AND ano=$ano AND unidade=$unid
			ORDER BY id_ate";
//echo $sqlb;
$queryb = mysql_query($sqlb); $cta = 0;
while( $resb=mysql_fetch_array($queryb) ){
	echo '<tr>';
	echo "<td>" . $resb['id_fun'] . '</td>';
	echo "<td>" . ($resb['hora']<=9?'0'.$resb['hora']:$resb['hora']) .':'.($resb['minuto']<=9?'0'.$resb['minuto']:$resb['minuto']).'</td>';
	echo "<td>" . $resb['nome'] . '</td>';
	echo "<td>" . $resb['email'] . '</td>';
	echo "<td>" . $resb['curso'] . '</td>';
	echo "<td>" . $resb['tel1'] . '</td>';
	echo "<td>" . $resb['tel2'] . '</td>';
 		$meio = array('Google','Ex-Aluno','BoaDica', 'HELP', 'Tot Tijuca', 'FIRJAN', 'CREA', 'Jornal', 'GPS', 'Amigo', 'outros', 'Letreiro');
	echo "<td>" . $meio[$resb['soube']] . '</td>';
	echo "<td>" . $resb['obs'] . '</td>';
	echo '</tr>';
	$cta++;
}
?>
</table>
<?php echo "Registro(s) encontrado(s) " . $cta; ?>

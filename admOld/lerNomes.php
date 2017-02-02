<?php require('../conect.php'); ?>
<?php 
$op = $_GET['op'];
if($op==1){
	$sql = mysql_query("SELECT nome,id_alu id FROM alunos ORDER BY nome");
}else{
	$sql = mysql_query("SELECT nome,id_pre id FROM ca_preMatricula ORDER BY nome");
	$op=0;
}?><select id="nomesL">
	<option></option>
	<?php while($res=mysql_fetch_array($sql) ){?>
	<option value="<?php echo $res['id'] . '|' . $op ?>"><?php echo $res['nome'] ?></option>
	<?php }?>
</select>

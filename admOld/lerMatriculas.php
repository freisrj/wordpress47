<?php require('../conect.php'); ?>
<?php 
$sql = mysql_query("SELECT * FROM alunos ORDER BY nome");?>
<select><?php 
	while($res=mysql_fetch_array($sql) ){?>
	<option><?php echo $res['nome'] ?></option>
	<?php }?>
</select>

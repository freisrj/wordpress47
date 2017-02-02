<?php require('../conect.php'); ?>
<?php	$sql = mysql_query("SELECT nome,id_alu id FROM alunos ORDER BY nome");?>
<br />
Aluno:
<select id="nomeSpg" onchange="carregar(3,'Lpag','efetuarLis.'+this.value);">
	<?php 
	while($res=mysql_fetch_array($sql) ){?>
	<option value="<?php echo $res['id'] ?>"><?php echo $res['nome'] ?></option>
	<?php }?>
</select>
<br /><br />
<hr />
<div id="Lpag"></div>
<hr />
<div id="pagar">
</div>
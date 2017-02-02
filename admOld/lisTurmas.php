<?php require('../conect.php'); ?>
<?php $sqlD = "SELECT * FROM wd_turmas t 
			INNER JOIN wd_cursos c USING(id_cur) 
			INNER JOIN wd_valorCursos v USING(id_cur) 
			WHERE t.id_tur = " . $_GET['op'];
//			INNER JOIN wd_professor p USING(id_pro) 
//echo $sqlD;
$queryD = mysql_query($sqlD);
$resD=mysql_fetch_assoc($queryD) ;?>
<fieldset class="listur">
<input type="hidden" id="Didcur" /><input type="hidden" id="vagas" />
<div class="labtur"><label>Turma:</label> <b id="Dtur"><?php echo $resD['id_tur'] ?></b></div>
<span>
<label>Unidade:</label> <strong><input id="Diduni" type="text" value="<?php echo $resD['id_uni'] ?>" size="2" /></strong>
<label>Situação:</label> <strong><?php echo ($resD['aberta']==1?'Aberta': ($resD['aberta']==0?'Andamento':'Fechada')) ?></strong>
<label>Curso:</label> <strong><?php echo $resD['curso'] ?></strong>
<label>Dias:</label> 
<strong><select id="Ddias">
	<?php 
	$tur = array('', 'Sábado','Ter/Qui','Seg/Qua','Sexta','Qua/Sex','Seg/Qua/Sex','Seg à Sex', 'Alternados');
	for($x=0; $x<count($tur);$x++){
		echo "<option ".($tur[$x]==$resD['dias']?'selected':'').">".$tur[$x]."</option>";
	}?>
</select></strong>
<strong><select id="Dhora">
	<?php 
	$tur = array('', '08:00 às 12:00','08:30 às 12:30', '13:00 às 17:00', '13:30 às 17:30', '18:00 às 21:30', '18:00 às 22:00', '08:00 às 13:00', '13:00 às 18:00', '08:00 às 18:00');
	for($x=0; $x<count($tur);$x++){
		echo "<option ".($tur[$x]==$resD['horario']?'selected':'').">".$tur[$x]."</option>";
	}?>
</select></strong>

<label>Turno:</label> 
<strong><select id="Dturno">
	<?php 
	$tur = array('', 'Manhã','Tarde','Noite');
	for($x=0; $x<count($tur);$x++){
		echo "<option ".($tur[$x]==$resD['turno']?'selected':'').">".$tur[$x]."</option>";
	}?>
</select></strong>

<label>Início:</label> 
<strong><?php $dat = explode('-',$resD['inicio']);
$inicio = $dat[2].'/'.$dat[1].'/'.$dat[0];
echo $inicio; ?></strong>

<label>Término:</label>
<strong><?php $dat = explode('-',$resD['termino']);
$termino = $dat[2].'/'.$dat[1].'/'.$dat[0];
echo $termino; ?></strong>
</span>
<span id="listarMaterias">
	<?php include('listarMateria.php'); ?>
</span>
<span>
<label>Início:</label> 
<strong><?php 
$dat = explode('-',$resD['inicio']);
$inicio = $dat[2].'/'.$dat[1].'/'.$dat[0];?>
<input type="text" size="8" id="Dinicio" value="<?php echo $inicio ?>" /></strong>
<label>Término:</label> 
<strong><?php 
$dat = explode('-',$resD['termino']);
$termino = $dat[2].'/'.$dat[1].'/'.$dat[0];?>
<input type="text" size="8" id="Dtermino" value="<?php echo $termino ?>" /></strong>
<label>Professor:</label> 
<strong><?php echo $resD['id_pro']?></strong>
</span>
<span>
<label>Vagas:</label> <strong><input type="text" size="2" id="Dvagas" value="<?php echo $resD['vagas'] ?>" /></strong>
<label>Pré-Matrícula:</label> <strong><?php echo $resD['pre'] ?></strong>
<label>Matrícula(s):</label> <strong><input type="text" size="2" id="Dmatri" value="<?php echo $resD['matriculas'] ?>" /></strong>
<label>Status:</label> <strong><input type="text" size="2" id="Dstatus" value="<?php echo $resD['status'] ?>" /></strong>
<label>Aberta:</label> <strong><input type="text" size="2" id="Daberta" value="<?php echo $resD['aberta'] ?>" /></strong>
<label>Andamento:</label> <strong><input type="text" size="2" id="Dandamento" value="<?php echo $resD['andamento'] ?>" /></strong>
</span>
<span>
<label>Valor:</label> <strong><input type="text" size="8" id="Dvalor" value="<?php echo $resD['valor'] ?>" /></strong>
<label>Desconto:</label> <strong><input type="text" size="8" id="Ddesc" value="<?php echo $resD['desconto'] ?>" /></strong>
<label>Valor c/ Desconto:</label> <strong><?php echo number_format($resD['valor']-($resD['valor']*($resD['desconto']/100)),2,',','.') ?></strong>
</span>
<span>
<label>Descrição Pag. 1:</label> <strong><input type="text" size="25" maxlength="50" id="Ddesc1" value="<?php echo $resD['desc1'] ?>" /></strong>
<label>Descrição Pag. 2:</label><strong> <input type="text" size="25" maxlength="50" id="Ddesc2" value="<?php echo $resD['desc2'] ?>" /></strong>
<label>Material:</label> <strong><input type="text" size="30" maxlength="30" id="Dmaterial" value="<?php echo $resD['material'] ?>" /></strong>
</span>
<button onclick="atualizarTur(2)">Atualizar</button>
</fieldset>
<table border="1">
<tr>
	<th>MATR</th>
	<th>NOME</th>
	<th>E-MAIL</th>
	<th>CIDADE</th>
	<th>BAIRRO</th>
	<th>TELEFONE</th>
	<th>CELULAR</th>
	<th>MÓDULO(S)</th>
	<th>TransF</th>
</tr>
<?php 
$sqlb = "SELECT * FROM 
			alunos WHERE id_tur = " . $_GET['op'] . "
			ORDER BY nome";
//echo $sqlb;
$queryb = mysql_query($sqlb);
while( $resb=mysql_fetch_array($queryb) ){
	echo '<tr>';
	echo "<td align='left'>" . $resb['id_alu'] . '</td>';
	echo "<td>" . $resb['nome'] . '</td>';
	echo "<td>" . $resb['email'] . '</td>';
	echo "<td>" . $resb['cidade'] . '</td>';
	echo "<td>" . $resb['bairro'] . '</td>';
	echo "<td>" . $resb['telefone'] . '</td>';
	echo "<td>" . $resb['celular'] . '</td>';
	$sqlm = "SELECT * FROM wd_cursos 
				  INNER JOIN wd_turmas USING(id_cur)
				  INNER JOIN aluno_tur_materias USING(id_tur)
				  WHERE id_alu=".$resb['id_alu']." AND id_tur=".$resb['id_tur'];
	$querym = mysql_query($sqlm);
	echo "<td>";
	while( $resm=mysql_fetch_array($querym) ){
		if($resm['materia']<1){
			echo  'Total';
		}else{
			echo '(' . $resm['materia'.$resm['materia'] ] . ')';
		}
	}
	echo "</td>";
	echo "<td><button id='tranfA' title='Tranferir de Turma' onclick='tranferirA(".$resb['id_alu'].")'>TA</button>";
	echo '</tr>';
}
?>

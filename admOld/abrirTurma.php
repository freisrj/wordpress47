<?php $sqlD = "SELECT * FROM wd_turmas";
//echo $sqlb;
$queryD = mysql_query($sqlD);
$totD=mysql_num_rows($queryD) ;?>
<fieldset class="listur">

<div class="labtur"><label>Turma:</label> <b id="Dtur"><?php echo $totD+1 ?></b></div>
<span>
<label>Unidade:</label> 
<?php $sqlC = "SELECT * FROM unidades";
//echo $sqlb;
$queryC = mysql_query($sqlC);?>
<input type="hidden" id="Daberta" value="1" />
<select id="Diduni"><?php
	echo "<option></option>";
	while($resC=mysql_fetch_array($queryC) ){
		echo "<option value='".$resC['id_uni']."'>".$resC['unidade']."</option>";
	}?>
</select>
<label>Curso:</label> 
<?php $sqlC = "SELECT * FROM wd_cursos";
//echo $sqlb;
$queryC = mysql_query($sqlC);?>
<select id="Didcur" onchange="carregar(2,'listarMaterias','listarMateria.'+this.value)"><?php
	echo "<option></option>";
	while($resC=mysql_fetch_array($queryC) ){
		echo "<option value='".$resC['id_cur']."'>".$resC['curso']."</option>";
	}?>
</select>
<label>Dias:</label> 
<select id="Ddias">
	<?php 
	$tur = array('', 'Sábado','Ter/Qui','Seg/Qua','Sexta','Qua/Sex','Seg/Qua/Sex','Seg à Sex', 'Alternados');
	echo "<option></option>";
	for($x=0; $x<count($tur);$x++){
		echo "<option value='$tur[$x]'>$tur[$x]</option>";
	}?>
</select>
<label>Horários:</label> 
<select id="Dhora">
	<?php 
	$tur = array('', '08:00 às 12:00','08:30 às 12:30', '13:00 às 17:00', '13:30 às 17:30', '18:00 às 21:30', '18:00 às 22:00', '08:00 às 13:00', '13:00 às 18:00', '08:00 às 18:00');
	for($x=0; $x<count($tur);$x++){
		echo "<option ".($tur[$x]==$resD['horario']?'selected':'').">".$tur[$x]."</option>";
	}?>
</select>
<label>Turno:</label> 
<select id="Dturno">
	<?php 
	echo "<option></option>";
	$tur = array('Manhã','Tarde','Noite','Integral');
	for($x=0; $x<count($tur);$x++){
		echo "<option value='$tur[$x]'>$tur[$x]</option>";
	}?>
</select>
</span>
<span id="listarMaterias">
<table border="1">
	<tr>
    	<th>Materia</th>
        <th>Início</th>
        <th>Término</th>
  	</tr>
</table>
<b></b>
</span>
<span>
<label>Vagas:</label> <input type="text" size="2" maxlength="2" id="vagas" />
<input type="hidden" size="2" maxlength="2" id="Dvagas" />
<label>Matriculas:</label> <input type="text" size="2" maxlength="2" id="Dmatri" />
<label>Status:</label> <input type="text" size="2" maxlength="2" id="Dstatus" />
<label>Valor:</label> <input type="text" size="8" id="Dvalor"  />
<label>Desconto:</label> <input type="text" size="8" id="Ddesc" onkeyup="calcValor()"  />
<label>Valor c/ Desconto:</label><input type="text" size="8" id="VDdesc"  />
</span>
<span>
<label>Descrição Pag. 1:</label> <input type="text" size="25" maxlength="50" id="Ddesc1"  />
<label>Descrição Pag. 2:</label><input type="text" size="25" maxlength="50" id="Ddesc2"  />
<label>Material:</label> <input type="text" size="30" maxlength="30" id="Dmaterial"  />
</span>
<button onclick="atualizarTur(1)">Gravar</button>
</fieldset>
<table border="1">
<tr>
	<th>Unidade</th>
	<th>Cod</th>
	<th>Cur</th>
	<th>CURSO</th>
	<th>SIT</th>
	<th>INICIO</th>
	<th>TERMINO</th>
	<th>TURNO</th>
	<th>DIAS</th>
	<th>HORÁRIOS</th>
	<th>STATUS</th>
</tr>
<?php 
$sqlb = "SELECT * FROM wd_cursos
			INNER JOIN wd_turmas USING(id_cur)
			INNER JOIN unidades USING(id_uni)
			ORDER BY id_tur, id_cur";
//echo $sqlb;
$queryb = mysql_query($sqlb);
while( $resb=mysql_fetch_array($queryb) ){
	echo '<tr>';
	echo "<td>" . $resb['unidade'] . '</td>';
	echo "<td align='left'>" . $resb['id_tur'] . '</td>';
	echo "<td align='left'>" . $resb['id_cur'] . '</td>';
	echo "<td>" . $resb['curso'] . '</td>';
	echo "<td>" . $resb['aberta'] . '</td>';
	echo "<td>" . $resb['inicio'] . '</td>';
	echo "<td>" . $resb['termino'] . '</td>';
	echo "<td>" . $resb['turno'] . '</td>';
	echo "<td>" . $resb['dias'] . '</td>';
	echo "<td>" . $resb['horario'] . '</td>';
	echo "<td>" . $resb['status'] . '</td>';
	echo '</tr>';
}
?>
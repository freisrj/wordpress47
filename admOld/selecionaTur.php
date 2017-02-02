<?php require('../conect.php'); ?>
	<select  id="cursoS" style="font-size:18px;" onchange= "carregar(2,'seleTur','selecionaTur.'+this.value)";	/>
		<option></option>
		<?php 
		$idtur = $_GET['idtur'];
		$sql = mysql_query("SELECT t.id_tur,c.curso,t.dias,t.turno,t.horario,t.id_uni FROM wd_cursos c 
										INNER JOIN wd_turmas t USING(id_cur) 
										ORDER BY t.id_tur,t.inicio");
		while($res=mysql_fetch_array($sql) ){
			if($res['id_tur'] == $idtur ){
				echo "<option selected>" . $res['id_tur'] . "</option>";
				$uni = $res['id_uni'];
				$cur = $res['curso'];
				$tur = $res['turno'];
				$dia = $res['dias'];
				$hor = $res['horario'];
			}else{
				echo "<option>" . $res['id_tur'] . "</option>";
			}
		}
		?>
	</select>
    Unidade: <label><?php echo $uni ?></label>
	<table>
		<tr>
			<th>Curso:</th>
			<td nowrap="nowrap"><?php echo $cur ?></td>
			<th>Turno:</th>
			<td><?php echo $tur ?></td>
		</tr>
		<tr>
			<th>Dias: </th>
			<td nowrap="nowrap"><?php echo $dia ?></td>
			<th>Horário: </th>
			<td nowrap="nowrap"><?php echo $hor ?></td>
		</tr>
	</table>
	<input type="hidden" name="idtur" id="idtur" value="<?php echo $idtur; ?>"/>
	<input type="hidden" name="iduni" id="iduni" value="<?php echo $uni; ?>"/>

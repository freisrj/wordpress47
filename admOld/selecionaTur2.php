<?php require('../conect.php'); ?>
	<select  id="cursoS" style="font-size:18px;" onchange= "carregar(2,'seleTur','selecionaTur2.')";	
		<option></option>
		<?php 
		$idtur = $_GET['idtur'];
		$sql = mysql_query("SELECT t.id_tur,c.curso,t.dias,t.turno FROM wd_cursos c 
										INNER JOIN wd_turmas t USING(id_cur) 
										ORDER BY t.id_cur,t.inicio");
		while($res=mysql_fetch_array($sql) ){
//			if($res['id_tur'] == $idtur ){
//				echo "<option selected>" . $res['turno'] . " || " . $res['curso']  . " || " . $res['dias'] . "</option>";
//			}else{
				echo "<option>" . $res['turno'] . " || " . $res['curso']  . " || " . $res['dias'] . "</option>";
//			}
		}
		?>
	</select>
	<input type="text" name="idtur" id="idtur" value="<?php echo $idtur; ?>"/>

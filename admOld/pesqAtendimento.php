<?php session_start();?>
<?php require('../conect.php'); ?>
<?php //$sqlD = "SELECT * FROM wd_turmas t 
//			INNER JOIN wd_cursos c USING(id_cur) 
//			INNER JOIN wd_valorCursos v USING(id_cur) 
//			WHERE t.id_tur = " . $_GET['op'];
////echo $sqlD;
//$queryD = mysql_query($sqlD);
//$resD=mysql_fetch_assoc($queryD) ;?>
<fieldset class="listur">
<h1>PESQUISA DE ATENDIMENTO</h1>
<div style="border:1px #000 solid; padding:10px;">
    <?php $unid = $_SESSION['unid']; ?>
	[ <label id="Aunid"><?php echo $unid; ?></label> ]
    [ <label id="Afun"><?php echo $_SESSION['idfun'] ?></label> ]
	<label>Data:</label> 
			<td>
				<select id="diaA">
					<?php $dh = date('d');
					for($d=1;$d<=31;$d++){
						if($d==$dh){
							echo "<option selected='selected' value='$d'>".$d."</option>";
						}else{
							echo "<option value='$d'>".$d."</option>";
						}
					}?>
				</select>
			</td>
            <td>/</td>
			<td>
				<select id="mesA">
					<?php $mh = date('m');
					for($m=1;$m<=12;$m++){
						if($m==$mh){
							echo "<option selected='selected' value='$m'>".$m."</option>";
						}else{
							echo "<option value='$d'>".$m."</option>";
						}
					}?>
				</select>
			</td>
            <td>/</td>
			<td>
				<select id="anoA">
					<?php $ah = date('Y');
					for($a=2010;$a<=2020;$a++){
						if($a==$ah){
							echo "<option selected='selected' value='$a'>".$a."</option>";
						}else{
							echo "<option value='$a'>".$a."</option>";
						}
					}?>
				</select>		
			</td>		
	<label>Total:</label> <b id="Taten">0</b>
</div>
<span>
<label>Nome:</label> <strong><input type="text" id="Anome" name="Anome" size="40" /></strong>
<label>Como soube da WDinfo:</label>
	<select name="10" id="Asoub">
		<option value="0" selected="selected">pelo Google</option>
		<option value="1">Indicado por Ex-Aluno</option>
		<option value="2">pela Revista BoaDica</option>
		<option value="3">pela Revista HELP</option>
		<option value="4">Pela Revista Tot Tijuca</option>
		<option value="5">Pelo Catalogo da FIRJAN</option>
		<option value="6">Pelo Catalogo da CREA</option>
		<option value="7">Pelo Jornal</option>
		<option value="8">Pela Revista GPS</option>
		<option value="9">Atravez de um amigo</option>
		<option value="10">Por outros meios</option>
	</select>
</span>
<span>
<label>Curso:</label> <strong><select name="11" id="AidCur">
		<?php
		if($pp){
			echo "<option value='".$idcur."|".$curso."'>".$idcur."|".($curso)."</option>";
		}else{
			echo "<option value='0'></option>";
			$sql1=mysql_query("SELECT * FROM wd_cursos ORDER BY id_cur");
			while($res1=mysql_fetch_array($sql1) ){
				echo "<option value='".$res1['id_cur']."'>".($res1['curso'])."</option>";
			}
		}
		?>
	</select></strong>

<label>Dias:</label> 
<strong><select id="Adias">
	<?php 
	$tur = array('', 'Sábado','Ter/Qui','Seg/Qua','Sexta','Qua/Sex','Seg/Qua/Sex','Seg à Sex', 'Alternados');
	for($x=0; $x<count($tur);$x++){
		echo "<option ".($tur[$x]==$resD['dias']?'selected':'').">".$tur[$x]."</option>";
	}?>
</select></strong>
<label>Horário:</label> 
<strong><select id="Ahoras">
	<?php 
	$tur = array('', '08:00 às 12:00','08:30 às 12:30', '13:00 às 17:00', '13:30 às 17:30', '18:00 às 21:30', '18:00 às 22:00', '08:00 às 13:00', '13:00 às 18:00', '08:00 às 18:00');
	for($x=0; $x<count($tur);$x++){
		echo "<option ".($tur[$x]==$resD['horario']?'selected':'').">".$tur[$x]."</option>";
	}?>
</select></strong>

<label>Turno:</label> 
<strong><select id="Aturno">
	<?php 
	$tur = array('', 'Manhã','Tarde','Noite');
	for($x=0; $x<count($tur);$x++){
		echo "<option ".($tur[$x]==$resD['turno']?'selected':'').">".$tur[$x]."</option>";
	}?>
</select></strong>
</span>
<center><button onclick="pesquisaAten()"> ::  Pesquisar atendimento  :: </button></center>
</fieldset>
<fieldset id="lisAte">
	<?php include('listarAtendimento.php'); ?>
</fieldset>

<?php require('../conect.php'); ?>

<?php 
if( isset($resD['id_tur']) ){ $idtur = $resD['id_tur'];}else{$idtur = $_GET['idcurso'];}

$sql = "SELECT id_tur, id_cur, materia1, materia2, materia3, m.inicio, m.termino FROM wd_cursos c 
				INNER JOIN wd_turmas t USING(id_cur)
				INNER JOIN tur_materias m USING(id_tur)
			  	WHERE t.id_tur = $idtur";
echo $sql;
$query = mysql_query($sql);
$tot = mysql_num_rows($query);
?>
<table border="1">
	<tr>
    	<th>Materia</th>
        <th>Início</th>
        <th>Término</th>
  	</tr>
<?php $c = 1;
while($res=mysql_fetch_array($query)){?>
   <tr style="display:<?php echo(empty($res['materia'.$c])?'none':''); ?>">
    	<td id="materia<?php echo $c ?>" nowrap><label id="idcur<?php echo $c ?>"><?php echo $resC['id_cur'.$c] ?></label> - <?php echo $res['materia'.$c] ?></td>
        <td><input type="text" size="8" id="Dinicio<?php echo $c ?>"  value="<?php echo $res['inicio']; ?>" /></td>
        <td><input type="text" size="8" id="Dtermino<?php echo $c ?>" value="<?php echo $res['termino']; ?>"/></td>
   	</tr>
<?php }?>
<!-- 
    <tr style="display:<?php echo(empty($res['materia3'])?'none':'')?>">
    	<td id="materia3" nowrap><label id="idcur3"><?php echo $resC['idcur3'] ?></label> - <?php echo $res['materia3'] ?></td>
        <td><input type="text" size="8" id="Dinicio3"  /></td>
        <td><input type="text" size="8" id="Dtermino3" /></td>
   	</tr>
    <tr style="display:<?php echo(empty($res['materia4'])?'none':'')?>">
    	<td id="materia4" nowrap><label id="idcur4"><?php echo $resC['idcur4'] ?></label> - <?php echo $res['materia4'] ?></td>
        <td><input type="text" size="8" id="Dinicio4"  /></td>
        <td><input type="text" size="8" id="Dtermino4" /></td>
   	</tr>
    <tr style="display:<?php echo(empty($res['materia5'])?'none':'')?>">
    	<td id="materia5" nowrap><label id="idcur5"><?php echo $resC['idcur5'] ?></label> - <?php echo $res['materia5'] ?></td>
        <td><input type="text" size="8" id="Dinicio5"  /></td>
        <td><input type="text" size="8" id="Dtermino5" /></td>
   	</tr>
    <tr style="display:<?php echo(empty($res['materia6'])?'none':'')?>">
    	<td id="materia6" nowrap><label id="idcur6"><?php echo $resC['idcur6'] ?></label> - <?php echo $res['materia6'] ?></td>
        <td><input type="text" size="8" id="Dinicio6"  /></td>
        <td><input type="text" size="8" id="Dtermino6" /></td>
   	</tr>
    <tr style="display:<?php echo(empty($res['materia7'])?'none':'')?>">
    	<td id="materia7" nowrap><label id="idcur7"><?php echo $resC['idcur7'] ?></label> - <?php echo $res['materia7'] ?></td>
        <td><input type="text" size="8" id="Dinicio7"  /></td>
        <td><input type="text" size="8" id="Dtermino7" /></td>
   	</tr>
    <tr style="display:<?php echo(empty($res['materia8'])?'none':'')?>">
    	<td id="materia8" nowrap><label id="idcur8"><?php echo $resC['idcur8'] ?></label> - <?php echo $res['materia8'] ?></td>
        <td><input type="text" size="8" id="Dinicio8"  /></td>
        <td><input type="text" size="8" id="Dtermino8" /></td>
   	</tr>
--></table>

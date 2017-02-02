<?php require('../conect.php'); ?>

<?php

$idcur = $_GET['idcur'];

$sql=("SELECT * FROM wd_cursos cu INNER JOIN wd_valorCursos vc USING(id_cur) WHERE cu.id_cur=$idcur");
$query = mysql_query($sql);
$res=mysql_fetch_assoc($query);?>
<input type="hidden" id="idcurso" value="<?php echo $res['id_cur'];?>" />
<fieldset id="tabCal">
	<legend>Calculo dos Cursos</legend>
    <table border="0">
    	<tr>
        	<td><label>Valor:</label><input type="text" align="right" value="<?php echo number_format($res['valor'],2,',','.');?>" /></td>
        </tr>
        <tr>
        	<td><label>Desconto em percentual:</label><input type="text" size="5" value="<?php echo $res['desconto'];?>" /></td>
        </tr>
        <tr>
        	<td><label>Valor c/ Desconto (base de calculo):</label>
            <?php $valparc =  $res['valor']-($res['valor']*$res['desconto']/100); ?>
            <b id="valDesc"><?php echo number_format($valparc,2,',','.'); ?></b></td>
        </tr>
        <tr>
            <td>
            	<table border="1">
					<tr>
                    	<th colspan="4">TABELA DE DESCONTO 01</th>
                    </tr>
                    <tr>
                    	<th>A vista</th>
                        <td><input type="text" size="5" id="avis1" value="<?php echo $res['avista1'] ?>" lang="1" name="1"/></td>
                        <?php $visVal1 = (int)round($valparc-($valparc*$res['avista1']/100));?>
                        <td colspan="2" id="valVista1"><?php echo number_format($visVal1,2,',','.'); ?></td>
                    </tr>
                    <tr>
                    	<th>%</th>
                        <th>Parc</th>
                        <th>Val. Parcela</th>
                        <th>Total</th>
                    </tr>
                    <?php for($x=1; $x <=6 ; $x++){?>
                    <tr>
                    	<td><input type="text" size="5" id="perc1<?php echo $x ?>" value="<?php echo $res['desc1'.$x] ?>" lang="<?php echo $x ?>" name="1"/></td>
                        <td id="par1<?php echo $x ?>"><?php echo $x ?></td>
						<?php $vpar1 = (int)round(($valparc-($valparc*$res['desc1'.$x]/100))/$x);?>
                        <td align="right" id="valpar1<?php echo $x ?>"><?php echo number_format($vpar1,2,',','.'); ?></td>
                        <?php $totv1 = $vpar1 * $x;?>
                        <td align="right" id="totpar1<?php echo $x ?>"><?php echo number_format($totv1,2,',','.'); ?></td>
                    </tr>
                    <?php }?>
                </table>
            </td>
            <td>
            	<table border="1">
					<tr>
                    	<th colspan="4">TABELA DE DESCONTO 02</th>                     
                    </tr>
                    <tr>
                    	<th>A vista</th>
                        <td><input type="text" size="5" id="avis2" value="<?php echo $res['avista2'] ?>" lang="2" name="2"/></td>
                        <?php $visVal2 = (int)round($valparc-($valparc*$res['avista2']/100));?>
                        <td colspan="2" id="valVista2"><?php echo number_format($visVal2,2,',','.'); ?></td>
                    </tr>
                    <tr>
                    	<th>%</th>
                        <th>Parc</th>
                        <th>Val. Parcela</th>
                        <th>Total</th>
                    </tr>
                    <?php for($x=1; $x <=6 ; $x++){?>
                    <tr>
                    	<td><input type="text" size="5" id="perc2<?php echo $x ?>" value="<?php echo $res['desc2'.$x] ?>" lang="<?php echo $x ?>" name="2"/></td>
                        <td id="par2<?php echo $x ?>"><?php echo $x ?></td>
						<?php $vpar2 = (int)round(($valparc-($valparc*$res['desc2'.$x]/100))/$x);?>
                        <td align="right" id="valpar2<?php echo $x ?>"><?php echo number_format($vpar2,2,',','.'); ?></td>
                        <?php $totv2 = $vpar2 * $x;?>
                        <td align="right" id="totpar2<?php echo $x ?>"><?php echo number_format($totv2,2,',','.'); ?></td>
                    </tr>
                    <?php }?>
                </table>
            </td>
        </tr>
    </table>
</fieldset>
<button id="gvTab"> :: Gravar Alteração :: </button><div id="teste">.........</div>
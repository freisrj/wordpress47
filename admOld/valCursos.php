<?php require('../conect.php'); ?>

<fieldset id="controlePc">
	Selecione o Curso:
    <select name="11" id="selCur" onChange="carregar(123,'tabPc','tabelaPreco.'+this.value)">
        <?php
        echo "<option value='0'></option>";
        $sql1=mysql_query("SELECT * FROM wd_cursos ORDER BY id_cur");
        while($res1=mysql_fetch_array($sql1) ){
            echo "<option value='".$res1['id_cur']."'>".($res1['curso'])."</option>";
        }?>
</select>
<div id="tabPc">........................</div>
</fieldset>
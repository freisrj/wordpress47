<script>
function imprimir_Tabela(theURL,winName,features){
//		gE('imp_recibo').style.display = 'block';
//		gE('imp_recibo_ass').style.display = 'block';
	
	window.open(theURL,winName,features);
}
function receber_imp(){
	c1 = gE('cur01').value;
	c2 = gE('cur02').value;
	c3 = gE('cur03').value;
	imprimir_Tabela('tabelaPrecoImpressa.php?c1='+c1+'&c2='+c2+'&c3='+c3, 'Tabela de Preços', 'width=800,height=600 ,Scrollbars=YES, Toolbar=YES, Directories=NO, Location=NO, Menubar=NO')
}
</script>

<fieldset id="controleXX">
	1º Curso:
    <select name="11" id="st1" onChange="gE('cur01').value = this.value">
        <?php
        echo "<option value='0'></option>";
        $sql1=mysql_query("SELECT * FROM wd_cursos ORDER BY id_tip, id_cur");
        while($res1=mysql_fetch_array($sql1) ){
            echo "<option value='".$res1['id_cur']."'>".($res1['curso'])."</option>";
        }?>
</select><input type="text" id="cur01" size="3" /><br />
	2º Curso:
    <select name="11" id="st2" onChange="gE('cur02').value = this.value">
        <?php
        echo "<option value='0'></option>";
        $sql1=mysql_query("SELECT * FROM wd_cursos ORDER BY id_tip, id_cur");
        while($res1=mysql_fetch_array($sql1) ){
            echo "<option value='".$res1['id_cur']."'>".($res1['curso'])."</option>";
        }?>
</select><input type="text" id="cur02" size="3" /><br />
	3º Curso:
    <select name="11" id="st3" onChange="gE('cur03').value = this.value">
        <?php
        echo "<option value='0'></option>";
        $sql1=mysql_query("SELECT * FROM wd_cursos ORDER BY id_tip, id_cur");
        while($res1=mysql_fetch_array($sql1) ){
            echo "<option value='".$res1['id_cur']."'>".($res1['curso'])."</option>";
        }?>
</select><input type="text" id="cur03" size="3" /><br />

	<fieldset id="relato">
	<legend></legend>
		<button type="button" onClick="receber_imp();" id="tabelaPc">Imprimir tabela de Preço dos cursos</button>
	</fieldset>
	<fieldset>

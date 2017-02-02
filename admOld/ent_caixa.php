<?php session_start();
require('../conect.php');?>

<?php $sql = "SELECT * FROM caixa WHERE data = CURDATE() and unidade=".$_SESSION['unid']." ORDER BY data";
$query = mysql_query($sql);
if($res=mysql_fetch_array($query)){?>
<fieldset>
	<legend>Lançamentos</legend>
<!--<form>-->
		Tipo:
		<?php $sql = "SELECT * FROM lista_caixa WHERE id_cai>2 ORDER BY id_cai";
//echo $sql;
		$query = mysql_query($sql);?>
        <input type="hidden" id="Cunid" value="<?php echo $_SESSION['unid'] ?>" />
		<select id="Cconta">
			<option></option>
			<?php 
			while( $res=mysql_fetch_array($query) ){
				echo "<option>".$res['descricao']."</option>";
			}
			?>
		</select>
		Descrição:<input type="text" id="Cdesc" size="40" maxlength="200"/>
		Crédito:<input type="text" id="Ccred" size="10" />
		Débito:<input type="text" id="Cdebi" size="10"/>

<button onclick="Ent_caixa()"> Enviar </button>
<!--</form>-->
<input id="idLer" type="hidden" />
Obs: Centavo separado com '.' ponto.
</fieldset>
<? }?>
<fieldset>
<!--<form>-->
		Conta:
		<?php $sql = "SELECT * FROM lista_despesas ";
		$query = mysql_query($sql);?>
		<select id="Dconta">
			<option></option>
			<?php 
			while( $res=mysql_fetch_array($query) ){
				echo "<option>".$res['descricao']."</option>";
			}
			?>
		</select>
		Descrição:<input id="Ddesc" type="text" size="40" maxlength="200">
		Valor:<input type="text" id="Dvalor" size="10" onkeyup="atuaValor(this.value)">
		Dia de Vencimento:
		<select id='Ddia' >
			<?php 
			for($x=1; $x<=31; $x++ ){
				if( date('d')==$x ){$z = "selected";}else{$z = '';}
				echo "<option $z>".$x."</option>";
			}
			?>
		</select>
		Valor Pago:<input type="text" size="10" id="vpg" >
		Data de Pagamento:<input id="Ddata" type="text" size="10" maxlength="10" value="<?php echo 	date("d/m/Y");?>">

<button onclick="Ent_despesas()"> Enviar </button>
<!--</form>-->
<input id="idLer" type="hidden" />

</fieldset>
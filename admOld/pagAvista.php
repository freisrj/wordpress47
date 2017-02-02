<fieldset id="avista">
	<legend>A Vista</legend>
	<table>
	<tr>
		<td>Valor:<input type="text" id="valoravista" /></td>
		<td>Desconto:<input type="text" id="descavista" /></td>
		<td>à Pagar:<input type="text" id="pagoavista" /></td>
		<td>Data:
			<input type="text" id="dataavista" />
		</td>
	</tr><tr>
		<td>Especie:
			<select id="especie">
				<option value="1">Dinheiro</option>
				<option value="2">Cheque</option>
				<option value="3">Boleto</option>
				<option value="4">Cartão</option>
				<option value="5">Depósito</option>
				<option value="6">Empenho</option>
			</select>
		</td>
		<td>Banco:
		<input type="text" name="banco" id="banco" maxlength="15" size="10" /></td>
		<td>Número do Cheque:
		<input type="text" name="cheque" id="cheque" maxlength="10" size="10" /></td>
		<td>Titular:
		<input type="text" name="titular" id="titular" maxlength="40" size="30" /></td>
	</tr>
	</table>
	<button id="confavista">Confirmar</button>
	<button id="cancPag2">Cancelar</button>
</fieldset>

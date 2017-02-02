<fieldset id="parcelado">
<?php $fm = $_GET['forma'];?>
<legend><?php echo ($fm==2?'Parcelado':'A vista'); ?></legend>
<table>
	<?php if($fm==2){?>
	<tr>
		<th>Parcela(s):</th>
		<td style="text-align:left">
			<select id="Nparcela">
				<option>0</option>
				<?php 
				for($p=1;$p<=6;$p++){
					echo "<option value='$p'>$p</option>";
				}?>
			</select>
		</td>
    </tr>
    <?php }?>
     <tr>
		<th>Especie:</th>
		<td style="text-align:left">
			<select id="especie" onchange="qOpcao(this.value)">
				<option value="0"></option>            
				<option value="1">Dinheiro</option>
				<option value="2">Cheque</option>
				<option value="3">Boleto</option>
				<option value="4">Cartão</option>
				<option value="5">Depósito</option>
				<option value="6">Empenho</option>
			</select>
		</td>
		<td colspan="6" style="text-align:left" nowrap="nowrap">
             (Data) Dia
             <select id="diaV">
					<?php $dh = date('d');
                    for($d=1;$d<=31;$d++){
                        if($d==$dh){
                            echo "<option selected='selected' value='$d'>".$d."</option>";
                        }else{
                            echo "<option value='$d'>".$d."</option>";
                        }
                    }?>
                </select>
				mês
                 <select id="mesV">
					<?php $mh = date('m');
                    for($m=1;$m<=12;$m++){
                        if($m==$mh){
                            echo "<option selected='selected' value='$m'>".$m."</option>";
                        }else{
                            echo "<option value='$d'>".$m."</option>";
                        }
                    }?>
                </select>
                 ano
                 <select id="anoV">
					<?php $ah = date('Y');
                    for($a=2010;$a<=2020;$a++){
                        if($a==$ah){
                            echo "<option selected='selected' value='$m'>".$a."</option>";
                        }else{
                            echo "<option value='$d'>".$a."</option>";
                        }
                    }?>
                </select>		
		</td>		
   </tr><tr>
		<th>Valor:</th>
		<td style="text-align:left"><input type="text" name="valorT" id="valorT" maxlength="20" size="20" /></td>
		<th>Extenso:</th>
		<td colspan="3" style="text-align:left"><input type="text" name="extenV" id="extenV" maxlength="80" size="50" /></td>
	</tr>
    <tr id="bb"></tr>
</table>
<table>
	<tr>
		<td><button type="button" id="montar">Montar Tabela</button></td>
		<td><button type="button" id="cancPag1">Cancelar</button></td>
	</tr>
</table><input type="text" id="opPag" value="0" />
</fieldset>
<div id="tabela"></div>
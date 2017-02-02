<fieldset>
	<?php 
	$parc 	= $_GET['parc'];
	$mens	= $_GET['valorT'] / $parc;
	$espe	= $_GET['espe'];
	$band	= $_GET['band'];
	$banc	= $_GET['banc'];
	$cheq	= $_GET['cheq'];
	$titu		= $_GET['titu'];
	$dia		= $_GET['dia'];
	$mes	= $_GET['mes'];
	$ano	= $_GET['ano'];
	?>
	<table border="1">
		<tr>
			<th>Nº</th>
			<th>Valor</th>
			<th>Especie</th>
			<th>Bandeira</th>
			<th>Banco</th>
			<th>Nº cheque</th>
			<th>Titular</th>
			<th>Dia</th>
			<th>Mês</th>
			<th>Ano</th>
		</tr>
		<?php
		for($x=1;$x<=$parc;$x++){?>
		<tr>
			<td id="parc<?php echo $x ?>"><?php echo $x; ?></td>
			<td >
			<input type="text" style="text-align:right" size="10" id="valor<?php echo $x ?>" value="<?php echo number_format($mens,2,'.',''); ?>" /></td>
			<td>
				<select id="espe<?php echo $x ?>">
					<?php
					$Tesp = array('','Dinheiro','Cheque','Boleto','Cartão','Depósito','Empenho');
					$t = count($Tesp);
					for($z=1;$z<=$t;$z++){
						if( $z == $espe ){
							echo "<option value=".$Tesp[$z]." selected>".$Tesp[$z]."</option>";
						}else{
							echo "<option value=".$Tesp[$z]." >".$Tesp[$z]."</option>";
						}
					}
					?>
				</select>
			</td>
			<td><input id="band<?php echo $x ?>" type="text" size="5" value="<?php echo $band; ?>" /></td>
			<td><input id="banc<?php echo $x ?>" type="text" size="5" value="<?php echo $banc; ?>" /></td>
			<td><input id="cheq<?php echo $x ?>" type="text" size="5" value="<?php echo ($espe==2?$cheq++: ''); ?>" /></td>
			<td><input id="titu<?php echo $x ?>" type="text" size="20" value="<?php echo $titu; ?>" /></td>
			<td>
				<select id="dia<?php echo $x ?>">
					<?php 
					for($d=1;$d<=31;$d++){
						if( $d == $dia ){
							echo "<option value='$d' selected>$d</option>";
						}else{
							echo "<option value='$d'>$d</option>";
						}
					}?>
				</select>
			</td>
			<td>
				<select id="mes<?php echo $x ?>">
					<?php
					for($m=1;$m<=12;$m++){
						if( $m == $mes ){
							echo "<option value='$m' selected>".$m."</option>";
						}else{
							echo "<option value='$m'>".$m."</option>";
						}
					}?>
				</select>	
			</td>
			<td>
				<select id="ano<?php echo $x ?>">
					<?php 
					for($ah=2010;$ah<=2020;$ah++){
						if( $ah == $ano ){
							echo "<option value='$ah' selected>".$ah."</option>";
						}else{
							echo "<option value='$ah'>".$ah."</option>";
						}
					}					
					if( $mes>=12 ){ $mes=1; $ano++;}else{$mes++;}?>					
				</select>						
			</td>
		</tr>
		<?php }?>
	</table>
	<button type="button" id="confParc" value="<?php echo $parc ?>">Confirmar</button>
	<button type="button" id="cancParc">Cancelar</button>
</fieldset>
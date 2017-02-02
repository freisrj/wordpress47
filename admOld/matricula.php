<div id="forMat">
<form name="cadastro" id="cadastro" method="post">
<div id="esq">
<fieldset>
<legend>Selecione a Turma</legend>
	Turma:
	<span id="seleTur">
	<input type="hidden" name="idtur" id="idtur" />
	<select id="cursoS" style="font-size:18px;" >
		<option></option>
		<?php 
//		$sql = mysql_query("SELECT t.id_tur,c.curso,t.dias,t.turno FROM wd_cursos c 
//										INNER JOIN wd_turmas t USING(id_cur) 
//										ORDER BY t.id_cur,t.inicio");
//		while($res=mysql_fetch_array($sql) ){
//			echo "<option value='".$res['curso']."' >" . $res['turno'] . " || " . $res['curso']  . " || " . $res['dias'] . "</option>";
//		}
		?>
	</select>
	</span>
    <!--atendente:--><label id="id_atendente" style="display:none"><?php echo $_SESSION['idfun'] ?></label>
</fieldset>
<fieldset>
<input type="hidden" name="tipo_alu" id="tipo_alu" /> <!--1=aluno  2=pre-->
<legend>Dados do Aluno</legend>
<table>
	<tr>
		<th width="100">Matrícula:</th>
		<td width="240"><input name="matr" id="matr" style="font-size:18px; border:none;" size="2" onkeypress="buscaMat()" /></td>
        <td colspan="2"><button id="busMat" onclick="mostrarBusca()"> buscar </button></td>
	</tr><tr>
		<th>Nome:</th>
		<td><input type="text" name="nome" id="nome" maxlength="50" size="40" onclick="ativar()" /><label id="lisN"></label></td>
		<td width="49"><button id="pre" type="button">PRE</button></td>
		<td width="46"><button id="pos" type="button">POS</button></td>
		<td width="46"><button id="can" type="button">CAN</button></td>
	</tr><tr>
		<th>Endereço:</th>
		<td colspan="5"><input type="text" name="ende" id="ende" maxlength="50" size="45" /></td>
	</tr><tr>
		<th>Bairro:</th>
		<td colspan="5"><input type="text" name="bair" id="bair" maxlength="25" size="20" /></td>
	</tr><tr>
		<th>Cidade:</th>
		<td colspan="5"><input type="text" name="cida" id="cida" maxlength="25" size="20" /></td>
	</tr><tr>
		<th>Estado:</th>
		<td colspan="5"><input type="text" name="esta" id="esta" maxlength="2" size="2" value="RJ" /></td>
	</tr><tr>
		<th>Cep:</th>
		<td colspan="5"><input type="text" name="cep" id="cep" maxlength="9" size="8" onkeyup="tcep(this.name)" /></td>
	</tr><tr>
		<th>E-Mail:</th>
		<td colspan="5"><input type="text" name="emai" id="emai" maxlength="50" size="50" /></td>
	</tr><tr>
		<th>Data Nasc:</th>
		<td colspan="5"><input type="text" name="nasc" id="nasc" maxlength="10" size="10" onkeyup="tnas(this.name)" /> <b>dd/mm/aaaa</b></td>
	</tr><tr>
		<th>CPF:</th>
		<td colspan="3"><input type="text" name="cpf" id="cpf" maxlength="14" size="19" onkeyup="tcpf(this.name)" /></td>
	</tr><tr>
		<th>Identidade:</th>
		<td colspan="5" nowrap="nowrap"><input type="text" name="iden" id="iden" maxlength="20" size="20" />  Orgão:<input type="text" name="org" id="org" maxlength="20" size="15" /></td>
	</tr><tr>
		<th>Estado Civil:</th>
		<td colspan="5">
			<select name="civil" id="civil">
				<option value="1">Solteiro(a)</option>
				<option value="2">Casado(a)</option>
				<option value="3">Separado(a)</option>
				<option value="4">Divorciado(a)</option>
				<option value="5">Viuvo(a)</option>
			</select>
		</td>
	</tr><tr>
		<th>Nacionalidade:</th>
		<td colspan="5">
			<select name="naci" id="naci">
				<option value="1">Brasileiro</option>
				<option value="2">Sul Americano</option>
				<option value="3">Norte Americano</option>
				<option value="4">Europeu</option>
				<option value="5">Asiatico</option>
				<option value="6">Africano</option>
			</select>
		</td>
	</tr><tr>
		<th>Profissão:</th>
		<td colspan="5"><input name="prof" id="prof" type="text" maxlength="40" size="40" /></td> 
	</tr><tr>
		<th>Telefone:</th>
		<td colspan="5"><input type="text" name="tele" id="tele" maxlength="13" size="13" onkeyup="ttel(this.name)" /></td>
	</tr><tr>
		<th>Celular:</th>
		<td colspan="5"><input type="text" name="celu" id="celu" maxlength="13" size="13" onkeyup="ttel(this.name)" /></td>
	</tr><tr>
		<th>Nextel:</th>
		<td colspan="5"><input type="text" name="next" id="next" maxlength="15" size="15" /></td>
	</tr><tr>
		<th>Materias:</th>
		<td colspan="5" nowrap="nowrap"><input type="radio" name="mate" id="mate0" checked="checked" />Total &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="mate" id="mate1" />Parcial</td>
	</tr>
</table>
</fieldset>
<fieldset>
<legend>Dados do Responsável</legend>
<table>
	<tr>
		<th>Nome/Empresa:</th>
		<td colspan="3">
			<input type="text" name="Rnome" id="Rnome" maxlength="50" size="40" />
			<button id="resp" type="button">Próprio</button>
		</td>
	</tr><tr>
		<th>Endereço:</th>
		<td colspan="5"><input type="text" name="Rende" id="Rende" maxlength="50" size="45" /></td>
	</tr><tr>
		<th>Bairro:</th>
		<td colspan="5"><input type="text" name="Rbair" id="Rbair" maxlength="25" size="20" /></td>
	</tr><tr>
		<th>Cidade:</th>
		<td colspan="5"><input type="text" name="Rcida" id="Rcida" maxlength="25" size="20" /></td>
	</tr><tr>
		<th>Estado:</th>
		<td colspan="5"><input type="text" name="Resta" id="Resta" maxlength="2" size="2" value="RJ" /></td>
	</tr><tr>
		<th>Cep:</th>
		<td colspan="5"><input type="text" name="Rcep" id="Rcep" maxlength="9" size="8" onkeyup="tcep(this.name)" /></td>
	</tr><tr>
		<th>E-Mail:</th>
		<td colspan="5"><input type="text" name="Remai" id="Remai" maxlength="50" size="50" /></td>
	</tr><tr>
		<th><input type="radio" name="trc" checked="checked" onclick="trocarMask(1)" />CPF / CNPJ<input type="radio" name="trc" onclick="trocarMask(2)" /></th>
		<td colspan="3" id="cpfCnpj"><input type="text" name="Rcpf" id="Rcpf" maxlength="14" size="19" onkeyup="tcpf(this.name)" />
        <label id="maskara">999.999.999-99</label></td>
	</tr>
    <tr><td colspan="5">
    	<table id="emp1">
            <tr>
                <th>Identidade:</th>
                <td colspan="1"><input type="text" name="Riden" id="Riden" maxlength="20" size="20" /></td>
                <th>Orgão:</th>
                <td colspan="3"><input type="text" name="Rorg" id="Rorg" maxlength="20" size="15" /></td>
            </tr><tr>
                <th>Data Nasc:</th>
                <td colspan="5"><input type="text" name="Rnasc" id="Rnasc" maxlength="10" size="10" onkeyup="tnas(this.name)" /> 
                <b>dd/mm/aaaa</b></td>
            </tr><tr>
                <th>Estado Civil:</th>
                <td colspan="5">
                    <select name="Rcivil" id="Rcivil">
                        <option value="1">Solteiro(a)</option>
                        <option value="2">Casado(a)</option>
                        <option value="3">Separado(a)</option>
                        <option value="4">Divorciado(a)</option>
                        <option value="5">Viuvo(a)</option>
                    </select>
                </td>
            </tr><tr>
                <th>Nacionalidade:</th>
                <td colspan="5">
                    <select name="Rnaci" id="Rnaci">
                        <option value="1">Brasileiro</option>
                        <option value="2">Sul Americano</option>
                        <option value="3">Norte Americano</option>
                        <option value="4">Europeu</option>
                        <option value="5">Asiatico</option>
                        <option value="6">Africano</option>
                    </select>
                </td>
            </tr><tr>
                <th>Profissão:</th>
                <td colspan="5"><input name="Rprof" id="Rprof" type="text" maxlength="40" size="40" /></td> 
            </tr>
    	</table>
    	<table id="emp2" style="display:none">
            <tr>
                <th colspan="2" nowrap="nowrap">Inscrição Estadual:</th>
                <td colspan="4"><input type="text" name="Rie" id="Rie" maxlength="20" size="20" /></td>
                </tr><tr>
                    <th colspan="2" nowrap="nowrap">Inscrição Municipal:</th>
                    <td colspan="4"><input type="text" name="Rim" id="Rim" maxlength="20" size="20" /> </td>
                </tr><tr>
            	</tr>
          	</table>
        </td>
    <tr>
		<th>Tel. 1:</th>
		<td><input type="text" name="Rtele1" id="Rtele1" maxlength="13" size="13" onkeyup="ttel(this.name)" /></td>
		<th>Ramal 1:</th>
		<td><input type="text" name="Ramal1" id="Ramal1" maxlength="5" size="5" /></td>
	</tr><tr>
		<th>Tel. 2:</th>
		<td><input type="text" name="Rtele2" id="Rtele2" maxlength="13" size="13" onkeyup="ttel(this.name)" /></td>
		<th>Ramal 2:</th>
		<td><input type="text" name="Ramal2" id="Ramal2" maxlength="5" size="5" /></td>
	</tr><tr>
		<th>Tel. 3:</th>
		<td><input type="text" name="Rtele3" id="Rtele3" maxlength="13" size="13" onkeyup="ttel(this.name)" /></td>
		<th>Ramal 3:</th>
		<td><input type="text" name="Ramal3" id="Ramal3" maxlength="5" size="5" /></td>
	</tr><tr>
		<th>Nextel ID:</th>
		<td colspan="5"><input type="text" name="Rnext" id="Rnext" maxlength="15" size="15" /></td>
	</tr>
</table>
</fieldset>
<fieldset style="text-align:center">
<button id="gravCad" type="button" disabled> ::: Confirmar ::: </button>
<label id="tipoMat"></label>
<input id="Gtip" type="hidden" value="000" />
<input id="idLer" type="hidden" />
</fieldset>
</div>
<div id="dir">
	<fieldset id="refazer_pag">
	<legend>Opções</legend>
		<button type="button" id="refaz_pag">Refazer o Pagamento</button>
		<button type="button" id="refaz_2via">Imprimir 2ª Via</button>
		<button type="button" id="refaz_2viaC">Imprimir 2ª Via Contrato</button>
		<button type="button" id="CUPOM">Imprimir cupom de desconto</button>
	</fieldset>
	<fieldset>
		<legend>Forma de Pagamento</legend>
		Parcelado [<input type="radio" name="forma" id="formaP" />]&nbsp;&nbsp;&nbsp;
		[<input type="radio" name="forma" id="formaA">] Avista
	<div id="pagamento">
	</div>
	<div id="ver_forma_pag">
		<?php include("tab_Consulta.php"); ?>
	</div>
	</fieldset>
</div>
<fieldset id="imp_recibo_ass">
<!--	Assinatura do Curso: &nbsp;&nbsp;&nbsp;
	<input type="radio" id="assinatura1" name="assinatura" value="01" />Wan-Dall
    &nbsp;&nbsp;&nbsp;
	<input type="radio" id="assinatura2" name="assinatura" checked="checked" value="02" />Rosa
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" id="assinatura3" name="assinatura" value="03" />Fernanda-->
</fieldset>
</form>
	<br /><br />
	<fieldset id="imp_recibo" style="display:none">
	<td><button type="button" id="reciboPag" onclick="reciboPag('reciboPag.php', 'Recibo de Pagamento', 'width=800,height=600 ,Scrollbars=YES, Toolbar=YES, Directories=NO, Location=NO, Menubar=NO')">Imprimir Recibo</button></td>
		<td><button type="button" id="reciboPagContrato" onclick="reciboPag('reciboPagContrato.php', 'Recibo de Pagamento', 'width=800,height=600 ,Scrollbars=YES, Toolbar=YES, Directories=NO, Location=NO, Menubar=NO')">Imprimir Recibo Contrato</button></td>
	</fieldset>
</div>
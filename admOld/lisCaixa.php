<?php session_start();?>
<?php
require('../conect.php');

$matual = ( isset($_GET['mesI']) ? $_GET['mesI'] : date('m'));
//echo '----->'.$_SESSION['unid'].' - '.$_SESSION['acesso'].'<----';
if( $_SESSION['acesso'] == 9 ){?>
	<button id="acessR" onclick="carregar(3,'corpo','finCaixa.'+1);">Rio</button>
	<button id="acessN" onclick="carregar(4,'corpo','finCaixa.'+2);">Niterói</button>
<?php }else{
}
if( $_SESSION['unid']!=0 ){
 	$unidX = $_SESSION['unid'];
?>
<table border="1">
	<tr> 
		<th style="background:#036; color:#FFF"><h2>TIPO</h2></th>
		<th style="background:#036; color:#FFF"><h2>DESCRIÇÃO</h2></th>
		<th style="background:#036; color:#FFF"><h2>DÉBITO</h2></th>
		<th style="background:#036; color:#FFF"><h2>CRÉDITO</h2></th>
	</tr>
<?php 
if(isset($_GET['dia'])){
	$cdata = ($_GET['ano']).'-'.($_GET['mes']).'-'.($_GET['dia']);
}else{
	$cdata = date('Y-m-d');
}
//echo $cdata;
$sql = "SELECT * FROM caixa WHERE data = '$cdata' and unidade=".$unidX." ORDER BY data";
//echo $sql;
$query = mysql_query($sql);
if($res=mysql_fetch_array($query)){
	$cont=0;
	$sql = "SELECT * FROM caixa WHERE data = '$cdata' and unidade=$unidX AND conta<>'Saldo dia' ORDER BY id_cai";
	//echo $sql;
	$query = mysql_query($sql);
	while($res=mysql_fetch_array($query)){
		$cont++;
		echo "<tr>";
		echo "<td style='text-align:left' width='200' bgcolor='".($cont==1?'#FFFFDF':'')."'>".$res['conta']."</td>";
		echo "<td style='text-align:left' width='350' bgcolor='".($cont==1?'#FFFFDF':'')."'>".$res['descricao']."</td>";
		echo "<td style='text-align:right' width='150' bgcolor='".($cont==1?'#FFFFDF':'')."'>".number_format($res['debito'],2,',','.')."</td>";
		echo "<td style='text-align:right' width='150' bgcolor='".($cont==1?'#FFFFDF':'')."'>".number_format($res['credito'],2,',','.')."</td>";
		if( $_SESSION['acesso'] == 9 ){
			echo "<td><button id='btCx' style='height:20px; border:0px #000 solid;' onclick='excluirCX(".$res['id_cai'].")'>&ni;</button></td>";
		}else{
			echo "<td></td>";
		}
		echo  '</tr>';
	}
	//-----------------------------ultimos calculos
	$sql = "SELECT * FROM caixa WHERE data = '$cdata' and unidade=$unidX AND conta='Saldo dia'";
	//echo $sql;
	$query = mysql_query($sql);
	$res=mysql_fetch_array($query);
	echo "<tr class='totpg'>";
	echo "<td colspan='2'>Totais......................................................................................................</td>";
	echo "<td style='text-align:right'>".number_format($res['debito'],2,',','.')."</td>";
	echo "<td style='text-align:right'>".number_format($res['credito'],2,',','.')."</td>";
	echo  '</tr>';
	echo "<tr class='totgeral'>";
	echo "<td colspan='3'>".$res['conta'].".................................................................................................................................</td>";
	echo "<td style='text-align:right'><h3>".number_format($res['credito']-$res['debito'],2,',','.')."</h3></td>";
	echo "<td></td>";
	echo  '</tr>';
}else{?>
	<button style="" onclick="carregar(3,'fuga','abrirCaixa.'+<?php echo $_SESSION['unid']; ?>)" >abrir o caixa!</button>
	<?php $sql = "SELECT * FROM caixa WHERE data=(SELECT MAX(data) FROM caixa WHERE unidade=$unidX) AND conta='Saldo dia' and unidade=$unidX ORDER BY data"; // mostra o ultima saldo do dia
	//echo $sql;
	$query = mysql_query($sql);
	$res=mysql_fetch_array($query);
	$cont++;
	echo "<tr>";
	echo "<td id='Ct$cont' style='text-align:left;' width='200'>".$res['conta']."</td>";
	echo "<td id='Ds$cont' style='text-align:left' width='350'>".$res['descricao']."</td>";
	echo "<td id='Db$cont' style='text-align:right' width='150'>".number_format($res['debito'],2,',','.')."</td>";
	echo "<td id='Cd$cont' style='text-align:right' width='150'>".number_format($res['credito'],2,',','.')."</td>";
	echo "<td>&ni;</td>";
	
	$sql = "SELECT * FROM alunos a INNER JOIN pagamentos p USING(id_alu) 
			WHERE data_matricula = '$cdata' and matr_unidade=".$unidX." ORDER BY id_pag";
	//echo $sql;
	$query = mysql_query($sql);
	while($res=mysql_fetch_array($query)){
		$cont++;
		echo "<tr>";
		echo "<td id='Ct$cont' style='text-align:left' width='200'>".'Matrícula:'.$res['id_alu']."</td>";
		echo "<td id='Ds$cont' style='text-align:left' width='350'>".$res['parcela'].' parcela'.' - '.$res['especie'].' - '.$res['bandeira']."</td>";
		$vali = ($res['especie']=='Ca' || $res['especie']=='Bo'?$res['valor']:'');
		echo "<td id='Db$cont' style='text-align:right' width='150'>".number_format($vali,2,',','.')."</td>";
		echo "<td id='Cd$cont' style='text-align:right' width='150'>".number_format($res['valor'],2,',','.')."</td>";
		echo "<td>&ni;</td>";
	}
}echo "<label id='totSal'>$cont</label>";
}
?>
</table> 
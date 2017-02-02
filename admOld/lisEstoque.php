<?php session_start();?>
<?php
require('../conect.php');

$matual = ( isset($_GET['mesI']) ? $_GET['mesI'] : date('m'));
//echo '----->'.$_SESSION['unid'].' - '.$_SESSION['acesso'].'<----';
if( $_SESSION['unid']==0 or $_SESSION['acesso'] == 9 ){?>
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
		<th style="background:#036; color:#FFF"><h2>QUANT.</h2></th>
	</tr>
<?php 
	if(isset($_GET['dia'])){
		$cdata = ($_GET['ano']).'-'.($_GET['mes']).'-'.($_GET['dia']);
	}else{
		$cdata = date('Y-m-d');
	}
	//echo $cdata;
	$sql = "SELECT * FROM estoque WHERE unidade=".$unidX." ORDER BY id_est";
	//echo $sql;
	$query = mysql_query($sql);
	while($res=mysql_fetch_array($query)){
		$cont++;
		echo "<tr>";
		echo "<td style='text-align:left' width='200' bgcolor='".($cont==1?'#FFFFDF':'')."'>".$res['tipo']."</td>";
		echo "<td style='text-align:left' width='350' bgcolor='".($cont==1?'#FFFFDF':'')."'>".$res['descricao']."</td>";
		echo "<td style='text-align:center' width='50' bgcolor='".($cont==1?'#FFFFDF':'')."'>".$res['quant']."</td>";
		echo "<td style='text-align:center' width='50' bgcolor='".($cont==1?'#FFFFDF':'')."'>"."<button style='width='20''> - </button>"."</td>";
		echo "<td>";
		echo "</td>";
		echo  '</tr>';
	}
}
?>
</table> 
<?php session_start();?>
<?php
require('../conect.php');
$idcai = $_GET['idcai'];
$cdata = ($_GET['ano']).'-'.($_GET['mes']).'-'.($_GET['dia']);
echo $idcai;
$unid = $_SESSION['unid'];
$sqlx = "SELECT * FROM caixa WHERE data='$cdata'
		AND unidade=$unid
		ORDER BY id_cai";
echo $sqlx;
$query = mysql_query($sqlx);$cont=0; $somaDeb=0; $somaCre=0;
echo mysql_num_rows($query);
while($res=mysql_fetch_array($query)){
	if($res['conta']=='Saldo dia'){
	}else{
		$somaDeb+=$res['debito'];
		$somaCre+=$res['credito'];
		$data = $res['data'];
	}
}
echo $somaDeb.'--'.	$somaCre;
$sqly = "UPDATE caixa SET debito=$somaDeb, credito=$somaCre 
					WHERE conta='Saldo dia' AND data='$data' AND unidade=$unid ";
$query = mysql_query($sqly);
echo $sqly;
?>
</table> 
<?php session_start();?>
<?php
require('../conect.php');
$idcai = $_GET['idcai'];
$sql = "DELETE FROM caixa WHERE id_cai=$idcai";
$query = mysql_query($sql);
//echo $cdata;

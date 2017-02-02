<?php require('../conect.php'); ?>
<?php 
if(isset($_GET['unid'])){
	if($_GET['unid']>0){
		session_start();
		$_SESSION['unid'] = $_GET['unid'];}
}
//echo '('.$_GET['unid'].')'.$_SESSION['unid'];
include('ent_caixa.php'); ?>
<h2>ESTOQUE DE MATERIAL</h2>
<fieldset id="lisdesp">
<?php 
include('lisEstoque.php'); ?>
</fieldset>
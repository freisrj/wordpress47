<?php require('../conect.php'); ?>
<?php 
if(isset($_GET['unid'])){
	if($_GET['unid']>0){
		session_start();
		$_SESSION['unid'] = $_GET['unid'];}
}
//echo '('.$_GET['unid'].')'.$_SESSION['unid'];
include('ent_caixa.php'); ?>
<h2>Caixa: 
<?php	$sql ="SELECT distinct data FROM caixa ORDER BY data DESC";
//echo $sql;
$sql = mysql_query($sql);?>
	<select id="cxD">
<?php while($res=mysql_fetch_array($sql) ){ $dt = explode('-',$res['data'])?>
        <option ><?php echo $dt[2]?></option>
<?php }?>
    </select>
    <select id="cxM">
<?php mysql_data_seek($sql,0); $m=0;
while($res=mysql_fetch_array($sql) ){ $dt = explode('-',$res['data']);
	if($dt[1]!=$m){
        echo "<option>$dt[1]</option>";
		$m = $dt[1]; 
	}
}?>
    </select>
    <select id="cxA">
<?php mysql_data_seek($sql,0); $a=0;
while($res=mysql_fetch_array($sql) ){ $dt = explode('-',$res['data']);
	if($dt[0]!=$a){
        echo "<option>$dt[0]</option>";
		$a=$dt[0];
	}
}?>
    </select>
<button onclick="carregar(14,'lisdesp','lisCaixaDT.')"> <> </button> 
 </h2>
<fieldset id="lisdesp">
<?php 
include('lisCaixa.php'); ?>
</fieldset>
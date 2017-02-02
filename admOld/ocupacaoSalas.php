<?php require('../conect.php'); ?>
<div id="salas">
<h2>Ocupação das Salas</h2>
<hr />

<table border="1" cellpadding="0" cellspacing="0">
	<tr>
    	<th rowspan="2">Unidade</th>
    	<th rowspan="2" colspan="2">Distribuição de Turmas</th>
<?php      
     $diaDoMes  = date("j");
	 $diaSemana = date('w');
	 $mesNumero = date("m");
	 $segundaFeira = $diaDoMes - $diaSemana + 1;
	 $segundaFeira = $diaDoMes - ($diaSemana==0?7:$diaSemana) +1;
	 $s= 0;
//	echo '('.$segundaFeira.'-'.$diaDoMes.'-'.($diaSemana ).')';
$dat = array();
for($x=$segundaFeira;$x<=$segundaFeira+6;$x++){
	$date = date(($segundaFeira<10?'0':'').$segundaFeira.'/'.date('m').'/'.date('Y'));
	$thisyear = substr ( $date, 6, 4 );
     $thismonth = substr ( $date, 4, 2 );
     $thisday =  substr ( $date, 0, 2 );
     $nextdate = mktime ( 0, 0, 0, $thismonth, $thisday + $s, $thisyear );
	 if($diaDoMes  == strftime("%d", $nextdate)){
		echo "<th style='background:#ff0;'>".strftime("%d/%m", $nextdate).'</th>';
	 }else{
		echo '<th>'.strftime("%d/%m", $nextdate).'</th>';
	 }
	 $dat[$s] = strftime("%Y-%m-%d", $nextdate);
//	$diaSemana = date('w');
	$s++;
}
?>
    </tr>
	<tr>
    	<th>Segunda</th>
    	<th>Terça</th>
    	<th>Quarta</th>
    	<th>Quinta</th>
    	<th>Sexta</th>
    	<th>Sábado</th>
    	<th>Domingo</th>
    </tr>
    <?php 
	$turno = array('Manhã','Tarde','Noite');
	for($x=0;$x<=2;$x++){
	?>
	<tr>
    	<th rowspan="3">Rio</th>
    	<th rowspan="3"><?php echo $turno[$x] ?></th>
        <?php
		for($sala=1;$sala<=3;$sala++){
        echo ($sala==1?'':'<tr>'); // não abrir a linha na primeira vez, por caso da tabela?>
            <th>Sala 0<?php echo $sala; ?></th>
            <?php 
            $sql = "SELECT * FROM wd_turmas 
                                    WHERE inicio<=curdate() AND 
									turno='".$turno[$x]."' AND 
									id_uni=1 AND 
									sala=".$sala;
            $query = mysql_query($sql);
            $res = mysql_fetch_assoc($query);
            $ar = explode('/',$res['dias']);
            $tur = $res['id_tur'];
            $dis = array('Seg','Ter','Qua','Qui','Sex','Sábado','Domingo');
            $te = count($ar); $c = 0;
            for($z=0;$z<=5;$z++){
				$dat1 = strtotime($dat[$z]); $datI = strtotime($res['inicio']); $datT = strtotime($res['termino']);
                if($ar[$c]==$dis[$z] ){ 
					if( $dat1>=$datI && $dat1<=$datT ){
						if($dat[$z]==$res['inicio']){ 
							$mos = 'Ini-'.$tur;
						}elseif($dat[$z]==$res['termino']){
							$mos = 'Ter-'.$tur;
						}else{
							$mos = $tur; 
						}
					}else{
						$mos = '';
					}
					$c++; 
				}else{ 
					$mos = '';
				}
                echo "<td>".$mos."</td>";
            }
            ?>
            <th></th>
        	<?php echo ($sala==1?'':'</tr>');?>
        <?php }?>
    </tr>
    <?php }?>
</table>
</div>
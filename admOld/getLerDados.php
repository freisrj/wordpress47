
<?php
/* Replace the data in these two lines with data for your db connection */
//$connection = mysql_connect("localhost","root","");  
//mysql_select_db("wandallcom",$connection);
require('../conect.php');
$id = $_GET['id'];
//echo "(".$_GET['op']."-".$id.")";
if($_GET['op']==1){
	$sql = mysql_query("SELECT * FROM alunos WHERE id_alu = $id") or die(mysql_error());
	$tipalu = '1';
	$op=1;
}else{
	$sql = mysql_query("SELECT * FROM ca_preMatricula WHERE id_pre = $id ") or die(mysql_error());
	$tipalu = '2';
	$op=0;
}
if($inf = mysql_fetch_assoc($sql)){
  	echo "formObj.tipo_alu.value = '".$tipalu."';\n";    
  	echo "formObj.idLer.value = '".$id."';\n";    
  	echo "formObj.idtur.value = '".$inf['id_tur']."';\n";    
  	echo "formObj.matr.value = '".$inf['id_alu']."';\n";    
  	echo "formObj.nome.value = '".$inf["nome"]."';\n";    
  	echo "formObj.ende.value = '".$inf["endereco"]."';\n";    
  	echo "formObj.bair.value = '".$inf["bairro"]."';\n";    
  	echo "formObj.cida.value = '".$inf["cidade"]."';\n";    
  	echo "formObj.esta.value = '".$inf["estado"]."';\n";    
  	echo "formObj.cep.value = '".$inf["cep"]."';\n";    
  	echo "formObj.emai.value = '".$inf["email"]."';\n";   
	$divi = explode("-", $inf["nascimento"]);	
	$ano = $divi[0];	
	$mes = $divi[1];
	$dia = $divi[2];
	$data = ($dia==00 ? '' : $dia.'/'.$mes.'/'.$ano);
  	echo "formObj.nasc.value = '".$data."';\n";    
	echo "formObj.tele.value = '".$inf["telefone"]."';\n";    
  	echo "formObj.celu.value = '".$inf["celular"]."';\n";  
  	echo "formObj.next.value = '".$inf["nextel"]."';\n";  
  	echo "formObj.Gtip.value = '".$op."';\n";    

	$sqlr = mysql_query("SELECT * FROM responsavel WHERE id_alu = $id ") or die(mysql_error());
	if($infr = mysql_fetch_assoc($sqlr)){
		echo "formObj.Rnome.value = '".$infr["nome"]."';\n";    
		echo "formObj.Remai.value = '".$infr["email"]."';\n";    
		echo "formObj.Rende.value = '".$inf["endereco"]."';\n";    
		echo "formObj.Rbair.value = '".$inf["bairro"]."';\n";    
		echo "formObj.Rcida.value = '".$inf["cidade"]."';\n";    
		echo "formObj.Resta.value = '".$inf["estado"]."';\n";    
		echo "formObj.Rcep.value = '".$inf["cep"]."';\n";    
		$divi = explode("-", $inf["nascimento"]);	
		$ano = $divi[0];	
		$mes = $divi[1];
		$dia = $divi[2];
		$data = ($dia==00 ? '' : $dia.'/'.$mes.'/'.$ano);
		echo "formObj.nasc.value = '".$data."';\n";    
		echo "formObj.Rcpf.value = '".$infr["cpf"]."';\n";    
		echo "formObj.Riden.value = '".$infr["identidade"]."';\n";    
		echo "formObj.Rorg.value = '".$infr["orgao"]."';\n";    
		echo "formObj.Rcivil.value = '".$infr["estado_civil"]."';\n";    
		echo "formObj.Rnaci.value = '".$infr["nacionalidade"]."';\n";    
		echo "formObj.Rprof.value = '".$infr["profissao"]."';\n";    
		echo "formObj.Rtele1.value = '".$infr["telefone1"]."';\n";    
		echo "formObj.Ramal1.value = '".$infr["ramal1"]."';\n";    
		echo "formObj.Rtele2.value = '".$infr["telefone2"]."';\n";    
		echo "formObj.Ramal2.value = '".$infr["ramal2"]."';\n";    
		echo "formObj.Rtele3.value = '".$infr["telefone3"]."';\n";    
		echo "formObj.Ramal3.value = '".$infr["ramal3"]."';\n";    
	  	echo "formObj.Rnext.value = '".$inf["nextel"]."';\n";  

		$sqlr = mysql_query("SELECT * FROM aluno_tur_materias WHERE id_alu = $id ") or die(mysql_error());
		$infr = mysql_fetch_assoc($sqlr);
		if( $infr["materia"] == 1 ){
			echo "formObj.mate0.checked = false;\n";    
			echo "formObj.mate1.checked = true;\n";    
		}else{
			echo "formObj.mate0.checked = true;\n";    
			echo "formObj.mate1.checked = false;\n";    
		}
		$sqlr = mysql_query("SELECT * FROM pagamentos WHERE id_alu = $id ORDER BY   vencimento ") or die(mysql_error());
		for($x=1; $x<=10; $x++){
			echo "formObj.Vpar" . $x . ".value = '';\n";    
			echo "formObj.Vesp" . $x . ".value = '';\n";    
			echo "formObj.Vban" . $x . ".value = '';\n";    
			echo "formObj.Vche" . $x . ".value = '';\n";    
			echo "formObj.Vven" . $x . ".value = '';\n";    
			echo "formObj.Vval" . $x . ".value = '';\n";    
			echo "formObj.Vpag" . $x . ".value = '';\n";    
		}
		$x = 0; $Vtot = 0;
		while($infr = mysql_fetch_assoc($sqlr)){
			$x++;
			echo "formObj.Vpar" . $x . ".value = '".$infr["parcela"]."';\n";    
			echo "formObj.Vesp" . $x . ".value = '".$infr["especie"]."';\n";    
			echo "formObj.Vban" . $x . ".value = '".$infr["banco"]."';\n";    
			echo "formObj.Vche" . $x . ".value = '".$infr["cheque"]."';\n";    
			$divi = explode("-", $infr["vencimento"]);	
			$ano = $divi[0];	
			$mes = $divi[1];
			$dia = $divi[2];
			$data = ($dia==00 ? '' : $dia.'/'.$mes.'/'.$ano);
			echo "formObj.Vven" . $x . ".value = '".$data."';\n";    
			echo "formObj.Vval" . $x . ".value = '".$infr["valor"]."';\n";    
			$Vtot = $Vtot +  $infr["valor"];
			$divi = explode("-", $infr["pago"]);	
			$ano = $divi[0];	
			$mes = $divi[1];
			$dia = $divi[2];
			$data = ($dia==00 ? '' : $dia.'/'.$mes.'/'.$ano);
			echo "formObj.Vpag" . $x . ".value = '".$data."';\n";    
		}
		echo "formObj.Vpar.value = '".$x."';\n";    
		echo "formObj.Vval.value = '".$Vtot."';\n";    
	}
//    echo "formObj.viagem.value = '".utf8_encode($inf["viagem"])."';\n";    
//    echo "formObj.contai.value = '".$inf["container"]."';\n";    
//	$divi = explode("-", $inf["data"]);	
//	$ano = $divi[0];	
//	$mes = $divi[1];
//	$dia = $divi[2];
//	$data = ($dia==00 ? '' : $dia.'/'.$mes.'/'.$ano);
//    echo "formObj.data.value = '".$data."';\n";    
}else{
    echo "formObj.ende.value = ''anananana;\n";    
}
 
?>	

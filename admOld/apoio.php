<?php session_start();?>
<?php require('../conect.php'); ?>
<?php
switch($_GET['op']){
	case 0:
		$idtur = $_GET['idtur'];
		$nome = $_GET['nome'];
		$ende = $_GET['ende'];
		$bair = $_GET['bair'];
		$cida = $_GET['cida'];
		$esta = $_GET['esta'];
		$cep = $_GET['cep'];
		$emai = $_GET['emai'];
		$divi = explode("/", $_GET['nasc']);	
		$ano = $divi[2];	
		$mes = $divi[1];
		$dia = $divi[0];
		$data = ($dia==00 ? '' : $ano.'-'.$mes.'-'.$dia);
		$nasc = $data;
		$civil = $_GET['civil'];
		$naci = $_GET['naci'];
		$prof = $_GET['prof'];
		$cpf = $_GET['cpf'];
		$iden = $_GET['iden'];
		$org = $_GET['org'];
		$tele = $_GET['tele'];
		$mate = $_GET['mate'];
		$celu = $_GET['celu'];
		$next = $_GET['next'];
		$Rnome = $_GET['Rnome'];
		$Rende = $_GET['Rende'];
		$Rbair = $_GET['Rbair'];
		$Rcida = $_GET['Rcida'];
		$Resta = $_GET['Resta'];
		$Rcep = $_GET['Rcep'];
		$Remai = $_GET['Remai'];
		$Rnasc = $_GET['Rnasc'];
		$Rcivil = $_GET['Rcivil'];
		$Rnaci = $_GET['Rnaci'];
		$Rprof = $_GET['Rprof'];
		$Rcpf = $_GET['Rcpf'];
		$Riden = $_GET['Riden'];
		$Rorg = $_GET['Rorg'];
		$Rie = $_GET['Rie'];
		$Rim = $_GET['Rim'];
		$Rtele1 = $_GET['Rtele1'];
		$Ramal1 = $_GET['Ramal1'];
		$Rtele2 = $_GET['Rtele2'];
		$Ramal2 = $_GET['Ramal2'];
		$Rtele3 = $_GET['Rtele3'];
		$Ramal3 = $_GET['Ramal3'];
		$Rnext = $_GET['Rnext'];
		$dataMat = date("Y-m-d");
		$horaMat = date("H:i:s", time()); 
		$netbook = 1;
		$idfun 	= $_GET['idfun'];
		$iduni 	= $_GET['iduni'];
		$sql="INSERT INTO alunos (
				  id_tur,
				  nome,
				  endereco,
				  bairro,
				  cidade,
				  estado,
				  cep,
				  email,
				  nascimento,
				  cpf,
				  identidade,
				  orgao,
				  estado_civil,
				  nacionalidade,
				  profissao,
				  telefone,
				  celular,
				  nextel,
				  data_matricula,
				  hora_matricula,
				  netbook,
				  idfun,
				  matr_unidade)
				  VALUES(
				  '$idtur',
				  '$nome',
				  '$ende',
				  '$bair',
				  '$cida',
				  '$esta',
				  '$cep',
				  '$emai',
				  '$nasc',
				  '$cpf',
				  '$iden',
				  '$org',
				  '$civil',
				  '$naci',
				  '$prof',
				  '$tele',
				  '$celu',
				  '$next',
				  '$dataMat',
				  '$horaMat',
				  '$netbook',
				  '$idfun',
				  '$iduni')";
		mysql_query($sql)or die('erro tabela alunos ' .$sql . mysql_error());
//		echo  . '<br>';
		$sqlm="select max(id_alu) id from alunos";
		$querym = mysql_query($sqlm);
		$resm=mysql_fetch_assoc($querym); //"SELECT id_alu FROM alunos WHERE nome='$nome' AND endereco='$ende' "));
		$idalu = $resm['id'];
//echo '('.$sqlm.' -- '. $idalu.')..............';
		$sql="INSERT INTO responsavel( 
				  id_alu,
				  nome,
				  endereco,
				  bairro,
				  cidade,
				  estado,
				  cep,
				  email,
				  nascimento,
				  cpf,
				  identidade,
				  orgao,
				  estado_civil,
				  nacionalidade,
				  profissao,
				  ie,
				  im,
				  telefone1,
				  ramal1,
				  telefone2,
				  ramal2,
				  telefone3,
				  ramal3,
				  nextel)
				  VALUES(
				  '$idalu',
				  '$Rnome',
				  '$Rende',
				  '$Rbair',
				  '$Rcida',
				  '$Resta',
				  '$Rcep',
				  '$Remai',
				  '$Rnasc',
				  '$Rcpf',
				  '$Riden',
				  '$Rorg',
				  '$Rcivil',
				  '$Rnaci',
				  '$Rprof',
				  '$Rie',
				  '$Rim',
				  '$Rtele1',
				  '$Ramal1',
				  '$Rtele2',
				  '$Ramal2',
				  '$Rtele3',
				  '$Ramal3',
				  '$Rnext')";
		mysql_query($sql)or die('erro tabela responsavel...'.mysql_error());

		if( isset($_GET['id']) ){
			$sql = "DELETE FROM ca_preMatricula WHERE id_pre = " . $_GET['id'];
			mysql_query($sql)or die($_GET['id'].' - ' . $sql . ' - ' . mysql_error());
		}
		$sql="UPDATE wd_turmas SET matriculas=(matriculas+1) WHERE id_tur=$idtur";
		mysql_query($sql)or die('erro tabela wd_turmas...'.mysql_error());
	//	echo $sql . '<br>';
	//	echo 'Aluno matrículado.';
	//	echo '--------';
		$sql="INSERT INTO aluno_tur_materias( 
		  id_tur,
		  id_alu,
		  materia
		  )VALUES(
		  $idtur,
		  $idalu,
		  $mate)";
		mysql_query($sql)or die('erro tabela aluno_tur_materias...'. $sql .' - ' .mysql_error());

		echo $idalu;  // joga para a fuga na qual a confirmacao do parcelamento usa
		break;
	case 1:
		$ende = $_GET['ende'];
		$bair = $_GET['bair'];
		$cida = $_GET['cida'];
		$esta = $_GET['esta'];
		$cep = $_GET['cep'];
		$emai = $_GET['emai'];
		$divi = explode("/", $_GET['nasc']);	
		$ano = $divi[2];	
		$mes = $divi[1];
		$dia = $divi[0];
		$data = ($dia==00 ? '' : $ano.'-'.$mes.'-'.$dia);
		$nasc = $data;
		$civil = $_GET['civil'];
		$naci = $_GET['naci'];
		$prof = $_GET['prof'];
		$cpf = $_GET['cpf'];
		$iden = $_GET['iden'];
		$org = $_GET['org'];
		$tele = $_GET['tele'];
		$celu = $_GET['celu'];
		$next = $_GET['next'];
		$Rnome = $_GET['Rnome'];
		$Rende = $_GET['Rende'];
		$Rbair = $_GET['Rbair'];
		$Rcida = $_GET['Rcida'];
		$Resta = $_GET['Resta'];
		$Rcep = $_GET['Rcep'];
		$Remai = $_GET['Remai'];
		$Rnasc = $_GET['Rnasc'];
		$Rcpf = $_GET['Rcpf'];
		$Riden = $_GET['Riden'];
		$Rorg = $_GET['Rorg'];
		$Rcivil = $_GET['Rcivil'];
		$Rnaci = $_GET['Rnaci'];
		$Rprof = $_GET['Rprof'];
		$Rie = $_GET['Rie'];
		$Rim = $_GET['Rim'];
		$Rtele1 = $_GET['Rtele1'];
		$Ramal1 = $_GET['Ramal1'];
		$Rtele2 = $_GET['Rtele2'];
		$Ramal2 = $_GET['Ramal2'];
		$Rtele3 = $_GET['Rtele3'];
		$Ramal3 = $_GET['Ramal3'];
		$Rnext = $_GET['Rnext'];
		$sql="UPDATE alunos SET 
				  nome = '$nome',
				  endereco = '$ende',
				  bairro = '$bair',
				  cidade = '$cida',
				  estado = '$esta',
				  cep = '$cep',
				  email = '$emai',
				  nascimento='$nasc',
				  estado_civil='$civil',
				  nacionalidade='$naci',
				  profissao='$prof',
				  cpf='$cpf',
				  identidade='$iden',
				  orgao='$org',
				  telefone = '$tele',
				  celular = '$celu',
				  nextel = '$next'
				  WHERE id_alu = " . $_GET['id'];
		mysql_query($sql)or die(mysql_error());
		$sql="UPDATE responsavel SET 
				  nome = '$Rnome',
				  endereco = '$Rende',
				  bairro = '$Rbair',
				  cidade = '$Rcida',
				  estado = '$Resta',
				  cep = '$Rcep',
				  email = '$Remai',
				  nascimento='$Rnasc',
				  cpf='$Rcpf',
				  identidade = '$Riden',
				  orgao='$Rorg',
				  estado_civil='$Rcivil',
				  nacionalidade='$Rnaci',
				  profissao='$Rprof',
				  ie='$Rie',
				  im='$Rim',
				  telefone1 = '$Rtele1',
				  ramal1 = '$Ramal1',
				  telefone2 = '$Rtele2',
				  ramal2 = '$Ramal2',
				  telefone3 = '$Rtele3',
				  ramal3 = '$Ramal3',
				  nextel = '$Rnext'
				  WHERE id_alu = " . $_GET['id'];
		mysql_query($sql)or die(mysql_error());
		echo $_GET['id'];
		break;
	case 2:
		$idtur = $_GET['idtur'];
		$nome = $_GET['nome'];
		$ende = $_GET['ende'];
		$bair = $_GET['bair'];
		$cida = $_GET['cida'];
		$esta = $_GET['esta'];
		$cep = $_GET['cep'];
		$emai = $_GET['emai'];
		$divi = explode("/", $_GET['nasc']);	
		$ano = $divi[2];	
		$mes = $divi[1];
		$dia = $divi[0];
		$data = ($dia==00 ? '' : $ano.'-'.$mes.'-'.$dia);
		$nasc = $data;
		$civil = $_GET['civil'];
		$naci = $_GET['naci'];
		$prof = $_GET['prof'];
		$cpf = $_GET['cpf'];
		$iden = $_GET['iden'];
		$org = $_GET['org'];
		$tele = $_GET['tele'];
		$celu = $_GET['celu'];
		$next = $_GET['next'];
		$Rnome = $_GET['Rnome'];
		$Rende = $_GET['Rende'];
		$Rbair = $_GET['Rbair'];
		$Rcida = $_GET['Rcida'];
		$Resta = $_GET['Resta'];
		$Rcep = $_GET['Rcep'];
		$Remai = $_GET['Remai'];
		$Rnasc = $_GET['Rnasc'];
		$Rcpf = $_GET['Rcpf'];
		$Riden = $_GET['Riden'];
		$Rorg = $_GET['Rorg'];
		$Rcivil = $_GET['Rcivil'];
		$Rnaci = $_GET['Rnaci'];
		$Rprof = $_GET['Rprof'];
		$Rie = $_GET['Rie'];
		$Rim = $_GET['Rim'];
		$Rtele1 = $_GET['Rtele1'];
		$Ramal1 = $_GET['Ramal1'];
		$Rtele2 = $_GET['Rtele2'];
		$Ramal2 = $_GET['Ramal2'];
		$Rtele3 = $_GET['Rtele3'];
		$Ramal3 = $_GET['Ramal3'];
		$Rnext = $_GET['Rnext'];
		$dataMat = date("Y-m-d");
		$horaMat = date("H:i:s", time()); 
		$netbook = 1;
		$idfun 	= $_GET['idfun'];
		$iduni 	= $_GET['iduni'];
		$sql="INSERT INTO alunos (
				  id_tur,
				  nome,
				  endereco,
				  bairro,
				  cidade,
				  estado,
				  cep,
				  email,
				  nascimento,
				  cpf,
				  identidade,
				  orgao,
				  estado_civil,
				  nacionalidade,
				  profissao,
				  telefone,
				  celular,
				  nextel,
				  data_matricula,
				  hora_matricula,
				  netbook,
				  idfun,
				  matr_unidade)
				  VALUES(
				  '$idtur',
				  '$nome',
				  '$ende',
				  '$bair',
				  '$cida',
				  '$esta',
				  '$cep',
				  '$emai',
				  '$nasc',
				  '$cpf',
				  '$iden',
				  '$org',
				  '$civil',
				  '$naci',
				  '$prof',
				  '$tele',
				  '$celu',
				  '$next',
				  '$dataMat',
				  '$horaMat',
				  '$netbook',
				  '$idfun',
				  '$iduni')";
		mysql_query($sql)or die(mysql_error());
//		echo $sql . '<br>';
		$res=mysql_fetch_assoc(mysql_query("select max(id_alu) from alunos")); 
		//$res=mysql_fetch_assoc(mysql_query("SELECT id_alu FROM alunos WHERE nome='$nome' AND endereco='$ende' "));
		$idalu = $res['id_alu'];
		$sql="INSERT INTO responsavel( 
				  id_alu,
				  nome,
				  endereco,
				  bairro,
				  cidade,
				  estado,
				  cep,
				  email,
				  nascimento,
				  cpf,
				  identidade,
				  orgao,
				  estado_civil,
				  nacionalidade,
				  profissao,
				  ie,
				  im,
				  telefone1,
				  ramal1,
				  telefone2,
				  ramal2,
				  telefone3,
				  ramal3,
				  nextel)
				  VALUES(
				  '$idalu',
				  '$Rnome',
				  '$Rende',
				  '$Rbair',
				  '$Rcida',
				  '$Resta',
				  '$Rcep',
				  '$Remai',
				  '$Rnasc',
				  '$Rcpf',
				  '$Riden',
				  '$Rorg',
				  '$Rcivil',
				  '$Rnaci',
				  '$Rprof',
				  '$Rie',
				  '$Rim',
				  '$Rtele1',
				  '$Ramal1',
				  '$Rtele2',
				  '$Ramal2',
				  '$Rtele3',
				  '$Ramal3',
				  '$Rnext',
				  '$idfun')";
		mysql_query($sql)or die('erro tabela responsavel...'.mysql_error());
		if( isset($_GET['id']) ){
			$sql = "DELETE FROM ca_preMatricula WHERE id_pre = " . $_GET['id'];
			mysql_query($sql)or die(mysql_error());
		}
		$sql="UPDATE wd_turmas SET matriculas=(matriculas+1) WHERE id_tur=$idtur";
		mysql_query($sql)or die('erro tabela wd_turmas...'.mysql_error());
	//	echo $sql . '<br>';
	//	echo 'Aluno matrículado.';
	//	echo '--------';
		$sql="INSERT INTO aluno_tur_materias( 
		  id_tur,
		  id_alu,
		  materia
		  )VALUES(
		  $idtur,
		  $idalu,
		  $mate)";
		mysql_query($sql)or die('erro tabela aluno_tur_materias...'. $sql .' - ' .mysql_error());

		echo $idalu;
		break;
	case 3:
		$qt  = $_GET['qt'];
		$idalu = $_GET['idalu'];
		$idtur = $_GET['idtur'];
		$iduni = $_GET['iduni'];
		$iexten = $_GET['extenV'];
		$sql="DELETE FROM pagamentos WHERE id_alu=$idalu AND id_tur=$idtur";
//echo $idalu.'---'.$sql;
		mysql_query($sql)or die('||erro na exclusão de pagamento parcelado//'.mysql_error());
//		echo $qt . 'Dados Gravados com sucesso.';
		for( $x=1; $x<=$qt; $x++){
			$parc = $_GET['parc'.$x];
			$valo = $_GET['valo'.$x];
			$espe = $_GET['espe'.$x];
			$band = $_GET['band'.$x];
			$banc = $_GET['banc'.$x];
			$cheq = $_GET['cheq'.$x];
			$titu = $_GET['titu'.$x];
			$dia = $_GET['dia'.$x];
			$mes = $_GET['mes'.$x];
			$ano = $_GET['ano'.$x];
			$data = $ano.'-'.$mes.'-'.$dia;
//			echo '<'.$x.'>'. $parc . '><'. $espe . '><'. $banc . '><'. $cheq . '><'. $titu . '><'. $dia . '><'. $mes . '><'. $ano . '<br/>';
			$sql="INSERT INTO pagamentos
					(tipo, id_alu, id_tur, parcela, especie, bandeira, banco, cheque, titular, vencimento, valor, extenso)
					VALUES
					('2', '$idalu', '$idtur',  '$parc', '$espe', '$band', '$banc', '$cheq', '$titu', '$data', '$valo', '$iexten')";
			mysql_query($sql)or die('erro na gravação de pagamento parcelado//'.mysql_error());
	// gravação no caixa
			$unid	= $iduni;
			$conta	= 'Matrícula:'.$idalu;
			$desc	= $parc.' parcela'.' - '.$espe.' - '.$band;
			$debit	= ($espe=='Cartão' || $espe=='Boleto'?$valo:0);
			$credi	= $valo;
			$data 	= date("Y-m-d");
			$hora 	= date("H:i:s", time()); 
			$sql = "INSERT INTO caixa(
						conta, descricao, debito, credito, data, hora, unidade)
						VALUES(
						'$conta', '$desc', '$debit', '$credi', '$data', '$hora', '$unid')";
			$query = mysql_query($sql);
				$Cd = $credi;
				$Db = $debit;
//				$Db = str_replace(".", "", $Db);
//				$Db = str_replace(",", ".", $Db);
//				$Cd = str_replace(".", "", $Cd);
//				$Cd = str_replace(",", ".", $Cd);
				$sql = "UPDATE caixa SET debito=(debito+$Db), credito=(credito+$Cd)
						WHERE data=CURDATE() AND unidade=$unid and conta='Saldo dia'";
	echo '('.$Cd.')('.$Db.')--'.$sql;
				$query = mysql_query($sql);
		}
		break;
	case 4:
		$idalu 	= $_GET['idalu'];
		$valo	=	$_GET['valo'];
		$desc	= $_GET['desc'];
		$pago	= $_GET['pago'];
		$espe	= $_GET['espe'];
		$banc 	= $_GET['banc'];
		$cheq 	= $_GET['cheq'];
		$titu 		= $_GET['titu'];
		$dat		= explode('/',$_GET['data']);
		$d = $dat[0]; $m = $dat[1]; $a = $dat[2];
		$data = $a.'-'.$m.'-'.$d;
	//	echo $idalu.'--'.$valo.'--'.$desc.'--'.$pago.'--'.$espe.'--'.$data;
		$sql="INSERT INTO pagamentos
				(tipo, id_alu, especie, banco, cheque, titular, vencimento, pago, valor, desconto, apagar)
				VALUES
				('1', '$idalu', '$espe', '$banc', '$cheq', '$titu', '$data', '$data', '$valo', '$desc', '$pago')";
		mysql_query($sql)or die('erro na gravação de pagamento avista//'.mysql_error());
		break;
	case 5:
		$idalu 	= $_GET['idalu'];
		$parc 	= $_GET['parcela'];
		$desc 	= $_GET['desc'];
		$paga 	= $_GET['paga'];
		$dat	 	= explode('/',$_GET['data']);
		$data = $dat[2].'-'.$dat[1].'-'.$dat[0];
		$sql = "UPDATE pagamentos SET
		desconto = '$desc',
		apagar = '$paga',
		pago = '$data'
		WHERE id_alu=$idalu AND parcela=$parc";
		mysql_query($sql);
		echo 'Pagamento efetuado com sucesso.';
		break;
	case 6:
		$idpre 	= $_GET['idpre'];
		$resp	= $_GET['resp'];
		$idcur 	= $_GET['idcur'];
		$sql = "UPDATE ca_preMatricula SET
		resposta = '$resp'
		WHERE id_pre=$idpre";
		mysql_query($sql);
		echo 'Resposta gravada.';
		header("location:index.php?op=$idcur&page=lisPreMatri");
		break;
	case 7:
		$dtur	= $_GET['dtur'];
		$ddias	= $_GET['ddias'];
		$dhora	= $_GET['dhora'];
		$dturn	= $_GET['dturn'];
		$dt		= explode('/',$_GET['dini']);
		$d = $dt[0]; 
		$m = $dt[1];
		$a = $dt[2];
		$dini		= $a.'-'.$m.'-'.$d;
		$dt		= explode('/',$_GET['dter']);
		$d = $dt[0]; 
		$m = $dt[1];
		$a = $dt[2];
		$dter	= $a.'-'.$m.'-'.$d;
		$dmat	= $_GET['dmat'];
		$dsta	= $_GET['dsta'];
		$dval	= $_GET['dval'];
		$ddes	= $_GET['ddes'];
		$ddes1	= $_GET['ddes1'];
		$ddes2	= $_GET['ddes2'];
		$dvag	= $_GET['dvag'];
		$dmat	= $_GET['dmat'];
		$opc 	= $_GET['opc'];
		$idcur	= $_GET['idcur'];
		$vagas	= $_GET['vagas'];
		$matric	= $_GET['matric'];
		$aberta	= $_GET['aberta']; //date("Y-m-d");
		$andame	= $_GET['andame'];
		$duni 	= $_GET['duni'];

		if( $opc == 1){
			$sql = "INSERT INTO wd_turmas(
						aberta,id_uni,id_cur,inicio,termino,turno,dias,horario,vagas,pre,matriculas,status)
						VALUES(
						1, $duni, $idcur, '$dini', '$dter', '$dturn', '$ddias', '$dhora', $vagas, 0, 0, $dsta)";
			$page = 'abrirTurma';
		}else{
			$sql = "UPDATE wd_turmas SET
			id_uni = '$duni',
			inicio = '$dini',
			termino = '$dter',
			turno = '$dturn',
			dias = '$ddias',
			horario = '$dhora',
			vagas = '$dvag',
			matriculas = '$matric',
			status = '$dsta',
			aberta = '$aberta',
			andamento = '$andame'
			WHERE id_tur=$dtur";
			$page = 'lisTurmas';
		}
//	echo $sql .'    -   ' .			matriculas .' = '.$dmatric;

		mysql_query($sql)or die(mysql_error());
		echo 'Atualização feita.';
//		header("location: http://www.wdinfo.com.br/adm/index.php?op=$dtur&page=$page");
		echo "<script>window.location = 'http://www.wdinfo.com.br/adm/index.php?op=".$dtur."&page=".$page."';</script>";
		break;
	case 8:
		$omai = 4;
		$nome 	= $_GET['nome'];
		$emai 	= $_GET['email'];
		$valor 	= $_GET['valor'];
		$idpag	= $_GET['idpag'];
		$venc	= $_GET['venc'];
		$dat		= date('Y-m-d');
		$sql = "UPDATE pagamentos SET envio_boleto='$dat' WHERE id_pag=$idpag";
//	echo $sql;
		$query = mysql_query($sql);
		include("mailAviso.php");
		header("location:index.php?op=0&page=lisPagamentos");
		break;
	case 9:
		$conta		= $_GET['conta'];
		$desc		= $_GET['desc'];
		$valor		= $_GET['valor'];
		$dia			= $_GET['dia'];
		$valorP	= $_GET['valorP'];
		$dt		= explode('/',$_GET['data']);
		$d = $dt[0]; 
		$m = $dt[1];
		$a = $dt[2];
		$dven		= $a.'-'.$m.'-'.$dia;
		$data		= $a.'-'.$m.'-'.$d;
		$sql = "INSERT INTO despesas(
					conta, descricao, valor, vencimento, pago, datapg, aulas_wandall)
					VALUES(
					'$conta', '$desc', $valor, '$dven', $valorP, '$data', 0)";
		$query = mysql_query($sql);
		echo 'Lançamento efetuado com sucesso.';
		break;
	case 10:
		$idalu	= $_GET['idalu'];
		$idtur	= $_GET['idtur'];
		echo $idalu . '|' . $idtur;
		$sql = "UPDATE alunos SET id_tur=$idtur WHERE id_alu=$idalu";
		$query = mysql_query($sql);
		$sql = "UPDATE aluno_tur_materias SET id_tur=$idtur WHERE id_alu=$idalu";
		$query = mysql_query($sql);
		
	//	header("location:lisTurmas.php?op=$idtur");
		break;
	case 11:
		$perc = array(array());
		$idcur = $_GET['idcurso'];
		for($y=1; $y<=6; $y++){
			for($x=1; $x<=6; $x++){
				$d = 'perc'.$y.$x;
				$perc[$y][$x] = $_GET[$d];
//				echo $_GET[$d].'<br>';
			}
		}
		$avis1 = $_GET['avis1'];
		$avis2 = $_GET['avis2'];
		$sql = "UPDATE wd_valorCursos SET 
				avista1=".$avis1.",
				avista2=".$avis2.",
				desc11=".$perc[1][1].",
				desc12=".$perc[1][2].",
				desc13=".$perc[1][3].",
				desc14=".$perc[1][4].",
				desc15=".$perc[1][5].",
				desc16=".$perc[1][6].",
				desc21=".$perc[2][1].",
				desc22=".$perc[2][2].",
				desc23=".$perc[2][3].",
				desc24=".$perc[2][4].",
				desc25=".$perc[2][5].",
				desc26=".$perc[2][6]." WHERE id_cur=$idcur";
//echo $sql;
		$query = mysql_query($sql);

//		echo '----------'.$perc[2][1].'<<<<<<<<';
		break;
	case 12:  //  efetuar entrada da dados
		$idfun = $_SESSION['idfun'];
		$unid	= $_GET['unid'];
		$conta	= $_GET['conta'];
		$desc	= $_GET['desc'];
		$debit	= ($_GET['debit']==''?0:$_GET['debit']);
		$credi	= ($_GET['credi']==''?0:$_GET['credi']);
		$data 	= date("Y-m-d");
		$hora 	= date("H:i:s", time()); 
		$sql = "INSERT INTO caixa(
					conta, descricao, debito, credito, data, hora, unidade, id_fun)
					VALUES(
					'$conta', '$desc', '$debit', '$credi', '$data', '$hora', '$unid', '$idfun')";
		echo $sql.' ---- ';
		$query = mysql_query($sql);
		$sql = "UPDATE caixa SET debito=(debito+$debit), credito=(credito+$credi) WHERE data = CURDATE() and unidade=$unid AND conta='Saldo dia'";
		$query = mysql_query($sql) or die('erro na atulizacao do caixa!'.mysql_error());
		echo $sql;
//		echo 'Lançamento efetuado com sucesso.';
		break;
	case 13:  // abrir caixa
		// gravar o registro de saldo anterior pelo ultimo saldo dia
		$unid = $_GET['unid'];
		$idfun = $_SESSION['idfun'];
		$sql = "SELECT * FROM caixa WHERE data=(SELECT MAX(data) FROM caixa WHERE unidade=$unid) AND conta='Saldo dia' and unidade=$unid ORDER BY data";
		//echo $sql;
		$query = mysql_query($sql);
		$res=mysql_fetch_array($query);
		$Ct = 'Saldo anterior';
		$Ds = $res['descricao'];
		$Db = $res['debito'];
		$Cd = $res['credito'];
			$Db = str_replace(".", "", $Db);
			$Db = str_replace(",", ".", $Db);
			$Cd = str_replace(".", "", $Cd);
			$Cd = str_replace(",", ".", $Cd);
		$Sa = $Cd - $Db;
		$Dc = substr($Sa,-2);
		$In = substr($Sa,0,strlen($Sa)-2);
		$Sa = '0'.$In.'.'.$Dc;
		if( $Sa > 0 ){
			$Db = 0;
			$Cd = $Sa;
		}else{
			$Db = $Sa;
			$Cd = 0;
		}
//	echo "decimal:".$Dc." ---In: ".$In." ---sa: ".$Sa;
//	echo ' debito: '.$Db.' -- credito: ' . $Cd.'\\';
		$data = date("Y-m-d");
		$hora = date("H:i:s", time());
		$sql = "INSERT INTO caixa(
				conta, descricao, debito, credito, data, hora, unidade, id_fun)
				VALUES(
				'$Ct', '$Ds', '$Db', '$Cd', '$data', '$hora', '$unid', '$idfun')";
		$query = mysql_query($sql);
//echo $sql;
	//----------------------------------------------
		$totSal= $_GET['totSal'];
		$data 	= date("Y-m-d");
		$hora 	= date("H:i:s", time()); 
		$somaCd = $Cd; $somaDb = $Db;
		for($x=1;$x<=$totSal;$x++){
			$Ct = $_GET['Ct'.$x];
//	echo '('.$somaCd.')('.$Cd.')--';
			if($Ct<>'Saldo dia'){
				$Ds = $_GET['Ds'.$x];
				$Db = $_GET['Db'.$x];
				$Db = str_replace(".", "", $Db);
				$Db = str_replace(",", ".", $Db);
				$somaDb += $Db;
				$Cd = $_GET['Cd'.$x];
				$Cd = str_replace(".", "", $Cd);
				$Cd = str_replace(",", ".", $Cd);
				$somaCd += $Cd;
				$sql = "INSERT INTO caixa(
					conta, descricao, debito, credito, data, hora, unidade, id_fun)
					VALUES(
					'$Ct', '$Ds', '$Db', '$Cd', '$data', '$hora', '$unid', '$idfun')";
				$query = mysql_query($sql);
			}
		}
		$Ct = 'Saldo dia';
		$Ds = $data;
		$Db = $somaDb;
		$Cd = $somaCd;
		$sql = "INSERT INTO caixa(
				conta, descricao, debito, credito, data, hora, unidade, id_fun)
				VALUES(
				'$Ct', '$Ds', '$Db', '$Cd', '$data', '$hora', '$unid', '$idfun')";
		$query = mysql_query($sql);
//	echo $sql;
		break;
	case 14:  // gravar atendimento
		$fun = $_GET['fun'];
		$unid = $_GET['unid'];
		$dia = $_GET['dia'];
		$mes = $_GET['mes'];
		$ano = $_GET['ano'];
		$hora = $_GET['hora'];
		$minuto = $_GET['minuto'];
		$nome = $_GET['nome'];
		$soube = $_GET['soube'];
		$idcur = $_GET['idcur'];
		$dias = $_GET['dias'];
		$horario = $_GET['horario'];
		$turno = $_GET['turno'];
		$email = $_GET['email'];
		$tel1 = $_GET['tel1'];
		$tel2 = $_GET['tel2'];
		$tel3 = $_GET['tel3'];
		$obs = $_GET['obs'];
		$sql = "INSERT INTO atendimento(
				id_fun, unidade, dia, mes, ano, hora, minuto, nome, soube, id_cur, dias, horario, turno, email, tel1, tel2, tel3, obs)
				VALUES(
				'$fun', '$unid','$dia', '$mes', '$ano', '$hora', '$minuto', '$nome', '$soube', '$idcur', '$dias', '$horario', '$turno', '$email', '$tel1', '$tel2', '$tel3', '$obs')";
		$query = mysql_query($sql);
		break;
}
//echo 'aqui'.$_GET['op'].'----';
?>
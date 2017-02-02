<?php session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adminstrador WDinfo</title>
<link rel="stylesheet" type="text/css" href="css/index.css" />
<link rel="stylesheet" type="text/css" href="css/matricula.css" />
<link rel="stylesheet" type="text/css" href="css/pagamentos.css" />
<link rel="stylesheet" type="text/css" href="css/lisTurmas.css" />
<link rel="stylesheet" type="text/css" href="css/tabelaPreco.css" />
<link rel="stylesheet" type="text/css" href="css/atendimento.css" />
</head>
<script type="text/javascript" src="script/comum.js"></script>
<script type="text/javascript" src="script/cronometro.js"></script>
<script type="text/javascript" src="script/ajaxForm.js"></script>
<script type="text/javascript" src="script/ajax.js"></script>
<script type="text/javascript" src="script/matricula.js"></script>
<script type="text/javascript" src="script/lerDados.js"></script>
<script type="text/javascript" src="script/pagamentos.js"></script>
<script type="text/javascript" src="script/pre.js"></script>
<script type="text/javascript" src="script/lisTurmas.js"></script>
<script type="text/javascript" src="script/tabelaPreco.js"></script>
<script type="text/javascript" src="script/validadores.js"></script>
<script type="text/javascript" src="script/abrirTurma.js"></script>
<script type="text/javascript" src="script/atendimento.js"></script>
<script type="text/javascript" src="script/caixa.js"></script>
<script>
function reciboPag(theURL,winName,features){
	idalu 	= gE('matr').value;
	par 		= gE('Nparcela').value;
	totV 		= gE('valorT').value;
	extenV 	= gE('extenV').value;
	idtur		= gE('idtur').value;
//	if( gE('assinatura1').checked ){ assin = gE('assinatura1').value;}
//	else if( gE('assinatura2').checked ){ assin = gE('assinatura2').value;}
//	else{ assin = gE('assinatura3').value;}
	assin='x';
	ban = Array();
	cheq = Array();
	dat = Array();
	tban=''; tcheq=''; tdat='';
	for(x=1; x<=par; x++){
		ban[x] = gE('banc'+x).value;
		tban += '&tban'+x+'='+ban[x];
		cheq[x] = gE('cheq'+x).value;
		tcheq += '&tcheq'+x+'='+cheq[x];
		dd 	= eval(gE('dia'+x).value);
		mm	= eval(gE('mes'+x).value);
		dat[x] = (dd<9?'0'+dd:dd)+'/'+(mm<9?'0'+mm:mm)+'/'+gE('ano'+x).value;
		tdat += '&tdat'+x+'='+dat[x];
	}
	gets = '?idalu='+idalu + '&totV='+totV + '&par=' + par + '&extenV=' + extenV + '&idtur=' + idtur+ tban + tcheq + tdat + '&assin=' + assin;
//	alert(gets);
	window.open(theURL+ gets,winName,features);
}
	var ajaxB = new sack();
	var currentClientID=false;
	
	var Qform = 'cadastro';
	var Qpx = 2;

		var timeCrono;
		var hor = 0;
		var min = 0;
		var seg = 0;
		var c;
		var startTime = new Date();
		var start = startTime.getSeconds();
		c = setInterval("StartCrono()",1000);
	
	function initFormEvents()
	{
//		StartCrono();
		gE('pos').onclick = function(){lerNomes(1);}
		gE('pre').onclick = function(){lerNomes(2);}
		gE('can').onclick = function(){cancelarMat();}

		
//		gE('p1').focus();
	}
	window.onload = initFormEvents;

function inicio(){
	initFormEvents();
}
</script>
<?php require('conect.php'); ?>
<body>
<?php 
//if(isset($_POST['login']) ){
	$logado = false;
	$sqll="SELECT * FROM s_login WHERE login='".$_POST['login']."' AND senha='".$_POST['senha']."'";
	$queryl=mysql_query($sqll);
	if($resl=mysql_fetch_assoc($queryl) ){
		$logado = true;
		$_SESSION['acesso'] = $resl['acesso'];
		$_SESSION['unid'] = $resl['unidade'];
		$sqlf="SELECT * FROM funcionarios WHERE id_fun=".$resl['id_fun'];
		$queryf=mysql_query($sqlf);
		$resf=mysql_fetch_assoc($queryf);
		$_SESSION['aten'] = $resf['nome'];
		$_SESSION['ape'] = $resf['apelido'];
		$_SESSION['idfun'] = $resf['id_fun'];
		$uni = $resl['unidade'];
		$idfun = $resf['id_fun'];
		$ape = $resf['apelido'];
		$data = date("Y-m-d");
		$hora = date("H:i:s");
		$ip_cliente = $_SERVER['REMOTE_ADDR'];
		$ip_server = $_SERVER['SERVER_ADDR'];
				$sql="INSERT INTO historico (
				  unidade,
				  id_fun,
				  apelido,
				  id_cliente,
				  id_server,
				  data,
				  hora)
				  VALUES(
				  '$uni',
				  '$idfun',
				  '$ape',
				  '$ip_cliente',
				  '$ip_server',
				  '$data',
				  '$hora')";
		mysql_query($sql)or die('erro tabela historico ' .$sql . mysql_error());

	}
//}
if($logado){
?>
<div id="titADM"><img src="images/nlogocomp.png" alt="" align="left" />
    <label id="crono" style="float:right; color:#FFF">00:00</label>
	<b>.</b>
	<h6><?php echo ($_SESSION['unid']<=1?'Rio':'Niterói'); ?></h6>
	<h5><?php echo $_SESSION['aten'];?></h5>
    <span><a href="logoff.php" style="float:right; color:#FFF; font-size:18px; margin-top:-20px; font-weight:bold;">[SAIR]</a></span>
</div>
<hr />
<div id="menuP">
<ol>
	<li><a href="#">Pré-Matrículas</a>
		<ol>
			<?php 
			$sql = mysql_query("SELECT c.curso,c.id_cur, COUNT(t.pre) pre FROM wd_cursos c 
											INNER JOIN wd_turmas t USING(id_cur) 
											INNER JOIN ca_preMatricula m USING(id_tur)
											GROUP BY c.id_cur");
			while($res=mysql_fetch_array($sql) ){?>
            	<li><a href="#" onclick="carregar(0,'corpo','lisPreMatri.'+<?php echo $res['id_cur'] ?>)"><?php echo $res['pre'] . ' - ' . $res['curso']; ?></a></li>
			<?php }
			$tipo = array("Desenvolvedor","Web","CAD-MAX-Sket","Excel-Office-Access","Banco de dados","MArketing","Adobe");?>
		</ol>
	</li>
	<li><a href="#" onclick="carregar(0,'corpo','contatos.'+0)">Contatos</a></li><!--index.php?op=0&page=contatos-->
<?php if( $_SESSION['acesso'] != 8 ){?>
	<li><a href="#" onclick="carregar(0,'corpo','atendimento.'+0)">Atendimento</a><!--index.php?op=0&page=atendimento-->
		<ol>
			<li><a href="#" onclick="carregar(0,'corpo','pesqAtendimento.'+0)">Pesquisar</a></li><!--index.php?op=0&page=pesqAtendimento-->
		</ol>
    </li>
	<li><a href="#" onclick="carregar(0,'corpo','matricula.'+0)">Matrícula</a></li><!--index.php?op=0&page=matricula-->
<? }?>
	<li><a href="#">Turmas</a>
		<ol>
			<li><a href="#" onclick="carregar(0,'corpo','ocupacaoSalas.'+0)">Ocupação das Salas</a></li>
			<li><a href="#" onclick="carregar(0,'corpo','empresa.'+0)">Empresas</a></li><!--index.php?op=0&page=empresas-->
			<?php if( $_SESSION['acesso'] == 9 or $_SESSION['acesso'] == 8 ){?>
				<li><a href="#" onclick="carregar(0,'corpo','abrirTurma.'+0)">Abrir nova Turma</a></li><!--index.php?op=0&page=abrirTurma-->
			<? }?>
<!-- turmas Concluidas -->
			<li><a href="#">Turmas Concluídas</a>
			<ul>
			<?php 
			for($x=1; $x<=100; $x++){
			$sql = mysql_query("SELECT distinct c.curso,t.id_tur,turno, dias FROM wd_cursos c 
											INNER JOIN wd_turmas t USING(id_cur) 
											INNER JOIN alunos a USING(id_tur) 
											WHERE t.termino<(CURRENT_DATE) AND id_cur=$x
											ORDER BY t.id_cur,t.id_tur");
			if(mysql_num_rows($sql)>0){
				$mt = true;
                while($res=mysql_fetch_array($sql) ){
					if($mt){?>
                        <li><a href="#"><?php echo $res['curso']; ?></a>
                        <ul>								
				<?php $mt = false;}?>
                    <li><a href="#" onclick="carregar(0,'corpo','lisTurmas.'+<?php echo $res['id_tur'] ?>)"><?php echo $res['id_tur'] . ' - ' . $res['talu'] . ' - ' . $res['dias'] . ' - ' . $res['turno']; ?></a></li>
            	<?php }?>
			</ul></li>
            <? }
			}?>
 			</ul></li>           
<!-- turmas em andamento -->
			<li><a href="#">Turmas em Andamentos</a>
			<ul>
            <?php 
			for($x=1; $x<=100; $x++){
			$sql = mysql_query("SELECT distinct c.curso,t.id_tur,turno,dias,inicio,id_uni FROM wd_cursos c 
											INNER JOIN wd_turmas t USING(id_cur) 
											INNER JOIN alunos a USING(id_tur) 
											WHERE t.inicio<(CURRENT_DATE) AND t.termino>(CURRENT_DATE) AND id_cur=$x
											ORDER BY t.id_cur,t.id_tur");
			if(mysql_num_rows($sql)>0){
				$mt = true;
                while($res=mysql_fetch_array($sql) ){
					if($mt){?>
                        <li><a href="#"><?php echo $res['curso']; ?></a>
                        <ul>								
				<?php $mt = false;}
				$tt = explode('-',$res['inicio']);?>
                 <li><a href="#" onclick="carregar(0,'corpo','lisTurmas.'+<?php echo $res['id_tur'] ?>)"><?php echo $res['id_tur'] . ' - ' .  ($res['id_uni']==1?'Rio':'Nit') . ' - ' .  $tt[2].'/'.$tt[1] . ' - ' . $res['dias'] . ' - ' . $res['turno']; ?></a></li>
            	<?php }?>
			</ul></li>
            <? }
			}?>
 			</ul></li>           
<!-- turmas novas -->
			<li><a href="#">Turmas Novas com Matrículas</a>
			<ul><?php 
			for($x=1; $x<=100; $x++){
			$sql = mysql_query("SELECT distinct c.curso,t.id_tur,turno,dias,inicio, id_uni FROM wd_cursos c 
											INNER JOIN wd_turmas t USING(id_cur) 
											INNER JOIN alunos a USING(id_tur) 
											WHERE t.inicio>=(CURRENT_DATE) AND id_cur=$x
											ORDER BY t.id_cur,t.id_tur");
			if(mysql_num_rows($sql)>0){
				$mt = true;
                while($res=mysql_fetch_array($sql) ){
					if($mt){?>
                        <li><a href="#"><?php echo $res['curso']; ?></a>
                        <ul>								
				<?php $mt = false;}
				$tt = explode('-',$res['inicio']);?>
                 <li><a href="#" onclick="carregar(0,'corpo','lisTurmas.'+<?php echo $res['id_tur'] ?>)"><?php echo $res['id_tur'] . ' - ' .  ($res['id_uni']==1?'Rio':'Nit') . ' - ' . $tt[2].'/'.$tt[1] . ' - ' . $res['dias'] . ' - ' . $res['turno']; ?></a></li>
            	<?php }?>
			</ul></li>
            <? }
			}?>
			</ul></li>
			<li><a href="#">Turmas s/ Matrículas</a>
			<ul><?php 
			for($x=1; $x<=100; $x++){
			$sql = mysql_query("SELECT c.curso,t.id_tur,turno,dias,inicio, id_uni FROM wd_cursos c 
											INNER JOIN wd_turmas t USING(id_cur) 
											WHERE t.matriculas=0  AND id_cur=$x
											ORDER BY t.id_tur,t.id_cur;");
			if(mysql_num_rows($sql)>0){
				$mt = true;
                while($res=mysql_fetch_array($sql) ){
					if($mt){?>
                        <li><a href="#"><?php echo $res['curso']; ?></a>
                        <ul>								
				<?php $mt = false;}
				$tt = explode('-',$res['inicio']);?>
                 <li><a href="#" onclick="carregar(0,'corpo','lisTurmas.'+<?php echo $res['id_tur'] ?>)"><?php echo $res['id_tur'] . ' - ' .  ($res['id_uni']==1?'Rio':'Nit') . ' - ' . $tt[2].'/'.$tt[1] . ' - ' . $res['dias'] . ' - ' . $res['turno']; ?></a></li>
            	<?php }?>
			</ul></li>
            <? }
			}?>
			</ul></li>
		</ol>
	</li>
	<?php if( $_SESSION['acesso'] == 9 or $_SESSION['acesso'] == 8 ){?>
        <li><a href="#">Pagamento</a>
            <ol>
 				<li><a href="#" onclick="carregar(0,'corpo','efetuarPag.'+0)">Efetuar Pagamento</a></li>              
            </ol>
        </li>
    <?php }?>
	<li><a href="#">Controle</a>
		<ol>
            <?php if( $_SESSION['acesso'] == 9 or $_SESSION['acesso'] == 8 ){?>
 				<li><a href="#" onclick="carregar(0,'corpo','finEntrada.'+0)">Entradas</a></li>              
            <?php }?>
            <?php if( $_SESSION['acesso'] != 8 and  $_SESSION['acesso'] != 4 ){?>
 				<li><a href="#" onclick="carregar(0,'corpo','finCaixa.'+0)">Caixa</a></li>              
 				<li><a href="#" onclick="carregar(0,'corpo','estoque.'+0)">Estoque</a></li>              
            <?php }?>
            <?php if( $_SESSION['acesso'] == 9){?>
 				<li><a href="#" onclick="carregar(0,'corpo','lisPagamentos.'+0)">Listagem Geral</a></li>              
 				<li><a href="#" onclick="carregar(0,'corpo','despesas.'+0)">Despesas Diversas</a></li>              
 				<li><a href="#" onclick="carregar(0,'corpo','balanco.'+0)">Balanço</a></li>              
 				<li><a href="#" onclick="carregar(0,'corpo','valCursos.'+0)">Valores dos Cursos</a></li>              
            <?php }?>
		</ol>
	</li>
 	<li><a href="#" onclick="carregar(0,'corpo','relatorios.'+0)">Relatorios</a></li>              
</ol>
</div>
<hr />
<div id="corpo">
<?php 
if(isset($_GET['op']) ){
	include( $_GET['page'] . '.php');
}
?>
</div>
<hr />
<?php 
}else{
	echo "Acesso não autorizado!!!";
 }?>
</div>
<div id="lendo"></div>
<div id="fuga"></div>
<div id="lixo"></div>
<div id="mostTur"></div>
<div id="retornoMens"></div>
</body>
</html>

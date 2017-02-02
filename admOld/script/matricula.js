// JavaScript Document
function buscaMat(){
	if(gE('matr').value == ''){
		gE('busMat').style.display = 'none';
	}else{
		gE('busMat').style.display = 'block';
	}
}
function lerNomes(p){
	gE('nome').style.display = 'none';
	gE('lisN').style.display = 'block';
	limparCad();
	gE('gravCad').innerHTML = (p==1?'::: Alterar matrícula do aluno :::' : '::: Gravar matrícula do aluno :::');
	carregar(1,'lisN','lerNomes.'+p);
	gE('lendo').style.left = '475px';
	gE('lendo').style.top = '135px';
}
function formaPag(p){
	carregar(3,'pagamento','pagParcelado.'+p);
	gE('montar').onclick = function(){
			np = (p==1?0:gE('Nparcela').value);
			vt = gE('valorT').value;
			ex = gE('extenV').value;
			cond = false;
			 p = gE('opPag').value;
//			alert(cond+ ' - ' + p);
			switch(p){
				case '1':
					cond = (np>0 && vt>0 && ex!=''?true:false);
					break;
				case '2':
					ti = gE('titular').value;
					ba = gE('banco').value;
					ch = gE('cheque').value;
					cond = (np>0 && vt>0 && ex!=''  && ti!=''  && ba!=''  && ch!=''?true:false);
					break;
				case '3':
					ba = gE('banco').value;
					cond = (np>0 && vt>0 && ex!='' && ba!='' ?true:false);
					break;
				case '4':
					ba = gE('bandeira').value;
					cond = (np>0 && vt>0 && ex!='' && ba!='' ?true:false);
					break;
				case '5':
					ba = gE('banco').value;
					cond = (np>0 && vt>0 && ex!='' && ba!='' ?true:false);
					break;
				case '6':
					cond = (np>0 && vt>0 && ex!=''?true:false);
					break;
			}
			if(cond){
			   carregar(1,'tabela','tabelaParcelamento.');
			}else{
				alert('Preencha todos os campos.');
			}
			gE('montar').style.display = 'block';
			gE('cancPag1').style.display = 'block';
	}
}
function qOpcao(x){
//	alert(x);
	gE('opPag').value = x;
	switch(x){
		case '1':
			gE('bb').innerHTML = '';
			break;
		case '2':
			carregar(1,'bb','pagBanco.');
			break;
		case '3':
			carregar(2,'bb','pagqBanco.');
			break;
		case '4':
			carregar(3,'bb','pagBandeira.');
			break;
		case '5':
			carregar(4,'bb','pagqBanco.');
			break;
		case '6':
			gE('bb').innerHTML = '';
			break;
	}
}
function ativar(){
	gE('resp').onclick = proprio;
	gE('gravCad').onclick = function(){carregar(2,'fuga','gravaCad.');}
//	alert('carraga os botoes');
}
function fechaMens(){
	gE('retornoMens').style.display = 'none';
}

function refazer_2via(){
//		gE('imp_recibo').style.display = 'block';
//		gE('imp_recibo_ass').style.display = 'block';
	reciboPag2via('reciboPag.php', 'Recibo de Pagamento', 'width=800,height=600 ,Scrollbars=YES, Toolbar=YES, Directories=NO, Location=NO, Menubar=NO', 0)
}
function refazer_2viaC(){
	reciboPag2via('reciboPagContrato.php', 'Recibo de Pagamento', 'width=800,height=600 ,Scrollbars=YES, Toolbar=YES, Directories=NO, Location=NO, Menubar=NO', 0)
}
function CUPOMd(){
	reciboPag2via('cupom_desconto.php', 'Recibo de Pagamento', 'width=800,height=600 ,Scrollbars=YES, Toolbar=YES, Directories=NO, Location=NO, Menubar=NO', 0)
}
function reciboPag2via(theURL,winName,features, assin){
	idalu 	= gE('matr').value;
	par 		= gE('Vpar').value;
	totV 		= gE('Vval').value;
//	extenV 	= gE('extenV').value;
	idtur		= gE('idtur').value;
	ban = Array();
	cheq = Array();
	esp = Array();
	venc = Array();
	valo = Array();
	pago = Array();
	tban=''; tesp=''; tcheq=''; tvenc=''; tvalo=''; tpago='';
	for(x=1; x<=par; x++){
		ban[x] = gE('Vban'+x).value;
		tban += '&tban'+x+'='+ban[x];
		esp[x] = gE('Vesp'+x).value;
		tesp += '&tesp'+x+'='+esp[x];
		cheq[x] = gE('Vche'+x).value;
		tcheq += '&tcheq'+x+'='+cheq[x];
		venc[x] = gE('Vven'+x).value;
		tvenc += '&tdat'+x+'='+venc[x];
		valo[x] = gE('Vval'+x).value;
		tvalo += '&tvalo'+x+'='+valo[x];
		pago[x] = gE('Vpag'+x).value;
		tpago += '&tpago'+x+'='+pago[x];
	}
	gets = '?idalu='+idalu + '&totV='+totV + '&par=' + par + '&extenV=' + ' ' + '&idtur=' + idtur+ tban + tesp + tcheq + tvenc + tvalo + tpago + '&assin=' + assin + '&2via=( 2ª via )';
//	alert(gets);
	window.open(theURL+ gets,winName,features);
}

function refazer_pag(){
 	gE('ver_forma_pag').style.display = 'none';
 	gE('pagamento').style.display = 'block';
}
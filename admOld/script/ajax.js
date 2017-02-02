// JavaScript Document
// Carrega um arquivo com XMLHttpRequest
function carregar(id,tag,arq){
	document.getElementById('lendo').innerHTML = '<img src="anima/loaderD.gif">';
	tempo = gE('crono').innerHTML.substring(1,3);
	if(tempo>1){
		window.location.href="index.php";
		stop;
	}else{
//		clearInterval(c);
//		var timeCrono;
//		var hor = 0;
//		var min = 0;
//		var seg = 0;
//		var c;
//		var startTime = new Date();
//		var start = startTime.getSeconds();
//		gE('crono').innerHTML = ':00:00';
//		c = setInterval("StartCrono()",1000);
//		stop;
	}
	var xmlHttp;
	try {
		// Firefox, Opera 8.0+, Safari
		xmlHttp=new XMLHttpRequest();
	}
	catch (e) {
		// Internet Explorer
		try {
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e) {
			// Internet Explorer
			try {
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch (e) {
				alert("Seu browse não da suporte ao AJAX!");
				return false;
			}
		}
	}
	oarq = arq.substring(0,arq.indexOf('.'));
//alert(oarq);
	postag = ''; opcao = 0;
	switch(oarq){
		case 'pagParcelado':
			forma = arq.substring(arq.indexOf('.')+1 );
			postag = '&forma=' + forma;
			break;
		case 'caixaAtualizar':
			idcai = arq.substring(arq.indexOf('.')+1 );
			postag = '&idcai=' + idcai;
			postag += '&dia=' + gE('cxD').value;
			postag += '&mes='+ gE('cxM').value;
			postag += '&ano='+ gE('cxA').value;
//alert(postag);
			break;
		case 'caixaExcluir':
			idcai = arq.substring(arq.indexOf('.')+1 );
			postag = '&idcai=' + idcai;
			break;
		case 'atendimento':
			unid = arq.substring(arq.indexOf('.')+1 );
			postag = '&unid=' + unid;
			break;
		case 'listarAtendimento':
			postag = '&dia=' + gE('diaA').value;
			postag += '&mes='+ gE('mesA').value;
			postag += '&ano='+ gE('anoA').value;
			postag += '&unid='+ gE('Aunid').innerHTML;
			break;
		case 'lisCaixaDT':
			postag = '&dia=' + gE('cxD').value;
			postag += '&mes='+ gE('cxM').value;
			postag += '&ano='+ gE('cxA').value;
			oarq = 'lisCaixa';
			break;
		case 'abrirCaixa':
			$unid = arq.substring(arq.indexOf('.')+1 );
			postag = '&unid=' + $unid;
			totSal=+gE('totSal').innerHTML;
			for(x=1;x<=totSal;x++){
				ab = gE('Ct'+x).innerHTML;
				postag += '&Ct'+x+'='+ ab;
				ac = gE('Ds'+x).innerHTML;
				postag += '&Ds'+x+'='+ ac;
				ad = gE('Db'+x).innerHTML;
				postag += '&Db'+x+'='+ ad;
				ae = gE('Cd'+x).innerHTML;
				postag += '&Cd'+x+'='+ ae;
			}
			postag += '&totSal='+totSal;	
			postag += '&op=13';	
			oarq = 'apoio';
			opcao = 13;
//alert(postag);
			break;
		case 'finCaixa':
			unid = arq.substring(arq.indexOf('.')+1 );
			postag = '&unid=' + unid;
			break;
		case 'listarMateria':
			idcur = arq.substring(arq.indexOf('.')+1 );
			postag = '&idcurso=' + idcur;
			break;
		case 'gravarTab':
			op = arq.substring(arq.indexOf('.')+1 );
			idcur = gE('idcurso').value;
			postag = '&idcurso=' + idcur;
			for( y=1; y<=2; y++){
				for( x=1; x<=6; x++){
					postag += '&perc'+y+x+'=' + gE('perc'+y+x).value;
				}
			}
			postag += '&avis1=' + gE('avis1').value;
			postag += '&avis2=' + gE('avis2').value;
			postag += '&op=' + op;
//alert(postag);
			oarq = 'apoio';
			break;
		case 'tabelaPreco':
			idcur = arq.substring(arq.indexOf('.')+1 );
			postag = '&idcur=' + idcur;
			break;
		case 'lisPreMatri':
			idcur = arq.substring(arq.indexOf('.')+1 );
			postag = '&op=' + idcur;
//alert(postag);
			break;
		case 'lisTurmas':
			idtur = arq.substring(arq.indexOf('.')+1 );
			postag = '&op=' + idtur;
			break;
		case 'transfTurma':
			opcao = 11;
			idalu = arq.substring(arq.indexOf('.')+1,arq.indexOf('|') );
			postag = '&idalu=' + idalu;
			postag += '&idtur=' + arq.substring(arq.indexOf('|')+1);
			postag += '&op=10';
			idtura = gE('Dtur').innerHTML;
			oarq = 'apoio';
			break;
		case 'mostTurmas':
			idalu = arq.substring(arq.indexOf('.')+1 );
			postag = '&idalu=' + idalu;
			break;
		case 'lisDespesas':
		    postag = '&mesI=' + gE('mesI').value;
		//	postag += '&mesF=' + gE('mesF').value;
			break;
		case 'efetuarDespesas':
			opcao = 9;
		    postag = '&conta=' + gE('Dconta').value;
			postag += '&desc=' + gE('Ddesc').value;
			postag += '&valor=' + gE('Dvalor').value;
			postag += '&dia=' + gE('Ddia').value;
			postag += '&valorP=' + gE('vpg').value;
			postag += '&data=' + gE('Ddata').value;
			postag += '&op=9';
			oarq = 'apoio';
			break;
		case 'efetuarCaixa':
			opcao = 12;
		    postag = '&conta=' + gE('Cconta').value;
			postag += '&desc=' + gE('Cdesc').value;
			postag += '&debit=' + gE('Cdebi').value;
			postag += '&credi=' + gE('Ccred').value;
			postag += '&unid=' + gE('Cunid').value;
			postag += '&op=12';
			oarq = 'apoio';
//	alert(postag);
			break;
		case 'efetuarPagar':
			opcao = 1;
			idalu = arq.substring(arq.indexOf('.')+1,arq.indexOf('|') );
			postag = '&idalu=' + idalu;
			postag += '&parcela=' + arq.substring(arq.indexOf('|')+1);
			postag += '&desc='+gE('desc').value;
			postag += '&paga='+gE('paga').innerHTML;
			postag += '&data='+gE('data').value;
			postag += '&op=5';
			oarq = 'apoio';
			break;
		case 'efetuarLis':
			postag = '&idalu=' + arq.substring(arq.indexOf('.')+1);
			break;
		case 'preMatricula':
			postag = '&turma=' + arq.substring(arq.indexOf('.')+1);
			break;
		case 'lerNomes':
			op = arq.substring(arq.indexOf('.')+1);
			gE('ver_forma_pag').style.display = (op==1?'block':'none');
			gE('pagamento').style.display = (op==2?'block':'none');
			gE('refazer_pag').style.display = (op==1?'block':'none');
			postag = '&op=' + op;
			break;
		case 'gravAtendimento':
			postag = arq.substring(arq.indexOf('.')+1);
			postag += '&op=14';
			oarq = 'apoio';
			opcao = 14;
//alert(postag);
//			gE('gravarAten').onclick = function(){alert();}
//			carregar(4,'lisdesp','lisCaixa.'+ 1 );
			break;
		case 'gravaCad':
			postag = '&nome='+gE('nome').value;
			postag += '&idtur='+gE('idtur').value;
			postag += '&iduni='+gE('iduni').value;
			postag += '&ende='+gE('ende').value;
			postag += '&bair='+gE('bair').value;
			postag += '&cida='+gE('cida').value;
			postag += '&esta='+gE('esta').value;
			postag += '&cep='+gE('cep').value;
			postag += '&emai='+gE('emai').value;
			postag += '&nasc='+gE('nasc').value;
			postag += '&civil='+gE('civil').value;
			postag += '&naci='+gE('naci').value;
			postag += '&cpf='+gE('cpf').value;
			postag += '&iden='+gE('iden').value;
			postag += '&org='+gE('org').value;
			postag += '&prof='+gE('prof').value;
			postag += '&tele='+gE('tele').value;
			postag += '&celu='+gE('celu').value;
			postag += '&next='+gE('next').value;
			mate = (gE('mate0').checked ? 0 : 1);
			postag += '&mate='+mate;
			postag += '&Rnome='+gE('Rnome').value;
			postag += '&Rende='+gE('Rende').value;
			postag += '&Rbair='+gE('Rbair').value;
			postag += '&Rcida='+gE('Rcida').value;
			postag += '&Resta='+gE('Resta').value;
			postag += '&Rcep='+gE('Rcep').value;
			postag += '&Remai='+gE('Remai').value;
			postag += '&Rnasc='+gE('Rnasc').value;
			postag += '&Rcpf='+gE('Rcpf').value;
			postag += '&Riden='+gE('Riden').value;
			postag += '&Rorg='+gE('Rorg').value;
			postag += '&Rcivil='+gE('Rcivil').value;
			postag += '&Rnaci='+gE('Rnaci').value;
			postag += '&Rprof='+gE('Rprof').value;
			postag += '&Rie='+gE('Rie').value;
			postag += '&Rim='+gE('Rim').value;
			postag += '&Rtele1='+gE('Rtele1').value;
			postag += '&Ramal1='+gE('Ramal1').value;
			postag += '&Rtele2='+gE('Rtele2').value;
			postag += '&Ramal2='+gE('Ramal2').value;
			postag += '&Rtele3='+gE('Rtele3').value;
			postag += '&Ramal3='+gE('Ramal3').value;
			postag += '&Rnext='+gE('Rnext').value;
			postag += '&id='+gE('idLer').value;
			postag += '&op='+gE('Gtip').value;
			postag += '&idfun='+gE('id_atendente').innerHTML;
			oarq = 'apoio';
//	alert(postag);
			break;
		case 'selecionaTur':
			idtur = arq.substring(arq.indexOf('.')+1);
			postag = (idtur==0?'':'&idtur=' + idtur);
	//		alert(postag);
			break;
		case 'tabelaParcelamento':
			parc = 0; 
			valorT = gE('valorT').value;
			extenV = gE('extenV').value;
			espe =  gE('especie').value;
			band = '';
			banc = '';
			cheq = '';
			titu = '';
			 p = gE('opPag').value;
//			alert(cond+ ' - ' + p);
			switch(p){
				case '1':
					parc = gE('Nparcela').value;
					break;
				case '2':
					parc = gE('Nparcela').value;
			        banc = gE('banco').value;
			        cheq =  gE('cheque').value;
			        titu =  gE('titular').value;
					break;
				case '3':
					parc = gE('Nparcela').value;
			        banc = gE('banco').value;
					break;
				case '4':
					parc = gE('Nparcela').value;
					band = gE('bandeira').value;
					break;
				case '5':
					parc = gE('Nparcela').value;
			        banc = gE('banco').value;
					break;
				case '6':
					parc = gE('Nparcela').value;
					break;
			}
			gE('montar').style.display = 'none';
			gE('cancPag1').style.display = 'none';
			postag = '&parc=' 		+ parc; 
			postag += '&valorT='	+ valorT;
			postag += '&extenV='	+ extenV;
			postag += '&espe='		+ espe;
			postag += '&band='		+ band;
			postag += '&banc='		+ banc;
			postag += '&cheq='		+ cheq;
			postag += '&titu='			+ titu;
			postag += '&dia='			+ gE('diaV').value;
			postag += '&mes='		+ gE('mesV').value;
			postag += '&ano='		+ gE('anoV').value;
			break;
		case 'confParcelameto':
			oarq = 'apoio';
			postag = '&op=3';
			pc = arq.substring(arq.indexOf('.')+1);
			postag += '&qt='+pc;	
			postag += '&idalu='+gE('matr').value;
			postag += '&idtur='+gE('idtur').value;
			postag += '&iduni='+gE('iduni').value;
			gE('idLer').value = gE('matr').value;
			postag += '&extenV='	+ gE('extenV').value;
//		alert('idalu:'+gE('matr').value);
			for(x=1;x<=pc;x++){
				postag += '&parc'+x+'='	+(gE('parc'+x).innerHTML);	
				postag += '&valo'+x+'='		+(gE('valor'+x).value);	
				postag += '&espe'+x+'='	+(gE('espe'+x).value);	
				postag += '&band'+x+'='	+(gE('band'+x).value);	
				postag += '&banc'+x+'='	+(gE('banc'+x).value);	
				postag += '&cheq'+x+'='	+(gE('cheq'+x).value);	
				postag += '&titu'+x+'='		+(gE('titu'+x).value);	
				postag += '&dia'+x+'='		+(gE('dia'+x).value);	
				postag += '&mes'+x+'='		+(gE('mes'+x).value);	
				postag += '&ano'+x+'='		+(gE('ano'+x).value);	
			}
			gE('confParc').style.display = 'none';
			gE('cancParc').style.display = 'none';
			gE('imp_recibo').style.display = 'block';
			gE('imp_recibo_ass').style.display = 'block';
//			alert(postag);
			break;
		case 'confavista':
			oarq = 'apoio';
			postag = '&op=4';
			postag += '&idalu='	+gE('idLer').value;
			postag += '&valo='	+gE('valoravista').value;
			postag += '&desc='	+gE('descavista').value;
			postag += '&pago='	+gE('pagoavista').value;
			postag += '&espe='	+gE('especie').value;
			postag += '&banc='	+(gE('banco').innerHTML);	
			postag += '&cheq='	+(gE('cheque').innerHTML);	
			postag += '&titu='		+(gE('titular').innerHTML);	
			postag += '&data='	+gE('dataavista').value;
			break;
}
	var arq=oarq+'.php';
	arq=arq+"?id="+id;
	arq=arq+"&sid="+Math.random();
	arq=arq+postag;
//alert(arq);
	xmlHttp.onreadystatechange=function(){
		 if(xmlHttp.readyState == 1 ){
		 }
		 if(xmlHttp.readyState == 4 ){ 
		 }
	}
	// Envia requisição
    xmlHttp.open("GET", arq, false );
    xmlHttp.send(null);
	document.getElementById(tag).innerHTML = xmlHttp.responseText; // aqui funciona no FF com FALSE
	
//alert(xmlHttp.responseText);
	switch(opcao){
		case 1:
			oarq="efetuarPagar";
			break;
		case 9:
			oarq="efetuarDespesas";
			break;
		case 11:
			oarq="mostTurma";
			break;
		case 12:
			oarq="efetuarCaixa";
			break;
		case 13:
			oarq="abrirCaixa";
			break;
		case 14:
			oarq="gravAtendimento";
			break;
	}
	switch(oarq){
		case 'matricula':
			gE('pos').onclick = function(){lerNomes(1);}
			gE('pre').onclick = function(){lerNomes(2);}
			gE('can').onclick = function(){cancelarMat();}
			break;
		case 'caixaAtualizar':
//alert('1111');
			carregar(4,'lisdesp','lisCaixa.'+ 1 );
			break;
		case 'caixaExcluir':
			carregar(4,'fuga','caixaAtualizar.'+ idcai );
			break;
		case 'gravAtendimento':
			carregar(3,'corpo','atendimento.');
			break;
		case 'abrirCaixa':
			carregar(4,'lisdesp','lisCaixa.'+ 1 );
			break;
		case 'relatorios':
			gE('tabelaPc').onclick = alert('1111');//function(){imprimir_Tabela();}
			break;
		case 'tabelaPreco':
			gE('avis1').onkeypress = function(){ajustar('avis',this.lang,this.value,this.name)};		
			gE('avis2').onkeypress = function(){ajustar('avis',this.lang,this.value,this.name)};		
			for(y=1;y<=2;y++){
				for(x=1;x<=6;x++){
					gE('perc'+y+x).onkeypress = function(){ajustar('perc',this.lang,this.value,this.name)};
				}
			}
			gE('gvTab').onclick = function(){carregar(2,'teste','gravarTab.11');}
			break;
		case 'mostTurma':
//			alert (idtura);
			carregar(3,'corpo','lisTurmas.'+idtura);
			break;
		case 'selecionaTur':
//			gE('idtur').value = idtur;
			break;
		case 'efetuarDespesas':
		//	alert ('11111111111111111111');
			carregar(3,'lisdesp','lisDespesas.'+0);
			break;
		case 'efetuarCaixa':
	//		alert ('caixa');
			carregar(3,'lisdesp','lisCaixa.');
			break;
		case 'efetuarPagar':
			carregar(3,'Lpag','efetuarLis.'+idalu);
			break;
		case 'efetuarLis':
			gE('desc').onkeypress = function(){gE('paga').innerHTML = gE('valor').value-(gE('valor').value*this.value/100);}
			break;
		case 'matricula':
				gE('matr').onkeypress = function(){buscaMat();}
			break;
		case 'lerNomes':
			gE('nomesL').onchange = function(){getAlunoDados(this.value);}
			gE('formaP').onclick = function(){formaPag(2);}
			gE('formaA').onclick = function(){formaPag(1);}
			gE('refaz_2via').onclick = function(){refazer_2via();}
			gE('refaz_2viaC').onclick = function(){refazer_2viaC();}
			gE('refaz_pag').onclick = function(){refazer_pag();}
			gE('CUPOM').onclick = function(){CUPOMd();}
//alert(oarq);
			break;
		case 'apoio':
			gE('retornoMens').style.display = 'block';
		//	alert( '------'+gE('fuga').innerHTML+'+++'+xmlHttp.responseText );
			gE('idLer').value = gE('fuga').innerHTML; // atualiza o id do aluno
			gE('matr').value = gE('fuga').innerHTML; // atualiza o id do aluno
			gE('retornoMens').innerHTML = 'Seus dados Foram enviados com sucesso.<br>';
			setTimeout(fechaMens,3000);
			break;
		case 'pagAvista':
			gE('cancPag2').onclick = function(){carregar(2,'pagamento','selecPag.');}
			gE('confavista').onclick = function(){carregar(1,'fuga','confavista.');}
			gE('imp_recibo').style.display = 'block';
			gE('imp_recibo_ass').style.display = 'block';
			break;
		case 'pagParcelado':
			gE('cancPag1').onclick = function(){carregar(2,'pagamento','selecPag.');}
			//gE('reciboPag').onclick = function(){carregar(3,'impresso','reciboPag.');}
			break;
		case 'selecPag':
			gE('formaP').onclick = function(){formaPag(2);}
			gE('formaA').onclick = function(){formaPag(1);}
			gE('ver_forma_pag').style.display = 'none';			
			gE('imp_recibo').style.display = 'none';
			gE('imp_recibo_ass').style.display = 'none';
			break;
		case 'tabelaParcelamento':
			gE('cancParc').onclick = function(){carregar(2,'pagamento','selecPag.');}
			gE('confParc').onclick = function(){carregar(1,'lixo','confParcelameto.'+this.value);}
			gE('imp_recibo_ass').style.display = 'block';
//			alert('aqui');
			break;
		case 'efetuarDespesas':
			carregar(4,'lisdesp','lisDespesas.'+ 1 );
			//header("location:index.php?op=0&page=despesas");
			break;
		default:
			break;
	}
	zerar_Cronometro();
	StartCrono();
//	alert(tempo);
	document.getElementById('lendo').innerHTML = '';  // aqui limpa no FF
}
/*---------------------------------------------------------------------------*/


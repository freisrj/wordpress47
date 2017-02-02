// JavaScript Document
function limparDados(){
		gE('empresa').value = '';
}
function limparBus(){
			gE('nome5').style.display = 'none';
}
function limparBusca(){
			//limpar as buscas
			gE('Bproc').style.display = 'none';
}
function mostrarBusca(){
	gE('ver_forma_pag').style.display = 'block';
	getAlunoDados(gE('matr').value+'|1');
	alert('ok');
}
function getAlunoDados(idop){
	limparCad();
	ativar(); // ativa os botoes proprio e gravar 
	sp = idop.split('|');
	id = sp[0];
	op = sp[1];
//		var p1 = gE('p1').value.replace(/[^0-9]/g,'');
//		var p2 = gE('p2').value.replace(/[^0-9]/g,'');
//alert(id+'---'+op);

//	if(p1.length==4 && p1!=currentClientID && p1!=objNov && p2.length ==2){
		 	document.getElementById('lendo').innerHTML = '<img src="anima/ajax-loaderD.gif">';
//			currentClientID = p1;
//			pp = p1;
			ajaxB.requestFile = 'getLerDados.php?id='+id+'&op='+op;
//alert(ajaxB.requestFile);
			ajaxB.onCompletion = showClientData;	
//alert(ajaxB.onCompletion);
			ajaxB.runAJAX();

//		}else{
//			limparDados();
//		}

			gE('nome').style.display = 'block';
			gE('lisN').style.display = 'none';
			gE('pre').style.display = 'none';
			gE('pos').style.display = 'none';
			gE('can').style.display = 'block';
			gE('dir').style.display = 'block';	
			gE('seleTur').style.display = 'block';	
//alert('3');
}
	
function showClientData(){
	var formObj = document.forms['cadastro'];
	eval(ajaxB.response);
//	alert('4'+formObj.ende.value+'  -  '+gE('idtur').value);
	document.getElementById('lendo').innerHTML = ' ';
			
	carregar(2,'seleTur','selecionaTur.'+gE('idtur').value);	
}
//fim da funcao showClientData

function proprio(){
	gE('Rnome').value = gE('nome').value;
	gE('Rende').value = gE('ende').value;
	gE('Rbair').value = gE('bair').value;
	gE('Rcida').value = gE('cida').value;
	gE('Resta').value = gE('esta').value;
	gE('Rcep').value = gE('cep').value;
	gE('Remai').value = gE('emai').value;
	gE('Rnasc').value = gE('nasc').value;
	gE('Rcpf').value = gE('cpf').value;
	gE('Riden').value = gE('iden').value;
	gE('Rorg').value = gE('org').value;
	gE('Rcivil').value = gE('civil').value;
	gE('Rnaci').value = gE('naci').value;
	gE('Rprof').value = gE('prof').value;
	gE('Rtele1').value = gE('tele').value;
	gE('Rtele2').value = gE('celu').value;
	gE('Rnext').value = gE('next').value;
	gE('gravCad').disabled = false;
}
function limparCad(){
	gE('nome').value = '';
	gE('ende').value = '';
	gE('bair').value = '';
	gE('cida').value = '';
	gE('esta').value = '';
	gE('cep').value = '';
	gE('emai').value = '';
	gE('nasc').value = '';
	gE('cpf').value = '';
	gE('iden').value = '';
	gE('org').value = '';
	gE('civil').value = '';
	gE('naci').value = '';
	gE('prof').value = '';
	gE('tele').value = '';
	gE('celu').value = '';
	gE('next').value = '';
	gE('Rnome').value = '';
	gE('Rende').value = '';
	gE('Rbair').value = '';
	gE('Rcida').value = '';
	gE('Resta').value = '';
	gE('Rcep').value = '';
	gE('Remai').value = '';
	gE('Rnasc').value = '';
	gE('Rcpf').value = '';
	gE('Riden').value = '';
	gE('Rorg').value = '';
	gE('Rcivil').value = '';
	gE('Rnaci').value = '';
	gE('Rprof').value = '';
	gE('Rie').value = '';
	gE('Rim').value = '';
	gE('Rtele1').value = '';
	gE('Ramal1').value = '';
	gE('Rtele2').value = '';
	gE('Ramal2').value = '';
	gE('Rtele3').value = '';
	gE('Ramal3').value = '';	
	gE('Rnext').value = '';
}
function cancelarMat(){
	limparCad();
	gE('nome').style.display = 'block';
	gE('lisN').style.display = 'none';
	gE('pre').style.display = 'block';
	gE('pos').style.display = 'block';
	gE('can').style.display = 'none';	
	gE('ver_forma_pag').style.display = 'none';
	gE('dir').style.display = 'none';	
	gE('imp_recibo').style.display = 'none';	
	gE('seleTur').style.display = 'none';	
}
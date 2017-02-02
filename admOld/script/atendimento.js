// JavaScript Document
function gravarAten(){
	mens = "Campos Obrigatório!\n\n"; aval = true;
	aunid = gE('Aunid').innerHTML;
	afun = gE('Afun').innerHTML;
	ad = gE('diaA').value;
	am = gE('mesA').value;
	aa = gE('anoA').value;
	aho = gE('horaA').value;
	ami = gE('minutoA').value;
	anome = gE('Anome').value;
	if( anome==''){ aval = false; mens+="- Nome;\n";}
	asoub = gE('Asoub').value;
	aidcur = gE('AidCur').value;
	if( aidcur==0){ aval = false; mens+="- Curso;\n";}
	adias = gE('Adias').value;
	ahoras = gE('Ahoras').value;
	aturno = gE('Aturno').value;
	aemail = gE('Aemail').value;
//	if( aemail==''){ aval = false; mens+="- E-Mail;/n";}
	atel1 = gE('Atel1').value;
	atel2 = gE('Atel2').value;
	atel3 = gE('Atel3').value;
	aobs = gE('Aobs').value;
	postag =  '&unid='+aunid+ '&fun='+afun+'&dia='+ad+'&mes='+am+'&ano='+aa+'&hora='+aho+'&minuto='+ami+'&nome='+anome+'&soube='+asoub+'&idcur='+aidcur+'&dias='+adias+'&horario='+ahoras+'&turno='+aturno+'&email='+aemail+'&tel1='+atel1+'&tel2='+atel2+'&tel3='+atel3+'&obs='+aobs;
	if(aval){
		carregar(4,'fuga','gravAtendimento.'+postag );
	}else{
		alert(mens);
	}
}
function pesquisaAten(){
		carregar(4,'lisAte','listarAtendimento.'+1 );
}
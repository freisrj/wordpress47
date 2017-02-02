// JavaScript Document
function atualizarTur(opc){
	duni 	= gE('Diduni').value;
	dcur 	= gE('Didcur').value;
	vagas	= gE('vagas').value;
	matric	= gE('Dmatri').value;
	aberta	= gE('Daberta').value;
//	andame	= gE('Dandamento').value;
	
	dtur = gE('Dtur').innerHTML;
	dhora 	= gE('Dhora').value;
	ddias 	= gE('Ddias').value;
	dturno 	= gE('Dturno').value;
	dini		= gE('Dinicio').value;
	dter		= gE('Dtermino').value;
	dini2		= (gE('Dinicio2').value==''?0:gE('Dinicio2').value);
	dter2		= gE('Dtermino2').value;
	dini3		= gE('Dinicio3').value;
	dter3		= gE('Dtermino3').value;
	dini4		= gE('Dinicio4').value;
	dter4		= gE('Dtermino4').value;
	dini5		= gE('Dinicio5').value;
	dter5		= gE('Dtermino5').value;
	dini6		= gE('Dinicio6').value;
	dter6		= gE('Dtermino6').value;
	dini7		= gE('Dinicio7').value;
	dter7		= gE('Dtermino7').value;
	dini8		= gE('Dinicio8').value;
	dter8		= gE('Dtermino8').value;
//	dmat		= gE('Dmatri').value;
	dsta		= gE('Dstatus').value;
	dvag		= gE('Dvagas').value;
	dval		= gE('Dvalor').value;
	ddes		= gE('Ddesc').value;
	ddes1	= gE('Ddesc1').value;
	ddes2	= gE('Ddesc2').value;
	dmat	= gE('Dmaterial').value;
	x = confirm('Confirma as alterações?');
	if( x ){
		window.location.href='apoio.php?op=7&dtur='+dtur+'&ddias='+ddias+'&dhora='+dhora+'&dturn='+dturno+'&dini='+dini+'&dter='+dter+'&dini2='+dini2+'&dter2='+dter2+'&dini3='+dini3+'&dter3='+dter3+'&dini4='+dini4+'&dter4='+dter4+'&dini5='+dini5+'&dter5='+dter5+'&dini6='+dini6+'&dter6='+dter6+'&dini7='+dini7+'&dter7='+dter7+'&dini8='+dini8+'&dter8='+dter8+'&dmat='+dmat+'&dvag='+dvag+'&dsta='+dsta+'&dval='+dval+'&des='+ddes+'&ddes1='+ddes1+'&ddes2='+ddes2+'&dmat='+dmat+'&opc='+opc+'&idcur='+dcur+'&vagas='+vagas+'&matric='+matric+'&duni='+duni+'&aberta='+aberta;
	}
}

function calcValor(){
	dv = gE('Dvalor').value;
	dd = gE('Ddesc').value;
	gE('VDdesc').value = dv-((dv*eval(dd))/100);
}
function tranferirA(idalu){
	gE('mostTur').style.display = 'block';
//	alert('tranferencia.....' + idalu);
	carregar(3,'mostTur','mostTurmas.'+idalu)
}
function mudarTurma(idalu, idtur ){
	gE('mostTur').style.display = 'none';
	carregar(3,'fuga','transfTurma.'+idalu+'|'+idtur)
	
//		alert(idalu + ' --- ' + idtur);

}
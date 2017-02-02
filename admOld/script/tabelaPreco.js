// JavaScript Document
function ajustar(quem,x,perc,n){
//	alert(quem+x+'--'+perc);
	switch(quem){
		case 'perc':
			base = gE('valDesc').innerHTML.replace('.','');
			base = base.replace(',','.');
			aParc =  parseInt(((base-(base*eval(perc)/100))/x)+.5);
			gE('valpar'+n+x).innerHTML = formatar(aParc);
			totpar = aParc * eval(gE('par'+n+x).innerHTML);
//			alert(totpar);
			gE('totpar'+n+x).innerHTML = formatar(totpar);
			break;
		case 'avis':
			base = gE('valDesc').innerHTML.replace('.','');
			base = base.replace(',','.');
			aParc =  parseInt((base-(base*eval(perc)/100))+.5);
			gE('valVista'+x).innerHTML = formatar(aParc);
//	alert(quem+' - '+x+' - '+perc+' - '+ n);
			break;
	}
}
function formatar(aParc){
	aS = aParc.toString();
	t =  aS.length;
	if(t>3){
		switch(t){
			case 4:
				ml = aS.substring(0,1);
				rl = aS.substring(1);
				break;
			case 5:
				ml = aS.substring(0,2);
				rl = aS.substring(2);
				break;
			case 6:
				ml = aS.substring(0,3);
				rl = aS.substring(3);
				break;		
		}
		moeda = ml+'.'+rl+',00';
	}else{
		moeda = aS+',00';
	}
	return moeda;
}
// JavaScript Document
function editarResp(idpre,lin,tot){
	ajusta(tot);
	gE('exibR'+lin).style.display = 'none';
	gE('editR'+lin).type = 'text';
	gE('bteR'+lin).style.display = 'none';
	gE('btgR'+lin).style.display = 'block';
}
function ajusta(tot){
	for(x=1; x<=tot; x++){
		gE('exibR'+x).style.display = 'block';
		gE('editR'+x).type = 'hidden';	
		gE('bteR'+x).style.display = 'block';
		gE('btgR'+x).style.display = 'none';
	}
}
function gravResp(idpre,lin,idcur){
	respo = gE('editR'+lin).value;
	window.location.href='apoio.php?op=6&idpre='+idpre+'&resp='+respo+'&idcur='+idcur;
}
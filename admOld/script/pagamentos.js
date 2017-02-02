// JavaScript Document
function efetuarVis(parcela,idalu){
//	alert(parcela+'---'+idalu);
	gE('pagar').style.display = 'block';
	carregar(3,'pagar','efetuarPagar.'+idalu+"|"+parcela);
}
function envMens(nome,email,valor,idpag,venc){
//	email = 'wandall@wdinfo.com.br';
//	alert(idpag);
 	window.location.href='apoio.php?op=8&nome='+nome+'&email='+email+'&valor='+valor+'&idpag='+idpag+'&venc='+venc;
}

function atuaValor(valor){
	//alert(valor);
	gE('vpg').value = valor;
}

function Ent_despesas(){
	carregar(4,'fuga','efetuarDespesas.'+ 1 );
}
function Ent_caixa(){
	carregar(4,'fuga','efetuarCaixa.'+ 1 );
}
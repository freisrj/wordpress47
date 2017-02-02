// JavaScript Document
function excluirCX(idcai){
//	alert(idcai);
	ex = confirm("ATENÇÃO!!!!! \n\n - Deseja excluir esse item do caixa?");
	if(ex){
		carregar(1,'fuga','caixaExcluir.'+idcai);
	}
}
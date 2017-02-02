// JavaScript Document
function tcep(id){
//	var tecla = window.event.keyCode;

	ulet = gE(id).value.substr(gE(id).value.length-1);
	cod = ulet.charCodeAt();
	if(cod<48 || cod>57){
		gE(id).value = gE(id).value.substr(0,gE(id).value.length-1);
	}
	if(gE(id).value.length == 5 )gE(id).value+='-';
}
function ttel(id){
//	var tecla = window.event.keyCode;

	ulet = gE(id).value.substr(gE(id).value.length-1);
	cod = ulet.charCodeAt();
	if(cod<48 || cod>57){
		gE(id).value = gE(id).value.substr(0,gE(id).value.length-1);
	}
	switch( gE(id).value.length ){
		case 1:
			gE(id).value  = '('+gE(id).value;
			break;
		case 3:
			gE(id).value+=')9';
			break;
		case 4:
			gE(id).value+=')9';
			break;
		case 9:
			gE(id).value+='-';
			break;		
	}
}
function tnas(id){
	ulet = gE(id).value.substr(gE(id).value.length-1);
	cod = ulet.charCodeAt();
	if(cod<48 || cod>57){
		gE(id).value = gE(id).value.substr(0,gE(id).value.length-1);
	}
	switch( gE(id).value.length ){
		case 2:
			gE(id).value+='/';
			break;
		case 5:
			gE(id).value+='/';
			break;
	}
}
function tcpf(id){
	ulet = gE(id).value.substr(gE(id).value.length-1);
	cod = ulet.charCodeAt();
	if(cod<48 || cod>57){
		gE(id).value = gE(id).value.substr(0,gE(id).value.length-1);
	}
	switch( gE(id).value.length ){
		case 3:
			gE(id).value+='.';
			break;
		case 7:
			gE(id).value+='.';
			break;
		case 11:
			gE(id).value+='-';
			break;
	}
}
function tcnpj(id){
	ulet = gE(id).value.substr(gE(id).value.length-1);
	cod = ulet.charCodeAt();
	if(cod<48 || cod>57){
		gE(id).value = gE(id).value.substr(0,gE(id).value.length-1);
	}
	switch( gE(id).value.length ){
		case 2:
			gE(id).value+='.';
			break;
		case 6:
			gE(id).value+='.';
			break;
		case 10:
			gE(id).value+='/';
			break;
		case 15:
			gE(id).value+='-';
			break;
	}
}

function trocarMask(x){
	if(x==1){
		gE('cpfCnpj').innerHTML = "<input type='text' name='Rcpf' id='Rcpf' maxlength='14' size='19' onkeyup='tcpf(this.name)' /><label id='maskara'>999.999.999-99</label>";
	//	gE('Rcpf').onKeyUp="'tcpf(this.name)'";
		gE('emp1').style.display = 'block';
		gE('emp2').style.display = 'none';
	}else{
		gE('cpfCnpj').innerHTML = "<input type='text' name='Rcpf' id='Rcpf' maxlength='18' size='19' onkeyup='tcnpj(this.name)' /><label id='maskara'>99.999.999/9999-99</label>";
		gE('emp1').style.display = 'none';
		gE('emp2').style.display = 'block';

//		gE('Rcpf').onKeyUp="'tcnpj(this.name)'";
	}
}

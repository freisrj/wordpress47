// JavaScript Document
function gE(ID){return document.getElementById(ID)}
function gT(tag){return document.getElementsByTagName(tag)}
function gN(name){return document.getElementsByName(name)}

function zerar_Cronometro(){
	clearTimeout(c);
	var timeCrono;
	var hor = 0;
	var min = 0;
	var seg = 0;
	var startTime = new Date();
//	startTime.setHours(0, 0, 0, 0);
	var start = startTime.getSeconds();
	timeCrono = ':00:00';
	gE('crono').innerHTML = timeCrono;
}
	

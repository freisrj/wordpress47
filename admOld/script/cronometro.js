// JavaScript Document
function StartCrono() {
	if (seg + 1 > 59) {
		min+= 1 ;
	}
	if (min > 59) {
		min = 0;
		hor+= 1;
	}
	var time = new Date();
	if (time.getSeconds() >= start) {
		seg = time.getSeconds() - start;
	}else {
		seg = 60 + (time.getSeconds() - start);
	}
	timeCrono = ((hor < 10) ? "-0" + hor : hor);
	timeCrono = ((min < 10) ? ":0" : ":") + min;
	timeCrono+= ((seg < 10) ? ":0" : ":") + seg;
	gE('crono').innerHTML = timeCrono;
} 
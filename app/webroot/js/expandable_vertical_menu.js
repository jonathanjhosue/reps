// JavaScript Document

/*
===================================================
	Expandable vertical menu style
===================================================
*/
var myvar;
function panelsinit(t) {
	
	//var stop = true;
	var contPanel = 0;
	while(contPanel < t)
	{
		//try{
			document.getElementById('panel_' + contPanel).style.display = 'none';
			document.getElementById('pm'+contPanel).src = 'plus.png';
			contPanel = contPanel+1;;
		//}catch(e){
			//stop = false;
		//}
	}
	/*document.getElementById('panel_1').style.display = 'none';
	document.getElementById('panel_2').style.display = 'none';
	document.getElementById('panel_3').style.display = 'none';
	document.getElementById('pm1').src = 'plus.png';
	document.getElementById('pm2').src = 'plus.png';
	document.getElementById('pm3').src = 'plus.png';*/
}
function panelexpand (i, total) {
	panelsinit(total);
	if (myvar == i) {
		/*document.getElementById('p' + i).src = 'plus.png';*/
		document.getElementById(i).style.display = 'none';
		myvar = '';
	}
	else {
		/*document.getElementById('p' + i).src = 'minus.png';*/
		document.getElementById(i).style.display = 'block';
		myvar = i;
	}
} 

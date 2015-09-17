// JavaScript Document
function show(i){
	for(j=1;j<4;j++){
		if(j==i){
			document.getElementById("button"+j).className="the";
			document.getElementById("left"+j).className="son show";
		}else{
			document.getElementById("button"+j).className="";
			document.getElementById("left"+j).className="son hidden";
		}
	}
}
window.onload=function(){
	document.getElementById("button1").onclick=function(){
		show(1);
	}
	document.getElementById("button2").onclick=function(){
		show(2);
	}
	document.getElementById("button3").onclick=function(){
		show(3);
	}
}
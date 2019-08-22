var maxHeightvideo;

function isRealValue(obj)
{
  return obj && obj !== 'null' && obj !== 'undefined';
}
function randome_unique(){
	var arr = []
	while(arr.length < 10){
	    var randomnumber = Math.floor(Math.random()*100) + 1;
	    if(arr.indexOf(randomnumber) > -1) continue;
	    arr[arr.length] = randomnumber;
	}
	return arr[0];
}
var _e_fb_check = document.getElementsByClassName("fb-messenger-checkbox")[0];
var att = document.createAttribute("user_ref");
var rand = randome_unique();   
att.value = rand;                          
//_e_fb_check.setAttributeNode(att); 
//console.log(_e_fb_check);
//setTimeout(randome_unique,1000);

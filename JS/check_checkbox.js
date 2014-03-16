function unCheck(id){
	if(!document.getElementById(id).checked){
		document.getElementById(id).checked = true;
	}
	else{
		document.getElementById(id).checked = false;
	}
}

function unCheckAll(id){ 
	var inputs = document.getElementsByTagName("input");
	var value = false;
	if(document.getElementById(id).checked){
		value = true;
	}
	for(var i = 0; i < inputs.length; i++){
		if(inputs[i].type == "checkbox" && inputs[i] != document.getElementById(id)){
			inputs[i].checked = value;
		}
	}
}
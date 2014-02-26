
var listStars = Array();
var listRadio = Array();
var containerStars;

window.addEventListener('load', function(){
	for(var i=0; i < 5; i++){
		listStars[i] = document.getElementById('et'+(i+1));
		if(listStars[i] !== undefined){
			listStars[i].addEventListener('mouseover', colorStars, false);
		}
		listRadio[i] = document.getElementById('note'+(i+1));
	}
	containerStars = document.getElementsByName('notes')[0];
	containerStars.addEventListener('mouseout', saveColorStars, false);

}, false);

function colorStars(ev){
	var id = ev.target.id;
	var maxId = id.substring(id.length-1);
	for(var i=0; i < listStars.length; i++){
		if(i < maxId){
			listStars[i].setAttribute('class', 'etoile_select');
		}
		else{
			listStars[i].setAttribute('class', 'etoile_vide');
		}
	}
}



function saveColorStars(){
	var id = 0;
	for(var i=0; i < 5 && id == 0; i++){
		 if(listRadio[i].checked){
		 	id = i+1; // Récupère la case cochée
		 }
	}
	if(id == null || id == "" || isNaN(id) || parseInt(id) < 1 || parseInt(id) > 5){ // Si problème dans la valeur
		id = 0;
	}
	for(var i=0; i < listStars.length; i++){
		if(i < parseInt(id)){
			listStars[i].setAttribute('class', 'etoile_select');
		}
		else{
			listStars[i].setAttribute('class', 'etoile_vide');
		}
	}
}

window.addEventListener('load', function(){
	var btt = document.getElementById('bttGeo');
	btt.addEventListener('click', function(){
		if(navigator.geolocation){
			navigator.geolocation.getCurrentPosition(displayPos, errorsGeo, 
														{timeout:6000, maximumAge:60000}); // temps avant erreur une minute
		}
		else{
			// Le navigateur ne permet pas la géolocalisation
		}
	}, false);
} ,false);


function displayPos(position){
	document.getElementById('lat').value = position.coords.latitude;
	document.getElementById('lon').value = position.coords.longitude;
	document.getElementById('formRecherche').submit();
}

function errorsGeo(error) {
    var info = "Erreur lors de la géolocalisation : ";
    switch(error.code) {
    case error.TIMEOUT:
    	info += "Timeout !";
    break;
    case error.PERMISSION_DENIED:
    info += "Vous n’avez pas donné la permission";
    break;
    case error.POSITION_UNAVAILABLE:
    	info += "La position n’a pu etre déterminée";
    break;
    case error.UNKNOWN_ERROR:
    	info += "Erreur inconnue";
    break;
    }
	document.getElementById("position").innerHTML = info;
}
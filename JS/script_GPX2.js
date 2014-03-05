



function getGpx(name){
	var xhr;
	
	if (window.XMLHttpRequest || window.ActiveXObject) {
		if (window.ActiveXObject) {
			try {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		} else {
			xhr = new XMLHttpRequest(); 
		}
	} else {
		return false;
	}

	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4){
			if(xhr.status == 200){
				alert("ok : " + xhr.responseText);
				initializeMap();
			}
			else{
				console.log(xhr.status);
			}
		}
	};


	xhr.open('GET', 'Resources/GPX/'+name, true); // Demande le fichier gpx de la carte de manière asychrone
	xhr.send(null);
}


function initializeMap(){
	/*var sw = new google.maps.LatLng(limitPoints.south, limitPoints.west);
	var ne = new google.maps.LatLng(limitPoints.north, limitPoints.east);
	var frameMap = new google.maps.LatLngBounds(sw, ne); // Permet de définir le cadre de la carte*/

	var mapOptions = {
		center: new google.maps.LatLng(45, 3),
		zoom: 9,
		mapTypeId: google.maps.MapTypeId.TERRAIN
	};
	map = new google.maps.Map(divMap, mapOptions);

	var ramblePathCoordinates = new Array();

	/*for(var i=0; i < arrayCoordinates.length; i++){
		ramblePathCoordinates.push(new google.maps.LatLng(arrayCoordinates[i].lat, arrayCoordinates[i].lon));
	}*/

	/*var ramblePath = new google.maps.Polyline({
		path: ramblePathCoordinates,
		strokeColor: '#0000FF',
		strokeOpacity: 0.8,
		strokeWeight: 4
	});

	map.fitBounds(frameMap); // On ajuste le zoom et le centre en fonction du parcours
	ramblePath.setMap(map);*/
}

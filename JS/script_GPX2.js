
function getGpx(name){
	var xhr;
	if (window.XMLHttpRequest || window.ActiveXObject) {
		if (window.ActiveXObject) { // Pour IE
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
			if(xhr.status == 200 || xhr.status == 0){
				initXmlReader(xhr.responseText);
			}
			else{
				console.log(xhr.status);
				return false;
			}
		}
	};


	xhr.open('GET', 'Resources/GPX/'+name, true); // Demande le fichier gpx de la carte de manière asychrone
	xhr.send(null);
	return true;
}


function initializeMap(listCoordinates, limitPoints){
	var sw = new google.maps.LatLng(limitPoints.south, limitPoints.west);
	var ne = new google.maps.LatLng(limitPoints.north, limitPoints.east);
	var frameMap = new google.maps.LatLngBounds(sw, ne); // Permet de définir le cadre de la carte*/

	var mapOptions = {
		mapTypeId: google.maps.MapTypeId.TERRAIN,
		streetViewControl: false
	};
	map = new google.maps.Map(divMap, mapOptions);

	var ramblePathCoordinates = new Array();

	for(var i=0; i < listCoordinates.length; i++){
		ramblePathCoordinates.push(new google.maps.LatLng(listCoordinates[i].lat, listCoordinates[i].lon));
	}

	var ramblePath = new google.maps.Polyline({
		path: ramblePathCoordinates,
		strokeColor: '#0000FF',
		strokeOpacity: 0.8,
		strokeWeight: 4
	});

	map.fitBounds(frameMap); // On ajuste le zoom et le centre en fonction du parcours
	ramblePath.setMap(map);
}


function initXmlReader(textFile){
    var gpxFile;
    if(window.DOMParser){
        parser = new DOMParser();
        gpxFile = parser.parseFromString(textFile, "text/xml");
    }
    else{ // Si on est sur IE
        gpxFile = new ActiveXObject("Microsoft.XMLDOM");
        gpxFile.async=false;
        gpxFile.loadXML(textFile);
    }
    gpxRead(gpxFile);
}

function gpxRead(gpxFile){
	var listCoordinates = new Array();
	var Coordinate = { // Longitude et lattitude
		lat: NaN,
		lon: NaN
	};
	var listPoints = gpxFile.getElementsByTagName('trkpt');
    if(listPoints.length == 0){ // Si on ne trouve pas de balise trkpt
        listPoints = gpxFile.getElementsByTagName('rtept');
    }
    /* Les points aux extrémités de du parcours, point le plus au Sud, le plus à l'Est...
       Ces point permetteront de trouver le centre du parcours*/
    var limitPoints = {
        north: NaN,
        south: NaN,
        east: NaN,
        west: NaN
    };

	var listAttributes;
	var i; // Permettra de calculer le nombre de points


	for(var i=0; i< listPoints.length; i++){

		listAttributes = listPoints[i].attributes;
		for(var j=0; j < listAttributes.length; j++){
			if(listAttributes[j].nodeName == 'lon'){
				Coordinate.lon = parseFloat(listAttributes[j].nodeValue);
			}
			else if(listAttributes[j].nodeName == 'lat'){
				Coordinate.lat = parseFloat(listAttributes[j].nodeValue);
			}
		}

		if(!isNaN(Coordinate.lat) && !isNaN(Coordinate.lon)){ // Si la coordonnée est valide
            listCoordinates.push(Coordinate);
            if(isNaN(limitPoints.north)){
                /* Si la lattitude est plus grande, ça veut dire que le point est plus au nord 
                (Sur google API la longitude du sud est négative)*/
                limitPoints.north = Coordinate.lat;
                limitPoints.south = Coordinate.lat;
                limitPoints.east = Coordinate.lon;
                limitPoints.west = Coordinate.lon;

            }
            else{
                if(Coordinate.lat > limitPoints.north){ 
                    limitPoints.north = Coordinate.lat;
                }
                else if(Coordinate.lat < limitPoints.south){
                    limitPoints.south = Coordinate.lat;
                }

                if(Coordinate.lon > limitPoints.east){
                    limitPoints.east = Coordinate.lon;
                }
                else if(Coordinate.lon < limitPoints.west){
                    limitPoints.west = Coordinate.lon;
                }
            }
		}

		Coordinate = { // Réinitialise Longitude et lattitude
			lat: NaN,
			lon: NaN
		};
	}
	
	if(listCoordinates.length > 0){
		initializeMap(listCoordinates, limitPoints);
	}
}


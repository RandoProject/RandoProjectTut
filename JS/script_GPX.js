const stepHeight = 10; // La hauteur du seuil à prendre en compte pour les dénielés
var chooser;
var fileInput;
var reader;

window.addEventListener('load', function(){
    var chooser = document.getElementById('buttonChooseGpx');
    chooser.addEventListener('click', function(){
            var file = document.getElementById('fileMap');
            file.click();
    }, false);

    fileInput = document.getElementById('fileMap');
    fileInput.addEventListener('change', function(){
                reader = new FileReader();
                reader.addEventListener('load', function(){ initXmlReader(reader.result)}, false);
                reader.readAsText(fileInput.files[0]);
    }, false);
    
}, false);


// Initialise l'objet de lecture, et envoi le GPX à la fonction gpxRead
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

    /* Les points aux extrémités de du parcours, point le plus au Sud, le plus à l'Est...
   Ces point permetteront de trouver le centre du parcours*/
    var limitPoints = {
        north: NaN,
        south: NaN,
        east: NaN,
        west: NaN
    };
    var deniv = null; // Contiendra le dénivelé de la rando si l'élevation est indiquée
    var ele = 0, elePrevious = 0; // elevation actuel
    var listChilds;

	var listPoints = gpxFile.getElementsByTagName('trkpt');
    if(listPoints.length == 0){ // Si on ne trouve pas de balise trkpt
        listPoints = gpxFile.getElementsByTagName('rtept');
    }


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
                (Sur google API la longitude du sud est négative) */
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

		listChilds = listPoints[i].childNodes;
		for(var j=0, childText; j < listChilds.length; j++){
			
			if(listChilds[j].nodeName == 'ele'){
				
				ele = parseFloat(listChilds[j].childNodes[0].nodeValue);
				if(ele > (elePrevious + stepHeight)){
					if(deniv === null){
						deniv = 0;
					}
					else{
						deniv += ele - elePrevious;
					}
					elePrevious = ele;
					console.log("ele : " + ele + "  elePrev : " + elePrevious + " deniv : " + deniv);
				}
				else if(ele < (elePrevious - stepHeight)){
					elePrevious = ele;
				}
			}
		}

		Coordinate = { // Réinitialise Longitude et lattitude
			lat: NaN,
			lon: NaN
		};
	}

	infoFile = document.createElement('div');
	var p = document.createElement('p');
	infoFile.id = 'info-map';

	if(listCoordinates.length > 0){
		initialize(listCoordinates, limitPoints); // On appelle la carte
		var h3 = document.createElement('h3');
		var pathFile = document.getElementById('pathFile');
        if(pathFile.firstChild === null){
            pathFile.appendChild(document.createTextNode(fileInput.value));
        }
        else{
            pathFile.firstChild.nodeValue = fileInput.value;
        }


		p.innerHTML = '<strong>Nom du fichier</strong> : ' + fileInput.files[0].name + '<br><strong>Nombre de points</strong> : ' + i + '<br>';
		h3.appendChild(document.createTextNode('Informations fichier : '));
		infoFile.appendChild(h3);
		infoFile.appendChild(p);
		
	}
	else{
		p.appendChild(document.createTextNode('Erreur : Le fichier que vous avez choisi ne contient aucune coordonée'));
		p.class = 'erreur';
	}
	/*

	divInfo = document.getElementById('info-map');
    form = document.getElementById("insert_rando");
	if(divInfo == null){
		form.insertBefore(infoFile, document.getElementById('map-canvas')); // On insère les infos avant la carte
	}
	else{
		form.replaceChild(infoFile, divInfo);
	}

	*/
	if(deniv !== null){
		document.getElementById('deniv').value = deniv;
	}
	else{
		document.getElementById('deniv').value = "";
	}

}
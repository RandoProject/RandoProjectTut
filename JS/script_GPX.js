

var fileInput = document.querySelector('#fileMap');

		   		fileInput.onchange = function() {
    			var reader = new FileReader();
    			
    			reader.onload = function() {
    				if(window.DOMParser){
    					parser = new DOMParser();
    					gpxFile = parser.parseFromString(reader.result, "text/xml");
    				}
    				else{ // Si on est sur IE
    					gpxFile = new ActiveXObject("Microsoft.XMLDOM");
  						gpxFile.async=false;
  						gpxFile.loadXML(reader.result); 
    				}

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
    				var i; // Nous permettra de calculer le nombre de points


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

    				infoFile = document.createElement('div');
    				var p = document.createElement('p');
    				infoFile.id = 'info-map';

    				if(listCoordinates.length > 0){
    					initialize(listCoordinates, limitPoints); // On appelle la carte
	    				var h3 = document.createElement('h3');
	    				

	    				p.innerHTML = '<strong>Nom du fichier</strong> : ' + fileInput.files[0].name + '<br><strong>Nombre de points</strong> : ' + i + '<br>';
	    				h3.appendChild(document.createTextNode('Informations fichier : '));
	    				infoFile.appendChild(h3);
	    				infoFile.appendChild(p);
	    				
	    				
    				}
    				else{
    					p.appendChild(document.createTextNode('Erreur : Le fichier que vous avez choisi ne contient aucune coordonée'));
    					p.class = 'erreur';
    				}


    				divInfo = document.getElementById('info-map');
                    form = document.getElementById("insert_rando");
    				if(divInfo == null){
    					form.insertBefore(infoFile, document.getElementById('map-canvas')); // On insère les infos avant la carte
    				}
    				else{
    					form.replaceChild(infoFile, divInfo);
    				}

    			};


    			reader.readAsText(fileInput.files[0]);
    		}
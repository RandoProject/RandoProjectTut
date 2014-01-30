

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

    					if(Coordinate.lat != NaN && Coordinate.lon != NaN){ // Si la coordonnée est valide
    						listCoordinates.push(Coordinate);
    					}

    					Coordinate = { // Longitude et lattitude
	    					lat: NaN,
	    					lon: NaN
    					}; 
    				}

    				infoFile = document.createElement('div');
    				var p = document.createElement('p');
    				infoFile.id = 'info-map';

    				if(listCoordinates.length > 0){
    					initialize(listCoordinates); // On appelle la carte
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
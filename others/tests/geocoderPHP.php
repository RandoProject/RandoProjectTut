<?php


$lat = 45.75494820880817;
$lon = 4.8944091796875;

// Il faut activer l'extension 'open_ssl' pour que le fichier puisse être chargé
$xmlResult = simplexml_load_file('https://maps.googleapis.com/maps/api/geocode/xml?latlng='.$lat.','.$lon.'&sensor=false'); // Pas besoin de la clée d'API...

$status = $xmlResult->status;



if($status == 'OK'){
	$listAddressComponent = $xmlResult->result[0]->address_component;
	foreach($listAddressComponent as $adressComponent){
		if($adressComponent->type == 'postal_code'){
			$postalCode = $adressComponent->long_name;
			break;
		}
	}
	if(isset($postalCode)){
		echo "Code postal : ".$postalCode;
	}
	else{
		echo "Erreur : Impossible de trouver le code postal";
	}
}
else{
	echo "Erreur: la demande géocode n'a pas fonctionnée : ".$status;
}

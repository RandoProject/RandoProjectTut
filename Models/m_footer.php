<?php

function number_of($table){
	global $bdd;

	$query = 'SELECT count(*) FROM '.$table;
	$exec = $bdd->query($query);
	$data = $exec->fetchColumn();
	
	return $data;
}

function check_ip($ip){
	global $bdd;
	
	$query = 'SELECT count(*) FROM connectes WHERE ip="'.$ip.'"';
	$exec = $bdd->query($query);
	$connecte = $exec->fetchColumn();
	
	if($connecte === 0){ // Si non-connecté -> on ajoute son IP
		$query = 'INSERT INTO connectes VALUES(\''.$ip.'\', '.time().')';
	}
	else{ // Si déjà connecté -> on met à jour sont timestamp
		$query = 'UPDATE connectes SET timestamp='.time().' WHERE ip=\''.$ip.'\'';
	}
	$exec = $bdd->query($query);

	$time = time()-(60*5); // 60 secondes * 5 = 5 minutes
	$query = 'DELETE FROM connectes WHERE timestamp < '.$time;
	$exec = $bdd->query($query);
}
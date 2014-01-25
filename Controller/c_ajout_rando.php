<?php

if(isset($_SESSION['statut']) and in_array($_SESSION['statut']), array('administrateur', 'moderateur', 'utilisateur')){

}
else{
	$interdiction = 'ajout_rando';
	include_once('View/v_connexion.php');
}
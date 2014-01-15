<?php
$host='localhost';
$user='';
$password='';
$base='site_rando';

$server = mysql_connect($hote,$user,$mdp) or die("Erreur de connexion au serveur $Hôte");
$database = mysql_select_db($bdd, $server) or die("Erreur de connexion à la base de donnée $BDD");
?>
<?php
$host='mysql:host=localhost;dbname=site_rando';
$user='root';
$password='';
$bdd;

	try{
		$bdd = new PDO($host, $user, $password);
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
?>

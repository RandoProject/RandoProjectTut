<?php
$host='localhost';
$user='root';
$password='';
$base='site_rando';

	try{
		$bdd = new PDO('mysql:host=\'$host\';dbanme=\'$base\'', $user, $password);
	}
	catch(Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
?>


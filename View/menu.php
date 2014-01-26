<?php

function menu(){
	echo '	<nav>
				<ul id="menu">
					<li><a href="index.php">Acceuil</a></li>
					<li><a href="index.php?page=recherche">Randonnées</a></li>
					<li><a href="index.php?page=galerie">Galerie</a></li>
					<li><a href="index.php?page=ajouter_rando">Ajouter une rando</a></li>';

	if(isset($_SESSION['statut'])){
		if($_SESSION['statut'] == 'administrateur'){
			echo '	<li><a href="#">Administration</a></li>';
		}
		else if($_SESSION['statut'] == 'moderateur'){
			echo '	<li><a href="#">Validation</a></li>';
		}
	}

	echo '		</ul>
				<ul id="account">';
				
	if(isset($_SESSION['statut'])){
		echo '		<li><a class="profil" href="index.php?page=profil">Profil</a></li>
					<li><a class="connexion" href="index.php?page=deconnexion">Déconnexion</a></li>';
	}
	else{
		echo '		<li><a class="profil" href="index.php?page=inscription">Inscription</a></li>
					<li><a class="connexion" href="index.php?page=connexion">Connexion</a></li>';
	}
	echo '		</ul>
			</nav>
	';
}
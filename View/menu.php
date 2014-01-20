<?php
function menu(){
	echo '	<nav>
				<ul id="menu">
					<li><a href="index.php">Acceuil</a></li>
					<li><a href="index.php?page=recherche">Randonnées</a></li>
					<li><a href="index.php?page=galerie">Galerie</a></li>
					<li><a href="index.php?page=ajouter_rando">Ajouter une rando</a></li>
				</ul>
				<ul id="account">
	';
	//if(user non connecté){
		echo '		<li><a class="profil" href="index.php?page=inscription">Inscription</a></li>
					<li><a class="connexion" href="index.php?page=connexion">Connexion</a></li>
		';
	/*else
		echo '		<li><a class="profil" href="index.php?page=profil">Profil</a></li>
					<li><a class="connexion" href="index.php?page=deconnexion">Déconnexion</a></li>
		';*/
	echo '		</ul>
			</nav>
	';
	
}
?>
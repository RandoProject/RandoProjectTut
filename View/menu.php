

<?php

function menu(){
	if(!isset($_GET['page'])) $currentpage = 'accueil';
	else $currentpage = $_GET['page'];
	
	echo '	<style>
			nav ul#menu li a#'.$currentpage.'{
				background-position: 0px;
				color: #FFF;
			}
			</style>
	';
	
	
	echo '	<nav>
				<ul id="menu">
					<li><a id="accueil" href="index.php">Accueil</a></li>
					<li><a id="recherche" href="index.php?page=recherche">Randonnées</a></li>
					<li><a id="galerie" href="index.php?page=galerie">Galerie</a></li>
					<li><a id="ajout_rando" href="index.php?page=ajout_rando">Ajouter une rando</a></li>';

	if(isset($_SESSION['statut'])){
		if($_SESSION['statut'] == 'administrateur'){
			echo '	<li><a id="administrateur" href="index.php?page=administrateur&section=randonnees">Administration</a></li>';
		}
		else if($_SESSION['statut'] == 'moderateur'){
			echo '	<li><a id="moderateur" href="index.php?page=moderateur&section=randonnees">Modération</a></li>';
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
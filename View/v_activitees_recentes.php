<aside>
    Dernières Randonnées </br>
    <?php
    foreach($liste_rando as $rando) {
		echo $rando['titre'] .'</br>';
		echo '<img src="Resources/Galerie/'. $rando['nom_galerie'] .'/'. $rando['nom_photo'] .'" width="100px" height="50px;"/></br></br>';
	}
	?>
</aside>			
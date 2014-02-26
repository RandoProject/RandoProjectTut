<aside>
    <h3>Dernières Randonnées</h3>
		<?php
        foreach($liste_rando as $rando){
			echo '	<a href="index.php?page=fiche_rando&code='.$rando['code'].'">
						'.$rando['titre'].'</br>
						<img src="Resources/Galerie/'.$rando['nom_galerie'].'/'.$rando['nom_photo'].'" width="144px" height="81px;"/>
					</a><br/><br/>
			';
        }
        ?>
    <br/>
	<h3>Dernièrs Commentaires</h3>
		<?php
        foreach($liste_com as $com){
			echo $com['commentaire'].'</br>';
			echo '<em>'.$com['auteur'].'</em><br/><br/>';
        }
        ?>
</aside>			
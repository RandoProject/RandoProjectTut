<aside>
    <p>Derni�res Randonn�es</p>
    <center>
		<?php
        foreach($liste_rando as $rando){
            echo $rando['titre'].'</br>';
            echo '<img src="Resources/Galerie/'.$rando['nom_galerie'].'/'.$rando['nom_photo'].'" width="144px" height="81px;"/><br/>';
        }
        ?>
    </center>
    <br/>
	<p>Derni�rs Commentaires</p>
    <center>
		<?php
        foreach($liste_com as $com){
			echo $com['commentaire'].'</br>';
			echo '<em>'.$com['auteur'].'</em><br/>';
        }
        ?>
</aside>			
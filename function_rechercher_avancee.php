<?php
		function recherche_avancee($nameSelect){
		require('bin/params.php');

		echo '<select name="'.$nameSelect.'">';
			
			$req = $bdd->query('SELECT code FROM rando');

			while($donnees = $req->fetch())
			{
				echo '<option valeur=" '.$donnees['code'].' ">'.$donnees['code'].'</option>';
			}

			$req->closeCursor();

		echo '</select>';
		}
?>

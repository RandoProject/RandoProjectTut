<?php
		function recherche_avancee($nameSelect,$select,$table,$requete){
		require('../bin/params.php');

		echo '<select name="'.$nameSelect.'">';
			
			$requete = $bdd->query("SELECT $select FROM $table");

			while($donnees = $requete->fetch())
			{
				echo '<option valeur=" '.$donnees[$select].' ">'.$donnees[$select].'</option>';
			}

			$requete->closeCursor();

		echo '</select>';
		}
?>

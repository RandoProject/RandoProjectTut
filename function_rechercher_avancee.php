<?php
require ('bin/params.php');

		function recherche_avancee($nameSelect){
		echo '<select name="'.$nameSelect.'">';
			
			$req = $bdd->query('SELECT code FROM rando');
			$req->setFetchMode(PDO::FETCH_OBJ);

			while($donnees = $req->fetch())
			{
				echo '<option value="1">1</option>';
			}

			$req->closeCursor();

		echo '</select>';
		}
?>

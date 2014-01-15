<?php
	include("bin/params.php");

		function recherche_avancee($nameSelect){
		echo '<select name="$nameSelect">';
			try{
				$bdd = new PDO('mysql:host=\'$host\';dbanme=\'$base\'', $user, $password);
			}
			catch(Exception $e)
			{
				die('Erreur : ' . $e->getMessage());
			}

			$req = $bdd->query('SELECT code FROM rando');

			while($donnees = $req->fetch())
			{
				echo '<option value="\'$donnees[\'code\']\'">'.$donnees['code']. '</option>';
			}

			$req->closeCursor();
		echo '</select>';
		}
?>

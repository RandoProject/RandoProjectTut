<!DOCTYPE html>
<html lang="fr">
	
	<?php head("Qui sommes-nous?")
	?>
	<body>
    	<div id="corps">
			<?php menu(); ?>
        	
        	<section id="presentation">
                <div class="titre"> Qui sommes-nous ? </div>
                	<p id="texte1">
                		RandoPassion a �t� r�alis� par 3 �tudiants de l'IUT Informatique de Lyon 1 dans le cadre de leur projet tuteur�. Le projet a �t� encadr� par Mme DESLANDRES, professeur de l'IUT informatique. Le but de ce projet �tait de concevoir un site internet complet pour les randonneurs.<br>
                		Ce site devait permettre aux internautes de pouvoir s'inscrire, se connecter au site, de pouvoir ajouter, consulter, �changer, commenter, noter une randonn�e, participer � la vie du site. Le groupe de travail est constitu� de Sylvio Menubarbe, Florian Paturaux, Benoit Rongeard.<br>Etant tous les 3 passionn�s par le d�veloppement web, nous voullions travailler sur ce projet pour gagner de l'exp�rience dans ce domaine. Au cour des 4 mois de travaille nous avons r�ussis � terminer le projet.
                	</p><br>
					
					<p id="texte2">
                		Vous pouvez nous contacter dans la rubrique <a href="index.php?page=contact">"contact"</a> pour toute question ou probl�me �ventuel.
					</p><br>
					<p id="texte3">
                		Bonne navigation, en esp�rant que le site vous plait. 
                	</p><br>
                	<p id="texte4">
                						L'�quipe de RandoPassion.
                	</p>

        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>

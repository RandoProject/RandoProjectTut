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
                		RandoPassion a été réalisé par 3 étudiants de l'IUT Informatique de Lyon 1 dans le cadre de leur projet tuteuré. Le projet a été encadré par Mme DESLANDRES, professeur de l'IUT informatique. Le but de ce projet était de concevoir un site internet complet pour les randonneurs.<br>
                		Ce site devait permettre aux internautes de pouvoir s'inscrire, se connecter au site, de pouvoir ajouter, consulter, échanger, commenter, noter une randonnée, participer à la vie du site. Le groupe de travail est constitué de Sylvio Menubarbe, Florian Paturaux, Benoit Rongeard.<br>Etant tous les 3 passionnés par le développement web, nous voullions travailler sur ce projet pour gagner de l'expérience dans ce domaine. Au cour des 4 mois de travaille nous avons réussis à terminer le projet.
                	</p><br>
					
					<p id="texte2">
                		Vous pouvez nous contacter dans la rubrique <a href="index.php?page=contact">"contact"</a> pour toute question ou problème éventuel.
					</p><br>
					<p id="texte3">
                		Bonne navigation, en espérant que le site vous plait. 
                	</p><br>
                	<p id="texte4">
                						L'équipe de RandoPassion.
                	</p>

        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>

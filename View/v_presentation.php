<!DOCTYPE html>
<html lang="fr">
	
	<?php head("Qui sommes-nous?")
	?>
	<body>
    	<div id="corps">
			<?php menu(); ?>
        	
        	<section id="presentation">
                <div class="titre"> Qui sommes-nous ? </div>
                	<p id="texte">
                        RandoPassion a été réalisé par 3 étudiants de l'IUT Informatique de Lyon 1 dans le cadre de leur projet tuteuré. Le projet a été encadré par Mme DESLANDRES, professeur de l'IUT informatique. Le but de ce projet était de concevoir un site internet complet pour les randonneurs. Ce site permet aux internautes de pouvoir s'inscrire, se connecter au site, de pouvoir ajouter, consulter, échanger, commenter, noter une randonnée, participer à la vie du site. Le groupe de travail est constitué de Sylvio Menubarbe, Florian Paturaux, Benoit Rongeard. Etant tous les 3 passionnés par le développement web, nous voullions travailler sur ce projet pour gagner de l'expérience dans ce domaine. Au cour des 4 mois de travaille nous avons réussis à terminer le projet.
                        </br></br>
                        Vous pouvez nous contacter dans la rubrique <a href="index.php?page=contact">"contact"</a> pour toute question ou problème éventuel.
                        </br></br></br></br></br>
                        <center>
                            Bonne navigation, en espérant que le site vous plait. 
                            </br>
                            <b>L'équipe de RandoPassion.</b>
                        </center>
                	</p>
			</section>
            
        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>

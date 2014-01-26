<!DOCTYPE html>
<html lang="fr">

	<?php head("Recherche avancée"); ?>

	<body>
		<?php menu(); ?>
        
        <div id="corps">
            <?php include_once('Controller/c_activitees_recentes.php'); ?>
    
            <section id="rando">
                <div id="titre_recherche_avancee">
                    <p>Recherche avancée</p>
                </div>
                
                <form method="post" action="index.php?page=recherche">
                    <div id="recherche_mot_cle">
                        <p>Recherche par mots clés</p>
                        <input type="text" name="title" placeholder="mots clés.." autocomplete="off"/>
                        <input type="submit" name="envoie_titre" value="Rechercher"/>
                    </div>
                    
                    <div id="recherche_criteres">
                    	<p>Recherche par critères</p>
                        
                        <div class="critere">
                            <label for="s_region">Région</label><br/>
                            <?php
                                echo'<select id="s_region" name="s_region">';
                                echo'<option value="not_clarify">Non précisé</option>';
                                foreach ($listeRegion as $l_region){
                                    echo'<option value="'.$l_region['num_region'].'">'.$l_region['nom'].'</option>';
                                }
                                echo'</select>';
                            ?>
    					</div>
                        
                        <div class="critere">
                            <label for="distance">Longueur</label><br/>
                            <select id="distance" name="distance">
                                <option value="non_precise" selected="selected">Non précisé</option>
                                <?php
                                    $n=0;
                                    $m=5;
                                    for($number_of_ligne = 0; $number_of_ligne <=5; $number_of_ligne++){
                                        echo'<option value="'.$n.'">De '.$n.' à '.$m.'Km';
                                        $n=$n+5;
                                        $m=$m+5;
                                    }
                                    echo'<option value="30">De 30 à 40Km';
                                    echo'<option value="40">De 40 à 50Km';
                                    echo'<option value="50">Plus de 50Km';
                                ?>
                            </select>
                        </div>
                        
                        <div class="critere">
                            <label for="time">Durée</label><br/>
                            <select id="time" name="time">
                                <option value="time_non_precise" selected="selected">Non précisé</option>
                                <?php
                                    $d=0;
                                    $m=1;
                                    $n=3;
                                    echo'<option value="0'.$d.':00:00"> Moins de '.$m.' heure';
                                    for($number_of_ligne = 0; $number_of_ligne <=1; $number_of_ligne++){
                                        echo'<option value="0'.$m.':00:00"> De '.$m.' h à '.$n.' h';
                                        $m=$n;
                                        $n=$n+3;
                                    }
                                    echo'<option value="10:00:00"> Demi journée </option>';
                                    echo'<option value="24:00:00"> 1 journée</option>';
                                    echo'<option value="48:00:00"> 2 à 4 jours </option>';
                                    echo'<option value="96:00:00"> Plus de 4 jours </option>';
        
                                ?>
                            </select>
                        </div>
    
                        <div class="critere">
                            <label for="difficulty">Difficulté</label><br/>
                            <select id="difficulty" name="difficulty">
                                <option value="difficulte_non_precise" selected="selected">Non précisé</option>
                                <?php
                                    $n=1;
                                    $number_of_ligne=0;
                                    for($number_of_ligne; $number_of_ligne <=4; $number_of_ligne++){
                                        echo'<option value="'.$n.'">Difficulté '.$n.'</option>';
                                        $n=$n+1;
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <div class="critere">
                            <label for="water">Point d'eau</label><br/>
                            <select id="water" name="water">
                                <option value="0" selected="selected">Indifférent</option>
                                <option value="1">Oui</option>
                            </select>
                        </div>
                        
                        <input type="submit" value="Rechercher" name="envoie_formulaire"/>
                    </div>
                </form>
                
    
                <!-- Zone pour afficher la recherche -->
                <div id="affichage_recherche">   
                    <?php
                        if(isset($_POST['envoie_formulaire'])){
                            if(isset($affichage_rando_complet) and !empty($affichage_rando_complet)){
                                foreach($affichage_rando_complet as $rando){
                                    echo '<strong> Titre : </strong>'.$rando['titre'].'<br/>';
                                    echo '<img src="Resources/Galerie/'. $rando['nom_galerie'] .'/'. $rando['nom_photo'] .'" width="100px" height="50px;"/><br/>';
                                    echo '<strong> Longueur : </strong>'.$rando['longueur'].'<br/>';
                                    echo '<strong> Durée : </strong>'.$rando['duree'].'<br/>';
                                    echo '<strong> Point d\' eau : </strong>'.$rando['point_eau'].'<br/>';
                                    echo '<strong> Difficulté : </strong>'.$rando['difficulte'].'<br/>';
                                }
                            }
                            else{
                                echo 'Aucune randonnée trouvée';
                            }
                        }
                        
                        if(isset($_POST['envoie_titre'])){
                            if(isset($affichage_titre_rando) and !empty($affichage_titre_rando)){
                                foreach($affichage_titre_rando as $rando){
                                    echo '<strong> Titre : </strong>'.$rando['titre'].'<br/>';
                                    echo '<img src="Resources/Galerie/'. $rando['nom_galerie'] .'/'. $rando['nom_photo'] .'" width="100px" height="50px;"/><br/>';
                                    echo '<strong> Longueur : </strong>'.$rando['longueur'].'<br/>';
                                    echo '<strong> Durée : </strong>'.$rando['duree'].'<br/>';
                                    echo '<strong> Point d\' eau : </strong>'.$rando['point_eau'].'<br/>';
                                    echo '<strong> Difficulté : </strong>'.$rando['difficulte'].'<br/>';
                                }
                            }
                            else{
                                echo 'Aucune randonnée trouvée';
                            }
                        }
                    ?>
                </div>
            </section>
        </div>
    
        <?php include_once('Controller/c_footer.php'); ?>
	</body>
</html>
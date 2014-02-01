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
                        if(isset($_POST['envoie_formulaire']) or isset($_POST['envoie_titre'])){
    						if(!empty($listeRando)){ 
    							$i=0;
    							foreach($listeRando as $rando){
    								// mise en variable
    								$code = $rando['code'];
    								$title = $rando['titre'];
    								$department = $rando['nom_departement'];
    								$lenght = $rando['longueur'].' Km';
    								$photo = 'Resources/Galerie/'.$rando['nom_galerie'].'/'.$rando['nom_photo'];
    								$difficulty = '';
    								for($j = 1; $j <= $rando['difficulte']; $j++){ $difficulty .= '<div id="cercle"></div>'; }
    								$time = new DateTime(trim($rando['duree']));
    								$duration = $time->format('h').'h'.$time->format('i');
    								if(empty($rando['note'])){ $note = '<em>non renseigné</em>'; }
    								else{ $note = $rando['note']; }
    								if(empty($rando['point_eau'])){ $water = '<em>non renseigné</em>'; }
    								else{ $water = 'oui'; }
    								// Couleur cadre
    								if($i % 2 === 0) $css = '_pair';
    								else $css = '_impair';
    								$i++;
    								// Affichage
    								echo '	<div id="rando'.$css.'">';
    								echo '		<p id="titre">'.$title.'</p><br/>';
    								echo '		<div id="rond">';
    								echo '			<a id="lien" href="index.php?page=fiche_rando&code='.$code.'"></a>';
    								echo '			<img src="'.$photo.'"/>';
    								echo '		</div>';
    								echo '		<div id="affichage_text">';
    								echo '			Longueur : '.$lenght.'<br/>';
    								echo '			Durée : '.$duration.'<br/>';
    								echo '			Point d\' eau : '.$water.'<br/>';
    								echo '			Difficulté : '.$difficulty.'<br/>';
    								echo '			Département : '.$department.'<br/>';
    								echo '			<br/><a href="index.php?page=fiche_rando&code='.$code.'"><em>consulter la fiche de cette randonnée</em></a>';
    								echo '		</div>';
    								echo '	</div>';
    								if($i === 10) break;
    							}
    						}
    						else{
    							echo '<center><em>Aucune randonnée trouvée</em></center>';
    						}
                        }
                        else{
                            $i=0;
                            foreach ($rando_recente as $affichage_rando_recente){
                                $code = $affichage_rando_recente['code'];
                                $title = $affichage_rando_recente['titre'];
                                $department = $affichage_rando_recente['nom_departement'];
                                $lenght = $affichage_rando_recente['longueur'].' Km';
                                $photo = 'Resources/Galerie/'.$affichage_rando_recente['nom_galerie'].'/'.$affichage_rando_recente['nom_photo'];
                                $difficulty = '';
                                for($j = 1; $j <= $affichage_rando_recente['difficulte']; $j++){ $difficulty .= '<div id="cercle"></div>'; }
                                $time = new DateTime(trim($affichage_rando_recente['duree']));
                                $duration = $time->format('h').'h'.$time->format('i');
                                if(empty($affichage_rando_recente['note'])){ $affichage_rando_recente = '<em>non renseigné</em>'; }
                                else{ $note = $affichage_rando_recente['note']; }
                                if(empty($affichage_rando_recente['point_eau'])){ $water = '<em>non renseigné</em>'; }
                                else{ $water = 'oui'; }
                                // Couleur cadre
                                if($i % 2 === 0) $css = '_pair';
                                else $css = '_impair';
                                $i++;
                                // Affichage
                                echo '  <div id="rando'.$css.'">';
                                echo '      <p id="titre">'.$title.'</p><br/>';
                                echo '      <div id="rond">';
                                echo '          <a id="lien" href="index.php?page=fiche_rando&code='.$code.'"></a>';
                                echo '          <img src="'.$photo.'"/>';
                                echo '      </div>';
                                echo '      <div id="affichage_text">';
                                echo '          Longueur : '.$lenght.'<br/>';
                                echo '          Durée : '.$duration.'<br/>';
                                echo '          Point d\' eau : '.$water.'<br/>';
                                echo '          Difficulté : '.$difficulty.'<br/>';
                                echo '          Département : '.$department.'<br/>';
                                echo '          <br/><a href="index.php?page=fiche_rando&code='.$code.'"><em>consulter la fiche de cette randonnée</em></a>';
                                echo '      </div>';
                                echo '  </div>';
                                if($i === 10) break;                                    
                            }
                        }				
                    ?>
                </div>
            </section>
        </div>
    
        <?php include_once('Controller/c_footer.php'); ?>
	</body>
</html>
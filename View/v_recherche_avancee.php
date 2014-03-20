<!DOCTYPE html>
<html lang="fr">

    <?php head("Recherche avancée"); ?>
	<script type="text/javascript" src="JS/geolocalise.js"></script>
    <body>
        <div id="corps">
            <?php menu(); ?>
            <?php include_once('Controller/c_activitees_recentes.php'); ?>
    
            <section id="rando">
                <div class="titre"> Recherche avancée </div>
                
                <form method="post" action="index.php?page=recherche" id="formRecherche">
                    <div id="recherche_mot_cle">
                        <h1>Recherche par mots clés</h1>
                        <input type="text" name="title" 
                            <?php 
                                if(isset($value_name_title)){ echo 'value="'.$value_name_title.'"'; }
                                else{ echo 'placeholder="mots clés.."';}
                            ?> autocomplete="off"/>
                        <input type="submit" name="envoie_titre" value="Rechercher"/>
                    </div>
                    <br/><br/>
                    <div id="recherche_criteres">
                        <h1>Recherche par critères</h1>
                        
                        <div class="critere">
                            <label for="s_region">Région</label><br/>
                            <?php
                                echo'<select id="s_region" name="s_region">';
                                echo'<option value="not_clarify">Non précisée</option>';
                                foreach ($listeRegion as $l_region){
                                    echo'<option value="'.$l_region['num_region'].'" '.((isset($value_region) and $l_region['num_region'] == $value_region)? 'selected' : "").'>'.$l_region['nom'].'</option>';
                                }
                                echo'</select>';
                            ?>
                        </div>
                        
                        <div class="critere">
                            <label for="distance">Longueur</label><br/>
                            <select id="distance" name="distance">
                                <option value="non_precise">Non précisée</option>
                                <?php
                                    $n=0;
                                    $m=5;
                                    for($number_of_ligne = 0; $number_of_ligne <=5; $number_of_ligne++){
                                        echo'<option value="'.$n.'" '.((isset($value_distance) and $n == $value_distance)? 'selected' : "").'>De '.$n.' à '.$m.'Km';
                                        $n=$n+5;
                                        $m=$m+5;
                                    }
                                    echo'<option value="30" '.((isset($value_distance) and 30 == $value_distance)? 'selected' : "").'>De 30 à 40Km';
                                    echo'<option value="40" '.((isset($value_distance) and 40 == $value_distance)? 'selected' : "").'>De 40 à 50Km';
                                    echo'<option value="50" '.((isset($value_distance) and 50 == $value_distance)? 'selected' : "").'>Plus de 50Km';
                                ?>
                            </select>
                        </div>
                        
                        <div class="critere">
                            <label for="time">Durée</label><br/>
                            <select id="time" name="time">
                                <option value="time_non_precise">Non précisée</option>
                                <?php
                                    $d=0;
                                    $m=1;
                                    $n=3;
                                    echo'<option value="0'.$d.':00:00" '.((isset($value_time) and "00:00:00" == $value_time)? 'selected' : "").'> Moins de '.$m.' heure';
                                    for($number_of_ligne = 0; $number_of_ligne <=1; $number_of_ligne++){
                                        echo'<option value="0'.$m.':00:00" '.((isset($value_time) and "0".$m.":00:00" == $value_time)? 'selected' : "").'> De '.$m.' h à '.$n.' h';
                                        $m=$n;
                                        $n=$n+3;
                                    }
                                    echo'<option value="10:00:00" '.((isset($value_time) and "10:00:00" == $value_time)? 'selected' : "").'> Demi journée </option>';
                                    echo'<option value="24:00:00" '.((isset($value_time) and "24:00:00" == $value_time)? 'selected' : "").'> 1 journée</option>';
                                    echo'<option value="48:00:00" '.((isset($value_time) and "48:00:00" == $value_time)? 'selected' : "").'> 2 à 4 jours </option>';
                                    echo'<option value="96:00:00" '.((isset($value_time) and "96:00:00" == $value_time)? 'selected' : "").'> Plus de 4 jours </option>';
        
                                ?>
                            </select>
                        </div>
    
                        <div class="critere">
                            <label for="difficulty">Difficulté</label><br/>
                            <select id="difficulty" name="difficulty">
                                <option value="difficulte_non_precise">Non précisée</option>
                                <?php
                                    $n=1;
                                    $number_of_ligne=0;
                                    for($number_of_ligne; $number_of_ligne <=4; $number_of_ligne++){
                                        echo'<option value="'.$n.'" '.((isset($value_difficulte) and $n == $value_difficulte)? 'selected' : "").'>Difficulté '.$n.'</option>';
                                        $n=$n+1;
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <div class="critere">
                            <label for="water">Point d'eau</label><br/>
                            <select id="water" name="water">
                                <?php 
                                    echo '<option value="0" '.((isset($value_water) and 0 == $value_water)? 'selected' : "").'>Indifférent</option>';
                                    echo '<option value="1" '.((isset($value_water) and 1 == $value_water)? 'selected' : "").'>Oui</option>';
                                ?>
                            </select>
                        </div>
                        <input type="hidden" id="lat" name="lat"/>
                        <input type="hidden" id="lon" name="lon"/>
                        <div class="critere_geo">
                            <label for="bttGeo" id="labelGeo">Près de chez vous</label><br/>
                                <input type="button" value="Me localiser" id="bttGeo"/>
                        </div>
                        <div id="input_recherche">
                            <input type="submit" value="Rechercher" id="input_submit" name="envoie_formulaire"/>
                        </div>
                    </div>
                </form>
                <br/><br/><br/>
    
                <!-- Zone pour afficher la recherche -->
                <div id="affichage_recherche">
                    <div class="titre">Randonnées</div>
                    <?php
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
                                
								$time = explode(':', $rando['duree']);
                                $minutes = intVal($time[1]);
                                $hour = intVal($time[0]);
                                $day = (int)($hour / 24);
                                $hour = ($hour % 24);
                                $duration = (($day > 0)?$day.' Jour'.(($day > 1)? 's ' : ' '): "").$hour.'h'.(($minutes > 0)? $minutes : "");
                                
								$number_of_note = $rando['nb_note'].' vote'.(($rando['nb_note'] > 1)? 's' : '');
								
								$etoile = '';
                                if(empty($rando['note'])){ 
                                    for($j = 1; $j <= 5; $j++){ 
										$etoile .= '<img id="stars_vide" src="Resources/Images/stars_vide.png"/>'; 
									}
                                }
                                else{
                                    $k = intval($rando['note']);
                                    $z = 5 - intval($rando['note']);
                                    while($k >= 1){ 
										$etoile .= '<img id="stars" src="Resources/Images/stars_pleines.png"/>';
										$k--;
                                    }
                                    while($z >= 1){
										$etoile .= '<img id="stars_vide" src="Resources/Images/stars_vide.png"/>';
										$z--;
                                    }
                                }
                                
								if(empty($rando['point_eau'])){ $water = '<em>non renseigné</em>'; }
                                else{ $water = 'oui'; }
                                
                                // Couleur cadre
                                if($i % 2 === 0) $css = '_pair';
                                else $css = '_impair';
                                $i++;
                                
                                // Affichage
                                echo '  <div id="rando'.$css.'">
											<br/>
                                            <center><h2>'.$title.'</h2></center>
                                            <div id="note">'.$etoile.'<br/><span id="nb_vote">'.$number_of_note.'</span></div>
                                            <div id="rond">
                                                <a id="lien" href="index.php?page=fiche_rando&code='.$code.'"></a>
                                                <img src="'.$photo.'"/>
                                            </div>
                                            <div id="texte">
                                                <div class="caracteristiques">
                                                    <span class="intitule_caract">
                                                        <img src="Resources/Images/longueur.png"/>
                                                        Longueur
                                                    </span><br/>
                                                    <span class="valeur_caract">'.$lenght.'</span>
                                                </div>
                                                <div class="caracteristiques">
                                                    <span class="intitule_caract">
                                                        <img src="Resources/Images/duree.png"/>
                                                        Durée</span><br/>
                                                    <span class="valeur_caract">'.$duration.'</span>
                                                </div>
                                                <div class="caracteristiques">
                                                    <span class="intitule_caract">
                                                        <img src="Resources/Images/eau.png"/>
                                                        Point d\' eau
                                                    </span><br/>
                                                    <span class="valeur_caract">'.$water.'</span>
                                                </div>
                                                <div class="caracteristiques">
                                                    <span class="intitule_caract">
                                                        <img src="Resources/Images/difficulte.png"/>
                                                        Difficulté
                                                    </span><br/>
                                                    <span class="valeur_caract">'.$difficulty.'</span>
                                                </div>
                                                <div class="caracteristiques">
                                                    <span class="intitule_caract">
                                                        <img src="Resources/Images/departement.png"/>
                                                        Département
                                                    </span><br/>
                                                    <span class="valeur_caract">'.$department.''.(isset($rando['distance'])? ' : <b> '.$rando['distance'].' km</b>' : "").'</span>
                                                </div>
                                            </div>
                                            <div id="fiche">
                                                <a id="lien_consulter_fiche" href="index.php?page=fiche_rando&code='.$code.'">consulter la fiche..</a>
                                            </div>
                                        </div>';
                            }
                        }
                        else{
                            echo '</div><h2>Aucune randonnée trouvée</h2><div>';
                        }
                    ?>
                </div>
            </section>
            
            <?php include_once('Controller/c_footer.php'); ?>
        </div>
    </body>
</html>
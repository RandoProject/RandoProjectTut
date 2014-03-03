<!DOCTYPE html>
<html lang="fr">

    <?php head("Recherche avanc�e"); ?>

    <body>
        <div id="corps">
            <?php menu(); ?>
            <?php include_once('Controller/c_activitees_recentes.php'); ?>
    
            <section id="rando">
                <div class="titre"> Recherche avanc�e </div>
                
                <form method="post" action="index.php?page=recherche">
                    <div id="recherche_mot_cle">
                        <h1>Recherche par mots cl�s</h1>
                        <input type="text" name="title" placeholder="mots cl�s.." autocomplete="off"/>
                        <input type="submit" name="envoie_titre" value="Rechercher"/>
                    </div>
                    <br/><br/>
                    <div id="recherche_criteres">
                        <h1>Recherche par crit�res</h1>
                        
                        <div class="critere">
                            <label for="s_region">R�gion</label><br/>
                            <?php
                                echo'<select id="s_region" name="s_region">';
                                echo'<option value="not_clarify">Non pr�cis�e</option>';
                                foreach ($listeRegion as $l_region){
                                    echo'<option value="'.$l_region['num_region'].'">'.$l_region['nom'].'</option>';
                                }
                                echo'</select>';
                            ?>
                        </div>
                        
                        <div class="critere">
                            <label for="distance">Longueur</label><br/>
                            <select id="distance" name="distance">
                                <option value="non_precise" selected="selected">Non pr�cis�e</option>
                                <?php
                                    $n=0;
                                    $m=5;
                                    for($number_of_ligne = 0; $number_of_ligne <=5; $number_of_ligne++){
                                        echo'<option value="'.$n.'">De '.$n.' � '.$m.'Km';
                                        $n=$n+5;
                                        $m=$m+5;
                                    }
                                    echo'<option value="30">De 30 � 40Km';
                                    echo'<option value="40">De 40 � 50Km';
                                    echo'<option value="50">Plus de 50Km';
                                ?>
                            </select>
                        </div>
                        
                        <div class="critere">
                            <label for="time">Dur�e</label><br/>
                            <select id="time" name="time">
                                <option value="time_non_precise" selected="selected">Non pr�cis�e</option>
                                <?php
                                    $d=0;
                                    $m=1;
                                    $n=3;
                                    echo'<option value="0'.$d.':00:00"> Moins de '.$m.' heure';
                                    for($number_of_ligne = 0; $number_of_ligne <=1; $number_of_ligne++){
                                        echo'<option value="0'.$m.':00:00"> De '.$m.' h � '.$n.' h';
                                        $m=$n;
                                        $n=$n+3;
                                    }
                                    echo'<option value="10:00:00"> Demi journ�e </option>';
                                    echo'<option value="24:00:00"> 1 journ�e</option>';
                                    echo'<option value="48:00:00"> 2 � 4 jours </option>';
                                    echo'<option value="96:00:00"> Plus de 4 jours </option>';
        
                                ?>
                            </select>
                        </div>
    
                        <div class="critere">
                            <label for="difficulty">Difficult�</label><br/>
                            <select id="difficulty" name="difficulty">
                                <option value="difficulte_non_precise" selected="selected">Non pr�cis�e</option>
                                <?php
                                    $n=1;
                                    $number_of_ligne=0;
                                    for($number_of_ligne; $number_of_ligne <=4; $number_of_ligne++){
                                        echo'<option value="'.$n.'">Difficult� '.$n.'</option>';
                                        $n=$n+1;
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <div class="critere">
                            <label for="water">Point d'eau</label><br/>
                            <select id="water" name="water">
                                <option value="0" selected="selected">Indiff�rent</option>
                                <option value="1">Oui</option>
                            </select>
                        </div>
                        <br/><br/>
                        <input type="submit" value="Rechercher" name="envoie_formulaire"/>
                    </div>
                </form>
                <br/><br/><br/>
    
                <!-- Zone pour afficher la recherche -->
                <div id="affichage_recherche">
                    <div class="titre">Randonn�es</div>
                    <?php
                        if(!empty($listeRando)){ 
                            $i=0;
                            foreach($listeRando as $rando){
                                // mise en variable
                                //$nombre_de_vote = $rando['nb_note'];
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
                                if(empty($rando['point_eau'])){ $water = '<em>non renseign�</em>'; }
                                else{ $water = 'oui'; }
                                
                                // Couleur cadre
                                if($i % 2 === 0) $css = '_pair';
                                else $css = '_impair';
                                $i++;
                                
                                // Affichage
                                echo '  <div id="rando'.$css.'">
                                            <br/>
                                            <center><h2>'.$title.'</h2></center>
                                            <div id="note">'.$etoile.'<br/><span id="nb_vote">'.$nombre_de_vote.'</span>'.'</div>
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
                                                        Dur�e</span><br/>
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
                                                        Difficult�
                                                    </span><br/>
                                                    <span class="valeur_caract">'.$difficulty.'</span>
                                                </div>
                                                <div class="caracteristiques">
                                                    <span class="intitule_caract">
                                                        <img src="Resources/Images/departement.png"/>
                                                        D�partement
                                                    </span><br/>
                                                    <span class="valeur_caract">'.$department.'</span>
                                                </div>
                                            </div>
                                            <div id="fiche">
                                                <a id="lien_consulter_fiche" href="index.php?page=fiche_rando&code='.$code.'">consulter la fiche..</a>
                                            </div>
                                        </div>';
                                // faire la limite de 10 randos par page
                                // if($i === 10) break;
                            }
                        }
                        else{
                            echo '</div><h2>Aucune randonn�e trouv�e</h2><div>';
                        }
                    ?>
                </div>
            </section>
    
            <?php include_once('Controller/c_footer.php'); ?>
        </div>
    </body>
</html>
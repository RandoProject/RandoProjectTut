<!DOCTYPE html>
<html lang="fr">
	<head>
        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1"/>
    </head>
	<body>
        <div id="corps">
            <?php
            echo '	<nav>
                        <ul id="menu">
                            <li><a href="#">Accueil</a></li>
                            <li><a href="#">Randonnées</a></li>
                            <li><a href="#">Galerie</a></li>
                            <li><a href="#">Ajouter une rando</a></li>';
        
            if(isset($_SESSION['statut'])){
                if($_SESSION['statut'] == 'administrateur'){
                    echo '	<li><a href="#">Administration</a></li>';
                }
                else if($_SESSION['statut'] == 'moderateur'){
                    echo '	<li><a href="#">Modération</a></li>';
                }
            }
        
            echo '		</ul>
                        <ul id="account">';
                        
            if(isset($_SESSION['statut'])){
                echo '		<li><a class="profil" href="#">Profil</a></li>
                            <li><a class="connexion" href="#">Déconnexion</a></li>';
            }
            else{
                echo '		<li><a class="profil" href="#">Inscription</a></li>
                            <li><a class="connexion" href="#">Connexion</a></li>';
            }
            echo '		</ul>
                    </nav>
            ';
            ?>
            <div id="slideshow">
                <div class="container">
                    <div class="slider">
                        <?php
                        $photo = array(	"galerie_1.jpg",
                                        "galerie_2.jpg",
                                        "galerie_3.jpg",
                                        "galerie_4.jpg");
                                        
                        $legende = array(	"slide 1",
                                            "slide 2",
                                            "slide 3",
                                            "slide 4");
                                
                        for($i = 0; $i < count($photo); $i++){
                            echo '	<a href="#">
                                        <figure>
                                            <img src="Resources/Images/'.$photo[$i].'" alt="" width="1000" height="385"/>
                                            <figcaption>'.$legende[$i].'</figcaption>
                                        </figure>
                                    </a>
                            ';
                        }
                        ?>
                    </div>
                </div>
            </div>
          	<hr/>
            <div id="map">
                <img width="400" src="Resources/Images/map.png"/>
            </div>
            <div class="cadre">
            	<h1>Le sentier du guêpier</h1>
                En forêt de Chaux, tout en parcourant le sentier botanique et ethnologique, vous serez initié au secret des bûcherons charbonniers qui peuplèrent jadis "la forêt qui n'en finit pas".
            </div><div class="cadre">
            	<h1>Le sentier du guêpier</h1>
                En forêt de Chaux, tout en parcourant le sentier botanique et ethnologique, vous serez initié au secret des bûcherons charbonniers qui peuplèrent jadis "la forêt qui n'en finit pas".
            </div><div class="cadre">
            	<h1>Le sentier du guêpier</h1>
                En forêt de Chaux, tout en parcourant le sentier botanique et ethnologique, vous serez initié au secret des bûcherons charbonniers qui peuplèrent jadis "la forêt qui n'en finit pas".
            </div><div class="cadre">
            	<h1>Le sentier du guêpier</h1>
                En forêt de Chaux, tout en parcourant le sentier botanique et ethnologique, vous serez initié au secret des bûcherons charbonniers qui peuplèrent jadis "la forêt qui n'en finit pas".
            </div>
        <br/><br/><hr/>
            <?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>

<style>
@charset "iso-8859-1";

			/* Reglage par default des pages */
*{
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size: 12px;
	color: #555555;
	padding: 0px;
	margin: 0px;
	text-decoration: none;
	list-style-type: none;
	outline: none;
	resize: none;
	border: none;
}

body{
	background-image: url(wall.jpg);
	background-color: #000;
	background-repeat: no-repeat;
	background-position: top left;
	background-attachment: fixed;
	background-position: top right;
	width: 100%;
	height: 100%;
	min-width: 1000px;
}

hr{
	margin: 18px 0;
	border: 0;
	border-top: 1px solid #eeeeee;
	border-bottom: 1px solid #ffffff;
}

h1{
	color: #A8BF75;
	font-size: 16px;
}
			/* Corps */
div#corps{
	height: auto;
	width: 1000px;
	margin-left: auto;
	margin-right: auto;
	background-color: #FFF;
	background-image: url(rayure.png);
	background-repeat: repeat;
	box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.7);
	
}
			/* Menu */
nav{
	width: 100%;
	min-width: 800px;
}
nav ul li{
	display: block;
	float: left;
	margin-top: 15px;
	margin-left: 20px;
}
nav ul li a{
	display: block;
	font-family: Kalinga;
	color: #999;
}
/* Menu */
nav ul#menu li a{
	padding: 5px 10px 2px 10px;
	font-size: 17px;
	line-height: 22px;
	background-image: url(vert.png);
	background-size: 100%;
	background-position: -200px -10px;
	background-repeat: no-repeat;
	-webkit-transition: background-position .5s ease, color .8s ease;
}
nav ul#menu li a:hover{
	color: #FFF;
	background-position: 0 0;
}
/* Compte */
nav ul#account{
	margin-top: 5px;
	float: right;
	margin-right: 15px;
}
nav ul#account li a{
	padding: 3px 8px;
	font-size: 12px;
	line-height: 15px;
	background-color: #E9E9E9;
	-webkit-transition: background-color .5s ease, color .8s ease;
}
nav ul#account li a:hover{ color: #FFF; }
nav ul#account li a.profil:hover{ background-color: #639FFA; }
nav ul#account li a.connexion:hover{ background-color: #F26265; }


div#corps div.cadre{
	display: inline-block;
	width: 400px;
	margin: 10px;
	overflow: hidden;
}
div#corps div#map{
	display: block;
	float: right;
	margin: 10px;
	overflow: hidden;
}

/* Footer */
footer{
	padding-top: 10px;
	padding-bottom: 5px;
	margin-left: auto;
	margin-right: auto;
	margin-top: 25px;
	width: 98%;
	text-align: center;
}

/* Slidshow */
div#slideshow{
	position: relative;
	display: inline-block;
    width: 1000px;
    height: 385px;
	margin-top: 50px;
	-webkit-box-shadow: 0px 0px 5px rgba(0,0,0, 1);
	-moz-box-shadow: 0px 0px 5px rgba(0,0,0, 1);
	box-shadow: 0px 0px 5px rgba(0,0,0, 1);
}


				/* Photo */
div#slideshow div.container{
    position: relative;
    width: 1000px;  
    height: 385px;  
    overflow: hidden;
}
div#slideshow div.container div.slider{  
    position: absolute;
    left: 0px;
	top: 0px;
    width: 400%;
    height: 385px; 
    -webkit-animation: slider 32s infinite;
    -moz-animation: slider 32s infinite;
    animation: slider 32s infinite;
}
div#slideshow div.container div.slider a{
	margin-right: -4px;
}
div#slideshow div.container div.slider a figure{  
    position: relative;  
    display: inline-block;  
    padding: 0px;
	margin: 0px;
}
div#slideshow div.container div.slider a figure:after{  
    position: absolute;  
    display: block;  
    content: " ";  
    top: 0px; 
	left: 0px;  
    width: 100%; 
	height: 100%;
}


				/* Légende */
div#slideshow div.container div.slider a figure figcaption{  
    position: absolute;  
    left: 0px; 
	right: 0px; 
	bottom: 0px;  
    padding: 10px;  
    margin: 0px;  
    border-top: 1px solid rgba(225, 225, 225, 0.3);  
    background: rgba(255, 255, 255, 0.2);  
    color: #E4DFD2;
    text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.3);  
    text-align: center;  
    letter-spacing: 0.05em;  
    word-spacing: 0.05em;
    -webkit-animation: figcaptionner 32s infinite;
    -moz-animation: figcaptionner 32s infinite;  
    animation: figcaptionner 32s infinite;
}
@-webkit-keyframes figcaptionner{  
    0%, 20%, 45%, 70%, 95%                     { bottom: -55px;    }  
    10%, 19%, 35%, 44%, 60%, 69%, 85%, 94%       { bottom: 0px;      }  
}
@-moz-keyframes figcaptionner{  
    0%, 20%, 45%, 70%, 95%                     { bottom: -55px;    }  
    10%, 19%, 35%, 44%, 60%, 69%, 85%, 94%       { bottom: 0px;      }  
}
@keyframes figcaptionner{  
    0%, 20%, 45%, 70%, 95%                     { bottom: -55px;    }  
    10%, 19%, 35%, 44%, 60%, 69%, 85%, 94%       { bottom: 0px;      }  
}


				/* Animation */
@-webkit-keyframes slider{  
    0%, 20%, 100%   { left: 0 }  
    25%, 45%        { left: -100% }  
    50%, 70%        { left: -200% }  
    75%, 95%        { left: -300% }  
}
@-moz-keyframes slider{  
    0%, 20%, 100%   { left: 0 }  
    25%, 45%        { left: -100% }  
    50%, 70%        { left: -200% }  
    75%, 95%        { left: -300% }  
}
@keyframes slider{  
    0%, 20%, 100%   { left: 0 }  
    25%, 45%        { left: -100% }  
    50%, 70%        { left: -200% }  
    75%, 95%        { left: -300% }  
}
</style>
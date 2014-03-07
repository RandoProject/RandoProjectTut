<!DOCTYPE html>
<html lang="fr">
		
	<?php head("Accueil", array(array('type' => 'css', 'href' => 'CSS', 'name' => 'Diaporama'),
								array('type' => 'javascript', 'src' => 'JS/jquery.min.js'))); ?>
	
	<script type="text/javascript">
		jQuery(function($){
			$('.map').append('<div class="overlay">').append('<div class="tooltip"></div>')
			$('.map .tooltip').hide();
			var regions = [
				{name : 'Nord Pas de Calais', slug: '17'},
				{name : 'Picardie', slug: '19'},
				{name : 'Haute Normandie', slug: '11'},
				{name : 'Basse Normandie', slug: '4'},
				{name : 'Bretagne', slug: '6'},
				{name : 'Ile de France', slug: '12'},
				{name : 'Champagne Ardenne', slug: '8'},
				{name : 'Lorraine', slug: '15'},
				{name : 'Alsace', slug: '1'},
				{name : 'Pays de la Loire', slug: '18'},
				{name : 'Centre', slug: '7'},
				{name : 'Bourgogne', slug: '5'},
				{name : 'Franche Comte', slug: '10'},
				{name : 'Poitou Charente', slug: '20'},
				{name : 'Limousin', slug: '14'},
				{name : 'Auvergne', slug: '3'},
				{name : 'Rh�ne Alpes', slug: '22'},
				{name : 'Aquitaine', slug: '2'},
				{name : 'Midi-Pyr�n�es', slug: '16'},
				{name : 'Languedoc Roussillon', slug: '13'},
				{name : 'Provence Alpes C�te d\'Azur', slug: '21'},
				{name : 'Corse', slug: '9'}
			]
			
			// Info-Bulle
			$(document).mousemove(function(e){
				$('.map .tooltip').css({
					top:e.screenY-$('.map .tooltip').height()-110,
					left:e.screenX-$('.map .tooltip').width()/2-10
				});
			});
			
			// Liens
			$('.map area').each(function(){
				var index = $(this).index();
				$(this).attr('href', 'index.php?page=recherche&region='+regions[index].slug);
			});
			
			// Passage sur une r�gion
			$('.map area').mouseover(function(){
				var index = $(this).index();
				var left = -index * 650 - 650;
				$('.map .tooltip').html(regions[index].name).stop().fadeTo(0, 1);
				$('.map .overlay').css({
					backgroundPosition : left+"px 0px"
				});
			});
			
			// Sortie de la map
			$('.map').mouseout(function(){
				$('.map .overlay').css({
					backgroundPosition : "650px 0px"
				});
				$('.map .tooltip').stop().fadeTo(0, 0);				
			});
		});
    </script>
    
	<body>
    	<div id="corps">
			<?php menu(); ?>
            
        	<div id="slideshow">
                <div class="container">
                    <div class="slider">
                        <?php
                        $photo = array(	"IMG_2337",
                                        "DSC_6515",
                                        "DSC01582",
                                        "DSC00314",
                                        "DSC00732",
                                        "DSC_6518",
                                        "DSC00749");
                                        
                        $legende = array(	"",
                                            "",
                                            "",
                                            "",
                                            "",
                                            "",
                                            "");
						$largeur = 1200;
						$hauteur = 500;
						$step = (100-(sizeof($photo)*5))/sizeof($photo);
                                
						function slide($step, $photo){
							$style = '';
							$precedent = $step;
							for($i = 1; $i < sizeof($photo); $i++){
								$style .= ($precedent+5).'%, '.($precedent+$step+5).'% { left: -'.$i.'00% }';
								$precedent = ($precedent+$step+5);
							}
							return $style;
						}
					
                        for($i = 0; $i < sizeof($photo); $i++){
                            echo '	<a href="#">
                                        <figure>
                                            <img src="Resources/Images/'.$photo[$i].'.jpg"/>
                                            <figcaption>'.$legende[$i].'</figcaption>
                                        </figure>
                                    </a>
                            ';
                        }
                        ?>
            		</div>
                </div>
            </div>
    		<style>
				div#slideshow,
				div#slideshow div.container,
				div#slideshow div.container div.slider a figure img{
					width: <?php echo $largeur; ?>px;
					height: <?php echo $hauteur; ?>px;
				}
				div#slideshow div.container div.slider{
					width: <?php echo sizeof($photo)+1; ?>00%;
					height: <?php echo $hauteur; ?>px;
				}
				
				/* Slide */
				@-webkit-keyframes slider{  
					0%, <?php echo $step; ?>%, 100%   { left: 0 }
					<?php echo slide($step, $photo); ?>
				}
				@-moz-keyframes slider{  
					0%, <?php echo (100-(sizeof($photo)*5))/sizeof($photo); ?>%, 100%   { left: 0 }
					<?php echo slide($step, $photo); ?>
				}
				@keyframes slider{  
					0%, <?php echo (100-(sizeof($photo)*5))/sizeof($photo); ?>%, 100%   { left: 0 }
					<?php echo slide($step, $photo); ?>
				}
				<?php
						function legende($step, $photo, $bottom){
							$style = '0%, '.$step.'%';
							$precedent = $step;
							for($i = 1; $i < sizeof($photo); $i++){
								$style .= ', '.($precedent+$step+5).'%';
								$precedent = ($precedent+$step+5);
							}
							$style .= ' { bottom: -'.$bottom.'px; }';
							return $style;
						}
				?>
			</style>
            
            <br/><br/><br/><br/><br/>
            <div class="map">
                <img src="Resources/Images/void.png" width="650" height="608" usemap="#Map"/>
                <map name="Map">
                    <area shape="poly" coords="315,4,303,8,287,11,276,18,275,48,279,48,281,53,285,49,299,59,312,58,314,59,308,62,312,67,314,63,320,67,322,64,325,69,330,71,338,70,342,71,346,71,350,70,351,72,357,69,360,71,363,68,370,71,374,70,377,72,380,73,380,71,384,67,382,64,380,62,380,58,383,56,377,49,365,50,362,53,361,43,356,40,350,42,345,39,344,28,338,24,330,28,323,26,323,23,319,21,318,12,315,5" href="#">
                    <area shape="poly" coords="383,73,379,73,376,72,374,71,369,71,364,68,361,72,357,70,352,72,347,71,341,72,335,70,331,71,325,67,319,67,315,65,312,68,308,64,312,59,300,59,286,50,281,53,276,49,276,56,280,58,280,62,274,59,270,66,282,77,282,78,285,86,283,92,282,99,284,103,283,110,285,118,282,120,286,126,298,124,302,126,307,125,317,130,320,129,325,131,328,130,331,131,335,130,339,130,343,134,354,144,360,139,363,133,360,131,361,126,365,125,362,118,365,113,369,113,373,109,377,112,378,100,377,97,380,94,381,91,385,87,383,85,385,81,383,76" href="#">
                    <area shape="poly" coords="269,68,281,78,284,86,282,92,282,100,283,103,282,110,284,117,282,122,279,129,271,131,272,137,270,144,268,146,267,150,257,149,250,153,244,156,240,154,241,150,235,144,228,142,226,141,228,134,224,131,228,128,226,122,224,119,227,116,224,108,214,101,218,93,222,87,230,85,240,81,246,79,254,78,259,73,265,71" href="#">
                    <area shape="poly" coords="221,108,225,115,224,119,228,127,224,130,227,134,226,139,234,144,240,150,244,156,249,164,251,172,242,176,243,186,238,182,233,182,226,177,224,169,219,168,211,172,205,167,203,161,199,160,196,164,190,164,183,168,181,166,177,169,172,162,165,163,159,160,151,165,146,157,151,154,147,151,145,143,146,141,146,130,144,129,144,117,143,114,135,105,135,100,134,98,135,96,135,90,131,87,133,86,145,91,150,88,160,88,160,94,157,97,162,103,163,110,166,112,171,108,179,112,191,113,200,116,218,110" href="#">
                    <area shape="poly" coords="146,157,151,166,159,161,164,163,165,170,165,174,163,177,164,188,166,195,162,197,156,208,149,204,145,208,143,206,138,213,126,214,119,217,119,221,109,226,102,225,99,222,88,223,80,216,75,218,75,225,72,215,67,209,59,203,51,202,44,202,40,197,33,196,33,200,24,200,23,191,21,187,12,184,10,182,17,180,27,179,28,174,22,172,19,174,18,171,14,168,19,165,14,163,10,163,10,157,11,156,11,152,19,148,21,146,27,145,33,146,39,144,43,144,48,148,51,144,57,145,62,142,65,138,68,140,71,136,78,136,82,137,85,141,86,145,91,148,90,151,93,155,97,158,102,156,109,152,113,151,118,156,122,154,127,151,131,148,131,155,141,157" href="#">
                    <area shape="poly" coords="354,144,343,135,339,130,330,131,323,132,321,130,317,131,308,126,303,127,298,125,290,127,285,126,283,122,280,128,275,130,272,132,273,138,273,140,277,145,275,148,279,151,276,155,284,162,286,169,290,171,292,179,299,179,301,177,311,178,315,184,313,189,315,190,318,189,322,189,327,188,329,189,336,182,336,177,339,174,350,173,353,165,358,159,358,159,354,158,354,153,351,151,353,147" href="#">
                    <area shape="poly" coords="384,72,384,77,387,80,384,84,387,86,382,91,378,97,378,111,377,113,375,111,370,113,366,114,363,117,366,125,363,127,361,130,364,132,363,136,357,144,353,151,356,153,356,157,359,158,352,173,356,175,362,180,360,185,364,189,367,188,370,191,370,195,375,201,382,202,387,199,389,202,391,200,397,200,401,195,409,195,420,207,419,210,420,213,420,216,423,216,425,217,427,217,428,217,432,221,438,219,438,217,441,216,444,217,450,215,451,210,449,208,453,204,456,200,455,199,454,195,449,190,449,187,451,183,446,179,442,174,436,172,437,170,430,163,427,162,423,159,422,159,419,156,419,150,415,147,414,142,415,139,420,133,415,132,418,130,415,123,416,120,415,117,419,115,418,112,422,109,422,103,420,101,422,98,427,99,430,96,428,91,425,89,422,88,419,86,413,85,411,84,410,75,409,73,408,67,410,61,407,60,404,65,401,71,396,72,394,75,390,72" href="#">
                    <area shape="poly" coords="430,96,427,100,423,99,420,101,422,103,422,109,419,113,420,115,416,118,416,123,418,128,416,132,419,132,420,134,416,140,415,146,419,149,420,157,425,159,429,162,439,170,439,172,441,173,451,182,451,189,454,194,457,200,459,197,462,198,463,194,469,194,471,198,477,197,485,201,487,198,499,203,501,194,507,187,505,182,512,172,507,170,506,160,514,153,512,147,515,144,508,139,505,141,501,135,501,133,502,131,503,127,507,130,512,130,517,131,518,130,522,132,524,130,527,127,527,124,523,120,517,117,513,120,504,120,498,115,491,119,485,115,486,113,483,112,482,105,473,101,472,101,467,100,459,102,456,101,454,102,450,99,443,97,439,100,436,101,434,98" href="#">
                    <area shape="poly" coords="528,125,525,130,522,133,519,131,518,132,513,130,508,130,504,129,502,133,505,140,508,139,515,143,513,147,514,153,508,159,508,170,512,172,507,182,508,186,509,187,503,194,502,202,500,203,502,206,507,211,506,217,509,217,512,223,515,225,515,228,522,228,528,225,527,220,529,217,524,212,527,207,528,196,530,192,524,187,527,188,528,183,531,174,532,164,535,157,536,150,540,145,542,143,547,140,548,132,550,128,544,127,538,124,538,123,536,127,533,124,533,123,531,124" href="#">
                    <area shape="poly" coords="243,187,240,186,239,183,233,183,226,177,224,170,219,169,212,173,206,172,203,164,200,161,197,164,191,165,183,169,180,168,178,169,172,164,166,164,166,174,164,178,165,188,167,195,163,197,157,208,155,209,149,205,147,208,143,208,141,214,133,215,126,216,120,217,120,220,119,223,116,224,109,227,103,226,101,230,100,231,100,235,101,239,104,239,109,240,114,238,115,240,115,245,111,246,113,248,116,247,121,253,115,260,115,267,122,275,126,287,135,293,140,293,142,298,146,299,149,302,155,304,162,299,166,301,169,300,174,303,180,298,179,295,179,292,179,286,178,280,178,275,176,273,176,270,172,265,169,261,176,259,179,260,183,255,196,254,202,255,209,248,211,242,215,233,217,230,218,222,223,225,226,220,231,218,235,217,236,214,241,209,240,204,243,202,244,198,242,194,244,189" href="#">
                    <area shape="poly" coords="333,188,331,190,327,188,315,191,314,189,314,184,310,179,302,178,295,180,293,180,290,173,286,170,284,164,276,157,277,152,275,149,276,145,273,141,268,149,257,150,245,156,251,170,252,173,244,176,243,179,245,188,243,194,245,199,242,205,242,209,237,215,237,217,228,220,224,225,219,225,219,229,210,247,212,252,214,253,218,257,221,258,221,263,230,263,231,260,238,262,238,268,241,271,242,275,245,277,245,284,245,285,252,290,256,290,256,294,258,300,265,300,268,302,272,297,281,299,284,295,304,297,307,292,315,290,319,289,317,286,320,280,325,277,327,279,332,275,332,274,338,274,338,269,339,263,339,259,337,256,337,247,335,244,332,241,332,233,329,228,333,226,332,219,330,215,334,213,336,208,335,205,339,202,341,196,336,190" href="#">
                    <area shape="poly" coords="439,219,434,222,428,218,424,217,420,216,418,211,419,208,415,202,407,196,401,196,399,200,392,200,391,202,387,200,380,202,375,202,370,197,369,192,367,189,364,189,360,185,361,181,352,174,341,175,336,178,337,181,334,187,341,194,342,200,336,205,337,209,336,212,332,215,334,224,330,229,333,232,334,242,338,247,338,256,341,259,341,267,339,274,339,276,345,281,349,278,350,281,354,279,357,281,362,276,368,286,369,289,375,291,379,292,379,303,376,305,379,312,383,311,391,312,394,314,397,310,397,304,403,305,404,304,406,306,408,304,413,311,420,291,423,289,427,291,430,290,435,293,441,291,438,288,440,284,441,281,440,275,438,272,441,268,439,266,434,263,435,259,435,257,440,252,441,246,442,240,441,234,438,230,441,225,441,222" href="#">
                    <area shape="poly" coords="513,225,511,221,508,217,505,218,507,212,489,200,485,201,477,198,473,199,469,195,463,195,463,198,458,199,456,203,451,208,452,212,450,215,445,217,441,217,439,219,443,222,439,230,443,237,442,248,440,252,436,259,435,263,442,266,440,271,441,278,441,283,440,287,442,291,438,294,444,304,451,301,455,302,456,304,461,304,470,295,470,289,473,287,472,282,485,271,485,263,485,260,494,255,496,249,499,246,505,241,505,235,508,234,508,231,502,231,508,226" href="#">
                    <area shape="poly" coords="258,300,255,296,256,290,251,291,245,286,245,278,241,275,241,272,237,269,237,263,233,260,231,263,220,264,220,259,215,256,210,249,204,255,192,255,186,256,180,260,176,260,171,261,173,265,177,270,177,273,179,275,179,282,180,285,180,296,182,298,175,303,169,302,167,302,163,300,155,304,152,308,147,308,141,304,136,304,141,307,143,308,147,312,150,313,155,314,158,315,158,318,160,319,157,321,157,324,157,330,151,327,150,322,147,320,145,318,145,324,147,328,149,333,150,342,160,347,166,351,171,358,172,363,178,363,179,366,183,366,187,373,189,374,194,378,198,377,202,379,206,372,210,371,215,366,215,359,223,353,226,350,226,347,230,345,236,337,239,333,240,328,245,327,245,321,241,319,241,314,240,310,244,305,249,305,255,301" href="#">
                    <area shape="poly" coords="304,297,297,298,293,297,287,297,284,297,282,300,273,298,269,302,265,300,257,300,250,305,244,306,241,310,242,318,246,321,246,327,241,329,241,333,234,343,238,343,239,348,242,347,250,347,252,351,256,352,255,356,259,358,264,362,259,366,259,371,260,376,266,377,268,386,272,383,277,385,284,391,288,389,289,390,293,387,296,389,299,387,298,384,299,381,301,376,301,373,304,367,308,365,308,361,315,363,315,359,316,352,314,349,315,346,316,342,311,334,315,332,317,327,319,322,317,320,316,309,311,304,306,302" href="#">
                    <area shape="poly" coords="376,306,378,303,378,293,376,292,369,290,367,287,362,278,358,282,353,280,351,282,348,280,345,282,337,276,338,275,333,275,327,280,323,278,320,285,320,289,308,294,306,299,316,307,317,315,318,320,320,323,318,327,317,331,313,335,316,341,315,348,317,352,316,362,314,364,310,361,310,365,304,371,302,378,299,383,299,388,297,390,297,394,300,397,301,401,300,405,301,409,305,406,314,408,318,402,318,395,325,390,327,393,331,394,332,400,334,401,336,407,342,392,347,394,349,390,354,390,359,398,362,396,363,394,366,394,367,397,372,397,377,403,379,397,383,393,390,393,392,388,395,387,395,383,398,384,398,380,400,376,403,372,399,367,397,367,394,362,390,361,383,364,377,361,377,359,380,356,378,348,374,347,372,342,368,338,367,334,369,330,365,328,367,325,372,325,373,318,373,314,370,310,372,307" href="#">
                    <area shape="poly" coords="471,295,462,304,455,304,452,302,445,304,438,295,430,291,422,290,420,293,413,312,408,304,406,307,404,305,398,304,398,311,394,314,389,312,379,313,375,307,372,311,374,314,374,325,368,326,367,328,370,330,369,334,370,341,378,348,380,354,378,360,383,363,388,361,393,361,396,364,401,368,403,373,399,384,396,386,393,389,391,394,384,394,381,397,378,404,379,412,381,415,381,419,385,422,385,428,390,428,395,431,398,427,401,430,405,427,410,431,413,428,419,429,420,434,425,430,423,428,423,424,425,420,429,422,430,423,428,427,428,430,434,430,435,429,436,433,445,434,451,438,455,435,458,434,458,430,456,428,455,426,449,423,447,419,449,416,454,417,456,415,455,412,456,406,460,405,462,403,462,400,468,398,470,395,472,393,481,391,484,390,487,390,486,385,482,381,480,378,482,374,487,376,487,378,491,376,493,374,499,375,504,371,508,373,518,365,519,359,520,356,518,354,518,350,513,347,513,341,506,340,503,336,504,330,512,325,512,319,505,315,506,309,501,306,504,303,501,298,501,293,490,293,485,298,481,296,478,301,481,304,473,311,467,311,466,307,470,304,472,303,471,301,474,297" href="#">
                    <area shape="poly" coords="268,385,265,378,259,376,258,366,262,362,255,356,255,354,250,353,250,350,243,348,239,349,238,344,234,344,227,347,226,351,217,359,217,365,211,372,206,373,203,379,195,379,186,374,184,368,179,367,174,364,171,361,166,361,159,353,158,348,152,350,147,388,148,401,147,405,146,410,145,427,140,445,133,469,129,477,124,483,118,484,119,488,126,490,126,491,130,491,136,493,133,499,132,504,135,507,140,503,141,506,146,506,147,509,156,513,165,513,165,518,173,523,177,521,181,522,186,520,186,515,187,508,191,507,191,503,195,500,197,494,202,489,197,483,199,479,195,474,189,471,191,465,192,458,192,453,194,451,199,450,203,453,205,448,209,448,212,447,213,448,222,447,225,444,229,444,233,446,236,443,241,441,243,433,240,430,243,423,246,426,251,424,249,419,248,416,251,414,254,409,253,405,259,405,262,401,260,399,265,397,269,392,267,389" href="#">
                    <area shape="poly" coords="335,407,334,402,331,400,331,395,327,394,326,391,319,395,319,401,315,408,306,408,301,410,299,405,300,400,297,395,296,390,293,388,285,391,275,384,268,387,270,391,265,399,262,402,260,405,254,405,255,410,249,416,251,423,248,427,243,425,241,430,244,433,243,440,233,447,229,445,225,445,223,448,214,449,206,449,204,453,198,451,193,453,192,463,190,471,195,472,200,479,198,482,203,489,196,500,193,504,192,507,188,509,187,515,187,521,192,525,195,530,199,531,207,528,212,533,215,530,229,531,229,521,234,521,241,525,249,524,252,529,261,531,266,535,279,535,279,539,287,537,292,534,300,533,296,528,292,529,284,523,287,521,290,521,289,506,286,502,281,500,279,495,283,488,284,484,287,487,293,486,301,488,303,484,320,485,322,479,319,475,323,470,327,474,334,470,334,468,342,467,341,460,348,460,349,456,353,455,353,452,358,449,357,448,352,446,349,444,351,442,352,439,354,437,347,434,345,429,344,420,342,419,342,415,338,410" href="#">
                    <area shape="poly" coords="411,432,407,429,403,431,397,429,395,433,385,428,385,422,380,420,380,415,377,403,370,398,364,394,361,399,357,393,352,390,347,394,343,393,338,407,342,412,343,419,345,421,346,428,348,434,354,436,351,443,358,447,359,450,354,453,353,456,350,458,347,461,342,462,343,467,335,469,330,474,323,473,321,477,323,480,322,484,314,486,304,485,301,489,285,487,280,495,281,500,288,503,290,505,291,521,286,523,293,528,295,527,301,532,300,535,293,535,281,539,280,543,288,547,292,553,303,549,311,550,317,554,318,553,323,554,323,551,329,550,333,546,339,546,346,549,346,545,341,541,341,510,335,506,336,503,341,506,345,503,346,498,350,498,356,494,362,494,364,490,380,477,389,477,389,481,397,481,397,477,406,474,405,467,412,466,414,456,422,449,418,444,415,437" href="#">
                    <area shape="poly" coords="499,375,493,376,490,378,486,376,483,376,483,380,486,383,488,390,484,391,480,392,472,394,470,399,463,400,463,405,457,405,456,411,457,416,447,418,450,422,455,425,459,431,457,436,450,439,444,435,436,434,435,431,429,430,427,427,428,423,426,420,424,426,426,429,427,429,423,433,419,434,419,430,412,429,411,431,415,434,416,440,422,448,422,450,413,457,413,466,405,468,407,474,398,478,398,481,411,482,412,486,409,488,419,491,423,489,422,486,424,482,430,490,444,490,443,492,447,492,445,496,458,497,467,503,468,506,472,506,474,503,482,504,481,506,485,506,483,504,486,501,492,503,494,499,506,495,507,491,504,489,507,486,508,480,514,481,518,477,518,472,524,472,527,464,533,464,535,461,539,461,544,456,542,451,545,448,545,444,549,443,549,434,548,431,540,433,532,434,527,431,519,429,516,424,513,422,514,418,516,418,509,412,513,407,516,403,519,399,518,391,509,390,508,389,503,388,504,381,501,378" href="#">
                    <area shape="poly" coords="628,501,626,505,626,509,626,516,626,521,617,519,614,524,608,525,602,531,599,530,596,535,596,539,593,544,597,549,595,551,595,560,602,564,597,568,597,573,606,573,606,578,601,583,612,585,607,593,623,600,624,604,630,605,630,599,631,593,636,591,637,574,636,565,641,558,641,545,638,542,639,530,635,524,633,514,635,512,632,502" href="#">
                </map>
            </div>
            
            <div class="cadre">
            	<h1>Le sentier du gu�pier</h1>
                En for�t de Chaux, tout en parcourant le sentier botanique et ethnologique, vous serez initi� au secret des b�cherons charbonniers qui peupl�rent jadis "la for�t qui n'en finit pas".
            </div><div class="cadre">
            	<h1>Le sentier du gu�pier</h1>
                En for�t de Chaux, tout en parcourant le sentier botanique et ethnologique, vous serez initi� au secret des b�cherons charbonniers qui peupl�rent jadis "la for�t qui n'en finit pas".
            </div><div class="cadre">
            	<h1>Le sentier du gu�pier</h1>
                En for�t de Chaux, tout en parcourant le sentier botanique et ethnologique, vous serez initi� au secret des b�cherons charbonniers qui peupl�rent jadis "la for�t qui n'en finit pas".
            </div><div class="cadre">
            	<h1>Le sentier du gu�pier</h1>
                En for�t de Chaux, tout en parcourant le sentier botanique et ethnologique, vous serez initi� au secret des b�cherons charbonniers qui peupl�rent jadis "la for�t qui n'en finit pas".
            </div><div class="cadre">
            	<h1>Le sentier du gu�pier</h1>
                En for�t de Chaux, tout en parcourant le sentier botanique et ethnologique, vous serez initi� au secret des b�cherons charbonniers qui peupl�rent jadis "la for�t qui n'en finit pas".
            </div><div class="cadre">
            	<h1>Le sentier du gu�pier</h1>
                En for�t de Chaux, tout en parcourant le sentier botanique et ethnologique, vous serez initi� au secret des b�cherons charbonniers qui peupl�rent jadis "la for�t qui n'en finit pas".
            </div>

        	<?php include_once('Controller/c_footer.php'); ?>
        </div>
	</body>
</html>
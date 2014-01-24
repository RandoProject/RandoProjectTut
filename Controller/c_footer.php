<?php

include_once('bin/params.php');
include_once('Models/m_footer.php');

$nb_membre = number_of('membre');
$nb_rando = number_of('rando');
$nb_photo = number_of('photo');
$nb_comment = number_of('commentaire');

check_ip($_SERVER['REMOTE_ADDR']);
$nb_connecte = number_of('connectes');

include_once('View/v_footer.php');
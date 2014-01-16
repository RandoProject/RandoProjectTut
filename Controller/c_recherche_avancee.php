<?php

include_once('bin/params.php');
include_once('Models/m_select_randos.php');

$listeRando = select_randos('code, descriptif');

include_once('View/v_recherche_avancee.php');
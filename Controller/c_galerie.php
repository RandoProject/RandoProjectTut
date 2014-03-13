<?php
include_once('bin/params.php');
include_once('Models/m_galerie.php');

$liste_galerie = get_gallerie();

include_once('View/v_galerie.php');
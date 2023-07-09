<?php
session_start();

//define('RACINE', '/projet_sira/');

include "entities/Membre.php";
include "entities/Agence.php";


include "model/ModelGenerique.php";

include "model/MembreModel.php";
include "controller/MembreController.php";

include "model/AgenceModel.php";
include "controller/AgenceController.php";




$membre = new MembreController();
$membre->membreAction();

$agence = new AgenceController();
$agence->agenceAction();



if( !isset($_GET['action']) ){
     
     include "views/home.phtml";
     
     
}


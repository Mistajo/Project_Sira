<?php
session_start();

//define('RACINE', '/projet_sira/');

include "entities/Membre.php";
include "entities/Agence.php";
include "entities/Vehicule.php";

include "model/ModelGenerique.php";

include "model/MembreModel.php";
include "model/AgenceModel.php";
include "model/VehiculeModel.php";

include "controller/ControllerAbstract.php";
include "controller/MembreController.php";
include "controller/AgenceController.php";
include "controller/VehiculeControlleur.php";


$membreCtl = new MembreController();
$agenceCtl = new AgenceController();
$vehiculeCtl = new VehiculeController();

$membreCtl->membreAction();
$agenceCtl->agenceAction();
$vehiculeCtl->vehiculeAction();

if( empty($_GET) ){
     
     include "views/home.phtml";
}


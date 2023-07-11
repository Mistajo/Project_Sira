<?php
session_start();

//define('RACINE', '/projet_sira/');

include "entities/Membre.php";
include "entities/Agence.php";
include "entities/Vehicule.php";
include "entities/Commande.php";

include "model/ModelGenerique.php";

include "model/MembreModel.php";
include "model/AgenceModel.php";
include "model/VehiculeModel.php";
include "model/CommandeModel.php";

include "controller/ControllerAbstract.php";
include "controller/MembreController.php";
include "controller/AgenceController.php";
include "controller/VehiculeController.php";
include "controller/CommandeController.php";


$membreCtl = new MembreController();
$agenceCtl = new AgenceController();
$vehiculeCtl = new VehiculeController();
$commandeCtl = new CommandeController();

$membreCtl->membreAction();
$agenceCtl->agenceAction();
$vehiculeCtl->vehiculeAction();
$commandeCtl->commandeAction();

if( empty($_GET) ){
     $VehiculeMdl = new VehiculeModel();
     $vehicules = $VehiculeMdl->vehicules();
     include "views/home.phtml";
}


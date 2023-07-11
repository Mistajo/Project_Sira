<?php

class CommandeController extends ControllerAbstract{
    
    public function commandeAction(){


        if( isset($_GET['actionCmd']) ){

        if( !$_SESSION['user'] )
        {
            header("location: ?action=connexion");
            exit;
        }
        $action = $_GET['actionCmd'];

        switch($action){
        case "reserver":

        if( isset($_POST['date_heure_depart']) )
        {
        $cmd = new Commande($_POST);
        }

        $vehMdl = new VehiculeModel();

        $vehiculeCmd = $vehMdl->getVehicule($_GET['vehicule']);
        
        include "views/reserver.phtml";
        break;
            }
        }
    }
}
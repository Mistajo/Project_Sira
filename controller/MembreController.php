<?php

class MembreController extends ControllerAbstract{
    public function membreAction()
    {

        
        $membreMdl = new MembreModel();

        if(isset($_GET['action'])){
            
            if( !$this->isAdmin() ){
                header("location: ?actionFront=connexion");
                exit();
            }

            $action = $_GET['action'];

            if($action == 'gestionMembre'){

                if( isset($_POST['pseudo']) ){
                    $membre = new Membre($_POST);
                    $membreMdl->inserer($membre);

                    header("location: ?action=gestionMembre");
                    exit;
                }

                $membres = $membreMdl->listeMembre();
                include "views/backOffice/membre.phtml";

            }
            //CAS MODIF
            else if($action == "modifier"){

                if( isset($_POST['pseudo']) ){
                    $membre = new Membre($_POST);
                    $membreMdl->update($membre);

                    header("location: ?action=gestionMembre");
                    exit;
                }

                $membreActuel = $membreMdl->getMembre($_GET['id']);
                $membres = $membreMdl->listeMembre();
                include "views/backOffice/membre.phtml";
             
            }//CAS SUPPRESSION
            else if($action == "supprimer"){

                if( isset($_GET['id']) ){
                    $membre = $membreMdl->getMembre($_GET['id']);
                    $membreMdl->delete($membre);

                    header("location: ?action=gestionMembre");
                    exit;
                }
             
            }
            
        }
 
    }
}
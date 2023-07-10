<?php

class MembreController
{
    public function membreAction()
    {
        $membreMdl = new MembreModel();

        if(isset($_GET['action']))
        {
            $action = $_GET['action'];

            
            if ($action == "gestionmembre") {

                $membres = $membreMdl->listeMembre();

                if (isset($_POST['pseudo']))
                {
                    extract($_POST);
                    $membre = new Membre(0,$pseudo, $mdp, $nom, $prenom, $email, $civilte, $statut, $date_enregistrement);
                $membreMdl->inserer($membre);
                header("location : ?action=gestionmembres");
                exit;
                }
                include "views/Back_Office/gestionmembres.phtml";
            }

            else if($action == "inscription")
            {
                include "views/user/inscription.phtml";
                if(isset($_POST['pseudo']))
                {
                    extract($_POST);
                    // var_dump($_POST);

                    $membre = new Membre(0, $pseudo, $mdp, $nom, $prenom, $email, $civilte, null, null);

                    $membreMdl->inserer($membre);

                    header("location: ?action=connexion");
                    exit;
                }

            }else if($action == "connexion")
            {
                include "views/user/connexion.phtml";

                if ( isset($_POST['pseudo']) )
                {
                    $membre = $membreMdl->connexion($_POST['pseudo'],$_POST['mdp']);
                    

                    if ($membre) {

                        $_SESSION['user'] = serialize($membre);
                    {
                        header("location: .");
                        exit;
                    }
                    }
                    
                    
                }
            }else if($action == "deconnexion")
            {
                session_destroy();
                header("location: .");
                exit;
                 //CAS MODIF
            }else if($action == "modifier"){

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
    

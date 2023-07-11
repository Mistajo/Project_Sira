<?php

class MembreControllerFront extends ControllerAbstract{

    public function membreFrontAction(){

        $membreMdl = new MembreModel();

        if(isset($_GET['actionFront'])){
            
            $action = $_GET['actionFront'];

            if($action == "inscription"){

                if( $this->isConnected() ){
                    header("location: .");
                    exit();
                }

                include "views/user/inscription.phtml";

                if(isset($_POST['pseudo'])){
                    extract($_POST);
                    // var_dump($_POST);

                    $membre = new Membre($_POST);
                    $membreMdl->inserer($membre);

                    header("location: ?actionFront=connexion");
                    exit;
                }

            }else if($action == "connexion"){

                if( $this->isConnected() ){
                    header("location: .");
                    exit();
                }

                include "views/user/connexion.phtml";

                if ( isset($_POST['pseudo']) ){
                    $membre = $membreMdl->connexion($_POST['pseudo'], $_POST['mdp']);

                    //teste si connexion ok
                    if( $membre ){

                        $_SESSION['user'] = serialize($membre);

                        header("location: .");
                        exit;
                    }

                    
                }
        
            }else if($action == "deconnexion"){
                unset($_SESSION['user']);
                session_destroy();
                header("location: .");
                exit;

            
                
            }
        }
 
    }
}
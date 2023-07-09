<?php

class MembreController
{
    public function membreAction()
    {
        $membreMdl = new MembreModel();

        if(isset($_GET['action']))
        {
            $action = $_GET['action'];
            if($action == "inscription")
            {
                include "views/user/inscription.phtml";
                if(isset($_POST['pseudo']))
                {
                    extract($_POST);
                    var_dump($_POST);

                    $membre = new Membre(0, $pseudo, $mdp, $nom, $prenom, $email, $civilte, null, null);

                    $membreMdl->inserer($membre);

                    header("location: ?action=connexion");
                }

            }else if($action == "connexion")
            {
                include "views/user/connexion.phtml";

                if ( isset($_POST['pseudo']) )
                {
                    $membre = $membreMdl->connexion($_POST['pseudo'],$_POST['mdp']);
                    if ( $membre->getStatut() == 1 )
                    {
                        header("location: views/admin/admin.phtml");
                    }else{
                        header("location: views/membre/membre.phtml");
                    }
                }
        
            }
            
        }
 
    }
}
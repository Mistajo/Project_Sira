<?php

class AgenceController
{
    public function agenceAction()
    {
        

        if(isset($_GET['action']))
        
        {
            include "views/gestionagence.phtml";
            $agenceMdl = new AgenceModel();
            $action = $_GET['action'];
            if($action == "agence")
            

            var_dump("agence");
            {
                
                
                if(isset($_POST['titre']))
                {
                    extract($_POST);
                    var_dump($_POST);

                    $agence = new Agence(0, $titre, $adresse, $ville, $cp, $description, $photo);
                    var_dump($agence);

                    $agenceMdl->inserer($agence);

                    header("location: ?action=agence");
                }

            }
        }
 
    }
}
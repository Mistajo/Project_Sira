<?php

class AgenceController
{
    public function agenceAction()
    {
        $agenceMdl = new AgenceModel();

        if(isset($_GET['action']))
        
        {
            $action = $_GET['action'];
            if($action == "agence")
            
            // var_dump("agence");
            {
                $agences =$agenceMdl->getAgence();
                
                include "views//Back_Office/gestionagence.phtml";
                
                if(isset($_POST['titre']))
                {
                    extract($_POST);
                    
                    $agence = new Agence(0, $titre, $adresse, $ville, $cp, $description, $photo);
                    
                    
                    $agenceMdl->insererAgence($agence);

                    header("location: ?action=agence");
                    exit;
                }
            }
        }
    }

    public function getAgence()
    {
        $agenceMdl = new AgenceModel();
        return $agenceMdl->getAgence();
    }
}
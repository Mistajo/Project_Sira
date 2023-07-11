<?php

class VehiculeController extends ControllerAbstract
{
    public function vehiculeAction(){

if( isset($_GET['actionVehicule']) ){
    $action = $_GET['actionVehicule'];

    $agenceMdl = new AgenceModel();
    $vehiculeMdl = new VehiculeModel();
    
    $agences = $agenceMdl->agences();
    $vehicules = $vehiculeMdl->vehicules();

    switch($action){
        case "gestionVehicule":
           
        if( isset($_POST['titre']) ){
            $vehicule = new Vehicule($_POST);
            $vehicule->setPhoto($vehicule->getTitre().'.'. $this->getFileExtension());

            $this->loadFile($vehicule->getPhoto(), "vehicule/");

            $vehiculeMdl->inserer($vehicule);

            header("location: actionVehicule=gestionVehicule");
            exit();
        }

        include "views/backOffice/vehicules.phtml";
        break;

        case "modifier":
        if( isset($_POST['titre']) ){
            $vehicule = new Vehicule($_POST);

            $vehicule->setPhoto($_POST['photoActuelle']);

                
        //récup de la photo chargée en cas de nouvelle photo
            if(!empty($_FILES['photo']['name'])){
                $vehicule->setPhoto($vehicule->getTitre().'.'. $this->getFileExtension());

                //suppression ancienne photo
                if( file_exists("public/img/vehicule/".$_POST['photoActuelle']) ){
                    unlink("public/img/vehicule/".$_POST['photoActuelle']);
                }

              $this->loadFile($vehicule->getPhoto(), "vehicule/");

            }

          $vehiculeMdl->update($vehicule);

         header("location: ?actionVehicule=gestionVehicule");
            exit();
            
        }
        
        
        $vehiculeActuelle = $vehiculeMdl->getVehicule($_GET['id']);
        include "views/backOffice/vehicules.phtml";
        break;

    case "supprimer":
        $vehicule = $vehiculeMdl->getVehicule($_GET['id']);
        $vehiculeMdl->delete($vehicule);

        header("location: ?actionVehicule=gestionVehicule");
        exit();
        break;
}
}

}
}
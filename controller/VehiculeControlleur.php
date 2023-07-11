<?php

class VehiculeController extends ControllerAbstract
{
    public function vehiculeAction(){

if( isset($_GET['actionVehicule']) ){
    $action = $_GET['actionVehicule'];

    $vehiculeMdl = new VehiculeModel();
    $id_agenceMdl = new AgenceModel();

    $vehicules = $vehiculeMdl->vehicules();

    switch($action){
        case "gestionVehicule":

        if( isset($_POST['titre']) ){
            $vehicule = new Vehicule($_POST);
            $vehicule->setPhoto($vehicule->getTitre());

            $this->loadFile($vehicule->getTitre(), "vehicule/");

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

                var_dump(!file_exists("public/img/vehicule/".$_POST['photoActuelle']));
        //  teste si nouvelle photo
            if(!empty($_FILES['photo']['name'])){
                $vehicule->setPhoto($vehicule->getTitre());

                //suppression ancienne photo
                if( file_exists("public/img/vehicule/".$_POST['photoActuelle']) ){
                    unlink("public/img/vehicule/".$_POST['photoActuelle']);
                    var_dump($vehicule); die;
                }

            //   $this->loadFile($agence->getTitre(), "agence/");

            }

        //   $agenceMdl->update($agence);

        //  header("location: ?actionAgence=gestionAgence");
            //exit();
            
        }
        $id_agenceMdl->getAgence("id_agence");
        $agences = $id_agenceMdl->getAgence($_GET['id']);
        var_dump($agences);
        $vehiculeActuelle = $vehiculeMdl->getVehicule($_GET['id']);
        include "views/backOffice/vehicules.phtml";
        break;
    }
}

}
}
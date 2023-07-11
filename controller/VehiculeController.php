<?php

class VehiculeController extends ControllerAbstract{
    
     public function vehiculeAction(){

          if( isset($_GET['actionVehicule']) ){

               if( !$this->isAdmin() ){
                    header("location: ?actionFront=connexion");
                    exit();
               }

               $action = $_GET['actionVehicule'];

               $agenceMdl = new AgenceModel();
               $vehiculeMdl = new VehiculeModel();

               $agences = $agenceMdl->agences();
               $vehicules = $vehiculeMdl->vehicules();

               switch($action){
                    case "gestionVehicule":

                         if( isset($_POST['titre']) ){
                              $vehicule = new Vehicule($_POST);

                              $vehicule->setPhoto($vehicule->getTitre().'.'.$this->getFileExtension());

                              $this->loadFile($vehicule->getPhoto(), "vehicule/");

                              $vehiculeMdl->inserer($vehicule);

                              header("location: ?actionVehicule=gestionVehicule");
                              exit();
                         }

                         break;
                    case "modifier":
                         $vehiculeActuel = $vehiculeMdl->getVehicule($_GET['id']);
                         
                         if( isset($_POST['titre']) ){
                              $vehicule = new Vehicule($_POST);

                              //récuperer le nom de la photo actuelle en BD si pas de modif sur l'img
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
                         break;
                    
                    case "supprimer":
                         $vehicule = $vehiculeMdl->getVehicule($_GET['id']);
                         $vehiculeMdl->delete($vehicule);
                         
                         //suppression ancienne photo
                         if( file_exists("public/img/vehicule/".$vehicule->getPhoto()) ){
                              unlink("public/img/vehicule/".$vehicule->getPhoto());
                         }

                         header("location: ?actionVehicule=gestionVehicule");
                         exit();
               }

               
               include "views/backOffice/vehicule.phtml";
          }
     }
}
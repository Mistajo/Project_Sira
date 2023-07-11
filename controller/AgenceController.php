<?php

class AgenceController extends ControllerAbstract{

     public function agenceAction(){

          if( isset($_GET['actionAgence']) ){

               if( !$this->isAdmin() ){
                    header("location: ?actionFront=connexion");
                    exit();
               }
              
               $action = $_GET['actionAgence'];

               $agenceMdl = new AgenceModel();

               $agences = $agenceMdl->agences();

               switch($action){
                    case "gestionAgence":

                         //ajoute d'agence
                         if( isset($_POST['titre']) ){
                              $agence = new Agence($_POST);
                              $agence->setPhoto($agence->getTitre() .'.'. $this->getFileExtension());
                          
                              $this->loadFile($agence->getPhoto(), "agence/");

                              $agenceMdl->inserer($agence);

                              header("location: ?actionAgence=gestionAgence");
                              exit();
                         }

                         include "views/backOffice/agence.phtml";
                         break;

                    case "modifier":
                         if( isset($_POST['titre']) ){
                              $agence = new Agence($_POST);

                              //récuperer le nom de la photo actuelle en BD si pas de modif sur l'img
                              $agence->setPhoto($_POST['photoActuelle']);
                            
                              //récup de la photo chargée en cas de nouvelle photo
                              if(!empty($_FILES['photo']['name'])){
                                   $agence->setPhoto($agence->getTitre().'.'. $this->getFileExtension());
                                   //suppression ancienne photo
                                   if( file_exists("public/img/agence/".$_POST['photoActuelle']) ){
                                        unlink("public/img/agence/".$_POST['photoActuelle']);
                                   }
                                  
                                   $this->loadFile($agence->getPhoto(), "agence/");
                              }

                              $agenceMdl->update($agence);

                              header("location: ?actionAgence=gestionAgence");
                              exit();
                         }

                         $agenceActuelle = $agenceMdl->getAgence($_GET['id']);
                         include "views/backOffice/agence.phtml";
                         break;
                    
                    case "supprimer":
                         $agence = $agenceMdl->getAgence($_GET['id']);
                         $agenceMdl->delete($agence);

                         header("location: ?actionAgence=gestionAgence");
                         exit();
                         break;
               }
          }

     }
    
}
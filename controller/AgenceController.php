<?php

class AgenceController extends ControllerAbstract{

     public function agenceAction(){

          if( isset($_GET['actionAgence']) ){
               $action = $_GET['actionAgence'];

               $agenceMdl = new AgenceModel();

               $agences = $agenceMdl->agences();

               switch($action){
                    case "gestionAgence":

                         if( isset($_POST['titre']) ){
                              $agence = new Agence($_POST);
                              $agence->setPhoto($agence->getTitre());

                              $this->loadFile($agence->getTitre(), "agence/");

                              $agenceMdl->inserer($agence);

                              header("location: ?actionAgence=gestionAgence");
                              exit();
                         }

                         include "views/backOffice/agence.phtml";
                         break;

                    case "modifier":
                         if( isset($_POST['titre']) ){
                              $agence = new Agence($_POST);

                              $agence->setPhoto($_POST['photoActuelle']);

                                   var_dump(!file_exists("public/img/agence/".$_POST['photoActuelle']));
                            //  teste si nouvelle photo
                              if(!empty($_FILES['photo']['name'])){
                                   $agence->setPhoto($agence->getTitre());

                                   //suppression ancienne photo
                                   if( file_exists("public/img/agence/".$_POST['photoActuelle']) ){
                                        unlink("public/img/agence/".$_POST['photoActuelle']);
                                        var_dump($agence); die;
                                   }

                                //   $this->loadFile($agence->getTitre(), "agence/");

                              }

                           //   $agenceMdl->update($agence);

                            //  header("location: ?actionAgence=gestionAgence");
                              //exit();
                              
                         }

                         $agenceActuelle = $agenceMdl->getAgence($_GET['id']);
                         include "views/backOffice/agence.phtml";
                         break;
               }
          }

     }
    
}